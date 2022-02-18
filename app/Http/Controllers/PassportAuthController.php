<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class PassportAuthController extends Controller
{
    /**
     * Registration
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        
        $this->email();
        $user->roles()->sync(2);
        $token = $user->createToken('LaravelAuthApp')->accessToken;
 
        return response()->json(['token' => $token], 200);
    }

    public function email(){

    }
 
    /**
     * Login
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }   


    public function user(Request $request){

        $user = User::where('email', $request->email)->first();

        if (!$user) {
           return response()->json(['error' => 'Not Found'], 404);
        }
        else
        {
            return response()->json(['data' => $user], 200);
        }
    }

    public function udid(Request $request){

        $user = User::find($request->user_id);
        $user->udid = $request->udid;
        $user->update();
        return response()->json(['data' => $user->udid], 200);   
    }
}