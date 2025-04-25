<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Pesanan</title>
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

        img.product-thumb {
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
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

    <!-- Konten -->
    <div class="container bg-overlay mb-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold">📋 Daftar Pesanan</h2>
            <p class="text-muted">Berikut adalah daftar pesanan yang telah dibuat.</p>
        </div>

        @if ($orders->isEmpty())
            <div class="alert alert-warning text-center">
                <i class="bi bi-exclamation-triangle me-1"></i> Belum ada pesanan yang dibuat.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover shadow-sm align-middle">
                    <thead class="table-danger text-center">
                        <tr>
                            <th>ID Pesanan</th>
                            <th>ID User</th>
                            <th>Nama User</th>
                            <th>Produk</th>
                            <th>Gambar</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user_id ?? '-' }}</td>
                                <td>{{ $order->user_name ?? '-' }}</td>
                                <td>{{ $order->product_name ?? '-' }}</td>
                                <td>
                                    <img src="{{ asset($order->product_image ?? '') }}"
                                        onerror="this.onerror=null;this.src='https://via.placeholder.com/60x60?text=No+Image';"
                                        class="product-thumb" alt="Gambar Produk">
                                </td>
                                <td>{{ $order->qty ?? 1 }}</td>
                                <td><span class="badge bg-success">{{ ucfirst($order->status) }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="text-center mt-4">
            <a href="/form" class="btn btn-merah"><i class="bi bi-arrow-left me-1"></i> Kembali ke Form</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
