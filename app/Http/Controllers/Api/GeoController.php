<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;


class GeoController extends Controller
{
    public function calculate(Request $request){

        $radius = 19113;
        /*

        * replace 6371000 with 6371 for kilometer and 3956 for miles
        */

           $venues = Company::selectRaw("id, name, lat, lng,
                            ( 6371000 * acos( cos( radians(?) ) *
                              cos( radians( lat ) )
                              * cos( radians( lng ) - radians(?)
                              ) + sin( radians(?) ) *
                              sin( radians( lat ) ) )
                            ) AS distance", [$request->lat, $request->lng, $request->lat])
               ->having("distance", "<", $radius)
               ->orderBy("distance",'asc')
               ->offset(0)
               ->limit(20)
               ->get();


           return response()->json(['data' => $venues], 200);


    }
}
