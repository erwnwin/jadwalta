<?php
$fileName = "Penjadwalan_Mata_Pelajaran_SD_Bontoa_Makassar";
if ($guru != null) {
    $fileName = "(" . $guru['id_guru'] . ")Penjadwalan_" . str_replace(' ', '_', $guru['nama_guru']);
}

// Use application/vnd.openxmlformats-officedocument.spreadsheetml.sheet for .xlsx
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$fileName.xls");

// Continue with the rest of your HTML and PHP code
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-size: 12px;
        }

        .jadwal,
        .jadwal td,
        .jadwal th {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .jadwal {
            width: 100%;
        }

        .frame {
            border-collapse: collapse;
            padding: 10px;
        }

        .frame td {
            vertical-align: top;
        }

        @page {
            margin: 0px;
        }

        page[size="A4"] {
            width: 21cm;
            height: 29.7cm;
        }
    </style>
</head>

<body>
    <page size="A4">
        <table class="frame">
            <!-- Your existing table and content structure -->
            <!-- ... -->
        </table>
    </page>
</body>

</html>