<?php
$this->load->view('layout/header');
?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-content">
                <div class="card-header">
                    <h1>
                        Tambah Produksi
                    </h1>
                </div>
                <div class="card-body">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <form role="form" id="frmtbh">
                                        <div class="form-group">
                                            <label>Kode Produki *</label>
                                            <input class="form-control" value="" type="text" id="id_produksi" name="id_produksi" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Masukkan Tanggal *</label>
                                            <input class="form-control" value="" type="date" id="tgl" name="tgl" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Produk *</label>
                                            <select class="form-control" id="jenis_produk" name="jenis_produk">
                                                <option value="">- Pilih Jenis Produk -</option>
                                                <?php
                                                $produk = $this->db->query("select * from produk")->result();
                                                foreach ($produk as $p) {
                                                ?>
                                                    <option value="<?php echo $p->jenis_produk ?>"><?php echo $p->jenis_produk ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah *</label>
                                            <input class="form-control" value="" type="text" id="jumlah" name="jumlah" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Bahan Baku 1 *</label>
                                            <select class="form-control" id="nama" name="nama">
                                                <option value="">- Pilih Bahan Baku 1 -</option>
                                                <?php
                                                $bahan = $this->db->query("select * from bahan")->result();
                                                foreach ($bahan as $b) {
                                                ?>
                                                    <option value="<?php echo $b->nama ?>"><?php echo $b->nama ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah *</label>
                                            <input class="form-control" value="" type="text" id="jumlah1" name="jumlah1" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Bahan Baku 2 *</label>
                                            <select class="form-control" id="nama2" name="nama2">
                                                <option value="">- Pilih Bahan Baku 2 -</option>
                                                <?php
                                                $bahan = $this->db->query("select * from bahan")->result();
                                                foreach ($bahan as $b) {
                                                ?>
                                                    <option value="<?php echo $b->nama ?>"><?php echo $b->nama ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah *</label>
                                            <input class="form-control" value="" type="text" id="jumlah2" name="jumlah2" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Bahan Baku 3 *</label>
                                            <select class="form-control" id="nama3" name="nama3">
                                                <option value="">- Pilih Bahan Baku 3 -</option>
                                                <?php
                                                $bahan = $this->db->query("select * from bahan")->result();
                                                foreach ($bahan as $b) {
                                                ?>
                                                    <option value="<?php echo $b->nama ?>"><?php echo $b->nama ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah *</label>
                                            <input class="form-control" value="" type="text" id="jumlah3" name="jumlah3" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Bahan Baku 4 *</label>
                                            <select class="form-control" id="nama4" name="nama4">
                                                <option value="">- Pilih Bahan Baku 4 -</option>
                                                <?php
                                                $bahan = $this->db->query("select * from bahan")->result();
                                                foreach ($bahan as $b) {
                                                ?>
                                                    <option value="<?php echo $b->nama ?>"><?php echo $b->nama ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah *</label>
                                            <input class="form-control" value="" type="text" id="jumlah4" name="jumlah4" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Bahan Baku 5 *</label>
                                            <select class="form-control" id="nama5" name="nama5">
                                                <option value="">- Pilih Bahan Baku 5 -</option>
                                                <?php
                                                $bahan = $this->db->query("select * from bahan")->result();
                                                foreach ($bahan as $b) {
                                                ?>
                                                    <option value="<?php echo $b->nama ?>"><?php echo $b->nama ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah *</label>
                                            <input class="form-control" value="" type="text" id="jumlah5" name="jumlah5" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Bahan Baku 6 *</label>
                                            <select class="form-control" id="nama6" name="nama6">
                                                <option value="">- Pilih Bahan Baku 6 -</option>
                                                <?php
                                                $bahan = $this->db->query("select * from bahan")->result();
                                                foreach ($bahan as $b) {
                                                ?>
                                                    <option value="<?php echo $b->nama ?>"><?php echo $b->nama ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah *</label>
                                            <input class="form-control" value="" type="text" id="jumlah6" name="jumlah6" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Bahan Baku 7 *</label>
                                            <select class="form-control" id="nama7" name="nama7">
                                                <option value="">- Pilih Bahan Baku 7 -</option>
                                                <?php
                                                $bahan = $this->db->query("select * from bahan")->result();
                                                foreach ($bahan as $b) {
                                                ?>
                                                    <option value="<?php echo $b->nama ?>"><?php echo $b->nama ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah *</label>
                                            <input class="form-control" value="" type="text" id="jumlah7" name="jumlah7" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Bahan Baku 8 *</label>
                                            <select class="form-control" id="nama8" name="nama8">
                                                <option value="">- Pilih Bahan Baku 8 -</option>
                                                <?php
                                                $bahan = $this->db->query("select * from bahan")->result();
                                                foreach ($bahan as $b) {
                                                ?>
                                                    <option value="<?php echo $b->nama ?>"><?php echo $b->nama ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah *</label>
                                            <input class="form-control" value="" type="text" id="jumlah8" name="jumlah8" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Bahan Baku 9 *</label>
                                            <select class="form-control" id="nama9" name="nama9">
                                                <option value="">- Pilih Bahan Baku 9 -</option>
                                                <?php
                                                $bahan = $this->db->query("select * from bahan")->result();
                                                foreach ($bahan as $b) {
                                                ?>
                                                    <option value="<?php echo $b->nama ?>"><?php echo $b->nama ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah *</label>
                                            <input class="form-control" value="" type="text" id="jumlah9" name="jumlah9" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Bahan Baku 10 *</label>
                                            <select class="form-control" id="nama10" name="nama10">
                                                <option value="">- Pilih Bahan Baku 10 -</option>
                                                <?php
                                                $bahan = $this->db->query("select * from bahan")->result();
                                                foreach ($bahan as $b) {
                                                ?>
                                                    <option value="<?php echo $b->nama ?>"><?php echo $b->nama ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah *</label>
                                            <input class="form-control" value="" type="text" id="jumlah10" name="jumlah10" required>
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
        $("#id_produksi").focus().select();
        $("#btnsimpan").click(function() {
            $("#frmtbh").validate({
                submitHandler: function(form) {
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url() ?>/produksi/store",
                        dataType: "text",
                        data: $("#frmtbh").serialize(),
                        cache: false,
                        success: function(data) {
                            var header = data.split("\t");
                            switch (header[0]) {
                                case 'OK':
                                    Swal.fire("Success", "Berhasil", "success").then(function() {
                                        window.location.href = "<?php echo base_url(); ?>produksi/kelola_produksi";
                                    });
                                    break;
                                case 'errjenis':
                                    Swal.fire("Gagal", "Kode Produksi Harus Diisi", "error").then(function() {
                                        $("#id_produksi").focus().select();
                                    });
                                    break;
                                case 'katada':
                                    Swal.fire("Gagal", "Kode Produksi Sudah Ada", "error").then(function() {
                                        $("#id_produksi").focus().select();
                                    });
                                    break;
                                case 'errnama':
                                    Swal.fire("Gagal", "Jenis Produk Harus Diisi", "error").then(function() {
                                        $("#jenis_produk").focus().select();
                                    });
                                    break;
                                case 'namaada':
                                    Swal.fire("Gagal", "Jenis Produk Sudah Ada", "error").then(
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