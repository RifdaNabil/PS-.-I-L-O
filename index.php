<?php
$PlayStations = [
    ["PlayStation 3", 10000, "ps3.jpg"],
    ["PlayStation 4", 15000, "ps4.jpg"],
    ["PlayStation 5", 20000, "ps5.jpg"]
];
?>

<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PS . I L O</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

     <style>
        .carousel-item img{
            height: 650px;
            object-fit: cover;
        }
        .card-img-top{
            height: 200px;
            object-fit: cover;
        } 
    </style>
</head>
  <body>
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand  h1" href="#">PS . I L O</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
            <a class="nav-link" href="#harga">Daftar Harga</a>
            <a class="nav-link" href="#footer">Tentang Kami</a>
        </div>
    </div>
    </div>
    </nav>
    <!-- Carousel -->
    <section id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="img/ps3.jpg" class="d-block w-100" alt="PlayStation 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>PlayStation 3</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="img/ps4.jpg" class="d-block w-100" alt="PlayStation 4">
            <div class="carousel-caption d-none d-md-block">
                <h5>PlayStation 4</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="img/ps5.jpg" class="d-block w-100" alt="PlayStation 5">
            <div class="carousel-caption d-none d-md-block">
                <h5>PlayStation 5</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </section>  
    <!--DAFTAR HARGA-->
    <section id="produk" class="container my-5">
        <h2 class="text-center mb-4">Daftar Tipe PlayStation </h2>
        <div class="row g-4">
            <?php foreach($PlayStations as $index => $tampil) : ?>
            <div class="col md-4">
                <div class="card h-100 text-center shadow-sm">
                    <img src="img/<?= $tampil[2]; ?>" class="card-img-top" alt="<?= $tampil[0]; ?>">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $tampil[0]; ?></h5>
                        <p class="card-text"><strong>Rp<?=number_format($tampil[1],0,',','.') ?></strong></p>
                        <a href="pesan.php?tipe=<?= $index ?>" class="btn btn-primary">Pilih Tipe</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- DAFTAR HARGA TABEL-->
    <section id="harga" class="container my-5">
    <h3 class="text-center mb-4">Daftar Harga Rental PlayStation</h3>
    <table class="table table-bordered text-center">
        <thead class="table-primary text-white">
        <tr>
            <th>No</th>
            <th>Tipe PlayStation</th>
            <th>Harga / Jam</th>
        </tr>
        </thead>
        <tbody>
        <?php $no = 1; foreach ($PlayStations as $ps) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $ps[0] ?></td>
            <td>Rp <?= number_format($ps[1],0,',','.') ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    </section>
    <!--FOOTER-->
    <section id="footer" class="bg-primary text-white py-4">
        <div class="container text-center">
            <h5>Tentang Kami</h5>
                <p>
                <strong>PS . I L O</strong><br>
                Rental PlayStation Terbaik di Kota Anda, di bangun untuk membantu mengurangi rasa penat akibat kelelahan berlebih<br>
                Jalan Monstadt No 5 Lt 3 <br>
                Telp: 08123456789<br>
                Email: ps.ilo@co.id
                </p>
        </div>
    </section>
    <footer class="text-center py-2 border-top">
        <small>© 2026 PS . I L O</small>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>