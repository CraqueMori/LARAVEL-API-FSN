<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct(){
        //Nova forma de construir camadas de acesso
        $this->middleware('can:level')->only('edit', "update");
    }
    //
    public function index()
    {
        return view('users.index', [
            'users' => DB::table('users')->orderBy('name')->paginate('5')
            //'user' => Users::all()
        ]);
    }

    public function edit($id){
        return view('users.edit', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function update(Request $id){
        User::findOrFail($id->id)->update($id->all());

        return redirect()->route('users.index');
    }
}
