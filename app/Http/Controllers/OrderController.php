<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Sale;
use App\Models\DonationAccount;
use App\Models\Items;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Data = Sale::get();
        return view('views.print', compact('Data'));
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

    public function store(Request $request, $id)
    {
        $complete_order = $request->input('complete_order');
        // Parse the JSON data into a PHP array
        $order_data = json_decode($complete_order, true);

        $validator = Validator::make($request->all(), [
            'complete_order'    => 'required',
            'subtotal_price'       => 'required',
            'total'              => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with(['msgf' => 'Data Not Submitted']);
        }

        DB::beginTransaction();

        try {
            $order = Order::create([
                
                'customer_id' => $id,
            ]);

            foreach ($order_data as $item) {
                $order_line = OrderLine::create([
                    'order_id' => $order->id,
                    'item_id'  => $item['id'],
                    'quantity' => $item['quantity'],
                    'price'    => $item['price'],
                ]);
                $item = Items::find($order_line->item_id); // Find the item related to the order line
                $newQuantity = floatval(str_replace(',', '', $item->quantity)) - floatval($order_line->quantity);
                $item->quantity = $newQuantity;
                $item->save();
            }

            $sale = Sale::create([

                'total_price' => round($request->total, 2),
                'subtotal_price' => round($request->subtotal_price, 2),
                'discount' => round($request->order_discount, 2),

                // 'total_price' => $request->total,
                // 'subtotal_price' => $request->subtotal_price,
                // 'discount' => $request->order_discount,
                'user_id' => '1',
                'order_id' => $order->id,
                'customer_id' => $id,
                'description' => $request->input('item_Description'),
            ]);
            // Get the donation account record
            $account = DonationAccount::find(1);

            // If the record does not exist, create it
            if (!$account) {
                $account = new DonationAccount();
                $account->total_donation = 0;
                $account->remaining_donation = 0;
            }
            // Add the donation amount to the total
            $numeric_amount = (float) str_replace(array("Rs-", ","), "", $request->subtotal_price);
            $account->remaining_donation -= $numeric_amount;
            $account->save();

            DB::commit();

            return redirect('/sale')->with(['msg' => 'print_order/' . $sale['id']]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect()->back()->with(['msgf' => 'Data Not Submitted']);
        }
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
