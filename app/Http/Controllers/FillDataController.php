<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FillDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://coronavirus-19-api.herokuapp.com/countries');
//        echo $response->getStatusCode();
        $res = $response->getBody();
        $chosen_country = $request->input('chosen_country');
//        dd($request);
//        return $res;

//        $items = json_decode((string) $response->getBody(), true)['rows'][0];
//        foreach ($items['elements'] as $key => $item) {
//            return $item;
//        }

        $items = json_decode( (string) $response->getBody());

        foreach ($items as $item) {
            if ($chosen_country == $item->country){
                return response()->json($item);
            }
        }


    }
}
