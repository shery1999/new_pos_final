<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Data = User::get();
        return view('views.ViewUsers', compact('Data'));
    }
    public function index1($id)
    {
        $Data = User::where('id', $id)->get();
        return view('views.UpdateUser', compact('Data'));
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
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            // 'name' => ['required', 'max:55', Rule::unique('users')],
            'email' => 'email|required|unique:users|max:255',
            'user_Password' => 'required|min:8|max:255',
            'confirm_Password' => 'required|same:user_Password',
            'user_Phone' => 'max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
        ]);
        // if (!$request->user_Phone == '') {
        //     $validator = Validator::make($request->all(), [
        //     ]);
        // }
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with(['msgf' => 'Data Not Submitted']);
        } else {
            $save = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request['user_Password']),
                'phoneNo' => $request->input('user_Phone'),

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
        //

        if ($request) {
            $validator = Validator::make($request->all(), [

                'name'             => 'required|max:50',
                'user_Password'    => 'max:30|min:8',
                'confirm_Password' => 'same:user_Password',
                'email'            => 'max:225|email|regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/',
                'email'            =>  Rule::unique('Users')->ignore($id),
                'phoneNo'       => 'max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
                'phoneNo'       => Rule::unique('Users')->ignore($id),

            ]);
            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator)->with(['msgf' => 'Data Not Updated']);
            }
        }
        if (!$validator->fails()) {
            $update = User::where('id', $id)
                ->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phoneNo' => $request->input('phoneNo'),
                ]);
            if (!$request['user_Password'] == "") {
                $update = User::where('id', $id)
                    ->update([
                        'password' => Hash::make($request['user_Password']),
                        // Hash::make($request['user_Password']),
                    ]);
            }
            return redirect('/view_user')->with(['msg' => 'Record Updated']);
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
}
