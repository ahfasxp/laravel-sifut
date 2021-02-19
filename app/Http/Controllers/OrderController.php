<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Category;
use App\Customer;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->with('category','customer')->where('status', 'schedule')->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $customers = Customer::all();
        return view('orders.create', compact('categories', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'cust.required' => 'Mohon pilih nama pemesan!',
            'date.required' => 'Mohon pilih tanggal!',
            'date.unique' => 'Tanggal dan jam sudah digunakan!',
            'category.required' => 'Mohon pilih kategori!'
        ];

        $request->validate([
            'cust' => 'required|integer',
            'category' => 'required|integer',
            'date' => 'required|date|unique:orders',
            'desc' => 'required|string'
        ], $messages);

        $category = Category::findOrFail($request->get('category'));

        $order = new Order;
        $order->invoice = $this->generateInvoice();
        $order->customer_id = $request->get('cust');
        $order->category_id = $request->get('category');
        $order->date = $request->get('date');
        $order->description = $request->get('desc');
        $order->total = $category->price;
        $order->status = $request->status;

        $order->save();
        return redirect()->route('orders.index')->withSuccess('Jadwal Berhasil ditambahkan!');
    }

    public function generateInvoice()
    {
        //mengambil data dari table orders
        $order = Order::orderBy('created_at', 'DESC');
        //jika sudah terdapat records
        if ($order->count() > 0) {
            //mengambil data pertama yang sdh dishort DESC
            $order = $order->first();
            //explode invoice untuk mendapatkan angkanya
            $explode = explode('-', $order->invoice);
            //angka dari hasil explode di +1
            return "INV-" . ($explode[1] + 1);
        }
        //jika belum terdapat records maka akan me-return INV-1
        return 'INV-1';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'success';
        $order->save();
        return redirect()->route('orders.index')->withSuccess('Jadwal Berhasil diselesaikan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->withSuccess('Jadwal Berhasil dihapus!');
    }

    public function success(Request $request)
    {
        $orders = Order::orderBy('created_at', 'DESC')->with('category','customer')->where('status', 'success');
        $total = $this->countTotal($orders);
        $totalfilter = NULL;

        if($request->start_date && $request->end_date){
            $request->validate([
                'start_date' => 'nullable|date',
                'end_date' => 'nullable|date'
            ]);

            //START & END DATE DI RE-FORMAT MENJADI Y-m-d H:i:s
            $start_date = Carbon::parse($request->start_date)->format('Y-m-d') . ' 00:00:01';
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d') . ' 23:59:59';

            //DITAMBAHKAN WHEREBETWEEN CONDITION UNTUK MENGAMBIL DATA DENGAN RANGE
            $orders = $orders->whereBetween('date', [$start_date, $end_date])->get();
            $totalfilter = $this->countTotal($orders);
        }else{
            $orders = $orders->get();
        }

        return view('orders.success', compact('orders', 'total', 'totalfilter'));
    }

    private function countTotal($orders)
    {
        //DEFAULT TOTAL BERNILAI 0
        $total = 0;
        //JIKA DATA ADA
        if ($orders->count() > 0) {
            //MENGAMBIL VALUE DARI TOTAL -> PLUCK() AKAN MENGUBAHNYA MENJADI ARRAY
            $sub_total = $orders->pluck('total')->all();
            //KEMUDIAN DATA YANG ADA DIDALAM ARRAY DIJUMLAHKAN
            $total = array_sum($sub_total);
        }
        return $total;
    }
}
