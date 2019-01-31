<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function createUser(Request $request){

        $this->Validate($request, [
            'email' => 'required|email|unique:users',
            'name' => 'required|max:100',
            'password' => 'required|min:8'
        ]);

        $email = $request['email'];
        $name = $request['name'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->password = $password;

        $user->save();
        Auth::login($user);

        return redirect()->route('conversations')->with(['message' => 'Bienvenue votre compte a ete cree avec succes avec succes']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function logUser(Request $request)
    {

        $this->Validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $request['email'];
        $password = $request['password'];

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('conversations');
        }


    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login')->with(['message' => 'vous avez été deconnecter avec succes']);
    }
}

