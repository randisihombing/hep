<?php

$this->load->view('layout/header');

?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Kelola Peramalan
                </h4>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Peramalan</th>
                    <th>Tanggal </th>
                    <th>Jenis Produk</th>
                    <th>Jumlah</th>
                    <th>Status</th>
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
                        <td><?php echo $p->id_penjualan ?></td>
                        <td><?php echo $p->tgl ?></td>
                        <td><?php echo $p->jenis_produk ?></td>
                        <td><?php echo $p->jumlah ?></td>
                        <?php if ($p->status == 1) { ?>
                            <td>Selesai</td>
                        <?php } else { ?>
                            <td>Proses</td>
                        <?php } ?>
                        <td class="text-center" width="160px">
                            <button class="btn btn-warning btn-sm" id="btnedit" data-id="<?php echo $p->id_penjualan  ?>" title="Atur">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" id="btndel" data-id="<?php echo $p->id_penjualan  ?>" title="Hapus">
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
                        <label>Kode Peramalan </label>
                        <input class="form-control" type="text" id="id_penjualan" name="id_penjualan" placeholder="Masukan ID" readonly>
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
            var id_penjualan = $(this).attr("data-id");
            $.ajax({
                type: "post",
                url: "<?php echo base_url();  ?>penjualan/cari",
                dataType: "json",
                data: {
                    id_penjualan: id_penjualan
                },
                cache: false,
                success: function(data) {
                    $('#id_penjualan').val(data[0].id_penjualan);
                    $('#jenis_produk').val(data[0].jenis_produk);
                    $('#tgl').val(data[0].tgl);
                    $('#jumlah').val(data[0].jumlah);
                    $('#modal-Edit').modal('show');
                    setTimeout(function() {
                        $("#jenis").focus().select();
                    }, 1000);
                }
            });
        });
        $(document).on('click', '#btnsave', function() {
            var id_penjualan = $("#id_penjualan").val();
            var jenis_produk = $("#jenis_produk").val();
            var tgl = $("#tgl").val();
            var jumlah = $("#jumlah").val();
            $.ajax({
                type: "post",
                url: "<?php echo base_url() ?>/penjualan/update",
                dataType: "text",
                data: {
                    id_penjualan: id_penjualan,
                    jenis_produk: jenis_produk,
                    tgl: tgl,
                    jumlah: jumlah
                },
                cache: false,
                success: function(data) {
                    var header = data.split("\t");
                    switch (header[0]) {
                        case 'OK':
                            Swal.fire("Success", "Berhasil", "success").then(function() {
                                window.location.href = "<?php echo base_url(); ?>/penjualan/kelola_penjualan";
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
            var id_penjualan = $(this).attr("data-id");

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
                        url: "<?php echo base_url();  ?>penjualan/delete",
                        dataType: "text",
                        data: {
                            id_penjualan: id_penjualan
                        },
                        cache: false,
                        success: function(data) {
                            var header = data.split("\t");
                            switch (header[0]) {
                                case 'OK':
                                    setTimeout(function() {
                                        Swal.fire('Success', 'Berhasil', 'success').then(function() {
                                            window.location.href = "<?php echo base_url(); ?>penjualan/kelola_penjualan";
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