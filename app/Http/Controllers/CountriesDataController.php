<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CountriesData;

class CountriesDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $countries_data = CountriesData::all();
        return $countries_data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $name = $request->input('country');
        $country_exists = CountriesData::where('name','=', $name )->count();
        if ($country_exists <= 0){
            $country = new CountriesData;
            $country->name = $request->input('country');
            $country->cases = $request->input('cases');
            $country->todayCases = $request->input('todayCases');
            $country->deaths = $request->input('deaths');
            $country->todayDeaths = $request->input('todayDeaths');
            $country->recovered = $request->input('recovered');
            $country->active = $request->input('active');
            $country->critical = $request->input('critical');
            $country->casesPerOneMillion = $request->input('casesPerOneMillion');
            $country->deathsPerOneMillion = $request->input('deathsPerOneMillion');
            $country->totalTests = $request->input('totalTests');
            $country->testsPerOneMillion = $request->input('testsPerOneMillion');
            $country->save();
            return "new";
        }
        else{
            $country = CountriesData::where('name','=', $name )->first();
            $country->name = $request->input('country');
            $country->cases = $request->input('cases');
            $country->todayCases = $request->input('todayCases');
            $country->deaths = $request->input('deaths');
            $country->todayDeaths = $request->input('todayDeaths');
            $country->recovered = $request->input('recovered');
            $country->active = $request->input('active');
            $country->critical = $request->input('critical');
            $country->casesPerOneMillion = $request->input('casesPerOneMillion');
            $country->deathsPerOneMillion = $request->input('deathsPerOneMillion');
            $country->totalTests = $request->input('totalTests');
            $country->testsPerOneMillion = $request->input('testsPerOneMillion');
            $country->save();
            return "is exist";

        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
//        $country = CountriesData::where('id', $id)->firstOrFail();
        $country = CountriesData::find($id);
        return  $country ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
//        $country = CountriesData::find($id);
//        return $country;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $country = CountriesData::find($id);
        $country->name = $request->input('country');
        $country->cases = $request->input('cases');
        $country->todayCases = $request->input('todayCases');
        $country->deaths = $request->input('deaths');
        $country->todayDeaths = $request->input('todayDeaths');
        $country->recovered = $request->input('recovered');
        $country->active = $request->input('active');
        $country->critical = $request->input('critical');
        $country->casesPerOneMillion = $request->input('casesPerOneMillion');
        $country->deathsPerOneMillion = $request->input('deathsPerOneMillion');
        $country->totalTests = $request->input('totalTests');
        $country->testsPerOneMillion = $request->input('testsPerOneMillion');

//        return $request->input('country');
//
        $country->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $country = CountriesData::findOrFail($id);
        $country->delete();

    }
}
