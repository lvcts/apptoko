<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\RacunModel;
use Illuminate\Support\Facades\Auth;


class RacunController extends Controller
{
    public function index()
    {
        // mengambil data dari table racun models
        $racun = DB::table('racun_models')->paginate(10);

        // get the authenticated user's cart items
        $cartItems = [];
        if (Auth::check()) {
            $cartItems = Cart::where('id_user', Auth::id())->get();
        }

        return view('admin.scan', compact('racun', 'cartItems'));
    }

    public function cari(Request $request)
    {       // menangkap data pencarian
        $cari = $request->cari; //request dari form

        // mengambil data dari table racun sesuai pencarian data
        $racun = DB::table('racun_models')
            ->where('nama_racun', 'like', "%" . $cari . "%")
            ->orWhere('kode_racun', 'like', "%" . $cari . "%")
            ->paginate(10);


        // mengirim data pegawai ke view index
        return view('admin.scan', compact('racun'));
    }
    public function cart()
    {
        // get the authenticated user's cart items
        $cartItems = [];
        if (Auth::check()) {
            $cartItems = Cart::where('user_id', Auth::id())->get();
        }

        // calculate the total balance
        $totalBalance = 0;
        foreach ($cartItems as $item) {
            $racun = RacunModel::findOrFail($item->racun_id);
            $totalBalance += $racun->harga_racun * $item->quantity;
        }

        return view('admin.cart', compact('cartItems', 'totalBalance'));
    }

    public function addToCart($id)
    {
        $racun = RacunModel::findOrFail($id);

        if (Auth::check()) {
            // check if the racun is already in the cart
            $cartItem = Cart::where('user_id', Auth::id())->where('racun_id', $id)->first();
            if ($cartItem) {
                // if the racun is already in the cart, increase the quantity
                $cartItem->quantity++;
                $cartItem->save();
            } else {
                // if the racun is not in the cart, add it
                $cart = new Cart;
                $cart->user_id = Auth::id();
                $cart->racun_id = $id;
                $cart->quantity = 1;
                $cart->save();
            }

            // calculate the total balance
            $totalBalance = 0;
            $cartItems = Cart::where('user_id', Auth::id())->get();
            foreach ($cartItems as $item) {
                $racun = RacunModel::findOrFail($item->racun_id);
                $totalBalance += $racun->harga_racun * $item->quantity;
            }

            return redirect()->route('cart')->with('success', 'Racun has been added to your cart!');
        } else {
            return redirect()->route('login')->with('error', 'Please log in first to add racun to your cart!');
        }
    }

    public function removeFromCart($id)
    {
        $cartItem = Cart::findOrFail($id);

        if (Auth::check() && $cartItem->user_id == Auth::id()) {
            $cartItem->delete();

            // calculate the total balance
            $totalBalance = 0;
            $cartItems = Cart::where('user_id', Auth::id())->get();
            foreach ($cartItems as $item) {
                $racun = RacunModel::findOrFail($item->racun_id);
                $totalBalance += $racun->harga_racun * $item->quantity;
            }

            return redirect()->route('cart')->with('success', 'Racun has been removed from your cart!');
        } else {
            return redirect()->route('cart')->with('error', 'You are not authorized to remove this racun from the cart!');
        }
    }
}
