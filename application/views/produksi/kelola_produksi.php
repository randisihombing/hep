<?php

$this->load->view('layout/header');

?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Kelola Produksi
                </h4>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Produksi</th>
                    <th>Tanggal </th>
                    <th>Jenis Produk</th>
                    <th>Jumlah</th>
                    <th>Bahan Baku 1</th>
                    <th>Jumlah</th>
                    <th>Bahan Baku 2</th>
                    <th>Jumlah</th>
                    <th>Bahan Baku 3</th>
                    <th>Jumlah</th>
                    <th>Bahan Baku 4</th>
                    <th>Jumlah</th>
                    <th>Bahan Baku 5</th>
                    <th>Jumlah</th>
                    <th>Bahan Baku 6</th>
                    <th>Jumlah</th>
                    <th>Bahan Baku 7</th>
                    <th>Jumlah</th>
                    <th>Bahan Baku 8</th>
                    <th>Jumlah</th>
                    <th>Bahan Baku 9</th>
                    <th>Jumlah</th>
                    <th>Bahan Baku 10</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data as $p) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $p->id_produksi ?></td>
                        <td><?php echo $p->tgl ?></td>
                        <td><?php echo $p->jenis_produk ?></td>
                        <td><?php echo $p->jumlah ?></td>
                        <td><?php echo $p->nama ?></td>
                        <td><?php echo $p->jumlah1 ?></td>
                        <td><?php echo $p->nama2 ?></td>
                        <td><?php echo $p->jumlah2 ?></td>
                        <td><?php echo $p->nama3 ?></td>
                        <td><?php echo $p->jumlah3 ?> </td>
                        <td><?php echo $p->nama4 ?></td>
                        <td><?php echo $p->jumlah4 ?></td>
                        <td><?php echo $p->nama5 ?></td>
                        <td><?php echo $p->jumlah5 ?></td>
                        <td><?php echo $p->nama6 ?></td>
                        <td><?php echo $p->jumlah6 ?></td>
                        <td><?php echo $p->nama7 ?></td>
                        <td><?php echo $p->jumlah7 ?></td>
                        <td><?php echo $p->nama8 ?></td>
                        <td><?php echo $p->jumlah8 ?></td>
                        <td><?php echo $p->nama9 ?></td>
                        <td><?php echo $p->jumlah9 ?></td>
                        <td><?php echo $p->nama10 ?></td>
                        <td><?php echo $p->jumlah10 ?></td>
                        <td class="text-center" width="160px">
                            <button class="btn btn-warning btn-sm" id="btnedit" data-id="<?php echo $p->id_produksi  ?>" title="Atur">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" id="btndel" data-id="<?php echo $p->id_produksi  ?>" title="Hapus">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="ModalCenterTitle">Form Edit</h5>
            </div>
            <div class="modal-body">
                <form role="form" id="frmUbh">
                    <div class="form-group">
                        <label>Kode Produksi </label>
                        <input class="form-control" type="text" id="id_produksi" name="id_produksi" placeholder="Masukan Kode" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tanggal </label>
                        <input class="form-control" type="text" id="tgl" name="tgl" readonly>
                    </div>
                    <div class="form-group">
                        <label>Jenis Produk</label>
                        <input class="form-control" id="jenis_produk" name="jenis_produk" placeholder="Masukan Jenis Produk">
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input class="form-control" id="jumlah" name="jumlah" placeholder="Masukan Jumlah">
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnsave">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
$this->load->view('layout/footer');
?>

