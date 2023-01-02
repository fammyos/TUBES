<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

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
        $total_user = User::where('users.status', '=', 'User')->count();
        $total_product = Product::all()->count();

        $data = array(
            'products' => $total_product,
            'users' => $total_user,
        );

        return view('home', $data);
    }
}
