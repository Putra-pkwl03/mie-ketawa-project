@if (session('success'))
    <div class="mb-6 p-3.5 bg-emerald-100/60 border border-emerald-400 rounded-lg text-slate-800 text-xs font-semibold flex justify-between items-center">
        <span>{{ session('success') }}</span>
    </div>
@endif

@if ($errors->any())
    <div class="mb-6 p-3.5 bg-red-100/60 border border-red-300 rounded-lg text-slate-800 text-xs font-semibold">
        <ul class="list-disc pl-4 space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif