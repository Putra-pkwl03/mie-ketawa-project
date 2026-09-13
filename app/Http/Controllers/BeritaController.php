<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use App\Models\BeritaImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    public function dashboard()
    {
        // Total & Status
        $totalBerita    = Berita::count();
        $totalPublished = Berita::where('status', 'published')->count();
        $totalDraft     = Berita::where('status', 'draft')->count();

        // 5 Berita Terbaru
        $beritaTerbaru = Berita::with('primaryImage')
            ->latest()
            ->take(5)
            ->get();

        // Data Grafik: Jumlah berita terbit per bulan (6 bulan terakhir)
        $monthlyStats = Berita::select(
            DB::raw('COUNT(id) as total'),
            DB::raw('DATE_FORMAT(created_at, "%b") as month'),
            DB::raw('MONTH(created_at) as month_num')
        )
        ->groupBy('month', 'month_num')
        ->orderBy('month_num', 'asc')
        ->take(6)
        ->get();

        $chartLabels = $monthlyStats->pluck('month')->toArray();
        $chartData   = $monthlyStats->pluck('total')->toArray();

        // Jika data bulan masih kosong, berikan fallback default
        if (empty($chartLabels)) {
            $chartLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'];
            $chartData   = [0, 0, 0, 0, 0, 0];
        }

        return view('dashboard.index', compact(
            'totalBerita', 
            'totalPublished', 
            'totalDraft', 
            'beritaTerbaru',
            'chartLabels',
            'chartData'
        ));
    }

    public function index(Request $request)
    {
        $query = Berita::with('images')->latest();

        // Fitur Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('konten', 'like', "%{$search}%");
            });
        }

        $beritas = $query->paginate(10)->appends($request->all());
        return view('components.dashboard.berita.index', compact('beritas'));
    }

    public function create()
    {
        $berita = new Berita(); // Instance kosong untuk Mode Create
        return view('components.dashboard.berita.form', compact('berita'));
    }

    public function edit($id)
    {
        $berita = Berita::with('images')->findOrFail($id);
        return view('components.dashboard.berita.form', compact('berita'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required|max:255',
            'konten'   => 'required',
            'images'   => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $berita = Berita::create([
            'judul'     => $request->judul,
            'slug'      => Str::slug($request->judul) . '-' . Str::random(5),
            'ringkasan' => Str::limit(strip_tags($request->konten), 150),
            'konten'    => $request->konten,
            'status'    => $request->status ?? 'published',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $file) {
                $path = $file->store('berita', 'public');

                BeritaImage::create([
                    'berita_id'  => $berita->id,
                    'image_path' => $path,
                    'is_primary' => $index === 0,
                ]);
            }
        }

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diterbitkan!');
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul'    => 'required|max:255',
            'konten'   => 'required',
            'images'   => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $berita->update([
            'judul'     => $request->judul,
            'slug'      => Str::slug($request->judul) . '-' . Str::random(5),
            'ringkasan' => Str::limit(strip_tags($request->konten), 150),
            'konten'    => $request->konten,
            'status'    => $request->status ?? 'published',
        ]);

        // Jika upload gambar baru, hapus gambar lama dan ganti dengan yang baru
        if ($request->hasFile('images')) {
            foreach ($berita->images as $img) {
                Storage::disk('public')->delete($img->image_path);
            }
            $berita->images()->delete();

            foreach ($request->file('images') as $index => $file) {
                $path = $file->store('berita', 'public');

                BeritaImage::create([
                    'berita_id'  => $berita->id,
                    'image_path' => $path,
                    'is_primary' => $index === 0,
                ]);
            }
        }

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::with('images')->findOrFail($id);

        foreach ($berita->images as $img) {
            Storage::disk('public')->delete($img->image_path);
        }

        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }



    // --- METODE UNTUK PUBLIK (PENGGUNA) ---

// 1. Menampilkan detail berita berdasarkan Slug
    public function show($slug)
    {
        // Cari berita yang statusnya 'published' berdasarkan slug
        $berita = Berita::with('images')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Berita terkait lainnya untuk widget sisi kanan/bawah
        $relatedBerita = Berita::with('primaryImage')
            ->where('status', 'published')
            ->where('id', '!=', $berita->id)
            ->latest()
            ->take(4)
            ->get();

        return view('frontend.berita.show', compact('berita', 'relatedBerita'));
    }

    // 2. Menampilkan daftar berita di Landing Page / Halaman Berita Publik
    public function publicIndex()
    {
        $beritas = Berita::with('primaryImage')
            ->where('status', 'published')
            ->latest()
            ->paginate(9);

        return view('frontend.berita.index', compact('beritas'));
    }
}