<?php

$this->load->view('layout/header');

?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Jadwal
                </h4>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Produk</th>
                    <th>Bulan</th>
                    <th>Jumlah Produksi</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($jadwal as $p) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $p['jenis_produk'] ?></td>
                        <td><?php echo $p['date'] ?></td>
                        <td><?php echo $p['jumlah_produksi'] ?></td>
                        <td><?php echo $p['jumlah_waktu'] ?></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$this->load->view('layout/footer');
?>