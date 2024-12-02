<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "SELECT * FROM tabel_tiket");
$html = '<center><h3>Data Tiket</h3></center><hr/><br>';
$html .= '<table border="1" width="100%">
            <tr>
                <th>Home Station</th>
                <th>Destination Station</th>
                <th>Elective Class</th>
                <th>Departure Date</th>
                <th>Payment Status</th>
            </tr>';
$no = 1;
while ($transaction = mysqli_fetch_array($query)) {
    $html .= "<tr>
                <td>" . $transaction['Stasiun_Asal'] . "</td>
                <td>" . $transaction['Stasiun_Tujuan'] . "</td>
                <td>" . $transaction['Class'] . "</td>
                <td>" . $transaction['Tanggal_Berangkat'] . "</td>
                <td>Paid</td>
            </tr>";
    $no++;
}
$html .= "</table>";
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'potrait');
$dompdf->render();
$dompdf->stream('laporan-transaksi.pdf');
?>
