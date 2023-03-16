<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonationAccount;
use App\Models\Donation;
use App\Models\Customers;


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

    public function index2()
    {
        $data = Donation::get();
        $account_data = DonationAccount::get();
        $customer_count = Customers::count();
        dd($customer_count);
        return view('dashboard', compact('data', 'account_data', 'customer_count'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
