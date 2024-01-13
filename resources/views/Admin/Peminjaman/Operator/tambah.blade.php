<!-- MODAL TAMBAH -->
<div class="modal fade" data-bs-backdrop="static" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Form Peminjaman</h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="peminjam" class="form-label">Nama Peminjam <span class="text-danger">*</span></label>
                    <input type="text" name="peminjam" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="barang" class="form-label">Barang <span class="text-danger">*</span></label>
                    <select name="barang" class="form-control">
                        <option value="">-- Pilih Barang --</option>
                        @foreach ($barang as $b)
                            <option value="{{ $b->barang_kode }}">[{{ $b->barang_kode }}] {{ $b->barang_nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tglpinjam" class="form-label">Tanggal Pinjam <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="tglpinjam" class="form-control datepicker-date" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tglkembali" class="form-label">Tanggal Kembali <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="tglkembali" class="form-control datepicker-date" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ket" class="form-label">Keterangan</label>
                    <textarea name="ket" class="form-control" rows="4"></textarea>
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
            const peminjam = $("input[name='peminjam']").val();
            const barang = $("select[name='barang']").val();
            const tglpinjam = $("input[name='tglpinjam']").val();
            const tglkembali = $("input[name='tglkembali']").val();
            setLoading(true);
            resetValid();

            if (peminjam == "") {
                validasi('Nama Peminjam wajib di isi!', 'warning');
                $("input[name='peminjam']").addClass('is-invalid');
                setLoading(false);
                return false;
            } else if (barang == "") {
                validasi('Barang wajib di pilih!', 'warning');
                $("select[name='barang']").addClass('is-invalid');
                setLoading(false);
                return false;
            } else if (tglpinjam == "") {
                validasi('Tgl Pinjam wajib di isi!', 'warning');
                $("input[name='tglpinjam']").addClass('is-invalid');
                setLoading(false);
                return false;
            }else if (tglkembali == "") {
                validasi('Tgl Kembali wajib di isi!', 'warning');
                $("input[name='tglkembali']").addClass('is-invalid');
                setLoading(false);
                return false;
            }  else {
                submitForm();
            }

        }

        function submitForm() {
            const peminjam = $("input[name='peminjam']").val();
            const barang = $("select[name='barang']").val();
            const tglpinjam = $("input[name='tglpinjam']").val();
            const tglkembali = $("input[name='tglkembali']").val();
            const ket = $("textarea[name='ket']").val();

            $.ajax({
                type: 'POST',
                url: "{{ route('pinjamuser.store') }}",
                enctype: 'multipart/form-data',
                data: {
                    peminjam: peminjam,
                    barang:barang,
                    tglpinjam:tglpinjam,
                    tglkembali: tglkembali,
                    ket: ket
                },
                success: function(data) {
                    $('#modaldemo8').modal('toggle');
                    swal({
                        title: "Berhasil ditambah!",
                        type: "success"
                    });
                    table.ajax.reload(null, false);
                    reset();
                    setInterval(location.reload(),5000);
                }
            });
        }

        function resetValid() {
            $("input[name='peminjam']").removeClass('is-invalid');
            $("select[name='barang']").removeClass('is-invalid');
            $("input[name='tglpinjam']").removeClass('is-invalid');
            $("input[name='tglkembali']").removeClass('is-invalid');
        };

        function reset() {
            resetValid();
            $("input[name='peminjam']").val('');
            $("select[name='barang']").val('');
            $("input[name='tglpinjam']").val('');
            $("input[name='tglkembali']").val('');
            $("textarea[name='ket']").val('');
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
    </script>
@endsection