<script script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#btnedit', function() {
            var id_produksi = $(this).attr("data-id");
            $.ajax({
                type: "post",
                url: "<?php echo base_url();  ?>produksi/cari",
                dataType: "json",
                data: {
                    id_produksi: id_produksi
                },
                cache: false,
                success: function(data) {
                    $('#id_produksi').val(data[0].id_produksi);
                    $('#jenis_produk').val(data[0].jenis_produk);
                    $('#tgl').val(data[0].tgl);
                    $('#jumlah').val(data[0].jumlah);
                    $('#nama').val(data[0].nama);
                    $('#jumlah1').val(data[0].jumlah1);
                    $('#nama2').val(data[0].nama2);
                    $('#jumlah2').val(data[0].jumlah2);
                    $('#nama3').val(data[0].nama3);
                    $('#jumlah3').val(data[0].jumlah3);
                    $('#nama4').val(data[0].nama4);
                    $('#jumlah4').val(data[0].jumlah4);
                    $('#nama5').val(data[0].nama5);
                    $('#jumlah5').val(data[0].jumlah5);
                    $('#nama6').val(data[0].nama6);
                    $('#jumlah6').val(data[0].jumlah6);
                    $('#nama7').val(data[0].nama7);
                    $('#jumlah7').val(data[0].jumlah7);
                    $('#nama8').val(data[0].nama8);
                    $('#jumlah8').val(data[0].jumlah8);
                    $('#nama9').val(data[0].nama9);
                    $('#jumlah9').val(data[0].jumlah9);
                    $('#nama10').val(data[0].nama10);
                    $('#jumlah10').val(data[0].jumlah10);
                    $('#modal-Edit').modal('show');
                    setTimeout(function() {
                        $("#jenis").focus().select();
                    }, 1000);
                }
            });
        });
        $(document).on('click', '#btnsave', function() {
            var id_produksi = $("#id_produksi").val();
            var jenis_produk = $("#jenis_produk").val();
            var tgl = $("#tgl").val();
            var jumlah = $("#jumlah").val();
            var nama = $("#nama").val();
            var jumlah1 = $("#jumlah1").val();
            var nama2 = $("#nama2").val();
            var jumlah2 = $("#jumlah2").val();
            var nama3 = $("#nama3").val();
            var jumlah3 = $("#jumlah3").val();
            var nama4 = $("#nama4").val();
            var jumlah4 = $("#jumlah4").val();
            var nama5 = $("#nama5").val();
            var jumlah5 = $("#jumlah5").val();
            var nama6 = $("#nama6").val();
            var jumlah6 = $("#jumlah6").val();
            var nama7 = $("#nama7").val();
            var jumlah7 = $("#jumlah7").val();
            var nama8 = $("#nama8").val();
            var jumlah8 = $("#jumlah8").val();
            var nama9 = $("#nama9").val();
            var jumlah9 = $("#jumlah9").val();
            var nama10 = $("#nama10").val();
            var jumlah10 = $("#jumlah10").val();
            $.ajax({
                type: "post",
                url: "<?php echo base_url() ?>/produksi/update",
                dataType: "text",
                data: {
                    id_produksi: id_produksi,
                    jenis_produk: jenis_produk,
                    tgl: tgl,
                    jumlah: jumlah,
                    nama: nama,
                    jumlah1: jumlah1,
                    nama2: nama2,
                    jumlah2: jumlah2,
                    nama3: nama3,
                    jumlah3: jumlah3,
                    nama4: nama4,
                    jumlah4: jumlah4,
                    nama5: nama5,
                    jumlah5: jumlah5,
                    nama6: nama6,
                    jumlah6: jumlah6,
                    nama7: nama7,
                    jumlah7: jumlah7,
                    nama8: nama8,
                    jumlah8: jumlah8,
                    nama9: nama9,
                    jumlah9: jumlah9,
                    nama10: nama10,
                    jumlah10: jumlah10
                },
                cache: false,
                success: function(data) {
                    var header = data.split("\t");
                    switch (header[0]) {
                        case 'OK':
                            Swal.fire("Success", "Berhasil", "success").then(function() {
                                window.location.href = "<?php echo base_url(); ?>/produksi/kelola_produksi";
                            });
                            break;
                        case 'errkode':
                            Swal.fire("Gagal", "Kode kategori Barang Harus Diisi", "error").then(function() {
                                $("#kode_kat").focus().select();
                            });
                            break;
                        case 'errnama':
                            Swal.fire("Gagal", "Nama kategori Barang Harus Diisi", "error").then(function() {
                                $("#nama").focus().select();
                            });
                            break;
                        case 'namaada':
                            Swal.fire("Gagal", "Nama kategori Barang Sudah Ada", "error").then(function() {
                                $("#nama").focus().select();
                            });
                            break;
                        default:
                            Swal.fire("Gagal", header[0], "error");
                    }
                }
            });
        });

        $(document).on('click', '#btndel', function() {
            var id_produksi = $(this).attr("data-id");

            Swal.fire({
                title: "Apakah Anda Yakin Ingin Menghapus Data ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `Hapus`
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url();  ?>produksi/delete",
                        dataType: "text",
                        data: {
                            id_produksi: id_produksi
                        },
                        cache: false,
                        success: function(data) {
                            var header = data.split("\t");
                            switch (header[0]) {
                                case 'OK':
                                    setTimeout(function() {
                                        Swal.fire('Success', 'Berhasil', 'success').then(function() {
                                            window.location.href = "<?php echo base_url(); ?>produksi/kelola_produksi";
                                        });
                                    }, 1000);
                                    break;
                                default:
                                    setTimeout(function() {
                                        Swal.fire("Gagal", header[0], "error");
                                    }, 1000);
                            }
                        }
                    });
                }
            })
        });
    });
</script>