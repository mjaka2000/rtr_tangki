<?php
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// document informasi
$pdf->SetCreator('SIMRENT Genset Web');
$pdf->SetTitle('Laporan Data Sparepart');
$pdf->SetSubject('Operator');

$PDF_HEADER_STRING = "";

$pdf->SetHeaderData('KOP RTR REPORT APK V2.jpg', 180, '', $PDF_HEADER_STRING, array(0, 0, 0), array(0, 0, 0));

$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, 'I', 9));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margin
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER, 5);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);
$pdf->SetDisplayMode('fullpage', 'Fit');

//SET Scaling ImagickPixel
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//FONT Subsetting
$pdf->setFontSubsetting(true);

$pdf->SetFont('helvetica', '', 10, '', true);

$pdf->AddPage('p');

// $tanggal = format_indo(date('Y-m-d'));

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$html =
    '<div>
       <h1 align="center">Laporan Data Sparepart</h1>
       
       <table cellspacing="1" cellpadding="2"  border="1" >
         <tr bgcolor=" #d1d1d1 ">
         <th width="50px" align="center">No.</th>
         <th width="200px" align="center">Nama Supir</th>
         <th align="center"> Nomor Telepon </th>
         <th  align="center">Foto Supir</th>
         <th  align="center"> Foto SIM</th>
         <th  align="center"> Foto KTP</th>
         </tr>';

$no = 1;

foreach ($supir as $d) :
    $html .= '<tr>
    <td align="center">' . $no . '</td>
    <td >' . $d->nama_supir . '</td>
    <td >' . $d->no_telp . '</td>
    <td ><img src="' . base_url('assets/upload/supir/foto_supir/' . $d->foto_supir) .'" width="100" height="100" alt="'. $d->nama_supir .'"> </td>
    <td ><img src="' . base_url('assets/upload/supir/foto_sim/' . $d->foto_sim) .'" width="100" height="100" alt="'. $d->nama_supir .'"> </td>
    <td ><img src="' . base_url('assets/upload/supir/foto_ktp/' . $d->foto_ktp) .'" width="100" height="100" alt="'. $d->nama_supir .'"> </td>';
    $html .= '</tr>';
    $no++;
endforeach;


$html .= '
         </table><br><br><br><br>
         <table>
         <tr>
             <td><br><br><br><br><br></td>
             <td align="right">Banjarmasin, ' . date('Y-m-d') . '</td>
         </tr>
         <tr>
             <td colspan="2" align="right">' .
    $this->session->userdata('nama') . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             </td>
         </tr>
     </table>
       </div>';

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);

$pdf->Output('laporan_operator.pdf', 'I');