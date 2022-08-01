<?php
$this->load->view('layout/header');
?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-content">
                <div class="card-header">
                    <h1>
                        Tambah User
                    </h1>
                </div>
                <div class="card-body">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="card-body">
                                    <form role="form" id="frmtbh">
                                        <div class="row form-group">
                                            <label class="col-md-3 text-md-right">Nama Lengkap</label>
                                            <div class="col-md-9">
                                                <input value="" name="nama" id="nama" type="text" class="form-control" placeholder="Masukkan Nama" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-md-3 text-md-right">No Telp</label>
                                            <div class="col-md-9">
                                                <input value="" name="tlp" id="tlp" type="text" class="form-control" placeholder="Masukkan No telp " required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-md-3 text-md-right">Alamat</label>
                                            <div class="col-md-9">
                                                <input value="" name="alamat" id="alamat" type="text" class="form-control" placeholder="Masukkan Alamat " required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-md-3 text-md-right">Username</label>
                                            <div class="col-md-9">
                                                <input value="" name="username" id="username" type="text" class="form-control" placeholder="Masukkan Username" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-md-3 text-md-right">Password</label>
                                            <div class="col-md-9">
                                                <input value="" name="password" id="password" type="password" class="form-control" placeholder="Masukkan Passsword" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-md-3 text-md-right">Jabatan</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="level" id="level">
                                                    <option value="">- Pilih -</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Manajer Produksi">Manajer Produksi</option>
                                                    <option value="Kepala Operasional">Kepala Operasional</option>
                                                </select>
                                            </div>
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
        $("#btnsimpan").click(function() {
            $("#frmtbh").validate({
                submitHandler: function(form) {
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url() ?>/user/proses",
                        dataType: "text",
                        data: $("#frmtbh").serialize(),
                        cache: false,
                        success: function(data) {
                            var header = data.split("\t");
                            switch (header[0]) {
                                case 'OK':
                                    Swal.fire("Success", "Berhasil", "success").then(function() {
                                        window.location.href = "<?php echo base_url(); ?>user";
                                    });
                                    break;
                                case 'erruser':
                                    Swal.fire("Gagal", "Username Harus Diisi", "error").then(function() {
                                        $("#username").focus().select();
                                    });
                                    break;
                                case 'userudad':
                                    Swal.fire("Gagal", "Username Sudah Digunakan", "error").then(function() {
                                        $("#username").focus().select();
                                    });
                                    break;
                                case 'errnama':
                                    Swal.fire("Gagal", "Nama Harus Diisi", "error").then(function() {
                                        $("#nama").focus().select();
                                    });
                                    break;
                                case 'errpass':
                                    Swal.fire("Gagal", "Password harus diisi", "error").then(function() {
                                        $("#password").focus().select();
                                    });
                                    break;
                                case 'errpass2':
                                    Swal.fire("Gagal", "Konfirmasi Password harus diisi", "error").then(function() {
                                        $("#password2").focus().select();
                                    });
                                    break;
                                case 'erralamat':
                                    Swal.fire("Gagal", "Alamat harus diisi", "error").then(function() {
                                        $("#alamat").focus().select();
                                    });
                                case 'errlevel':
                                    Swal.fire("Gagal", "Jabatan harus diisi", "error").then(function() {
                                        $("#level").focus().select();
                                    });
                                case 'errtelp':
                                    Swal.fire("Gagal", "No Telpon harus diisi", "error").then(function() {
                                        $("#no_telp").focus().select();
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