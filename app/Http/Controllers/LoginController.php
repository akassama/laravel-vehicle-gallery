<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

//use App\User;

class LoginController extends Controller
{
    /**
     * Show the login form
     */
    public function index()
    {
        return view('cars.login_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    function authenticate(Request $request)
    {
        //validate request
        $validatedData = $request->validate([
            //rules
            'Email' => 'required',
            'Password' => 'required',
        ]);

        try {

            // create our user data for the authentication
            $userdata = array(
                'Email' => Input::get('email') ,
                'Password' => Input::get('password')
            );

            // attempt to do the login
            if (Auth::attempt($userdata))
            {
                //Not Implemented
            }
            else
            {
                // validation not successful, send back to form
                return Redirect::to('login');
            }

        } catch (Throwable $e) {
            report($e);

            return $e;
        }
    }
}
