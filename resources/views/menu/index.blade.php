@extends('menu.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
    <div class="row">
        <div class="col">
            <h1 class="h2">Daftar Menu</h1>
        </div>
    </div>
</div>

<div class="container mt-5">
    <h1 class="text-center mb-4">Daftar Menu Makanan</h1>
    @foreach ($categories as $category)
        <h2>{{ $category->name }}</h2>
        <div class="row">
            @foreach ($category->menus as $menu)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="{{ $menu->image_url ?? 'https://via.placeholder.com/150' }}" class="card-img-top" alt="{{ $menu->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $menu->name }}</h5>
                            <p class="card-text">{{ $menu->description }}</p>
                            <p class="card-text">Harga: Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                            <p class="card-text">
                                Status: 
                                <span class="{{ $menu->is_available ? 'text-success' : 'text-danger' }}">
                                    {{ $menu->is_available ? 'Tersedia' : 'Habis' }}
                                </span>
                            </p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#orderModal{{ $menu->id }}">
                                Pesan
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal untuk Form Pemesanan -->
                <div class="modal fade" id="orderModal{{ $menu->id }}" tabindex="-1" aria-labelledby="orderModalLabel{{ $menu->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="orderModalLabel{{ $menu->id }}">Pesan {{ $menu->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('menu.order') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Jumlah</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="notes" class="form-label">Catatan (Opsional)</label>
                                        <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>

@endsection