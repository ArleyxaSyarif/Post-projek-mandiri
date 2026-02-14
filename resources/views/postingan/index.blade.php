<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 dark:text-white">Manajemen Postingan</h1>
                <p class="text-slate-500 dark:text-slate-400 mt-1">Kelola semua artikel dan konten blog Anda di sini.</p>
            </div>
            <a href="{{ route('postingan.create') }}" class="inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-xl shadow-lg shadow-blue-500/20 transition-all hover:-translate-y-1">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Postingan
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($postingan as $item)
                <div class="group bg-white dark:bg-slate-900 rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl transition-all duration-300">
                    
                    <div class="relative aspect-video overflow-hidden">
                        <img src="{{ asset('storage/postingan/' . $item->gambar) }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        
                        <div class="absolute top-3 left-3">
                            <span class="px-3 py-1 text-xs font-bold uppercase tracking-wider bg-white/90 dark:bg-slate-800/90 backdrop-blur text-blue-600 dark:text-blue-400 rounded-lg shadow-sm">
                                {{ $item->kategori->kategori }}
                            </span>
                        </div>

                        <div class="absolute top-3 right-3">
                            <span class="px-3 py-1 text-xs font-bold rounded-lg shadow-sm "
                            
                                >
                                {{ ucfirst($item->status) }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-2 line-clamp-2 group-hover:text-blue-600 transition-colors">
                            {{ $item->judul }}
                        </h2>
                        
                        <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-3 mb-4">
                            {{ $item->deskripsi }}
                        </p>

                        <div class="flex items-center justify-between pt-4 border-t border-slate-100 dark:border-slate-800">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-xs font-bold">
                                    {{ substr($item->penulis, 0, 1) }}
                                </div>
                                <span class="text-sm font-medium text-slate-700 dark:text-slate-300 italic">
                                    {{ $item->penulis }}
                                </span>
                            </div>
                            
                            <div class="flex gap-2">
                                <button class="p-2 text-slate-400 hover:text-blue-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </button>
                                <button class="p-2 text-slate-400 hover:text-red-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center">
                    <p class="text-slate-500 dark:text-slate-400">Belum ada postingan yang dibuat.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>