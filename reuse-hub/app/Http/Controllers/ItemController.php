<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::with('user')->latest();

        // Filter kategori
        if ($request->filled('kategori')) {
            $query->whereIn('kategori', $request->kategori);
        }

        // Filter lokasi
        if ($request->filled('lokasi')) {
            $query->where('lokasi', $request->lokasi);
        }

        // Filter kondisi
        if ($request->filled('kondisi')) {
            $query->where('kondisi', $request->kondisi);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_barang', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        $items = $query->paginate(12);

        if ($request->ajax()) {
            return response()->json([
                'items' => $items->items(),
                'total' => $items->total(),
                'current_page' => $items->currentPage(),
                'last_page' => $items->lastPage()
            ]);
        }

        return view('tukar', compact('items'));
    }

    public function show($id)
    {
        $item = Item::with('user')->findOrFail($id);
        return view('tukardetail', compact('item'));
    }

    public function create()
    {
        return view('unggah');
    }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'nama_barang' => 'required|string|max:255',
        'kategori' => 'required|string',
        'kondisi' => 'required|string',
        'lokasi' => 'required|string',
        'deskripsi' => 'required|string|min:20',
        'foto' => 'required|image|mimes:jpeg,png,jpg|max:10240'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);
    }

    $fotoPath = $request->file('foto')->store('items', 'public');

    Item::create([
        'user_id' => Auth::id(),
        'nama_barang' => $request->nama_barang,
        'kategori' => $request->kategori,
        'kondisi' => $request->kondisi,
        'lokasi' => $request->lokasi,
        'deskripsi' => $request->deskripsi,
        'foto' => $fotoPath
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Barang berhasil diunggah!',
        'redirect' => '/tukar'
    ]);
}
}