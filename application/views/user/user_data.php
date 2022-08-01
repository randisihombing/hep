<?php
$this->load->view('layout/header');
?>

<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Kelola User
                </h4>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data as $j) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $j->username ?></td>
                        <td><?php echo $j->nama ?></td>
                        <td><?php echo $j->alamat ?></td>
                        <td><?php echo $j->telp ?></td>
                        <td><?php echo $j->role ?></td>
                        <td class="text-center" width="160px">
                            <button class="btn btn-warning btn-sm" id="btnedit" data-id="<?php echo $j->username  ?>" title="Atur">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" id="btndel" data-id="<?php echo $j->username  ?>" title="Hapus">
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

<div class="modal fade" id="modal-Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalCenterTitle">Form Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="frmUbh">
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" id="username" name="username" placeholder="Masukan Username" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama User</label>
                        <input class="form-control" id="nama" name="nama" placeholder="Masukan Nama User">
                    </div>
                    <div class="form-group">
                        <label>No Telpon</label>
                        <input class="form-control" id="telp" name="telp" placeholder="Masukan No Telpon User">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat User">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select class="form-control" id="level" name="level">
                            <option value="">-- Pilih Level --</option>
                            <option value="Pemilik">Pemilik</option>
                            <option value="Kepala Produksi">Kepala Produksi</option>
                        </select>
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
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#btnedit', function() {
            var username = $(this).attr("data-id");

            $.ajax({
                type: "post",
                url: "<?php echo base_url(); ?>user/cari",
                dataType: "json",
                data: {
                    username: username
                },
                cache: false,
                success: function(data) {
                    $('[name=username]').val(data[0].username);
                    $('[name=nama]').val(data[0].nama);
                    $('[name=telp]').val(data[0].telp);
                    $('[name=level]').val(data[0].level);
                    $('[name=alamat]').val(data[0].alamat);
                    $('#modal-Edit').modal('show');
                    setTimeout(function() {
                        $("#nama").focus().select();
                    }, 1000);
                }
            });
        });

        $(document).on('click', '#btnsave', function() {
            var username = $("[name=username]").val();
            var password = $("[name=password]").val();
            var nama = $("#nama").val();
            var telp = $("#telp").val();
            var level = $("#level").val();
            var alamat = $("#alamat").val();

            $.ajax({
                type: "post",
                url: "<?php echo base_url() ?>user/update",
                dataType: "text",
                data: {
                    username: username,
                    nama: nama,
                    telp: telp,
                    level: level,
                    alamat: alamat,
                    password: password
                },
                cache: false,
                success: function(data) {
                    var header = data.split("\t");
                    switch (header[0]) {
                        case 'OK':
                            Swal.fire("Success", "Berhasil", "success").then(function() {
                                window.location.href = "<?php echo base_url(); ?>user";
                            });
                            break;
                        case 'errnama':
                            Swal.fire("Gagal", "Nama User Harus Diisi", "error").then(function() {
                                $("#nama").focus().select();
                            });
                            break;
                        case 'errtelp':
                            Swal.fire("Gagal", "No Telpon Harus Diisi", "error").then(function() {
                                $("#no_telp").focus().select();
                            });
                            break;
                        case 'erralamat':
                            Swal.fire("Gagal", "Alamat Harus Diisi", "error").then(function() {
                                $("#alamat").focus().select();
                            });
                            break;
                        default:
                            Swal.fire("Gagal", header[0], "error");
                    }
                }
            });
        });

        $(document).on('click', '#btndel', function() {
            var username = $(this).attr("data-id");

            Swal.fire({
                    title: "Apakah Anda Yakin Ingin Menghapus Data ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: `Hapus`
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "post",
                            url: "<?php echo base_url(); ?>user/delete",
                            dataType: "text",
                            data: {
                                username: username
                            },
                            cache: false,
                            success: function(data) {
                                var header = data.split("\t");
                                switch (header[0]) {
                                    case 'OK':
                                        setTimeout(function() {
                                            Swal.fire("Success", "Berhasil", "success").then(function() {
                                                window.location.href = "<?php echo base_url(); ?>user";
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
                });
        });
    });
</script>