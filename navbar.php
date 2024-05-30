<style>
  .dropdown:hover .dropdown-menu {
            display: block;
            }
  .dropdown-toggle::after {
            display: none;
        }
</style>

<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary navbar-dark bg-dark shadow-sm py-4">
    <div class="container">
        <a class="navbar-brand" href="index.php">KeyKorner</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="produk.php?kategori=Mechanical">Mechanical</a></li>
                        <li><a class="dropdown-item" href="produk.php?kategori=Numeric">Numeric</a></li>
                        <li><a class="dropdown-item" href="produk.php?kategori=Ergonomic">Ergonomic</a></li>
                        <li><a class="dropdown-item" href="produk.php?kategori=Magnetic">Magnetic</a></li>
                        <li><a class="dropdown-item" href="produk.php?kategori=Switch">Switch</a></li>
                        <li><a class="dropdown-item" href="produk.php?kategori=Keycaps">Keycaps</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="event.php">Event & Promo</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Layanan</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="lokasi-toko.php">Lokasi Toko</a></li>
                        <li><a class="dropdown-item" href="lokasi-service-center.php">Lokasi Service Center</a></li>
                    </ul>
                </li>
            </ul>


            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <form method ="get" action = "produk.php" class="d-flex">
                      <input class="form-control me-2" type="text" placeholder="Cari Produk" aria-label="Search" name="keyword">
                      <button class="btn btn-outline-light" type="submit">Search</button>
                  </form>
                <li class="nav-item">
                    <a href="keranjang.php" class="nav-link">
                        <i class="fa-solid fa-cart-shopping" style="color: whitesmoke;"></i>
                    </a>
                </li>
                <li class="nav-item me-2">
                    <a href="adminpanel/login.php" class="nav-link">
                        <i class="fa-solid fa-user" style="color: whitesmoke;"></i>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
