<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use App\User;
use App\Car;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        return view('cars.contact_us', ['cars' => Car::findOrFail($id)]);
    }
}
