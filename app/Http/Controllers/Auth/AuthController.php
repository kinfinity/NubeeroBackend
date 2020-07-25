<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use  App\user;

class AuthController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function register(Request $request)
    {
        

        // try {
            
            // var_dump($request);
            //validate incoming request 
            $this->validate($request, [
                'name' => 'required|string',
                'email' => 'required|email|unique:user',
                'password' => 'required',
            ]);

            $user = new user();
            // $user->name = $request->input('name');
            // $user->email = $request->input('email');
            // $plainPassword = $request->input('password');
            // $user->password = app('hash')->make($plainPassword);
            // var_dump($user);

            // $user->save();

            //return successful response
            return response()->json(['user' => '$user', 'message' => 'CREATED'], 201);

        // } catch (\Exception $e) {
        //     //return error message
        //     // return response()->json(['message' => 'User Registration Failed!'], 409);
        //     return response()->json(['message' => $e->getMessage()], 409);
        // }

    }

     /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
          //validate incoming request 
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }


}