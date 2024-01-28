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
                                <th>Periode</th>
                                <th>Pengeluaran</th>
                                <th>Uang Kembali</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            use Carbon\Carbon;
                            $num = 1;
                            ?>
                            @foreach ($data as $da)
                                <tr>
                                    <td>{{ $num++ }}</td>
                                    <td>{{ Carbon::parse($da->created_at)->locale('id_ID')->isoFormat('D MMMM YYYY') }} -
                                        {{ $da->status == false? 'sekarang': Carbon::parse($da->updated_at)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                                    </td>
                                    <td>Rp{{ $da->uang_keluar }}</td>
                                    <td>Rp{{ $da->uang_masuk }}</td>
                                    <td>
                                        <p class="badge badge-warning">{{ $da->status == false ? 'On Process' : 'Done' }}
                                        </p>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-xs" style="width: 50%"
                                            id="editButton-{{ $da->id }}" data-toggle="modal"
                                            data-target="#modal-update-{{ $da->id }}"><i
                                                class="fas fa-edit"></i></button>
                                        <button type="button" class="btn  btn-danger btn-xs"
                                            style="margin-top: 0;width: 50%" id="deleteButton"
                                            onclick="hapus({{ $da->id }})"><i
                                                class="fas fa-solid fa-trash"></i></button>
                                        <form action="{{ route('deleteModal') }}" method="post"
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
                    <h4 class="modal-title">Tambah Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('addModal') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 row">
                                <!-- text input -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Jumlah Uang (Rp)</label>
                                        <input type="text" class="form-control"
                                            placeholder="Masukan Jumlah Uang Sebagai Modal Awal" name="uang_keluar">
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
                        <h4 class="modal-title">Edit Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('updateModal') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $da->id }}">
                            <div class="row">
                                <div class="col-sm-12 row">
                                    <!-- text input -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Jumlah Modal</label>
                                            <input type="text" class="form-control" placeholder="" name="uang_keluar"
                                                value="{{ $da->uang_keluar }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Jumlah Uang Masuk</label>
                                            <input type="text" class="form-control" placeholder="" name="uang_masuk"
                                                value="{{ $da->uang_masuk }}"
                                                {{ $da->status == false ? 'disabled' : '' }}>
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
                    "text": "Tambah Modal",
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
