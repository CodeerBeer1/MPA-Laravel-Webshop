<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Order;
use App\OrderDetails;
use App\Customer;

class HomeController extends Controller
{
    private $categories;
    private $user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->categories = Category::all();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        return view('home', ['categories' => $this->categories]);
    }

    public function showOrders()
    {
        $user = Auth::user();

        $orders = Order::where('username', $user->name)->get();

        return view('view-orders', ['categories' => $this->categories, 'orders' => $orders]);
    }

    public function deleteOrder()
    {
        $id = request('id');

        $orderDetails = OrderDetails::where('Order_ID', $id);
        $order = Order::where('ID', $id);

        $orderklant = Order::find($id);
        $klant = Customer::where('ID', $orderklant->Klant_ID);

        $orderDetails->delete();
        $order->delete();
        $klant->delete();
        
        $user = Auth::user();
        $orders = Order::where('username', $user->name)->get();

        return redirect()->route('view-orders', ['categories' => $this->categories, 'orders' => $orders]);
    }
}
