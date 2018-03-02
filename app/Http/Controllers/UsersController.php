<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Http\Requests\StoreUserRequest;

use App\Http\Requests\EditUserRequest;

use Session;

class UsersController extends Controller
{
    public function all()
    {	
        $users = User::orderBy('id', 'desc')->paginate(15);

        return view('users.all',[
            'users' => $users
        ]);
    }

    public function create()
    {
    	$users = User::all();
        return view('users.create',[
        	'users' => $users
        ]);
    }

    public function store(StoreUserRequest $request)
    {   

    	$user = new User;

    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->role = $request->role;

    	$user->save();

        Session::flash('success', 'Your form was successfully saved!');
    	
        return redirect()->route('users/all');
    }

    public function edit($id)
    {
    	$edit = User::where('id', $id)->get();

        return view('users.edit', [
        	'edit' => $edit
        ]);
    }

    public function destroy($id)
    {
    	$deletecategory = User::where('id', $id)->delete();

        return redirect()->route('users/all');
    }

    public function update($id, EditUserRequest $request)
    {   

        $user = User::where('id', $id)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;

        $user->save();

        return redirect()->route('users/all');
    }
}
