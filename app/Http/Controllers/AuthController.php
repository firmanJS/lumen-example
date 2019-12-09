<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Firebase\JWT\JWT;

use Illuminate\Http\Request;

class AuthController extends Controller

{


   public function authenticate(Request $request)
   {

        $this->validate($request, [
        'email' => 'required',
        'password' => 'required'

        ]);

        if($request->input('email') == "user@example.com" && $request->input('password') == "user"){
            $payload = [
                'iat' => time(), // Time when JWT was issued. 
                'exp' => time() + 60*60, // Expiration time
                'user' => $request->input('email')
              ];
              $jwt = JWT::encode($payload, env('JWT_SECRET'));
              $status = "success";
              $message = 'Login succeed';
              
              return ['status'=>$status, 'message'=>$message, 'token'=>$jwt];

        }else{
            return response()->json(['status' => 'email or password not match'],401);

        }
    }

}    

?>