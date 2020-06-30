<?php

namespace App\Http\Controllers;
use App\models\Country;
use Illuminate\Http\Request;


class CountryController extends Controller
{
    public function index()
    {

        $item=Country::get();
        return view("admin.countries.showcountry")->with('item',$item);

    }
    public function create()
    {
        return view("admin.countries.create");
    }
    public function postcreate(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'iso'=>'required',
            'code'=>'required'
        ]);

        Country::insert([
            'name'=>$request->name,
            'iso'=>$request->iso,
            'code'=>$request->code,
            'area'=>$request->area,
            'population'=>$request->population,
        ]);
        Session()->flash('msg','s:Created Succesfully');
        return redirect(asset('country/all'));
    }

    public  function delete($id)
    {
        Country::where('id',$id)->delete();
        Session()->flash('msg','d:Deleted Succesfully');
        return redirect(asset('/country/all'));

    }

    public function update($id)
    {
        $country = Country::find($id);
        return view('admin.countries.update')->with('country',$country);
    }
    public function postupdate($id){
        $request = request();
        $request->validate([
            'name' => 'required',
            'iso' => 'required',
            'code' => 'required'
        ]);
        Country::where('id', $id)->update([
            'name' => $request->name,
            'iso' => $request->iso,
            'code' => $request->code,
            'area' => $request->area,
            'population' => $request->population,

        ]);
       Session()->flash('msg','s:Updated Succesfully');
       return redirect(asset('/country/all'));

    }

}
