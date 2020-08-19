<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CarController extends Controller
{
    /**
     * Display a listing of the home page resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        //load index page
        $cars = Car::all();
        return view('cars.home', compact('cars'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //load index page
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate request
        $validatedData = $request->validate([
            //rules
            'Name' => 'required|unique:cars|min:2|max:255',
            'Description' => 'required|min:10|max:255',
            'Price' => 'required|min:2|max:10',
            'Color' => 'required|min:2|max:255',
            'Company' => 'required|min:2|max:255',
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Image3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Image4' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        try {
            //Get image name
            $imageName = time().'-'.$request->Image->getClientOriginalName();
            $imageName2 = time().'-'.$request->Image2->getClientOriginalName();
            $imageName3 = time().'-'.$request->Image3->getClientOriginalName();
            $imageName4 = time().'-'.$request->Image4->getClientOriginalName();

            //upload image in directory
            request()->Image->move(public_path('images/cars'), $imageName);
            request()->Image2->move(public_path('images/cars'), $imageName2);
            request()->Image3->move(public_path('images/cars'), $imageName3);
            request()->Image4->move(public_path('images/cars'), $imageName4);

            //set image name for file db
            $validatedData['Image'] = $imageName;
            $validatedData['Image2'] = $imageName2;
            $validatedData['Image3'] = $imageName3;
            $validatedData['Image4'] = $imageName4;


            //save
            Car::create($validatedData);
            return Redirect::to("cars")->with('success_message','Car added!');
        } catch (Throwable $e) {
            report($e);

            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //validate request
        $validatedData = $request->validate([
            //rules
            'Name' => 'required|min:2|max:255',
            'Description' => 'required|min:10|max:255',
            'Price' => 'required|min:2|max:10',
            'Color' => 'required|min:2|max:255',
            'Company' => 'required|min:2|max:255',
            'Image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Image2' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Image3' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Image4' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {

            //If update file exists
            if($request->hasFile('Image')) {
                //Get image name
                $imageName = time().'-'.$request->Image->getClientOriginalName();

                //upload image in directory
                request()->Image->move(public_path('images/cars'), $imageName);

                //set image name for file db (replace space with -)
                $validatedData['Image'] = str_replace(' ', '-', $imageName);
            }


            //update
            $car->update($validatedData);
            return Redirect::to("cars")->with('success_message','Car details updated!');
            //Car::update($validatedData); //cannot use this because you cannot call static method of update
        } catch (Throwable $e) {
            report($e);

            return $e;
        }
    }


    /**
     * Display a listing of the home page resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        //load contact page
        return view('cars.contact_us', compact('cars'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        try {
            //delete
            $car->delete();
            return Redirect::to("cars")->with('success_message','Record was deleted!');
            //return  redirect('cars');
        } catch (Throwable $e) {
            report($e);

            return $e;
        }
    }
}
