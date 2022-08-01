<?php
$this->load->view('layout/header');
?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-content">
                <div class="card-header">
                    <h1>
                        Tambah Produk
                    </h1>
                </div>
                <div class="card-body">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <form role="form" id="frmtbh">
                                        <div class="form-group">
                                            <label>ID Produk *</label>
                                            <input class="form-control" value="" type="text" id="id_produk" name="id_produk" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Masukkan Tanggal *</label>
                                            <input class="form-control" value="" type="date" id="tgl" name="tgl" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Produk *</label>
                                            <input class="form-control" value="" type="text" id="jenis_produk" name="jenis_produk" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah *</label>
                                            <input class="form-control" value="" type="text" id="jumlah" name="jumlah" required>
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
        $("#id_produk").focus().select();
        $("#btnsimpan").click(function() {
            $("#frmtbh").validate({
                submitHandler: function(form) {
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url() ?>/produk/store",
                        dataType: "text",
                        data: $("#frmtbh").serialize(),
                        cache: false,
                        success: function(data) {
                            var header = data.split("\t");
                            switch (header[0]) {
                                case 'OK':
                                    Swal.fire("Success", "Berhasil", "success").then(function() {
                                        window.location.href = "<?php echo base_url(); ?>produk/kelola_produk";
                                    });
                                    break;
                                case 'errjenis':
                                    Swal.fire("Gagal", "Kode Jenis Harus Diisi", "error").then(function() {
                                        $("#id_produk").focus().select();
                                    });
                                    break;
                                case 'katada':
                                    Swal.fire("Gagal", "Kode Jenis Sudah Ada", "error").then(function() {
                                        $("#id_produk").focus().select();
                                    });
                                    break;
                                case 'errnama':
                                    Swal.fire("Gagal", "Jenis Barang Harus Diisi", "error").then(function() {
                                        $("#jenis_produk").focus().select();
                                    });
                                    break;
                                case 'namaada':
                                    Swal.fire("Gagal", "Jenis Barang Sudah Ada", "error").then(
                                        function() {
                                            $("#jenis_produk").focus().select();
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