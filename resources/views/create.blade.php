@extends('layouts.app')

@section('content')

<div class="content-page">
    @include('templates.content_header')
    <div class="content-header justify-content-between">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
            <h4 class="content-title content-title-xs">Kontrol Stok</h4>
        </div>
    </div><!-- content-header -->
    <div class="content-body">
        <div class="component no-code">
            <div class="card rounded-5">
				<div class="card-body">       
                <div class="component">
                    <form method="POST" action="{{ url('store') }}">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-sm-2">
                                <b><label class="form-label">Kode Produk</label></b>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" style="margin-bottom:15px;" class="form-control" name="product_code" placeholder="Masukkan kode produk" required="">
                            </div>
                            <div class="col-sm-2">
                                <b><label class="form-label">Nama Produk</label></b>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" style="margin-bottom:15px;" class="form-control" name="product_name" placeholder="Masukkan nama produk" required="">
                            </div>
                            <div class="col-sm-2">
                                <b><label class="form-label">Jumlah</label></b>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" min="0" style="margin-bottom:15px;" class="form-control" name="quantity" placeholder="Masukkan jumlah" required="">
                            </div>
                            <div class="col-sm-2">
                                <b><label class="form-label">Keterangan</label></b>
                            </div>
                            <div class="col-sm-10">
                                <textarea rows="3" style="margin-bottom:15px;" class="form-control" name="description" > </textarea>
                            </div>
                            <div class="col-sm-2">
                                <label class="form-label"></label>
                            </div>
                            <div class="col-sm-10" style="margin-top: 20px">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ url('/') }}"><button type="button" class="btn btn-secondary">Batal</button></a>
                            </div><br><br><br>
                        </div><!-- row -->
                    </form>
                </div><!-- component-section -->
                </div>
            </div>
        </div>
    </div>
</div><!-- content-body -->
</div><!-- content -->

@endsection