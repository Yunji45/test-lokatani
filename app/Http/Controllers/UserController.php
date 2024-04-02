<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'User';
        $user = User::orderBy('created_at','desc')->get();
        return view('page.index',compact('title','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'User';
        return view('page.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email'=> 'required|email|unique:users',
            'phone' => 'required',
            'address' => 'required',

        ],[
            'nama.required' => 'Nama Pasien Tidak Boleh Kosong',
            'phone.required' => 'Phone Tidak Boleh Kosong',
            'address.required' => 'Alamat Tidak Boleh Kosong',
            'email.required' => 'Email Tidak Boleh Kosong',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorForm', $validator->errors()->getMessages())
                ->withInput();
        }

        $data = new User;
        $data ->name = $request->name;
        $data ->email =$request->email;
        $data ->phone = $request->phone;
        $data ->address = $request->address;
        // return $data;
        if ($data){
            $data -> save();
            return redirect()->route('user.index')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error','Data gagal Disimpan');
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
        $title = 'Detail Data';
        $data = User::find($id);
        return view('page.show',compact('title','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit User';
        $user = User::find($id);
        return view('page.edit',compact('title','user'));
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
        $data = User::find($id);
        if ($data) {
            $data->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
    
            return redirect()->route('user.index')->with('success', 'Data Berhasil Diperbarui');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
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
        $data = User::find($id);
        if ($data) {
            $data->delete();
            return redirect()->route('user.index')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}
