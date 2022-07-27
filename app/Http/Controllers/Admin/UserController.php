<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('manage-users')) {
            abort(403);
        }

        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('manage-users')) {
            abort(403);
        }
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required| string| email| max:255| unique:users',
        ]);
             User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'department' => $request['department'],
                'password' => Hash::make($request['password']),
                'role_id' => $request['role_id'] ?? Null
            ]);
        
            return redirect()->route('admin.users.index')
->with('success','user has been created successfully.');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id )
    {
        $user = User::findorFail($id);
   
         return view('admin.users.show',compact('user'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorFail($id);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id)
    {
        {
            $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'department'=>'required',
            'password'=>'same:confirm-password'
            ]);

            $user = User::findorFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->department = $request->department;
            $user->password = Hash::make($request['password']);

            $user->save();
            return redirect()->route('admin.users.index')
            ->with('success','user Has Been updated successfully');
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
        $user = User::findorFail($id);

        $user->delete();
        return back()
        ->with('success','User has been deleted successfully');
    }
} 
