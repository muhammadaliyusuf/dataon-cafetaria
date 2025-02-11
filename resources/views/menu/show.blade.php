@extends('menu.layouts.main')

@section('container')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detail Menu</h5>
                    <a href="{{ route('menu.create') }}" class="btn btn-secondary">Kembali</a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($menu->image)
                                <img src="{{ asset('storage/' . $menu->image) }}" 
                                        alt="Menu Image" 
                                        class="img-fluid rounded">
                            @else
                                <div class="alert alert-info">Tidak ada gambar</div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <table class="table">
                                <tr>
                                    <th width="30%">Kategori</th>
                                    <td>{{ $menu->category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Menu</th>
                                    <td>{{ $menu->name }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $menu->description }}</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                                </tr>
                            </table>

                            <div class="mt-3">
                                <a href="{{ route('menu.edit', $menu->id) }}" 
                                    class="btn btn-warning">Edit Menu</a>
                                <form action="{{ route('menu.destroy', $menu->id) }}" 
                                        method="POST" 
                                        class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-danger" 
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">
                                        Hapus Menu
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection