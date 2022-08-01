<?php
$this->load->view('layout/header');
?>
<div class="row justify-content-center">
    <div class="col-lg-11">
        <div class="page shadow-sm border-bottom">
            <div class="page-content">
                <div class="page-header">
                    <h1>
                        Laporan
                    </h1>
                </div>
                <div class="page-body">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <form role="form" id="frmTbh" method="post" action="<?php echo base_url(); ?>laporan/jadwal" autocomplete="off">
                                        <div class="form-group">
                                            <label>Date:</label>
                                            <div class="input-group date">
                                                <input type="date" class="form-control pull-right date-picker" id="tgl_awal" name="tgl_awal" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Date range:</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control pull-right date-picker" id="tgl_akhir" name="tgl_akhir" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <button type="submit" id="btnCari" class="btn btn-success">Tampilkan</button>
                                        <input type="hidden" name="xyz" id="xyz" value="2">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['tgl_awal'])) {
                            $tgl_awall = $_POST['tgl_awal'];
                            $tgl_akhirr = $_POST['tgl_akhir'];
                            $tgl_awal = date("Y-m-d", strtotime($tgl_awall));
                            $tgl_akhir = date("Y-m-d", strtotime($tgl_akhirr));
                            // $tgl_awal = date("Y-m-d 00:00:00", strtotime($tgl_awall));
                            // $tgl_akhir = date("Y-m-d 23:59:59", strtotime($tgl_akhirr));

                            // $kode_jadwal = $_POST['kode_jadwal'];
                            // $xyz = $_POST['xyz'];
                            // if ($xyz == 2) {
                        ?>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Kode Produksi</th>
                                                <th>Tanggal</th>
                                                <th>Jenis Produk</th>
                                                <th>Jumlah</th>
                                                <th>Bahan Baku 1</th>
                                                <th>Bahan Baku 2</th>
                                                <th>Bahan Baku 3</th>
                                                <th>Bahan Baku 4</th>
                                                <th>Bahan Baku 5</th>
                                                <th>Bahan Baku 6</th>
                                                <th>Bahan Baku 7</th>
                                                <th>Bahan Baku 8</th>
                                                <th>Bahan Baku 9</th>
                                                <th>Bahan Baku 10</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // if ($kode_jadwal == "semua") {
                                            //     $query = $this->db->query("SELECT * FROM kat WHERE created_date >= '$tgl_awal' AND created_date <= '$tgl_akhir'")->result();
                                            // } else {
                                            //     $query = $this->db->query("SELECT * FROM kat WHERE created_date >= '$tgl_awal' AND created_date <= '$tgl_akhir' AND kode_jadwal = '$kode_jadwal'")->result();
                                            // }
                                            $query = $this->db->query("SELECT * FROM produksi WHERE tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'")->result();
                                            foreach ($query as $key => $data) {
                                            ?>

                                                <tr>
                                                    <td><?php echo $data->id_produksi ?></td>
                                                    <td><?php echo $data->tgl ?></td>
                                                    <td><?php echo $data->jenis_produk ?></td>
                                                    <td><?php echo $data->jumlah ?></td>
                                                    <td><?php echo $data->nama ?></td>
                                                    <td><?php echo $data->nama2 ?></td>
                                                    <td><?php echo $data->nama3 ?></td>
                                                    <td><?php echo $data->nama4 ?></td>
                                                    <td><?php echo $data->nama5 ?></td>
                                                    <td><?php echo $data->nama6 ?></td>
                                                    <td><?php echo $data->nama7 ?></td>
                                                    <td><?php echo $data->nama8 ?></td>
                                                    <td><?php echo $data->nama9 ?></td>
                                                    <td><?php echo $data->nama10 ?></td>
                                                    <!-- <td><?php echo $data->nama ?></td>
                                                                <td>Rp. <?php echo number_format($data->harga) ?></td>
                                                                <td><?php echo round($data->stock, 2) ?></td> -->
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- <a class="btn btn-success" href="<?php echo base_url(); ?>laporan/cetak_jadwal?tgl_awal=<?php echo $_POST['tgl_awal'] ?>&tgl_akhir=<?php echo $_POST['tgl_akhir'] ?>" target="_blank">Print Preview</a> -->
                            <a class="btn btn-success" href="<?php echo base_url(); ?>laporan/excel?tgl_awal=<?php echo $_POST['tgl_awal'] ?>&tgl_akhir=<?php echo $_POST['tgl_akhir'] ?>">Export ke Excel</a>
                        <?php
                            // } //tutup xyz
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('layout/footer');
?>