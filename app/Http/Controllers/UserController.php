<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Google_Client;

class UserController extends Controller
{

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|max:30',
            'name' => 'required|max:60',
            'firstName' => 'required|max:30',
            'lastName' => 'required|max:30',
        ]);
        if ($validator->fails()) {
            return $this->responseBadRequest($validator->getMessageBag());
        }
        $user = new User($request->toArray());
        $user->save();
        return $this->responseCreated($user);
    }

    public function login(Request $request)
    {
        $idToken = $request['idToken'];
        $client = new Google_Client(['client_id' => env('GOOGLE_CLIENT_ID')]);
        $payload = $client->verifyIdToken($idToken);
        if ($payload) {
            return $this->responseOk(User::where('email', $payload['email'])->first());
        }
        return $this->responseUnauthorized('Id Token is not valid.');
    }

}
