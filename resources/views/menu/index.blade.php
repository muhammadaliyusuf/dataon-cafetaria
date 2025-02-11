@extends('menu.layouts.main')

@section('container')
<!-- Header Section -->
<header class="bg-light py-4 shadow-sm">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h2 mb-0 fw-bold text-primary">Welcome back, {{ auth()->user()->name }}</h1>
                <p class="text-muted mb-0">Selamat menikmati menu makanan favorit Anda!</p>
            </div>
        </div>
    </div>
</header>

<!-- Main Content Section -->
<div class="container my-4">    
    @foreach ($categories as $category)
        <div class="mb-4">
            <h3 class="mb-3 text-secondary fw-bold border-bottom pb-2">{{ $category->name }}</h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($category->menus as $menu)
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0 transition-all">
                            <img 
                                src="{{ asset('storage/' . $menu->image) }}" 
                                class="card-img-top img-fluid rounded-top" 
                                alt="{{ $menu->name }}"
                                style="height: 200px; object-fit: cover;"
                            >
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-dark">{{ $menu->name }}</h5>
                                <p class="card-text text-muted">{{ $menu->description }}</p>
                                <p class="card-text text-success fw-bold">Harga: Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <button 
                                    type="button" 
                                    class="btn btn-primary w-100 btn-hover" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#orderModal{{ $menu->id }}"
                                >Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="orderModal{{ $menu->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title fw-bold">Pesan {{ $menu->name }}</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal Body -->
                                <form action="{{ route('orders.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <!-- Hidden Inputs -->
                                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                        <input type="hidden" name="unit_price" value="{{ $menu->price }}">

                                        <!-- Jumlah Pesanan -->
                                        <div class="mb-4">
                                            <label class="form-label fw-bold">Jumlah</label>
                                            <input 
                                                type="number" 
                                                class="form-control form-control-lg" 
                                                name="quantity" 
                                                min="1" 
                                                value="1" 
                                                required
                                            >
                                        </div>

                                        <!-- Metode Pembayaran -->
                                        <div class="mb-4">
                                            <label class="form-label fw-bold">Metode Pembayaran</label>
                                            <select 
                                                class="form-select form-select-lg" 
                                                name="payment_method" 
                                                required
                                            >
                                                <option value="Cash">Cash</option>
                                                <option value="Debit Card">Debit Card</option>
                                                <option value="E-Wallet">E-Wallet</option>
                                            </select>
                                        </div>

                                        <!-- Catatan -->
                                        <div class="mb-4">
                                            <label class="form-label fw-bold">Catatan</label>
                                            <textarea 
                                                class="form-control form-control-lg" 
                                                name="notes" 
                                                rows="3"
                                                placeholder="Contoh: Tidak pakai pedas, tambah saus, dll."
                                            ></textarea>
                                        </div>
                                    </div>

                                    <!-- Modal Footer -->
                                    <div class="modal-footer">
                                        <button 
                                            type="button" 
                                            class="btn btn-outline-secondary btn-lg" 
                                            data-bs-dismiss="modal"
                                        >Batal
                                        </button>
                                        <button 
                                            type="submit" 
                                            class="btn btn-primary btn-lg"
                                        >Pesan Sekarang
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                @endforeach
            </div>
        </div>
    @endforeach
</div>

@endsection
