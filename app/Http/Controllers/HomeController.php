<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['products'] = ProductModel::all();
        return view('home', $data);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $product_code = $request->input('product_code');
            
        $insert = new ProductModel();
        $insert->product_code = $request->product_code;        
        $insert->product_name = $request->product_name;        
        $insert->quantity = $request->quantity;        
        $insert->description = $request->description;        
        $insert->save();

        return redirect(url('/'))->with('message', "Produk $product_code berhasil ditambahkan!");
    }

    public function edit($id)
    {
        $data['product'] = ProductModel::find($id);
        return view('edit', $data);
    }

    public function update_purchasing(Request $request, $id)
    {        
        $update = ProductModel::find($id);  
        $product_code = $request->product_code;
        $quantity = $update->quantity + $request->quantity;
        $update->quantity = $quantity;
        $update->update();

        return redirect(url('/'))->with('message', "Quantity Produk $product_code berhasil di update !");  
    }    

    public function update_sales(Request $request, $id)
    {        
        $update = ProductModel::find($id);  
        $product_code = $request->product_code;
        $quantity = $update->quantity - $request->quantity;
        if ($quantity < 0) {
            return redirect(url('/'))->with('message', "Quantity Produk $product_code tidak cukup!");
        }else{
            $update->quantity = $quantity;         
            $update->update();
            return redirect(url('/'))->with('message', "Quantity Produk $product_code berhasil di update !");  
        }
    }

    public function update_data(Request $request, $id)
    {
        $update = ProductModel::find($id);  
        $product_code = $request->product_code;
        $update->product_code = $request->product_code;
        $update->product_name = $request->product_name;
        $update->description = $request->description;
        $update->update();

        return redirect(url('/'))->with('message', "Produk $product_code berhasil di update!");
    }

    public function destroy($id)
    {
        $findtodelete = ProductModel::find($id);
        $product_code = $findtodelete->product_code;
        $findtodelete->delete();

        return redirect(url('/'))->with('message', "Produk $product_code berhasil dihapus !"); 
    }
}
