<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;


class GeoController extends Controller
{
    public function calculate(Request $request){

/*
 * @param1 : pass current latitude of the driver
 * @param2 : pass current longitude of the driver
 * @param3: pass the radius in meter within how much distance you wanted to fiter
*/
    $radius = 10;
    $venues = Company::selectRaw("id, name, lat, lng,
                     ( 6371 * acos( cos( radians(?) ) *
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
