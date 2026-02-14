@extends('admin.adminbar')

@section('content')

<button><a href="{{ route('kategori.create') }}">Tambah Kategori</a></button>

<div class="overflow-hidden rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 shadow-sm">
    <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-800">
        <thead class="bg-slate-50 dark:bg-slate-800/50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">No</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Nama Kategori</th>
                <th class="px-6 py-3 text-right text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
            @forelse($kategoris as $index => $kategori)
            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-400">
                    {{ $index + 1 }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900 dark:text-white">
                    {{ $kategori->kategori }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('kategori.edit', $kategori->id) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 mr-3">Edit</a>
                    <button class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Hapus</button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="px-6 py-10 text-center text-slate-500 dark:text-slate-400">
                    Belum ada data kategori.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>


@endsection