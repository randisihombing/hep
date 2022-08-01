<?php
$this->load->view('layout/header');
?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-content">
                <div class="card-header">
                    <h1>
                        Tambah Bahan Baku
                    </h1>
                </div>
                <div class="card-body">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <form role="form" id="frmtbh">
                                        <div class="form-group">
                                            <label>Kode Bahan Baku *</label>
                                            <input class="form-control" value="" type="text" id="id_bahan" name="id_bahan" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Masukkan Tanggal *</label>
                                            <input class="form-control" value="" type="date" id="tgl" name="tgl" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Bahan Baku *</label>
                                            <input class="form-control" value="" type="text" id="nama" name="nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah *</label>
                                            <input class="form-control" value="" type="text" id="jmlh" name="jmlh" required>
                                        </div>
                                        <div class="form-group text-md-center">
                                            <button type="submit" id="btnsimpan" class="btn btn-primary btn-flat">Simpan</button>
                                            <button type="reset" class="btn btn-danger btn-flat">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('layout/footer');
?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#id_bahan").focus().select();
        $("#btnsimpan").click(function() {
            $("#frmtbh").validate({
                submitHandler: function(form) {
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url() ?>/bahan/store",
                        dataType: "text",
                        data: $("#frmtbh").serialize(),
                        cache: false,
                        success: function(data) {
                            var header = data.split("\t");
                            switch (header[0]) {
                                case 'OK':
                                    Swal.fire("Success", "Berhasil", "success").then(function() {
                                        window.location.href = "<?php echo base_url(); ?>bahan/kelola_bahan";
                                    });
                                    break;
                                case 'errjenis':
                                    Swal.fire("Gagal", "Id Bahan Baku Harus Diisi", "error").then(function() {
                                        $("#id_bahan").focus().select();
                                    });
                                    break;
                                case 'katada':
                                    Swal.fire("Gagal", "Id Bahan Baku Sudah Ada", "error").then(function() {
                                        $("#id_bahan").focus().select();
                                    });
                                    break;
                                case 'errnama':
                                    Swal.fire("Gagal", "Bahan Baku Harus Diisi", "error").then(function() {
                                        $("#nama").focus().select();
                                    });
                                    break;
                                case 'namaada':
                                    Swal.fire("Gagal", "Bahan Baku Sudah Ada", "error").then(
                                        function() {
                                            $("#nama").focus().select();
                                        });
                                    break;
                                default:
                                    Swal.fire("Gagal", header[0], "error");
                            }
                        }
                    });
                }
            });
        });
    });
</script>