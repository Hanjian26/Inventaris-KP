<!-- MODAL EDIT -->
<div class="modal fade" data-bs-backdrop="static" id="Umodaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Ubah Peminjaman</h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="idpeminjamU">
                <div class="form-group">
                    <label for="peminjamU" class="form-label">Nama Peminjam <span class="text-danger">*</span></label>
                    <input type="text" name="peminjamU" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="barangU" class="form-label">Barang <span class="text-danger">*</span></label>
                    <select name="barangU" class="form-control">
                        @foreach ($barang as $b)
                            <option value="{{ $b->barang_kode }}">[{{ $b->barang_kode }}] {{ $b->barang_nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tglpinjamU" class="form-label">Tanggal Pinjam <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="tglpinjamU" class="form-control datepicker-date" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tglkembaliU" class="form-label">Tanggal Kembali <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="tglkembaliU" class="form-control datepicker-date" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ketU" class="form-label">Keterangan</label>
                    <textarea name="ketU" class="form-control" rows="4"></textarea>
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
            const peminjam = $("input[name='peminjamU']").val();
            const barang = $("select[name='barangU']").val();
            const tglpinjam = $("input[name='tglpinjamU']").val();
            const tglkembali = $("input[name='tglkembaliU']").val();
            setLoadingU(true);
            resetValidU();

            if (peminjam == "") {
                validasi('Nama Peminjam wajib di isi!', 'warning');
                $("input[name='peminjamU']").addClass('is-invalid');
                setLoadingU(false);
                return false;
            } else if (barang == "") {
                validasi('Barang wajib di pilih!', 'warning');
                $("select[name='barangU']").addClass('is-invalid');
                setLoadingU(false);
                return false;
            } else if (tglpinjam == "") {
                validasi('Tgl Pinjam wajib di isi!', 'warning');
                $("input[name='tglpinjamU']").addClass('is-invalid');
                setLoadingU(false);
                return false;
            }else if (tglkembali == "") {
                validasi('Tgl Kembali wajib di isi!', 'warning');
                $("input[name='tglkembaliU']").addClass('is-invalid');
                setLoadingU(false);
                return false;
            }  else {
                submitFormU();
            }
        }

        function submitFormU() {
            const id = $("input[name='idpeminjamU']").val();
            const peminjam = $("input[name='peminjamU']").val();
            const barang = $("select[name='barangU']").val();
            const tglpinjam = $("input[name='tglpinjamU']").val();
            const tglkembali = $("input[name='tglkembaliU']").val();
            const ket = $("textarea[name='ketU']").val();


            $.ajax({
                type: 'POST',
                url: "{{ url('admin/peminjamanuser/proses_ubah') }}/" + id,
                enctype: 'multipart/form-data',
                data: {
                    peminjam: peminjam,
                    barang:barang,
                    tglpinjam:tglpinjam,
                    tglkembali: tglkembali,
                    ket: ket
                },
                success: function(data) {
                    swal({
                        title: "Berhasil diubah!",
                        type: "success"
                    });
                    $('#Umodaldemo8').modal('toggle');
                    table.ajax.reload(null, false);
                    resetU();
                    setInterval(location.reload(), 5000);
                },
                error: function(err) {
                    console.log(err)
                }
            });
        }

        function resetValidU() {
            $("input[name='peminjamU']").removeClass('is-invalid');
            $("select[name='barangU']").removeClass('is-invalid');
            $("input[name='tglpinjamU']").removeClass('is-invalid');
            $("input[name='tglkembaliU']").removeClass('is-invalid');
        };

        function resetU() {
            resetValidU();
            $("input[name='peminjamU']").val('');
            $("select[name='barangU']").val('');
            $("input[name='tglpinjamU']").val('');
            $("input[name='tglkembaliU']").val('');
            $("textarea[name='ketU']").val('');
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
    </script>
@endsection
