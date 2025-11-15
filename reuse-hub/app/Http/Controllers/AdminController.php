<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::latest()->get();
        return view('admin.users', compact('users'));
    }

    public function items()
    {
        $items = Item::with('user')->latest()->paginate(10);
        return view('admin.items', compact('items'));
    }

    public function deleteItem($id)
    {
        $item = Item::findOrFail($id);
        
        if ($item->foto && Storage::disk('public')->exists($item->foto)) {
            Storage::disk('public')->delete($item->foto);
        }
        
        $item->delete();
        
        return redirect()->route('admin.items')->with('success', 'Barang berhasil dihapus');
    }
}