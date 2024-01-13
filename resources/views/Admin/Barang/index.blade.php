@extends('Master.Layouts.app', ['title' => $title])

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">{{ $title }}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-gray">Master Data</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
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
                    <div class="d-flex gap-2">
                        @if ($hakTambah > 0)
                            <div>
                                <a class="modal-effect btn btn-primary-light" onclick="generateID()"
                                    data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modaldemo8">Tambah
                                    Data <i class="fe fe-plus"></i></a>
                            </div>
                        @endif
                        <div>
                            <a class="btn btn-info-light" href="{{url('/admin/barang/printqrcode/index')}}" target="_blank">Print QR Code <i class="fe fe-printer"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-1"
                            class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                            <thead>
                                <th class="border-bottom-0" width="1%">No</th>
                                <th class="border-bottom-0">QR Code</th>
                                <th class="border-bottom-0">Kode Barang</th>
                                <th class="border-bottom-0">Nama Barang</th>
                                <th class="border-bottom-0">Lokasi</th>
                                <th class="border-bottom-0">Jenis</th>
                                <th class="border-bottom-0">Kondisi</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Keterangan</th>
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

    @include('Admin.Barang.tambah', ['lokasi' => $lokasi])
    @include('Admin.Barang.edit', ['lokasi' => $lokasi])
    @include('Admin.Barang.hapus')
    @include('Admin.Barang.gambar')

    <script>
        function generateID() {
            id = new Date().getTime();
            $("input[name='kode']").val("BRG-" + id);
        }

        function update(data) {
            $("input[name='idbarangU']").val(data.barang_id);
            $("input[name='kodeU']").val(data.barang_kode);
            $("input[name='namaU']").val(data.barang_nama.replace(/_/g, ' '));
            $("select[name='lokasiU']").val(data.lokasi_id);
            $("select[name='kondisiU']").val(data.barang_kondisi);
            $("select[name='statusU']").val(data.barang_status);
            $("select[name='jenisU']").val(data.barang_jenis.replace(/_/g, ' '));
            $("textarea[name='keteranganU']").val(data.barang_ket.replace(/_/g, ' '));
        }

        function hapus(data) {
            $("input[name='idbarang']").val(data.barang_id);
            $("#vbarang").html("barang " + "<b>" + data.barang_nama.replace(/_/g, ' ') + "</b>");
        }

        function gambar(data) {
            if (data.barang_qr != 'image.png') {
                $("#outputImgG").attr("src", "{{ asset('storage/barang/') }}" + "/" + data.barang_qr);
            } else {
                $("#outputImgG").attr("src", "{{ url('/assets/default/barang/image.png') }}");
            }
        }

        function validasi(judul, status) {
            swal({
                title: judul,
                type: status,
                confirmButtonText: "Iya"
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
                "scrollX": true,
                "lengthMenu": [
                    [5, 10, 25, 50, 100],
                    [5, 10, 25, 50, 100]
                ],
                "pageLength": 10,
                lengthChange: true,
                "ajax": {
                    "url": "{{ route('barang.getbarang') }}",
                },
                "columns": [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false
                    },
                    {
                        data: 'qr',
                        name: 'barang_qr',
                        searchable: false,
                        orderable: false
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
                        data: 'lokasi_nama',
                        name: 'lokasi_nama',
                    },
                    {
                        data: 'barang_jenis',
                        name: 'barang_jenis',
                    },
                    {
                        data: 'barang_kondisi',
                        name: 'barang_kondisi',
                    },
                    {
                        data: 'barang_status',
                        name: 'barang_status',
                    },
                    {
                        data: 'barang_ket',
                        name: 'barang_ket'
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
