@extends('admin.adminbar')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-800 dark:text-white">Tambah Kategori Baru</h1>
        <p class="text-slate-500 dark:text-slate-400">Silakan masukkan nama kategori yang ingin ditambahkan.</p>
    </div>

    <div class="bg-white dark:bg-slate-900 shadow-sm border border-slate-200 dark:border-slate-800 rounded-xl p-6 transition-colors duration-300">
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf

            <div class="mb-5">
                <label for="kategori" class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">
                    Nama Kategori
                </label>
                <input 
                    type="text" 
                    id="kategori" 
                    name="kategori" 
                    value="{{ old('kategori') }}"
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all @error('kategori') border-red-500 @enderror"
                    placeholder="Contoh: Elektronik, Pakaian, dll."
                    required
                >
                
                @error('kategori')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-3">
                <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md shadow-blue-500/20 transition-all active:scale-95">
                    Simpan Kategori
                </button>
                
                <a href="{{ route('kategori.index') }}" class="px-6 py-2.5 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 font-semibold rounded-lg hover:bg-slate-200 dark:hover:bg-slate-700 transition-all">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection