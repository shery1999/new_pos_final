<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;



class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data = Items::get();
        return view('views.ViewItems', compact('Data'));
    }
    public function index1($id)
    {
        $Data = Items::where('id', $id)->get();
        return view('views.UpdateItems', compact('Data'));
    }
    public function index2()
    {
        $Data = Items::where('status', 1)->get();
        return view('views.Home', compact('Data'));
    }
    public function index3()
    {
        $Data = Items::where('status', 1)->get();
        return view('views.Home', compact('Data'));
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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:55', Rule::unique('Items')],

            // 'name'              => 'required|max:55',
            // 'name'              => Rule::unique('Items'),
            'item_Price'        => 'required|max:50',
            'item_Weight'       => 'max:55',
            'item_Quantity'     => 'max:55',
            'item_Description'  => 'max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with(['msgf' => 'Data Not Submitted']);
        } else {
            $save = Items::create([
                'name'        => $request->input('name'),
                'price'       => $request->input('item_Price'),
                'weight'      => $request->input('item_Weight'),
                'quantity'    => $request->input('item_Quantity'),
                'description' => $request->input('item_Description'),

            ]);
            return redirect()->back()->with(['msg' => 'Data Submitted']);
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
        if ($request) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:55',
                'name' =>   Rule::unique('Items')->ignore($id),
                'item_Price' => 'required|max:55',
                'item_Weight' =>  'max:55',
                'item_Quantity' => 'max:55',
                'item_Description' => 'max:250',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->with(['msgf' => 'Data Not Updated']);
            }
        }
        if (!$validator->fails()) {
            $update = items::where('id', $id)
                ->update([
                    'name'        => $request->input('name'),
                    'price'       => $request->input('item_Price'),
                    'weight'      => $request->input('item_Weight'),
                    'quantity'    => $request->input('item_Quantity'),
                    'description' => $request->input('item_Description'),
                ]);
            return redirect('/view_items')->with(['msg' => 'Record Updated']);
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
        $updateUser = Items::where('id', $request->id)->update([
            'status' => $request->status
        ]);
        if ($updateUser) {
            return response()->json(['success' => 'Customer Status Updated Successfully']);
        } else {
            return response()->json(['error' => 'Oops! something went wrong']);
        }
    }
}
