<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    /**
     * Menampilkan form pemesanan dengan mengambil produk dari ProductService
     */
    public function showForm()
    {
        $products = Http::get('http://localhost:8002/api/products')->json();
        return view('form', compact('products'));
    }

    /**
     * Menampilkan daftar semua pesanan yang tersimpan di database
     */
    public function index()
    {
        $orders = Order::latest()->get();
        return view('orders', compact('orders'));
    }

    /**
     * Menyimpan pesanan baru ke database dengan mengambil data user & produk dari API lain
     */
    public function store(Request $request)
    {
        // Ambil data user dari UserService
        $userResponse = Http::get("http://localhost:8001/api/users/{$request->user_id}");
        $user = $userResponse->successful() ? $userResponse->json() : null;

        // Ambil data produk dari ProductService
        $productResponse = Http::get("http://localhost:8002/api/products/{$request->product_id}");
        $product = $productResponse->successful() ? $productResponse->json() : null;

        // Cek jika user atau produk tidak ditemukan
        if (!$user || !$product) {
            return back()->with('status', 'Gagal mengambil data user atau produk.');
        }

        // Simpan ke database
        $order = Order::create([
            'user_id'       => $user['id'],
            'user_name'     => $user['name'],
            'product_id'    => $product['id'],
            'product_name'  => $product['name'],
            'product_image' => $product['image'] ?? null,
            'qty'           => $request->input('qty', 1),
            'status'        => 'created',
        ]);

        // Jika API dipanggil lewat JSON (Postman)
        if ($request->isJson()) {
            return response()->json($order);
        }

        // Jika dari UI form
        return redirect('/orders')->with('status', 'Pesanan berhasil dibuat!');
    }
}
