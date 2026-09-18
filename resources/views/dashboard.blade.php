<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-card>
                <h3 class="text-lg font-semibold mb-2">Ringkasan Hari Ini</h3>
                <p class="text-gray-600">Selamat datang, {{ auth()->user()->name }}.</p>
            </x-card>

            <x-card>
                <h3 class="text-lg font-semibold mb-4">Status Stok Produk</h3>
                
                @php
                    // Data simulasi produk untuk menguji x-badge
                    $products = [
                        (object)['name' => 'Minyak Goreng 2L', 'stock' => 15, 'price' => 35000],
                        (object)['name' => 'Gula Pasir 1kg', 'stock' => 5, 'price' => 14500],
                        (object)['name' => 'Beras Pandan Wangi 5kg', 'stock' => 0, 'price' => 75000],
                    ];
                @endphp

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b bg-gray-50 text-gray-700">
                            <th class="p-3">Nama Produk</th>
                            <th class="p-3">Harga</th>
                            <th class="p-3">Jumlah Stok</th>
                            <th class="p-3">Status Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3 font-medium text-gray-800">{{ $product->name }}</td>
                                <td class="p-3 text-gray-600">Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                                <td class="p-3 text-gray-600">{{ $product->stock }}</td>
                                <td class="p-3">
                                    <x-badge :stock="$product->stock" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-card>
        </div>
    </div>
</x-app-layout>