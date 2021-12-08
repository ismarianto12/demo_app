<div class="card">
    <div class="card-header">
        <div class="card-title">Tambah data karyawan</div>
    </div>
    <div class="ket"></div>
    <form id="exampleValidation" method="POST" class="simpan" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-md-2 text-left">NIP<span class="required-label">*</span></label>
                <div class="col-md-4">
                    <input type="number" class="form-control" id="nip" name="nip" value="">
                    <small>NIP Karyawan *</small>
                </div>

                <label for="name" class="col-md-2 text-left">Nama<span class="required-label">*</span></label>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="nama" name="nama" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-2 text-left">Divisi <span class="required-label">*</span></label>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="divisi" name="divisi">
                </div>
            </div>
        </div>
        <div class="card-action">
            <div class="row">
                <div class="col-md-12">
                    <input class="btn btn-success" type="submit" value="Simpan">
                    <button class="btn btn-danger" type="reset">Batal</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(function() {
        $('.simpan').on('submit', function(e) {
            e.preventDefault();
            var datastring = $(this).serialize();
            $.ajax({
                url: "{{ route('crudpegawai.store') }}",
                method: "POST",
                data: datastring,
                cache: false,
                asynch: false,
                success: function(data) {
                    $('#datatable').DataTable().ajax.reload();
                    $('#formmodal').modal('hide');
                    $.notify({
                        icon: 'flaticon-alarm-1',
                        title: 'Info',
                        message: 'Berhasil di Simpan',
                    }, {
                        type: 'secondary',
                        placement: {
                            from: "center",
                            align: "right"
                        },
                        time: 1000,
                        z_index: 2000
                    });
                },
                error: function(data) {
                    var div = $('#container');
                    setInterval(function() {
                        var pos = div.scrollTop();
                        div.scrollTop(pos + 2);
                    }, 10)
                    err = '';
                    respon = data.responseJSON;
                    $.each(respon.errors, function(index, value) {
                        err += "<li>" + value + "</li>";
                    });
                    $.notify({
                        icon: 'flaticon-alarm-1',
                        title: 'Opp Seperti nya lupa inputan berikut :',
                        message: err,
                    }, {
                        type: 'secondary',
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        time: 3000,
                        z_index: 2000
                    });

                }
            })

        });
    });
    // sellect 2
</script>
