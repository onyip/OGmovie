<!DOCTYPE html>
<html>
<head>
  <title>Cetak Kwitansi</title>
  <style type="text/css">
    @media print {
      @page { margin: 0; }
      body { margin: 1.6cm; }
    }
    body { 
      font-size: 14px; 
      font-family: Calibri;
    }
  </style>
</head>
<body onload="window.print()">
  <div style="margin-top: 68px; margin-left: 85px"><?=$main->nasabah?></div>
  <div style="margin-top: 2px; margin-left: 85px"><?=$main->id?></div>
  <div style="margin-top: 2px; margin-left: 85px"><?=$main->alamat?></div>
  <div style="margin-top: 2px; margin-left: 85px"><?=$main->ktp?></div>
  <div style="margin-top: 2px; margin-left: 85px"><?=toDate($main->tgl_daftar)?></div>
</body>
</html>