<?php

require_once  '../vendor/autoload.php';

// Start building the HTML string for rendering the report
$render = '
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <table class="table table-bordered" id="pengaduanTable">
        <thead>
            <tr>
                <th class="text-center">Nama Barang</th>
                <th class="text-center">Tanggal Terjual</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Jumlah</th>
        </thead>
        <tbody>';

foreach($data['sale'] as $row) {
  
    $render .= '<tr>
        <td>' . htmlspecialchars($row['nama']) . '</td>
        <td>' . htmlspecialchars($row['date']) . '</td>
        <td>' . htmlspecialchars($row['harga']) . '</td>
        <td>' . htmlspecialchars($row['jumlah']) . '</td>
        ';

    $render .= '</td></tr>';
}

$render .= '
        </tbody>
    </table>';

// Initialize MPDF and write the HTML to PDF
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>Laporan Pengaduan</h1>'); // Add a title
$mpdf->WriteHTML($render); // Pass the generated HTML with borders to mpdf
$mpdf->Output('pengaduan-report.pdf', \Mpdf\Output\Destination::INLINE); // Output the PDF directly
