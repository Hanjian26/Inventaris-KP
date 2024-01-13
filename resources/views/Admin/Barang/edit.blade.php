<!-- MODAL EDIT -->
<div class="modal fade" data-bs-backdrop="static" id="Umodaldemo8">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Ubah Barang</h6><button onclick="resetU()" aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="idbarangU">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kodeU" class="form-label">Kode Barang <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="kodeU" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="namaU" class="form-label">Nama Barang <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="namaU" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lokasiU" class="form-label">Lokasi <span class="text-danger">*</span></label>
                                    <select name="lokasiU" class="form-control">
                                        @foreach ($lokasi as $l)
                                            <option value="{{ $l->lokasi_id }}">{{ $l->lokasi_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenisU" class="form-label">Jenis Barang <span
                                            class="text-danger">*</span></label>
                                    <select name="jenisU" class="form-control">
                                        <option value="Elektronik">Elektronik</option>
                                        <option value="Non Elektronik">Non Elektronik</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kondisiU" class="form-label">Kondisi <span
                                            class="text-danger">*</span></label>
                                    <select name="kondisiU" class="form-control">
                                        <option value="Baik">Baik</option>
                                        <option value="Rusak">Rusak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="statusU" class="form-label">Status <span
                                            class="text-danger">*</span></label>
                                    <select name="statusU" class="form-control">
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Dipinjam">Dipinjam</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keteranganU" class="form-label">Keterangan</label>
                            <textarea name="keteranganU" rows='4' class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success d-none" id="btnLoaderU" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
                <a href="javascript:void(0)" onclick="checkFormU()" id="btnSimpanU" class="btn btn-success">Simpan
                    Perubahan <i class="fe fe-check"></i></a>
                <a href="javascript:void(0)" class="btn btn-light" onclick="resetU()" data-bs-dismiss="modal">Batal <i
                        class="fe fe-x"></i></a>
            </div>
        </div>
    </div>
</div>

@section('formEditJS')
    <script>
        function checkFormU() {
            const kode = $("input[name='kodeU']").val();
            const nama = $("input[name='namaU']").val();
            const lokasi = $("select[name='lokasiU']").val();
            setLoadingU(true);
            resetValidU();
            if (kode == "") {
                validasi('Kode Barang wajib di isi!', 'warning');
                $("input[name='kodeU']").addClass('is-invalid');
                setLoadingU(false);
                return false;
            } else if (nama == "") {
                validasi('Nama Barang wajib di isi!', 'warning');
                $("input[name='namaU']").addClass('is-invalid');
                setLoadingU(false);
                return false;
            } else if (lokasi == "") {
                validasi('Lokasi wajib di isi!', 'warning');
                $("select[name='lokasiU']").addClass('is-invalid');
                setLoadingU(false);
                return false;
            }  else {
                submitFormU();
            }
        }

        function submitFormU() {
            const id = $("input[name='idbarangU']").val();
            const kode = $("input[name='kodeU']").val();
            const nama = $("input[name='namaU']").val();
            const jenis = $("select[name='jenisU']").val();
            const lokasi = $("select[name='lokasiU']").val();
            const kondisi = $("select[name='kondisiU']").val();
            const status = $("select[name='statusU']").val();
            const keterangan = $("textarea[name='keteranganU']").val();

            var fd = new FormData();

            // Append data 
            fd.append('kode', kode);
            fd.append('nama', nama);
            fd.append('lokasi', lokasi);
            fd.append('jenis', jenis);
            fd.append('kondisi', kondisi);
            fd.append('status', status);
            fd.append('keterangan', keterangan);
            $.ajax({
                type: 'POST',
                url: "{{ url('admin/barang/proses_ubah') }}/" + id,
                processData: false,
                contentType: false,
                dataType: 'json',
                data: fd,
                success: function(data) {
                    swal({
                        title: "Berhasil diubah!",
                        type: "success"
                    });
                    $('#Umodaldemo8').modal('toggle');
                    table.ajax.reload(null, false);
                    resetU();
                }
            });
        }

        function resetValidU() {
            $("input[name='kodeU']").removeClass('is-invalid');
            $("input[name='namaU']").removeClass('is-invalid');
            $("select[name='lokasiU']").removeClass('is-invalid');
            $("select[name='jenisU']").removeClass('is-invalid');
            $("select[name='kondisiU']").removeClass('is-invalid');
            $("select[name='statusU']").removeClass('is-invalid');
            $("textarea[name='keteranganU']").removeClass('is-invalid');
        };

        function resetU() {
            resetValidU();
            $("input[name='idbarangU']").val('');
            $("input[name='noU']").val('');
            $("input[name='namaU']").val('');
            $("select[name='lokasiU']").prop("selectedIndex", 0);
            $("select[name='jenisU']").val('Elektronik');
            $("select[name='kondisiU']").val('Baik');
            $("select[name='statusU']").val('Tersedia');
            $("textarea[name='keteranganU']").val('');
            setLoadingU(false);
        }

        function setLoadingU(bool) {
            if (bool == true) {
                $('#btnLoaderU').removeClass('d-none');
                $('#btnSimpanU').addClass('d-none');
            } else {
                $('#btnSimpanU').removeClass('d-none');
                $('#btnLoaderU').addClass('d-none');
            }
        }

        function fileIsValidU(fileName) {
            var ext = fileName.match(/\.([^\.]+)$/)[1];
            ext = ext.toLowerCase();
            var isValid = true;
            switch (ext) {
                case 'png':
                case 'jpeg':
                case 'jpg':
                case 'svg':
                    break;
                default:
                    this.value = '';
                    isValid = false;
            }
            return isValid;
        }

        function VerifyFileNameAndFileSizeU() {
            var file = document.getElementById('GetFileU').files[0];
            if (file != null) {
                var fileName = file.name;
                if (fileIsValidU(fileName) == false) {
                    validasi('Format bukan gambar!', 'warning');
                    document.getElementById('GetFileU').value = null;
                    return false;
                }
                var content;
                var size = file.size;
                if ((size != null) && ((size / (1024 * 1024)) > 3)) {
                    validasi('Ukuran Maximum 1 MB', 'warning');
                    document.getElementById('GetFileU').value = null;
                    return false;
                }
                var ext = fileName.match(/\.([^\.]+)$/)[1];
                ext = ext.toLowerCase();
                document.getElementById('outputImgU').src = window.URL.createObjectURL(file);
                return true;
            } else
                return false;
        }
    </script>
@endsection
