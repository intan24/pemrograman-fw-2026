<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Form Tambah Produk Baru</h2>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label>Nama Produk:</label><br>
            <input type="text" name="name" required>
        </div>
        <br>
        <div>
            <label>Harga:</label><br>
            <input type="number" name="price" required>
        </div>
        <br>
        <div>
            <label>Stok:</label><br>
            <input type="number" name="stock" required>
        </div>
        <br>
        <button type="submit">Simpan Produk</button>
    </form>
</body>
</html>