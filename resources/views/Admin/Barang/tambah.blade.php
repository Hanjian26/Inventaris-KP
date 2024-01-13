<!-- MODAL TAMBAH -->
<div class="modal fade" data-bs-backdrop="static" id="modaldemo8">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Tambah Barang</h6><button onclick="reset()" aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kode" class="form-label">Kode Barang <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="kode" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama Barang <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lokasi" class="form-label">Lokasi <span
                                            class="text-danger">*</span></label>
                                    <select name="lokasi" class="form-control">
                                        @foreach ($lokasi as $l)
                                            <option value="{{ $l->lokasi_id }}">{{ $l->lokasi_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis" class="form-label">Jenis Barang <span
                                            class="text-danger">*</span></label>
                                    <select name="jenis" class="form-control">
                                        <option value="Elektronik" selected>Elektronik</option>
                                        <option value="Non Elektronik">Non Elektronik</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kondisi" class="form-label">Kondisi <span
                                            class="text-danger">*</span></label>
                                    <select name="kondisi" class="form-control">
                                        <option value="Baik" selected>Baik</option>
                                        <option value="Rusak">Rusak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status" class="form-label">Status <span
                                            class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option value="Tersedia" selected>Tersedia</option>
                                        <option value="Dipinjam">Dipinjam</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" rows='4' class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary d-none" id="btnLoader" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
                <a href="javascript:void(0)" onclick="checkForm()" id="btnSimpan" class="btn btn-primary">Simpan <i
                        class="fe fe-check"></i></a>
                <a href="javascript:void(0)" class="btn btn-light" onclick="reset()" data-bs-dismiss="modal">Batal <i
                        class="fe fe-x"></i></a>
            </div>
        </div>
    </div>
</div>

@section('formTambahJS')
    <script>
        function checkForm() {
            const kode = $("input[name='kode']").val();
            const nama = $("input[name='nama']").val();
            const lokasi = $("select[name='lokasi']").val();
            setLoading(true);
            resetValid();
            if (kode == "") {
                validasi('Kode Barang wajib di isi!', 'warning');
                $("input[name='kode']").addClass('is-invalid');
                setLoading(false);
                return false;
            } else if (nama == "") {
                validasi('Nama Barang wajib di isi!', 'warning');
                $("input[name='nama']").addClass('is-invalid');
                setLoading(false);
                return false;
            } else if (lokasi == "") {
                validasi('Lokasi wajib di isi!', 'warning');
                $("select[name='lokasi']").addClass('is-invalid');
                setLoading(false);
                return false;
            } else {
                submitForm();
            }
        }

        function submitForm() {
            const kode = $("input[name='kode']").val();
            const nama = $("input[name='nama']").val();
            const lokasi = $("select[name='lokasi']").val();
            const jenis = $("select[name='jenis']").val();
            const kondisi = $("select[name='kondisi']").val();
            const status = $("select[name='status']").val();
            const keterangan = $("textarea[name='keterangan']").val();
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
                url: "{{ route('barang.store') }}",
                processData: false,
                contentType: false,
                dataType: 'json',
                data: fd,
                success: function(data) {
                    $('#modaldemo8').modal('toggle');
                    swal({
                        title: "Berhasil ditambah!",
                        type: "success"
                    });
                    table.ajax.reload(null, false);
                    reset();
                },
                error: function(err) {
                    console.log(err)
                }
            });
        }

        function resetValid() {
            $("input[name='kode']").removeClass('is-invalid');
            $("input[name='nama']").removeClass('is-invalid');
            $("select[name='lokasi']").removeClass('is-invalid');
            $("select[name='jenis']").removeClass('is-invalid');
            $("select[name='kondisi']").removeClass('is-invalid');
            $("select[name='status']").removeClass('is-invalid');
            $("textarea[name='keterangan']").removeClass('is-invalid');
        };

        function reset() {
            resetValid();
            $("input[name='kode']").val('');
            $("input[name='nama']").val('');
            $("select[name='lokasi']").prop("selectedIndex", 0);
            $("select[name='jenis']").val('Elektronik');
            $("select[name='kondisi']").val('Baik');
            $("select[name='status']").val('Tersedia');
            $("textarea[name='keterangan']").val('');
            setLoading(false);
        }

        function setLoading(bool) {
            if (bool == true) {
                $('#btnLoader').removeClass('d-none');
                $('#btnSimpan').addClass('d-none');
            } else {
                $('#btnSimpan').removeClass('d-none');
                $('#btnLoader').addClass('d-none');
            }
        }

        function fileIsValid(fileName) {
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

        function VerifyFileNameAndFileSize() {
            var file = document.getElementById('GetFile').files[0];
            if (file != null) {
                var fileName = file.name;
                if (fileIsValid(fileName) == false) {
                    validasi('Format bukan gambar!', 'warning');
                    document.getElementById('GetFile').value = null;
                    return false;
                }
                var content;
                var size = file.size;
                if ((size != null) && ((size / (1024 * 1024)) > 3)) {
                    validasi('Ukuran Maximum 1 MB', 'warning');
                    document.getElementById('GetFile').value = null;
                    return false;
                }
                var ext = fileName.match(/\.([^\.]+)$/)[1];
                ext = ext.toLowerCase();
                // $(".custom-file-label").addClass("selected").html(file.name);
                document.getElementById('outputImg').src = window.URL.createObjectURL(file);
                return true;
            } else
                return false;
        }
    </script>
@endsection
