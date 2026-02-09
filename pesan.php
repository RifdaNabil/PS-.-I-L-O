<?php
$id = $_GET['tipe'] ?? 0;

$PlayStations = [
    ["PlayStation 3", 10000, "img/ps3.jpg"],
    ["PlayStation 4", 15000, "img/ps4.jpg"],
    ["PlayStation 5", 20000, "img/ps5.jpg"]
];
//inisialisasi variabel
$PsPilih = $_POST['ps'] ?? $id;
//pengaman index array
if (!isset($PlayStations[$PsPilih])) {
    $PsPilih = 0;
}

$pilihHarga = $PlayStations[$PsPilih][1];
$durasi = $_POST['durasi'] ?? '';
$snack = isset($_POST['snack']);
$totalBayar = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['hitung'])) {
        $totalHarga = $pilihHarga * $durasi;
        $diskon = ($durasi >= 5) ? 0.1 * $totalHarga : 0;
        $biayaSnack = $snack ? 20000 : 0;
        $totalBayar = $totalHarga - $diskon + $biayaSnack;
    } elseif (isset($_POST['simpan'])) {
        echo 
        "<script>
            alert('PEMESANAN BERHASIL !');
            window.location.href='index.php';
        </script>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Form Pemesanan Rental Ps . I L O</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
        <h5>Form Pemesanan</h5>
        </div>
        <div class="card-body">
        <form method="POST">

            <label>Nama Lengkap</label><br>
            <input type="text" name="nama" class="form-control mb-3" placeholder="Masukkan Nama Pemesan"
            value="<?= $_POST['nama'] ?? '' ?>">

            <label>Jenis Kelamin</label><br>
            <input type="radio" name="gender" value="Laki-laki" <?= ($_POST['gender'] ?? '') === 'Laki-laki' ? 'checked' : '' ?>> Laki-laki
            <input type="radio" name="gender" value="Perempuan" <?= ($_POST['gender'] ?? '') === 'Perempuan' ? 'checked' : '' ?>> Perempuan <br><br>

            <label>Nomor Identitas</label><br>
            <input type="text" name="identitas" class="form-control mb-3 mt-2" 
            placeholder="Masukkan Nomor Identitas (16 digit)" value="<?= $_POST['identitas'] ?? '' ?>">

            <label class="form-label">Jenis PlayStation</label><br>
            <select name="ps" class="form-select mb-3" onchange="this.form.submit()">
            <?php foreach ($PlayStations as $index=>$tampil) { ?>
                <option value="<?= $index ?>" <?= $index==$PsPilih?'selected':'' ?>>
                <?= $tampil[0] ?>
                </option>
            <?php } ?>
            </select>

            <label class="form-label">Harga / Jam</label>
            <input type="text" class="form-control mb-3" value="Rp.<?= number_format($pilihHarga,0,',','.') ?>" readonly>

            <label>Tanggal Sewa</label><br>
            <input type="date" name="tanggal" class="form-control mb-3" value="<?= $_POST['tanggal'] ?? '' ?>">

            <label>Durasi Sewa</label><br>
            <input type="number" name="durasi" class="form-control mb-3" placeholder="Per-Jam"
            value="<?= $durasi ?>" required>

            <input class="form-check-input mb-3" type="checkbox" name="snack" <?= $snack ?'checked':'' ?>>
            Snack +Rp 20.000/jam<br><br>

            <input type="text" class="form-control mb-3" value= "<?= $totalBayar?number_format($totalBayar,0,',','.') : '' ?>" 
            placeholder="Total Bayar" readonly>

            <div class="d-flex gap-2">
            <button type="submit" name="hitung" class="btn btn-secondary">Hitung Total</button>
            <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
            <button type="reset" class="btn btn-danger">Batal</button>
            </div>
        </form>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
