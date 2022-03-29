<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        //passing to view product

        $title = 'User';
        $user = User::all();
        return view('user.index', compact('title', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * 'name' => 'Admin',
        'email' => 'admin@seeder.com',
        'password' => Hash::make('admin'),
        'level' => 'admin',
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        //validasi
        $this->validate($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $save = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'level' => $data['level'],
            // 'password' => Hash::make($data['password']),
            'password' => $data['password'],
        ]);
        activity()->log('Sukses Menambahkan User');

        return redirect()->route('home')->with(['error' => '<strong>Data</strong> Berhasil Ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $user)
    {
        return view('user.edit')->with('user', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     * 'name' => 'Admin',
                'email' => 'admin@seeder.com',
                'password' => Hash::make('admin'),
                'level' => 'admin',
     */
    public function update(Request $request, $id)
    {
        //
        //validasi
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'level' => 'required|string|max:100',
        ]);
        //deklarasi from
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->level = $request->input('level');
        //save
        if (!$user->save()) {
            return redirect()->back()->with(['error' => 'error page update']);
        }
        return redirect()->route('user.index')->with('success', 'update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        //delete image
        $user->delete();

        return redirect()->route('user.index')->with('success Dihapus');
    }
}
