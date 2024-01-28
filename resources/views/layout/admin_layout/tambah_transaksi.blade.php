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
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="formContainer">
                            <tr id="1">

                                <td>
                                    <div class="form-group">
                                        <select class="form-control" name="input1" style="width: 100%;">
                                            <option value="0">Pilih Barang</option>
                                            @foreach ($list as $li)
                                                <option value="{{ $li->id }}">{{ $li->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="input1" name="input1" />
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="input1" name="input1" />
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="input1" name="input1" />
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn  btn-danger btn-sm deleteForm" style="margin-top: 0;"
                                        data-row="1"><i class="fas fa-solid fa-trash"></i></button>
                                </td>
                            </tr>

                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!--/. container-fluid -->
    </section>
@endSection

@section('script')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "searching": false,
                "ordering": false,
                "buttons": [{
                    "text": "+",
                    "className": "btn btn-primary btn-info",
                    "attr": {
                        "id": "addForm"
                    }
                }],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');



        });
    </script>
    <script>
        $(document).ready(function() {
            var formCounter = 1;

            function addNewForm() {
                formCounter++;
                var newForm = '<tr id="' + formCounter + '">' +
                    '<td>' +
                    '<div class="form-group">' +
                    '<label for="namaBarang' + formCounter + '">Nama Barang:</label>' +
                    '<select class="form-control" id="namaBarang' + formCounter + '" name="namaBarang' +
                    formCounter + '" />' +
                    '<option value="0">Pilih Barang</option>' +
                    '@foreach ($list as $li)' +
                    '<option value="{{ $li->id }}">{{ $li->nama }}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '</div>' +
                    '</td>' +
                    '<td>' +
                    '<div class="form-group">' +
                    '<label for="jumlah' + formCounter + '">Jumlah:</label>' +
                    '<input type="text" id="jumlah' + formCounter + '" name="jumlah' + formCounter + '" />' +
                    '</div>' +
                    '</td>' +
                    '<td>' +
                    '<div class="form-group">' +
                    '<label for="harga' + formCounter + '">Harga:</label>' +
                    '<input type="text" id="harga' + formCounter + '" name="harga' + formCounter + '" />' +
                    '</div>' +
                    '</td>' +
                    '<td>' +
                    '<div class="form-group">' +
                    '<label for="total' + formCounter + '">Total:</label>' +
                    '<input type="text" id="total' + formCounter + '" name="total' + formCounter + '" />' +
                    '</div>' +
                    '</td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-danger btn-sm deleteForm" style="margin-top: 0;" data-row="' +
                    formCounter + '">' +
                    '<i class="fas fa-trash"></i>' +
                    '</button>' +
                    '</td>' +
                    '</tr>';

                $('#formContainer').append(newForm);
            }

            function deleteForm(row) {
                $("#" + row + "").remove();
            }
            $('#addForm').on('click', function(e) {
                e.preventDefault();
                addNewForm();
            });
            $(document).on('click', '.deleteForm', function() {
                var rowToDelete = $(this).data('row');
                deleteForm(rowToDelete);
            });
        });
    </script>
@endSection
