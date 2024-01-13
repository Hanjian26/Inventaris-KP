<!-- MODAL HAPUS -->
<div class="modal fade" data-bs-backdrop="static" id="Hmodaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-body text-center p-4 pb-5">
                <button type="reset" aria-label="Close" onclick="resetH()" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">×</span></button>
                <br>
                <i class="icon icon-exclamation fs-70 text-warning lh-1 my-5 d-inline-block"></i>
                <h3 class="mb-5">Yakin hapus ?</h3>
                <input type="hidden" name="idpeminjam" id="idpeminjam">
                <input type="hidden" name="type" id="type">
                <button class="btn btn-danger-light pd-x-25 d-none" id="btnLoaderH" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
                <button onclick="submitFormH()" class="btn btn-danger-light pd-x-25" id="btnSubmit">Iya</button>
                <button type="reset" data-bs-dismiss="modal" class="btn btn-default pd-x-25">Batal</button>
            </div>
        </div>
    </div>
</div>

@section('formHapusJS')
<script>
    function submitFormH() {
        setLoadingH(true);
        const id = $("input[name='idpeminjam']").val();
        const type = $("input[name='type']").val();
        $.ajax({
            type: 'POST',
            url: "{{url('admin/peminjamanuser/proses_hapus')}}/" + id,
            enctype: 'multipart/form-data',
            data: {type: type},
            success: function(data) {
                swal({
                    title: "Berhasil dihapus!",
                    type: "success"
                });
                $('#Hmodaldemo8').modal('toggle');
                table.ajax.reload(null, false);
                resetH();
                setInterval(location.reload(), 5000);
            }
        });
    }
    function resetH() {
        $("input[name='idpeminjam']").val('');
        $("input[name='type']").val('');
        setLoadingH(false);
    }
    function setLoadingH(bool) {
        if (bool == true) {
            $('#btnLoaderH').removeClass('d-none');
            $('#btnSubmit').addClass('d-none');
        } else {
            $('#btnSubmit').removeClass('d-none');
            $('#btnLoaderH').addClass('d-none');
        }
    }
</script>
@endsection