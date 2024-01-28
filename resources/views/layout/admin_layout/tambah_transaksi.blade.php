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
                                <th style="width: 30%">Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="formContainer">
                            <tr id="tran1">
                                <td>
                                    <div class="form-group">
                                        <select class="form-control-sm select2" style="width: 100%;" id="nama1"
                                            name="nama1" onchange="checkBarang(this)">
                                            <option selected="selected" disabled>----</option>
                                            @foreach ($barang as $list)
                                                <option value="{{ $list->id }}" data-nama="1"
                                                    data-jual="{{ $list->harga_jual }}" data-stok="{{ $list->total }}">
                                                    {{ $list->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="jumlah1" name="jumlah1" data-nama="1"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '');" disabled />
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="harga1" name="harga1" disabled />
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="total1" name="total1" disabled />
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn  btn-danger btn-sm deleteForm" style="margin-top: 0;"
                                        data-row="1"><i class="fas fa-solid fa-trash"></i></button>
                                </td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4" style="text-align: right;"></th>
                                <th colspan="1"><button type="button" class="btn  btn-info">Simpan</button>
                                </th>

                            </tr>
                        </tfoot>
                        <tfoot>
                            <tr>
                                <th colspan="2"></th>
                                <th>Total Belanja</th>
                                <th colspan="2" id="totalSemua">RP. </th>
                            </tr>
                        </tfoot>




                        <tfoot>
                            <tr>
                                <th colspan="2" style="text-align: right;">Pembayaran</th>
                                <th style="text-align: center;">
                                    <select class="form-control-sm select2" style="width: 100%;">
                                        <option selected="selected">CASH</option>
                                    </select>
                                </th>
                                <th colspan="2">
                                    <div class="form-group">
                                        <input type="text" id="kembalian" onblur="hitungKembalian(this)"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '');" />
                                    </div>
                                </th>
                            </tr>
                        </tfoot>
                        <tfoot>
                            <tr>
                                <th colspan="2"></th>
                                <th>Kembalian</th>
                                <th colspan="2" id="totalKembalian">RP.</th>
                            </tr>
                        </tfoot>
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
                "paging": false,
                "info": false, // Hide information about the table (e.g., "Showing 1 to 1 of 1 entries")

                "buttons": [{
                    "text": `<i class="fas fa-plus"></i>`,
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
                var newForm = '<tr id="tran' + formCounter + '">' +
                    '<td>' +
                    '<div class="form-group">' +
                    '<select class="form-control-sm select2" style="width: 100%;" id="nama' + formCounter +
                    '" name="nama' + formCounter + '" onchange="checkBarang(this)">' +
                    '<option selected="selected" disabled>----</option>' +
                    '@foreach ($barang as $list)' +
                    '<option value="{{ $list->id }}" data-nama="' + formCounter +
                    '" data-jual="{{ $list->harga_jual }}" data-stok="{{ $list->total }}">{{ $list->nama }}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '</div>' +
                    '</td>' +
                    '<td>' +
                    '<div class="form-group">' +
                    '<input type="text" id="jumlah' + formCounter + '" name="jumlah' + formCounter +
                    '" oninput="this.value = this.value.replace(/[^1-9]/g, ``);" disabled/>' +
                    '</div>' +
                    '</td>' +
                    '<td>' +
                    '<div class="form-group">' +
                    '<input type="text" id="harga' + formCounter + '" name="harga' + formCounter + '" disabled/>' +
                    '</div>' +
                    '</td>' +
                    '<td>' +
                    '<div class="form-group">' +
                    '<input type="text" id="total' + formCounter + '" name="total' + formCounter + '" disabled/>' +
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
                console.log(row)
                $("#tran" + row + "").remove();
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

        function checkBarang(elem) {
            const selectedOption = $(elem).find(':selected');
            const stok = selectedOption.data("stok");
            const nama = selectedOption.data("nama");
            const jual = selectedOption.data("jual");
            const idBarang = selectedOption.val();

            const inputJumlah = $("#jumlah" + nama);
            inputJumlah.val("")
            const inputHarga = $("#harga" + nama);
            const inputTotal = $("#total" + nama);
            const harga = inputHarga.val(jual);

            $("#jumlah" + nama).prop("disabled", false)

            inputJumlah.blur(function() {
                let totalJumlah = parseInt($(this).val())
                if (!totalJumlah) {
                    return;
                }
                if (totalJumlah > stok) {
                    alert("Stok Tersisa " + stok);
                    inputJumlah.val("")
                } else {
                    let totalHarga = totalJumlah * parseInt(jual)
                    inputTotal.val(totalHarga)
                }


                let totalInputs = $('input[id*="total"]');
                let totalHarusDibayar = 0;
                totalInputs.each(function() {
                    totalHarusDibayar += parseInt($(this).val())
                })
                $("#totalSemua").append(totalHarusDibayar)
            })

        }

        function hitungKembalian(el) {
            let totalBelanja = $("#totalSemua").text().replace(/\D/g, '') ?? 0;
            let pembayaran = parseInt($(el).val());
            let totalKembalian = pembayaran - totalBelanja;
            if (totalKembalian < 0) {
                alert("Uang Kurang");
                $(el).val("");
                $("#totalKembalian").val("RP. ");
                return;
            }

            $("#totalKembalian").append(totalKembalian);
        }
    </script>
@endSection
