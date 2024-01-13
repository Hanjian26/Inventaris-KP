@extends('Master.Layouts.app', ['title' => $title])

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Peminjaman Barang</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-gray">Admin</li>
                <li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <!-- ROW -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h3 class="card-title">Data</h3>

                    <div>
                        <a class="modal-effect btn btn-primary-light" data-bs-effect="effect-super-scaled"
                            data-bs-toggle="modal" href="#modaldemo8">Pinjam Barang
                            <i class="fe fe-plus"></i></a>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-1" width="100%"
                            class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                            <thead>
                                <th class="border-bottom-0" width="1%">No</th>
                                <th class="border-bottom-0">Tgl Pinjam</th>
                                <th class="border-bottom-0">Tgl Kembali</th>
                                <th class="border-bottom-0">Peminjam</th>
                                <th class="border-bottom-0">Kode Barang</th>
                                <th class="border-bottom-0">Barang</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Keterangan</th>
                                <th class="border-bottom-0">Kondisi</th>
                                <th class="border-bottom-0" width="1%">Action</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END ROW -->

    @include('Admin.Peminjaman.Admin.hapus')
    @include('Admin.Peminjaman.Admin.konfirmasi')
    @include('Admin.Peminjaman.Admin.pengembalian')

    @include('Admin.Peminjaman.Operator.tambah', ['barang' => $barang])
    @include('Admin.Peminjaman.Operator.edit', ['barang' => $barang])
    @include('Admin.Peminjaman.Operator.hapus')


    <script>
        function konfirmasi(id, konfirmasi) {
            $("input[name='idpinjam']").val(id);
            $("input[name='konfirmasi']").val(konfirmasi);
            $("#konfir").html(konfirmasi);
        }

        function pengembalian(id) {
            $("input[name='idpinjamP']").val(id);
        }

        function hapus(data, type) {
            $("input[name='idpeminjam']").val(data);
            $("input[name='type']").val(type);
        }

        function validasi(judul, status) {
            swal({
                title: judul,
                type: status,
                confirmButtonText: "Iya."
            });
        }

        function update(data) {
            $("input[name='idpeminjamU']").val(data.peminjam_id);
            $("input[name='peminjamU']").val(data.peminjam_nama.replace(/_/g, ' '));
            $("input[name='tglpinjamU']").val(data.peminjam_tglpinjam);
            $("input[name='tglkembaliU']").val(data.peminjam_tglkembali);
            $("textarea[name='ketU']").val(data.peminjam_ket.replace(/_/g, ' '));

            $("select[name='barangU']").append($('<option>', {
                value: data.barang_kode,
                text: '[' + data.barang_kode + '] ' + data.barang_nama.replace(/_/g, ' '),
                selected: true
            }));
        }

        function hapus(data, type) {
            $("input[name='idpeminjam']").val(data);
            $("input[name='type']").val(type);
        }

        function validasi(judul, status) {
            swal({
                title: judul,
                type: status,
                confirmButtonText: "Iya."
            });
        }
    </script>
@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table;
        $(document).ready(function() {
            //datatables
            table = $('#table-1').DataTable({

                "processing": true,
                "serverSide": true,
                "info": true,
                "order": [],
                "stateSave": true,
                "lengthMenu": [
                    [5, 10, 25, 50, 100],
                    [5, 10, 25, 50, 100]
                ],
                "pageLength": 10,

                lengthChange: true,

                "ajax": {
                    "url": "{{ route('pinjamadmin.getdata') }}",
                },

                "columns": [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false
                    },
                    {
                        data: 'peminjam_tglpinjam',
                        name: 'peminjam_tglpinjam',
                    },
                    {
                        data: 'peminjam_tglkembali',
                        name: 'peminjam_tglkembali',
                    },
                    {
                        data: 'peminjam_nama',
                        name: 'peminjam_nama',
                    },
                    {
                        data: 'barang_kode',
                        name: 'barang_kode',
                    },
                    {
                        data: 'barang_nama',
                        name: 'barang_nama',
                    },
                    {
                        data: 'peminjam_status',
                        name: 'peminjam_status',
                    },
                    {
                        data: 'peminjam_ket',
                        name: 'peminjam_ket',
                    },
                    {
                        data: 'peminjam_kondisi',
                        name: 'peminjam_kondisi',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],

            });
        });
    </script>
@endsection
