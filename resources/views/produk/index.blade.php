@extends('template.master')

@section('title', 'Kasir | Data Produk')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <h6 class="alert alert-danger text-white" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </h6>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div
                        class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Produk</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-0" id="pesanan">
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-primary btn-md mr-2" data-toggle="modal"
                            data-target="#myModal">
                            <i class="fa fa-plus"></i> Insert Data</button>
                        {{-- <a href="index.php?menu=barang" class="btn btn-success btn-md">
                            <i class="fa fa-refresh"></i> Refresh Data</a> --}}
                        <div class="clearfix"></div>
                        <br />
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                        Produk</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach ($produks as $produk)
                                    <tr>
                                        <td class="text-secondary text-xs font-weight-bold ps-4">{{ $counter++ }}</td>
                                        <td class="text-secondary text-xs font-weight-bold ps-4">{{ $produk->namaProduk }}
                                        </td>
                                        <td class="text-secondary text-xs font-weight-bold ps-4">{{ $produk->harga }}</td>
                                        <td class="text-secondary text-xs font-weight-bold ps-4">{{ $produk->stok }}</td>
                                        <td class="text-secondary text-xs font-weight-bold ps-4 d-flex gap-2">
                                            <a href="{{ route('produk.edit', $produk['id']) }}"
                                                class="btn btn-warning btn-sm mb-0">Edit</a>

                                            <form action="{{ route('produk.destroy', ['produk' => $produk['id']]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm mb-0"
                                                    data-confirm-delete="true">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style=" border-radius:0px;">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-plus"></i>Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('produk.store') }}" method="POST">
                    <div class="modal-body">
                        <table class="table table-striped bordered">
                            @csrf
                            <tr>
                                <td>Nama Produk</td>
                                <td><input type="text" placeholder="Nama Produk" required class="form-control"
                                        name="namaProduk"></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><input type="number" placeholder="Harga" required class="form-control" name="harga">
                                </td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td><input type="number" required Placeholder="Stok" class="form-control" name="stok">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert
                            Data</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
