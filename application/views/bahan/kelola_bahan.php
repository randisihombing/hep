<?php

$this->load->view('layout/header');

?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Kelola Bahan Baku
                </h4>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Bahan Baku</th>
                    <th>Tanggal </th>
                    <th>Nama Bahan Baku</th>
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
                        <td><?php echo $p->id_bahan ?></td>
                        <td><?php echo $p->tgl ?></td>
                        <td><?php echo $p->nama ?></td>
                        <td><?php echo $p->jmlh ?></td>
                        <td class="text-center" width="160px">
                            <button class="btn btn-warning btn-sm" id="btnedit" data-id="<?php echo $p->id_bahan  ?>" title="Atur">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" id="btndel" data-id="<?php echo $p->id_bahan  ?>" title="Hapus">
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
                        <label>Kode Bahan Baku </label>
                        <input class="form-control" type="text" id="id_bahan" name="id_bahan" placeholder="Masukan ID" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tanggal </label>
                        <input class="form-control" type="text" id="tgl" name="tgl" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Bahan Baku</label>
                        <input class="form-control" id="nama" name="nama" placeholder="Masukan Nama Bahan Baku">
                    </div>
                    <div class="form-group">
                        <label>jmlh</label>
                        <input class="form-control" id="jmlh" name="jmlh" placeholder="Masukan jmlh">
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
            var id_bahan = $(this).attr("data-id");
            $.ajax({
                type: "post",
                url: "<?php echo base_url();  ?>bahan/cari",
                dataType: "json",
                data: {
                    id_bahan: id_bahan
                },
                cache: false,
                success: function(data) {
                    $('#id_bahan').val(data[0].id_bahan);
                    $('#tgl').val(data[0].tgl);
                    $('#nama').val(data[0].nama);
                    $('#jmlh').val(data[0].jmlh);
                    $('#modal-Edit').modal('show');
                    setTimeout(function() {
                        $("#jenis").focus().select();
                    }, 1000);
                }
            });
        });
        $(document).on('click', '#btnsave', function() {
            var id_bahan = $("#id_bahan").val();
            var nama = $("#nama").val();
            var tgl = $("#tgl").val();
            var jmlh = $("#jmlh").val();
            $.ajax({
                type: "post",
                url: "<?php echo base_url() ?>/bahan/update",
                dataType: "text",
                data: {
                    id_bahan: id_bahan,
                    nama: nama,
                    tgl: tgl,
                    jmlh: jmlh
                },
                cache: false,
                success: function(data) {
                    var header = data.split("\t");
                    switch (header[0]) {
                        case 'OK':
                            Swal.fire("Success", "Berhasil", "success").then(function() {
                                window.location.href = "<?php echo base_url(); ?>/bahan/kelola_bahan";
                            });
                            break;
                        case 'errkode':
                            Swal.fire("Gagal", "Kode Bahan Baku Harus Diisi", "error").then(function() {
                                $("#id_bahan").focus().select();
                            });
                            break;
                        case 'errnama':
                            Swal.fire("Gagal", "Nama Bahan Baku Harus Diisi", "error").then(function() {
                                $("#nama").focus().select();
                            });
                            break;
                        case 'namaada':
                            Swal.fire("Gagal", "Nama Bahan Baku Sudah Ada", "error").then(function() {
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
            var id_bahan = $(this).attr("data-id");

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
                        url: "<?php echo base_url();  ?>bahan/delete",
                        dataType: "text",
                        data: {
                            id_bahan: id_bahan
                        },
                        cache: false,
                        success: function(data) {
                            var header = data.split("\t");
                            switch (header[0]) {
                                case 'OK':
                                    setTimeout(function() {
                                        Swal.fire('Success', 'Berhasil', 'success').then(function() {
                                            window.location.href = "<?php echo base_url(); ?>bahan/kelola_bahan";
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