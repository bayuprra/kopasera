@extends('layout.main_layout.main')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-check"></i>
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-check"></i>
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Harga Jual</th>
                                <th>Harga Modal</th>
                                <th>Stok</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $num = 1;
                            ?>
                            @foreach ($data as $da)
                                <tr>
                                    <td>{{ $num++ }}</td>
                                    <td>{{ $da->nama }}</td>
                                    <td>{{ $da->kNama }}</td>
                                    <td>{{ $da->harga_jual }}</td>
                                    <td>{{ $da->harga_modal }}</td>
                                    <td>{{ $da->total }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-xs" style="width: 50%"
                                            id="editButton-{{ $da->id }}" data-toggle="modal"
                                            data-target="#modal-update-{{ $da->id }}"><i
                                                class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-primary btn-xs" style="width: 50%"
                                            id="editButton-{{ $da->id }}" data-toggle="modal"
                                            data-target="#modal-tambah_stok-{{ $da->id }}"><i
                                                class="fas fa-plus"></i></button>
                                        <button type="button" class="btn  btn-danger btn-xs"
                                            style="margin-top: 0;width: 50%" id="deleteButton"
                                            onclick="hapus({{ $da->id }})"><i
                                                class="fas fa-solid fa-trash"></i></button>
                                        <form action="{{ route('deleteBarang') }}" method="post"
                                            id="formHapus{{ $da->id }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $da->id }}">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!--/. container-fluid -->
    </section>
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('addBarang') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 row">
                                <!-- text input -->
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="text" class="form-control" placeholder="Masukan Nama Barang"
                                            name="nama">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control" name="kategori" style="width: 100%;">
                                            <option value="0">Masukan Kategori</option>
                                            @foreach ($list as $li)
                                                <option value="{{ $li->id }}">{{ $li->kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 row">
                                <!-- text input -->
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Harga Jual</label>
                                        <input type="text" class="form-control" placeholder="Masukan Harga Jual"
                                            name="harga_jual">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Harga Modal</label>
                                        <input type="text" class="form-control" placeholder="Masukan Harga Modal"
                                            name="harga_modal">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 row">
                                <!-- text input -->
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Jumlah QTY</label>
                                        <input type="text" class="form-control" placeholder="Masukan Jumlah"
                                            name="jumlah">
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    @foreach ($data as $da)
        <div class="modal fade" id="modal-update-{{ $da->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Kategori</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('updateBarang') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $da->id }}">
                            <div class="row">
                                <div class="col-sm-12 row">
                                    <!-- text input -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" class="form-control" placeholder="Masukan Nama Barnag"
                                                name="nama" value="{{ $da->nama }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" name="kategori" style="width: 100%;">
                                                <option value="{{ $da->kategori_id }}">{{ $da->kNama }}
                                                </option>
                                                @foreach ($list as $li)
                                                    <option value="{{ $li->id }}">{{ $li->kategori }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 row">
                                    <!-- text input -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Harga Jual</label>
                                            <input type="text" class="form-control" placeholder="Masukan Harga Jual"
                                                name="harga_jual" value="{{ $da->harga_jual }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Harga Modal</label>
                                            <input type="text" class="form-control" placeholder="Masukan Harga Modal"
                                                name="harga_modal" value="{{ $da->harga_modal }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
    @foreach ($data as $da)
        <div class="modal fade" id="modal-tambah_stok-{{ $da->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Stok</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('addStok') }}" method="POST">
                            @csrf
                            <input type="hidden" name="stok_id" value="{{ $da->stok_id }}">
                            <input type="hidden" name="id" value="{{ $da->id }}">
                            <div class="row">
                                <div class="col-sm-12 row">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="text" class="form-control" placeholder="Masukan Nama Barnag"
                                            name="nama" value="{{ $da->nama }}" disabled>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Jumlah Barang Masuk</label>
                                            <input type="text" class="form-control"
                                                placeholder="Masukan Jumlah Barang" name="jumlah">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
@endSection

@section('script')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [{
                    "text": "Tambah Barang",
                    "className": "btn btn-primary btn-info",
                    "action": function() {
                        $('#modal-add').modal('show');
                    }
                }],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


        });

        function hapus(id) {
            Swal.fire({
                title: 'Apakah Kamu Yakin?',
                text: "Kamu Tidak Akan Bisa Mengembalikannya Lagi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('form#formHapus' + id).submit();
                }
            })
        }
    </script>
@endSection
