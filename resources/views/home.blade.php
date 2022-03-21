<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Database indrama1_webdev</title>
</head>
<body>
<a href="/">
    <h3>Kembali ke Welcome</h3>
</a>
<hr/>
<h1>Tabel pada Database indrama1_webdev</h1>
<h4>Silahkan pilih tabel yang ingin Anda lihat isinya:</h4>
<form action="/lihat_data" method="GET" target="_blank">
    <input type="radio" name="nmtable" value="customer">CUSTOMER <br>
    <input type="radio" name="nmtable" value="item">ITEM <br>
    <input type="radio" name="nmtable" value="trans_header">TRANS_HEADER <br>
    <input type="radio" name="nmtable" value="trans_detail">TRANS_DETAIL <br>
    <input type="submit" value="Submit">
</form>
</body>
</html>
