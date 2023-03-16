<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Order;
use App\Models\Sale;
use App\Models\OrderLine;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data = Customers::get();
        return view('views.ViewCustomers', compact('Data'));
    }

    public function index1($id)
    {
        $Data = Customers::get();
        return view('views.UpdateCustomers', compact('Data'));
    }

    public function index2()
    {
        $Data = Customers::where('status', 1)->get();
        return view('views.Sale', compact('Data'));
    }

    public function index5($id)
    {
        $customer_data = Customers::where('id', $id)->get();
        $data = Sale::where('customer_id', $id)->with('Order.OrderLines.Items')->get();
        // dd($customer_data);
        // dd($data);
        return view('views.ViewCustomerHistory', compact('data', 'customer_data'));

        // foreach ($orders as $order) {
        //     $orderLines = $order->orderLines;
        //     foreach ($orderLines as $orderLine) {
        //         $item = $orderLine->item;
        //         dd($item);
        //     }
        // }
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
            'customer_name'        => ['required', 'max:55'],
            'customer_description' => ['required', 'max:255'],
            'customer_address'     => ['required', 'max:255'],
            'phone_number'         => ['nullable', 'max:20', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'unique:customers'],
            'cnic'                 => ['required', 'max:20', 'regex:/^[0-9]{5}-[0-9]{7}-[0-9]{1}$/', 'unique:customers'],
            'customer_image'       => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5500'],
        ];

        // Validate the request data against the rules
        $validatedData = $request->validate($rules);

        // If the request has an uploaded image, store it in the public disk
        $cnicImage = null;
        if ($request->hasFile('customer_image')) {
            $cnicImage = $request->file('customer_image')->store('cnic', ['disk' => 'public']);
        }

        // Create a new customer instance with the validated data and the image filename
        $customer = new Customers();
        $customer->name = $validatedData['customer_name'];
        $customer->description = $validatedData['customer_description'];
        $customer->address = $validatedData['customer_address'];
        $customer->phone_number = $validatedData['phone_number'];
        $customer->cnic = $validatedData['cnic'];
        $customer->cnic_image = $cnicImage;
        $customer->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Customer data has been saved.');
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
        // dd($request->all());
        // dd($id);

        if ($request) {
            $validator = Validator::make($request->all(), [

                'customer_name' => 'required|max:55',
                'cnic' => 'required|max:20|regex:/^[0-9]{5}-[0-9]{7}-[0-9]{1}$/|unique:Customers',
                'cnic' =>  Rule::unique('Customers')->ignore($id),
                'customer_description' => 'max:255',
                'customer_address' => 'required|max:255',
                'cnic_image' => 'image|mimes:jpeg,png,jpg,gif|max:5500',
                'phone_number' => 'max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
                'phone_number' => Rule::unique('Customers')->ignore($id),

            ]);
            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator)->with(['msgf' => 'Data Not Updated']);
            }
        }




        // if (!$request->phoneNo == '') {
        //     $validator = Validator::make($request->all(), [
        //         'phoneNo' => 'max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
        //     ]);
        //     if ($validator->fails()) {
        //         return redirect()->back()->withErrors($validator)->with(['msgf' => 'Data Not Updated']);
        //     }
        // }

        if (!$validator->fails()) {
            $update = Customers::where('id', $id)
                ->update([
                    'name' => $request->input('customer_name'),
                    'cnic' => $request->input('cnic'),
                    'phone_number' => $request->input('phone_number'),
                    'address' => $request->input('customer_address'),
                    'description' => $request->input('customer_description'),

                ]);
            // dd($request->all());
            if (!$request['cnic_image'] == "") {
                // dd($request['cnic_image']);
                $update = Customers::where('id', $id)
                    ->update([
                        'cnic_image' => $request->file('cnic_image')->store('cnic', ['disk' => 'public'])
                    ]);
            }
            return redirect('/view_Customers')->with(['msg' => 'Record Updated']);
        }
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

    public function UpdateStatus(Request $request)
    {
        $updateUser = Customers::where('id', $request->id)->update([
            'status' => $request->status
        ]);
        if ($updateUser) {
            return response()->json(['success' => 'Customer Status Updated Successfully']);
        } else {
            return response()->json(['error' => 'Oops! something went wrong']);
        }
    }
}
