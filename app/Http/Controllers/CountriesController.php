<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Countries;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $countries = Countries::all();
        return $countries;
    }
}
