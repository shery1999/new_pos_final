<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\DonationAccount;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data = Donation::get();
        return view('views.ViewDonations', compact('Data'));
    }
    public function index2()
    {
        $data = Donation::get();
        $account_data = DonationAccount::get();
        $customer_count = Customers::count();
        // dd($customer_count);
        return view('dashboard', compact('data', 'account_data', 'customer_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Define validation rules for customer data
        $rules = [
            'name'        => ['required', 'max:55'],
            'amount'      => ['required', 'max:255'],
            'phone_number' => ['nullable', 'max:20', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'address'     => ['nullable', 'max:255'],
            'cnic'        => ['nullable', 'max:20', 'regex:/^[0-9]{5}-[0-9]{7}-[0-9]{1}$/'],
            'description' => ['nullable', 'max:255'],
        ];

        // Validate the request data against the rules
        $validatedData = $request->validate($rules);

        DB::transaction(function () use ($validatedData) {
            // Create a new donation record
            $donation = new Donation();
            $donation->name        = $validatedData['name'];
            $donation->amount      = $validatedData['amount'];
            $donation->phone       = $validatedData['phone_number'];
            $donation->address     = $validatedData['address'];
            $donation->cnic        = $validatedData['cnic'];
            $donation->description = $validatedData['description'];
            $donation->save();

            // Get the donation account record
            $account = DonationAccount::find(1);

            // If the record does not exist, create it
            if (!$account) {
                $account = new DonationAccount();
                $account->total_donation = 0;
                $account->remaining_donation = 0;
            }

            // Add the donation amount to the total
            $numeric_amount = (float) str_replace(array("Rs-", ","), "", $validatedData['amount']);
            $account->total_donation += $numeric_amount;
            $account->remaining_donation += $numeric_amount;
            $account->save();
        });

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Donation has been saved.');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
