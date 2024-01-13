<!-- MODAL EDIT -->
<div class="modal fade" data-bs-backdrop="static" id="Umodaldemo8">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Pengembalian Barang</h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="idpinjamP">
                <div class="form-group">
                    <label for="kondisi" class="form-label">Kondisi Barang <span class="text-danger">*</span></label>
                    <select name="kondisi" class="form-control">
                        <option value="Baik">Baik</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary d-none" id="btnLoaderU" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
                <a href="javascript:void(0)" onclick="checkFormU()" id="btnSimpanU" class="btn btn-primary">Proses
                    Pengembalian <i class="fe fe-check"></i></a>
                <a href="javascript:void(0)" class="btn btn-light" onclick="resetU()" data-bs-dismiss="modal">Batal <i
                        class="fe fe-x"></i></a>
            </div>
        </div>
    </div>
</div>

@section('formEditJS')
    <script>
        function checkFormU() {
            const kondisi = $("select[name='kondisi']").val();
            setLoadingU(true);
            resetValidU();

            if (kondisi == "") {
                validasi('Kondisi Barang wajib di isi!', 'warning');
                $("select[name='kondisi']").addClass('is-invalid');
                setLoadingU(false);
                return false;
            } else {
                submitFormU();
            }
        }

        function submitFormU() {
            const id = $("input[name='idpinjamP']").val();
            const kondisi = $("select[name='kondisi']").val();

            $.ajax({
                type: 'POST',
                url: "{{ url('admin/peminjamanadmin/proses_pengembalian') }}/" + id,
                enctype: 'multipart/form-data',
                data: {
                    kondisi: kondisi,
                },
                success: function(data) {
                    swal({
                        title: "Berhasil dikembalikan!",
                        type: "success"
                    });
                    $('#Umodaldemo8').modal('toggle');
                    table.ajax.reload(null, false);
                    resetU();
                },
                error: function(err) {
                    console.log(err)
                }
            });
        }

        function resetValidU() {
            $("select[name='kondisi']").removeClass('is-invalid');
        };

        function resetU() {
            resetValidU();
            $("select[name='kondisi']").val('Baik');
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
