<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\RacunModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class CartController extends Controller
{
    public function index(): View
    {
        // Retrieve the items in the cart from the session or initialize an empty array
        $cart = session()->get('cart', []);

        // Calculate the total balance
        $totalBalance = 0;
        foreach ($cart as $itemId => $quantity) {
            $racun_model = RacunModel::find($itemId);
            $subtotal = $racun_model->harga_racun * $quantity;
            $totalBalance += $subtotal;
        }

        // Fetch the racun_models from the database
        $racun_models = RacunModel::all();

        return view('admin.cart', compact('racun_models', 'cart', 'totalBalance'));
    }

    public function add(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Retrieve the items in the cart from the session or initialize an empty array
        $cart = session()->get('cart', []);

        // Check if the item is already in the cart
        if (isset($cart[$id])) {
            $cart[$id] += $request->quantity;
        } else {
            $cart[$id] = $request->quantity;
        }

        // Save the updated cart to the session
        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Item added to the cart.');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Retrieve the items in the cart from the session or initialize an empty array
        $cart = session()->get('cart', []);

        // Update the quantity of the item in the cart
        $cart[$id] = $request->quantity;

        // Save the updated cart to the session
        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Item quantity updated.');
    }

    public function remove(Request $request, $id): RedirectResponse
    {
        // Retrieve the items in the cart from the session or initialize an empty array
        $cart = session()->get('cart', []);

        // Remove the item from the cart
        unset($cart[$id]);

        // Save the updated cart to the session
        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Item removed from the cart.');
    }
}
