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
						<a href="{{ url('create') }}">
							<button class="btn btn-primary" type="button">Tambah Barang</button>
						</a>
						<br><br>
					</div>
					<div class="component">
						@if(session()->has('message'))
						<div class="alert alert-success alert-dismissible mg-b-0 fade show" role="alert">
							<i class="icon fa fa-close"></i> {{ session()->get('message') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div><br>
						@endif
						@if(session()->has('error'))
						<div class="alert alert-warning alert-dismissible mg-b-0 fade show" role="alert">
							<i class="icon fa fa-close"></i> {{ session()->get('error') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div><br>
						@endif
						<div class="table table-responsive">
							<table id="example1" class="table">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Barang</th>
										<th>Nama Barang</th>
										<th>Stok</th>
										<th>Barang Masuk</th>
										<th>Barang Keluar</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 0;
									foreach ($products as $key => $value) {
										$no++; ?>
										<tr>
											<td>{{ $no }}</td>
											<td>{{ $value->product_code }}</td>
											<td>{{ $value->product_name }}</td>
											<td>{{ $value->quantity }}</td>
											<td><a href="#purchasing{{ $value->id }}" data-toggle="modal"><i class="fa fa-truck" style="margin-left: 8px"></i> Pilih</a></td>
											<td><a href="#sales{{ $value->id }}" data-toggle="modal"><i class="fa fa-truck" style="margin-left: 8px"></i> Pilih</a></td>
											<td>
												<a href="{{ url('edit', $value->id) }}"><i class="fa fa-edit" style="margin-left: 8px"></i></a>
												<a href="#destroy{{ $value->id }}" data-toggle="modal"><i class="fa fa-trash" style="margin-left: 8px"></i></a>
											</td>
										</tr>
										<div class="modal fade" id="purchasing{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h6 class="modal-title" id="exampleModalLabel">Barang Masuk</h6>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true"><i data-feather="x"></i></span>
														</button>
													</div>
													<form action="{{ url('update_purchasing', $value->id) }}" method="POST">
														@csrf
														<div class="modal-body">
															<div class="row row-sm">
																<div class="col-sm-3">
																	<b><label class="form-label">Tanggal</label></b>
																</div>
																<div class="col-sm-9">
																	<input type="date" value="<?php echo date('Y-m-d'); ?>" style="margin-bottom:15px;" class="form-control" name="product_code" placeholder="Masukkan kode produk" required>
																</div>
																<div class="col-sm-3">
																	<b><label class="form-label">Kode Produk</label></b>
																</div>
																<div class="col-sm-9">
																	<input type="text" style="margin-bottom:15px;" class="form-control" name="product_code" value="{{ $value->product_code }}" readonly>
																</div>
																<div class="col-sm-3">
																	<b><label class="form-label">Nama Produk</label></b>
																</div>
																<div class="col-sm-9">
																	<input type="text" style="margin-bottom:15px;" class="form-control" name="product_name" value="{{ $value->product_name }}" readonly>
																</div>
																<div class="col-sm-3">
																	<b><label class="form-label">Jumlah</label></b>
																</div>
																<div class="col-sm-9">
																	<input type="number" min="0" style="margin-bottom:15px;" class="form-control" name="quantity" placeholder="Masukkan jumlah barang masuk" required="">
																</div>
																<div class="col-sm-3">
																	<b><label class="form-label">Keterangan</label></b>
																</div>
																<div class="col-sm-9">
																	<textarea rows="3" style="margin-bottom:15px;" class="form-control" name="description"> </textarea>
																</div>
															</div><!-- row -->
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
															<button type="submit" class="btn btn-primary">Simpan</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<div class="modal fade" id="sales{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h6 class="modal-title" id="exampleModalLabel">Barang Keluar</h6>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true"><i data-feather="x"></i></span>
														</button>
													</div>
													<form action="{{ url('update_sales', $value->id) }}" method="POST">
														@csrf
														<div class="modal-body">
															<div class="row row-sm">
																<input type="hidden" name="type" value="1">
																<div class="col-sm-3">
																	<b><label class="form-label">Tanggal</label></b>
																</div>
																<div class="col-sm-9">
																	<input type="date" value="<?php echo date('Y-m-d'); ?>" style="margin-bottom:15px;" class="form-control" name="product_code"  required>
																</div>
																<div class="col-sm-3">
																	<b><label class="form-label">Kode Produk</label></b>
																</div>
																<div class="col-sm-9">
																	<input type="text" style="margin-bottom:15px;" class="form-control" name="product_code" value="{{ $value->product_code }}" readonly>
																</div>
																<div class="col-sm-3">
																	<b><label class="form-label">Nama Produk</label></b>
																</div>
																<div class="col-sm-9">
																	<input type="text" style="margin-bottom:15px;" class="form-control" name="product_name" value="{{ $value->product_name }}" readonly>
																</div>
																<div class="col-sm-3">
																	<b><label class="form-label">Jumlah</label></b>
																</div>
																<div class="col-sm-9">
																	<input type="number" max="{{ $value->quantity }}" style="margin-bottom:15px;" class="form-control" name="quantity" placeholder="Masukkan jumlah barang keluar" required="">
																</div>
																<div class="col-sm-3">
																	<b><label class="form-label">Keterangan</label></b>
																</div>
																<div class="col-sm-9">
																	<textarea rows="3" style="margin-bottom:15px;" class="form-control" name="description"> </textarea>
																</div>
															</div><!-- row -->
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
															<button type="submit" class="btn btn-primary">Simpan</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<div class="modal fade" id="destroy{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h6 class="modal-title" id="exampleModalLabel">Barang Keluar</h6>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true"><i data-feather="x"></i></span>
														</button>
													</div>
														<div class="modal-body">
															Anda yakin ingin menghapus data ini?
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
															<a href="{{ url('destroy', $value->id) }}"><button type="button" class="btn btn-primary">Hapus</button></a>
														</div>
												</div>
											</div>
										</div>										
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div><!-- component-section -->
				</div>
			</div>
		</div>
	</div><!-- content-body -->
</div><!-- content -->

@endsection