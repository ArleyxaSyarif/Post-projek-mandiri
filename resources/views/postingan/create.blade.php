<x-app-layout>

    <h1>ini create</h1>
    <form action="{{ route('postingan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" id="judul" name="judul" placeholder="Judul">

<input type="text" id="slugPreview" placeholder="Slug otomatis" readonly>

        <input type="file" name="gambar" placeholder="Gambar">
        <input type="text" name="deskripsi" placeholder="Deskripsi">
            <select name="kategori_id" id="">
            @foreach ($kategori as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
            @endforeach
        </select>
    
        <button type="submit">Tambah Postingan</button>
    </form>

</x-app-layout>
<script>
document.getElementById('judul').addEventListener('keyup', function () {

    let slug = this.value
        .toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '')   // hapus karakter aneh
        .trim()
        .replace(/\s+/g, '-')           // spasi jadi -
        .replace(/-+/g, '-');           // -- jadi -

    document.getElementById('slugPreview').value = slug;
});
</script>
