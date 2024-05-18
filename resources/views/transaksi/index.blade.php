@extends('layout.app')
@section('title', 'Obat Alkes')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Transaksi</title>
</head>
<body>
    <h1>Buat Transaksi</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        <h2>Products</h2>
        <div id="items">
            <div class="item">
                <label for="product_id">Nama Obat/Alkes:</label>
                <select name="items[0][product_id]" required>
                    @foreach ($products as $product)
                        <option value="{{ $product->product_id }}">{{ $product->obatalkes_nama }}</option>
                    @endforeach
                </select>
                <label for="quantity">Quantity:</label>
                <input type="number" name="items[0][quantity]" required>
            </div>
        </div>

        <button class="btn btn-sm btn-warning" type="button" onclick="addItem()">Add Item</button>
        <button class="btn btn-sm btn-primary" type="submit">Submit</button>
    </form>

    <script>
        let itemIndex = 1;

        function addItem() {
            const newItem = document.createElement('div');
            newItem.classList.add('item');
            newItem.innerHTML = `
                <label for="product_id">Product:</label>
                <select name="items[${itemIndex}][product_id]" required>
                    @foreach ($products as $product)
                        <option value="{{ $product->product_id }}">{{ $product->obatalkes_nama }}</option>
                    @endforeach
                </select>
                <label for="quantity">Quantity:</label>
                <input type="number" name="items[${itemIndex}][quantity]" required>
            `;
            document.getElementById('items').appendChild(newItem);
            itemIndex++;
        }
    </script>
</body>
</html>

@endsection
