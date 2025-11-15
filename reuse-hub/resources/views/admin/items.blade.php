@extends('layouts.main')

@section('title', 'Data Barang - Admin')

@section('content')
    <section class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Data Barang</h1>
                    <a href="{{ route('admin.users') }}" class="text-green-600 hover:text-green-700">Lihat Data User</a>
                </div>
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Foto</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Barang</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kondisi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Lokasi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pemilik</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($items as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $item->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <img src="{{ $item->foto ? asset('storage/'.$item->foto) : 'https://via.placeholder.com/50' }}" 
                                             alt="{{ $item->nama_barang }}" class="w-12 h-12 object-cover rounded">
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium">{{ $item->nama_barang }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $item->kategori }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $item->kondisi }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $item->lokasi }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $item->user->name }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <form action="{{ route('admin.items.delete', $item->id) }}" method="POST" 
                                              onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-4 text-center text-gray-500">Belum ada barang</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-4">
                    {{ $items->links() }}
                </div>
                
                <div class="mt-4 text-sm text-gray-600">
                    Total: {{ $items->total() }} barang
                </div>
            </div>
        </div>
    </section>
@endsection
