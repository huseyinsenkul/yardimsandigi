<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'users' => User::all(),
        ];

        return view('admin.user_controller.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.user_controller.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:admins|unique:users',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $transacion = new Transaction();
        $transacion->admin_id = auth('admin')->user()->id;
        $transacion->description = $request->name . " isimli kullanıcı oluşturuldu.";
        $transacion->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // kullanıcıyı düzenleme sayfası
        $data = [
            'user' => User::findOrFail($id),
        ];

        return view('admin.user_controller.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);
        $user = User::findOrFail($id);

        if ($user->email !== $request->email) {
            $this->validate($request, [
                'email' => 'unique:admins|unique:users',
            ]);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $transacion = new Transaction();
        $transacion->admin_id = auth('admin')->user()->id;
        $transacion->description = $request->name . " isimli kullanıcı düzenlendi.";
        $transacion->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);
        User::destroy($id);

        $transacion = new Transaction();
        $transacion->admin_id = auth('admin')->user()->id;
        $transacion->description = $user->name . " isimli kullanıcı silindi.";
        $transacion->save();

        return redirect()->route('admin.users.index');
    }
}
