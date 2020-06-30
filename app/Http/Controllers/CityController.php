<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\models\Country;
use App\models\City;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $City = City::all();
        $Country = Country::all();
        return view("admin.cities.index")->with("City",$City)->with("Country",$Country);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Country = Country::all();
        return view("admin.cities.create")->with("Country", $Country);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
//        $request->validate([
//            'name' => 'required',
//            'country_id' => 'required',
//            'latlang' => 'required'
//
//        ]);

//        City::insert([
//            'name' => $request->name,
//            'country_id' =>  $request->country_id,
//            'latlang' =>  $request->latlang,
//            'active' =>  $request->active??0
//
//        ]);
        if(!$request->active)
        {
            $request['active']=0;
        }
        City::create($request->all());
        session()->flash("msg", "s: City Created Successfully");
        return redirect(route("city.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::find($id);
        $country = Country::all();
        return view("admin.cities.show")->withCity($city)->withCountry($country);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        $country = Country::all();
        return view("admin.cities.edit")->withCity($city)->withCountry($country);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
//        $request->validate([
//            'name' => 'required',
//            'country_id' => 'required',
//            'latlang' => 'required'
//        ]);


//        City::where('id', $id)->update([
//            'name' => $request->name,
//            'country_id' =>  $request->country_id,
//            'latlang' =>  $request->latlang,
//            'active' =>  $request->active??0
//        ]);
//        session()->flash("msg", "i: City Updated Successfully");
//        return redirect(route("city.index"));
        if(!$request->active)
        {
            $request['active']=0;
        }
        $city =City::find($id);
           $city->update($request->all());
        session()->flash("msg", "s: City Updated Successfully");
        return redirect(route("city.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city =City::find($id);
        if(!$city)
        {
            session()->flash("msg", "w: City Not Found");
            return redirect(route("city.index"));
        }else{
            City::destroy($id);
            session()->flash("msg", "w: City Deleted Successfully");
            return redirect(route("city.index"));
        }


    }
}
