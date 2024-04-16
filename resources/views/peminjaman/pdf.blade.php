<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Pinjaman</title>
</head>
<body>
<p style="text-align: center;">Pengajuan Pinjaman</p>
<p style="text-align: center;">BUMDes Desa Maju Mundur</p>
<p><br></p>
<p>Melalui form peminjaman ini,</p>
<p>Nama: {{ $nasabah->nama_lengkap }} &nbsp;</p>
<p>NIK: {{ $nasabah->nik }}&nbsp;</p>
<p>Pekerjaan: {{ $nasabah->pekerjaan }}</p>
<p><br></p>
<p>mengajukan pinjaman produktif dengan detail sebagai berikut.</p>
<p>Nama Usaha: {{ $peminjaman->nama_usaha }}</p>
<p>Bidang Usaha: {{ $peminjaman->bidang_usaha }}</p>
<p>Deskripsi Usaha: {{ $peminjaman->deskripsi_usaha }}</p>
<p>Nominal Pinjaman: {{ $peminjaman->jumlah_pinjaman }}</p>
<p>Tenor:{{ $peminjaman->tenor }}</p>
<p>Bunga:{{ $peminjaman->bunga }}</p>
<p>Total Pinjaman:{{ $peminjaman->total_pinjaman }}</p>
<p>Angsuran Bulanan:{{ $peminjaman->angsuran }}</p>
<p><br></p>
<p>Demikian surat ini diajukan.&nbsp;</p>

<p><br></p>
<p>Desa Maju Mundur,</p>
<p><br></p>
<p><br></p>
<p>{{ $nasabah->nama_lengkap }}</p>
</body>
</html>