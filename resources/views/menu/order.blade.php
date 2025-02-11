@extends('menu.layouts.main')

@section('container')

<div class="container mt-5">
   <h1 class="text-center mb-4">Daftar Pesanan Anda</h1>

   @if(session('error'))
       <div class="alert alert-danger">{{ session('error') }}</div>
   @endif

   <div class="table-responsive">
       <table class="table table-bordered">
           <thead class="table-dark">
               <tr>
                   <th>No</th>
                   <th>Menu</th>
                   <th>Jumlah</th>
                   <th>Harga per Unit</th>
                   <th>Total Harga</th>
                   <th>Metode Pembayaran</th>
                   <th>Waktu Pesanan</th>
                   <th>Catatan</th>
                   <th>Aksi</th>
               </tr>
           </thead>
           <tbody>
               @forelse ($orders as $order)
                   <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->menu->name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>Rp {{ number_format($order->unit_price, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                        <td>{{ $order->payment_method }}</td>
                        <td>{{ $order->order_time->format('d M Y, H:i') }}</td>
                        <td>{{ $order->notes ?? '-' }}</td>
                        <td>
                            <form class="d-inline" action="{{ route('orders.destroy', $order->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger" >Hapus</button></td>
                            </form>

                            
                   </tr>
               @empty
                   <tr>
                       <td colspan="10" class="text-center">Belum ada pesanan.</td>
                   </tr>
               @endforelse
           </tbody>
       </table>
   </div>
</div>

@endsection