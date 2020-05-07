<?php
if(! defined ('BASEPATH')) exit ('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }

    public function Header() {
        // Logo
    $image_file = K_PATH_IMAGES.'logo.jpeg';
    //$image_file = "<img src=\"assets/logo.jpeg\" width=\"180\" height=\"70\"/>";
    $this->setJPEGQuality(90);
    $this->Image($image_file, 10, 10, 75, 50, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
      $this->SetY(10);
      $table="<table align=\"right\">
         <tr>
          <td><h1>INVOICE</h1></td>
         </tr>
         <tr>
          <td><strong>Indo-Homecare</strong></td>
         </tr>
         <tr>
            <td>Tax Reg No. : 1</td>
        </tr>
        <tr>
            <td>+62-8119-777-934</td>
        </tr>
        <tr>
            <td>indohomecare@gmail.com</td>
        </tr>
        <tr>
            <td>Jl. Pd. Kopi Raya No.71. Duren Sawit. Jakarta Timur.</td>
        </tr>
        <tr>
            <td>13460</td>
        </tr>
        <tr>
            <td>www.indohomecare.com</td>
        </tr>
        </table>";
      $this->writeHTML($table, true, false, false, false, '');
      $this->writeHTML("<hr>", true, false, false, false, '');
      $this->SetMargins(10, 50   , 10, true);

    }

    public function Footer() {
        // Set font
        $this->SetY(-50);
        $this->SetFont('times', '', 8);
        $table = '<table>';     
        $table .= '<tr align="left">
                        <td> CATATAN : </td>
                    </tr>';
        $table .= '</table>';
        $this->writeHTMLCell(0, 0, 15, '', $table, 0, 1, 0, true, 'L', true);

        $table = '<table>';     
        $table .= '<tr align="left">
                        <td> (i) Seluruh Pembayaran Sudah Termasuk Admin dan Garansi Pergantian Jasa Homecare (All in) </td>
                    </tr>';
        $table .= '</table>';
        $this->writeHTMLCell(0, 0, 15, '', $table, 0, 1, 0, true, 'L', true);
        $table = '<table>';     
        $table .= '<tr align="left">
                        <td> (ii) Proses pembayaran dilakukan diawal saat kandidat telah tiba dilokasi direkening instruksi pembayaran diatas.
                    </td>
                    </tr>';
        $table .= '</table>';
        $this->writeHTMLCell(0, 0, 15, '', $table, 0, 1, 0, true, 'L', true);


        $table = '<table align="center">';
        $table .= '<tr>
          <td> </td>
         </tr>
         <tr>
          <td> </td>
         </tr>
         <tr>
            <td> </td>
        </tr>';
        $table .= '</table>';
        $this->writeHTMLCell(0, 0, 15, '', $table, 0, 1, 0, true, 'L', true);


         $table = '<table align="center">';
        $table .= '
         <tr>
          <td>Senang Dapat Membantu Keluarga Yang Anda Cintai</td>
         </tr>';
        $table .= '</table>';
        $this->writeHTMLCell(0, 0, 15, '', $table, 0, 1, 0, true, 'L', true);

        $this->SetFont('times', 'B', 10);
        $table = '<table align="left">';
        $table .= '
         <tr>
          <td>Persyaratan Layanan</td>
         </tr>';
        $table .= '</table>';
        $this->writeHTMLCell(0, 0, 15, '', $table, 0, 1, 0, true, 'L', true);

        $this->SetFont('times', '', 10);
        $table = '<table align="left">';
        $table .= '
         <tr>
            <td>Jasa tenaga homecare tidak diperkenankan untuk melakukan tugas URT</td>
        </tr>';
        $table .= '</table>';
        $this->writeHTMLCell(0, 0, 15, '', $table, 0, 1, 0, true, 'L', true);
        $this->SetFont('times', 'BI', 8);
        $this->SetMargins(20, 50   , 10, true);
        $this->SetY(-15);
    }
}