<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Restaurant IAE' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #ffffff;
            background-image: url('https://www.transparenttextures.com/patterns/asfalt-dark.png');
            background-repeat: repeat;
            font-family: 'Segoe UI', sans-serif;
        }


        .navbar-custom {
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: #b71c1c !important;
        }

        .nav-link {
            color: #444 !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #b71c1c !important;
        }

        .btn-merah {
            background-color: #b71c1c;
            color: white;
        }

        .btn-merah:hover {
            background-color: #9a1313;
            color: white;
        }

        .bg-overlay {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom mb-4 sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <i class="bi bi-shop me-2"></i> Restaurant EAI
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item"><a class="nav-link" href="/form"><i class="bi bi-box-seam me-1"></i>Form
                                Pemesanan</a></li>
                        <li class="nav-item"><a class="nav-link" href="/orders"><i class="bi bi-card-list me-1"></i>Daftar
                                Pesanan</a></li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-link nav-link" type="submit"><i
                                        class="bi bi-box-arrow-right me-1"></i>Logout</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mb-3">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif
    </div>

    <div class="container bg-overlay mb-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold">🛍️ Pilih Produk Favoritmu</h2>
            <p class="text-muted">Klik <strong>Pesan Sekarang</strong> untuk membeli produk</p>
        </div>

        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-6 col-lg-4 mb-4 d-flex">
                    <div class="card h-100 shadow-sm w-100">
                        <img src="{{ asset($product['image']) }}"
                            onerror="this.onerror=null;this.src='https://via.placeholder.com/600x400?text=Gambar+Tidak+Tersedia';"
                            class="card-img-top" alt="{{ $product['name'] }}">

                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $product['name'] }}</h5>
                                <p class="card-text">Harga:
                                    <strong>Rp{{ number_format($product['price'], 0, ',', '.') }}</strong>
                                </p>
                            </div>

                            <form action="{{ url('/orders') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <button type="submit" class="btn btn-merah w-100">
                                    <i class="bi bi-cart-plus me-1"></i> Pesan Sekarang
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if (count($products) === 0)
            <div class="alert alert-warning text-center">
                <i class="bi bi-exclamation-triangle me-1"></i> Tidak ada produk yang tersedia saat ini.
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
