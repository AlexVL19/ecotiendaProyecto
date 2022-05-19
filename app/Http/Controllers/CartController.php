<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function showProducts () {

        $prodobj = Products::all();
        return view ('cart.index', compact('prodobj'));
    }

    public function addProducts (Request $request) {

        $order = new Orders();

        $total = ($request->input('cost'))*($request->input('quantity'));

        $order->userid = $request->input('userid');
        $order->product_name = $request->input('product_name');
        $order->cost = $request->input('cost');
        $order->quantity = $request->input('quantity');
        $order->final_cost = $total;

        $order->save();

        return redirect( route('cart.index'));
    }

    public function checkoutList () {
        $authid = auth()->user()->id;

        $order = Orders::where('userid', '=', $authid)->get();

        return view ('cart.checkout')->with('order', $order);
    }

    public function destroy ($id) {
        $order = Orders::find($id);
        $order->delete();
        return redirect(route('cart.checkout'));
    }

    public function clearList () {
        $authid = auth()->user()->id;

        $order = Orders::where('userid', '=', $authid)->delete();


        return redirect(route('cart.checkout'));
    }

    public function confirmPurchase () {
        $authid = auth()->user()->id;

        $order = Orders::where('userid', '=', $authid)->delete();


        return redirect(route('cart.index'));
    }
}
