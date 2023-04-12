<?php
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
require 'function.php';
$ambilsemuadatastock = mysqli_query($conn,"SELECT * , (select sum(quantity) from qstock where idbarang = stock.idbarang) as jumlah  FROM stock");
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>IMS</title>
</head>
<body>
    <h1>Report Stock Barang</h1>
    <h3>PT.IMS</h3>
    <br>
    <table border="1" cellpadding = "10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Nama Barang</th>
        <th>Deskripsi</th>
        <th>Stock</th>
    </tr>';
    $i = 1;
    foreach($ambilsemuadatastock as $row){
        $html .= '<tr>
        <td>'.$i++.'.</td>
        <td>'.$row["namabarang"].'</td>
        <td>'.$row["deskripsi"].'</td>
        <td>'.$row["jumlah"].'</td>
        <tr>';
    }
    $html.='</table>

</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();
?>