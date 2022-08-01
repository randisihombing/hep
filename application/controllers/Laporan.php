<?php
require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model(['m_kategori', 'stock_m']);
        $this->load->model(['produksi_m']);
    }
    public function jadwal()
    {
        $data['produksi'] = $this->produksi_m->get();
        $this->load->view('laporan/jadwal', $data);
    }
    public function excel()
    {
        $tgl_awall = $_GET['tgl_awal'];
        $tgl_akhirr = $_GET['tgl_akhir'];
        $tgl_awal = date("Y-m-d", strtotime($tgl_awall));
        $tgl_akhir = date("Y-m-d", strtotime($tgl_akhirr));
        $query = $this->db->query("SELECT * FROM produksi WHERE tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'")->result();
        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Kode Produksi')
            ->setCellValue('C1', 'Tanggal Produksi')
            ->setCellValue('D1', 'Jenis Produk')
            ->setCellValue('E1', 'Jumlah')
            ->setCellValue('F1', 'Bahan Baku 1')
            ->setCellValue('G1', 'Bahan Baku 2')
            ->setCellValue('H1', 'Bahan Baku 3')
            ->setCellValue('I1', 'Bahan Baku 4')
            ->setCellValue('J1', 'Bahan Baku 5')
            ->setCellValue('K1', 'Bahan Baku 6')
            ->setCellValue('L1', 'Bahan Baku 7')
            ->setCellValue('M1', 'Bahan Baku 8')
            ->setCellValue('N1', 'Bahan Baku 9')
            ->setCellValue('O1', 'Bahan Baku 10');

        $kolom = 2;
        $nomor = 1;
        foreach ($query as $lp) {


            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $lp->id_produksi)
                ->setCellValue('C' . $kolom, $lp->tgl)
                ->setCellValue('D' . $kolom, $lp->jenis_produk)
                ->setCellValue('E' . $kolom, $lp->jumlah)
                ->setCellValue('F' . $kolom, $lp->nama)
                ->setCellValue('G' . $kolom, $lp->nama2)
                ->setCellValue('H' . $kolom, $lp->nama3)
                ->setCellValue('I' . $kolom, $lp->nama4)
                ->setCellValue('J' . $kolom, $lp->nama5)
                ->setCellValue('K' . $kolom, $lp->nama6)
                ->setCellValue('L' . $kolom, $lp->nama7)
                ->setCellValue('M' . $kolom, $lp->nama8)
                ->setCellValue('N' . $kolom, $lp->nama9)
                ->setCellValue('O' . $kolom, $lp->nama10);

            $kolom++;
            $nomor++;
        }
        $writer = new Xlsx($spreadsheet);
        foreach (range('A', $spreadsheet->getActiveSheet()->getHighestDataColumn()) as $col) {
            $spreadsheet->getActiveSheet()
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan_jadwal' . date('Y-m-d') . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
