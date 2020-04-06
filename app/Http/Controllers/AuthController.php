<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function login(Request $request){

    $http = new \GuzzleHttp\Client;

    $response = $http->post('http://localhost:8001/oauth/token', [
    'form_params' => [
        'grant_type' => 'password',
        'client_id' => '2',
        'client_secret' => 'NB5mu5IxigAUaLAUKd27Uj9gevHC6FAwesoia4uX',
        'username' => $request -> username,
        'password' => $request -> password,
        'scope' => '',
    ],
]);

return $response->getBody();
  }

  public function logout(){
    auth() -> user() -> tokens -> each(function($token){
      $token -> delete();
    });

    return response() -> json('Logged Out!', 200);
  }
}
