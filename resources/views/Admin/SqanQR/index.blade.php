@extends('Master.Layouts.app', ['title' => $title])

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Scan QR Code</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Sqan QR Code</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <!-- ROW -->
    <div class="row row-sm">
        <div class="col-12" id="scancontainer">
            <div class="card">
                <div class="card-body">
                    <div id="reader"></div>
                    <h1 class="text-center" id="result"></h1>
                </div>
            </div>
        </div>
        <div class="col-12 d-none" id="resultcontainer">
            <div class="card">
                <div class="card-body">
                    <div id="loadingscan" class="">
                        <center>
                            <img src="{{ url('/assets/images/loader.svg') }}" height="100px" alt="Loader">
                        </center>
                    </div>

                    <div class="d-flex justify-content-between">
                        <h4>Kode Barang</h4>
                        <h4 class="text-gray" id="kdbarang">-</h4>
                    </div>
                    <hr style="border-bottom: 1px solid gray" />

                    <div class="d-flex justify-content-between">
                        <h4>Nama Barang</h4>
                        <h4 class="text-gray" id="nmbarang">-</h4>
                    </div>
                    <hr style="border-bottom: 1px solid gray" />

                    <div class="d-flex justify-content-between">
                        <h4>Jenis Barang</h4>
                        <h4 class="text-gray" id="jnsbarang">-</h4>
                    </div>
                    <hr style="border-bottom: 1px solid gray" />

                    <div class="d-flex justify-content-between">
                        <h4>Lokasi</h4>
                        <h4 class="text-gray" id="lokasi">-</h4>
                    </div>
                    <hr style="border-bottom: 1px solid gray" />

                    <div class="d-flex justify-content-between">
                        <h4>Kondisi Barang</h4>
                        <h4 class="text-gray" id="kondisi">-</h4>
                    </div>
                    <hr style="border-bottom: 1px solid gray" />

                    <div class="d-flex justify-content-between">
                        <h4>Status Barang</h4>
                        <h4 class="text-gray" id="status">-</h4>
                    </div>
                    <hr style="border-bottom: 1px solid gray" />

                    <div class="d-flex justify-content-between">
                        <h4>Keterangan</h4>
                        <h4 class="text-gray" id="ket">-</h4>
                    </div>

                    <br>

                    <a class="btn btn-primary btn-block btn-lg" href="{{ request()->fullUrl() }}">Scan QR Lagi</a>

                </div>
            </div>
        </div>
    </div>
    <!-- END ROW -->
@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            const scanner = new Html5QrcodeScanner('reader', {
                qrbox: {
                    width: 250,
                    height: 250
                },
                fps: 20
            });
            scanner.render(success, error);
        });


        function success(result) {
            $('#resultcontainer').attr('class', 'col-12');
            $('#scancontainer').attr('class', 'col-12 d-none');
            $('#result').html(result);
            getbarangbyid(result);
            scanner.clear();
        }

        function error(err) {
            console.log(err);
            scanner.clear();
        }

        function getbarangbyid(kode) {
            $.ajax({
                type: 'GET',
                url: "{{ url('admin/scanqr/getbarang') }}/" + kode,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data) {
                    $('#loadingscan').attr('class', 'd-none');
                    $('#kdbarang').html(data.barang_kode);
                    $('#nmbarang').html(data.barang_nama);
                    $('#jnsbarang').html(data.barang_jenis);
                    $('#lokasi').html(data.lokasi_nama);
                    $('#kondisi').html(data.barang_kondisi);
                    $('#status').html(data.barang_status);
                    $('#ket').html(data.barang_ket);
                }
            });
        }
    </script>
@endsection
