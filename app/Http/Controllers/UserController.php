<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class UserController extends Controller
{
    public function index(){
        $this->authorize('viewAny', User::class);
        return view('user.index');
    }

    public function create(){
        $this->authorize('create', User::class);
        return view('user.create');
    }

    public function store(Request $request){
        $this->authorize('create', User::class);
        
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required',
        ];

        $messages = [
            'name.required' => 'name is a required field.',
            'email.requried' => 'email is a required field'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){

            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('Welcome@123#')
        ]);

        $user->assignRole('user');

        return new UserResource(User::findOrFail($user->id));
    }
}
