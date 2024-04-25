<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Produk;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function index()
    {
        $or = new Order();
        $orders = $or->allOrd();
        return view('order.index', compact('orders'));
    }

    public function tambah()
    {
        // Tampilkan form tambah data
        return view('order.tambah');
    }

    public function store(Request $request)
    {
        // Proses simpan data ke database
        $validatedData = $request->validate([
            'order_kode' => 'required|unique:tb_order',
            'order_kurir' => 'required',
            'order_ongkir' => 'required|numeric',
            'order_tgl' => 'required|date',
            'order_batal' => 'required|numeric',
        ]);

        $order = new Order;
        $order->order_kode = $validatedData['order_kode'];
        $order->order_kurir = $validatedData['order_kurir'];
        $order->order_ongkir = $validatedData['order_ongkir'];
        $order->order_tgl = $validatedData['order_tgl'];
        $order->order_batal = $validatedData['order_batal'];
        $order->save();

        return redirect()->route('order.index')->with('success', 'Data berhasil ditambahkan');
    }

        public function edit($id)
        {
            $order = Order::find(base64_decode($id));
            $orderDetails = OrderDetail::where('order_kode', base64_decode($id))->get();
            $produks = Produk::all();
    
            $readonly = "";
            if (request()->has('status')) {
                $readonly = "readonly";
            }
    
            return view('order.edit', compact('order', 'orderDetails', 'produks', 'readonly'));
        }
    
        public function update(Request $request, $id)
        {
            // Validasi data
            $validatedData = $request->validate([
                'order_kurir' => 'required|string|max:255',
                'order_ongkir' => 'required|numeric',
                'produk_kode' => 'required',
                'detail_harga' => 'required|numeric',
                'detail_jml' => 'required|numeric',
            ]);
    
            $order = Order::find(base64_decode($id));
            $order->update([
                'order_kurir' => $validatedData['order_kurir'],
                'order_ongkir' => $validatedData['order_ongkir'],
            ]);
    
            OrderDetail::create([
                'order_kode' => base64_decode($id),
                'produk_kode' => $validatedData['produk_kode'],
                'detail_harga' => $validatedData['detail_harga'],
                'detail_jml' => $validatedData['detail_jml'],
            ]);
    
            return redirect()->route('order.edit', ['id' => $id])->with('success', 'Data berhasil ditambahkan');
        }
    }
    