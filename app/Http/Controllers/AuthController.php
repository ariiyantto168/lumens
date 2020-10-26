<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\User;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make(request()->all(), [
            'name'  => 'required|max:30',
            'email' => 'required|max:100|email',
            'role' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) 
        {

            return response()->json([
                'status' => 500,
                'message' => 'Bad Request',
                'error' => $validator->errors(),
            ], 401);
            
        }

        unset($input['confirm_password']);
        $input['password'] = Hash::make($input['password']);
        $query = User::create($input);

        $response['token'] = $query->createToken('users')->accessToken;
        $response['email'] = $query->email;

        return response()->json($response, 200);
    }

    public function login(Request $request)
    {
        $input = $request->all();
        
        $validator = Validator::make($input, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) 
        {
            return response()->json([
                'status' => 500,
                'message' => 'Bad Request',
                'error' => $validator->errors(),
            ], 401);    
        }

        $check_users = User::where('email', '=', $input['email'])->first();

        if (@count($check_users) > 0) {
            $password = $input['password'];

            if (Hash::check($password, $check_users['password'])) {
                // dd('true');
                $response['token'] = $check_users->createToken('users')->accessToken;
                $response['status'] = 200;
                $response['message'] = 'Login Successfully';

                return response()->json($response, 200);
            }
            else {
                $response['status'] = 401;
                $response['message'] = 'Password Not Match';

                return response()->json($response, 401);
            }
        }
        else {
            $response['status'] = 401;
            $response['message'] = 'Email Not Match';

            return response()->json($response, 401);   
        }
    }


    public function FunctionName(Type $var = null)
    {
        # code...
    }

    // public function logout(Request $request)
    // {
    //     $value = $request->bearerToken();
    //     $idusers = (new Parser())->parse($value)->getHeader('jti');
    //     $token= $request->user()->tokens->find($idusers);
    //     $token->revoke();

    //     $response = 'You have been successfully logged out!';
    //     return response($response, 200);


    // }
}
