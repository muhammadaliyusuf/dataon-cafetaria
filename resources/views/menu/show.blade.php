@extends('menu.layouts.main')

@section('container')

<div class="container mt-5">
    <h1 class="text-center mb-4">Detail Pesanan #{{ $order->id }}</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informasi Pesanan</h5>
            <p><strong>Total Harga:</strong> Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ $order->payment_method }}</p>
            <p><strong>Waktu Pesanan:</strong> {{ $order->order_time->format('d M Y, H:i') }}</p>
            <p><strong>Catatan:</strong> {{ $order->notes ?? 'Tidak ada catatan' }}</p>
        </div>
    </div>

    <h5 class="mt-4">Item Pesanan</h5>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nama Menu</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->menu->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp {{ number_format($item->unit_price, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('orders.order') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Pesanan</a>
</div>

@endsection