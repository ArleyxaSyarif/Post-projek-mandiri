<?php

namespace App\Http\Controllers;

use App\Models\Postingan;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Str;

class PostinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postingan = Postingan::all();
        return view('postingan.index', compact('postingan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('postingan.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'judul' => 'required|max:255',
        'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        'deskripsi' => 'required',
        'kategori_id' => 'required|exists:kategoris,id',
    ]);

$gambar = $request->file('gambar');
$namaGambar = Str::uuid().'.'.$gambar->getClientOriginalExtension();
$gambar->storeAs('postingan', $namaGambar, 'public');

    Postingan::create([
        'judul' => $request->judul,
        'gambar' => $namaGambar,
        'deskripsi' => $request->deskripsi,
        'penulis' => auth()->user()->name,
        'kategori_id' => $request->kategori_id,
        'status' => 'pending',
    ]);

    return redirect()->route('postingan.index')
        ->with('success','Postingan dikirim & menunggu approval admin');
}

    /**
     * Display the specified resource.
     */
    public function show(Postingan $postingan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Postingan $postingan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Postingan $postingan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Postingan $postingan)
    {
        //
    }
}
