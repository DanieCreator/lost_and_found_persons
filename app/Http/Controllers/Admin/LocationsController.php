<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LocationsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $locations = DB::table('stations')
            ->selectRaw("location, COUNT(id) AS station_count")
            ->groupBy('location')
            ->get();

        return view('admin.locations.index', compact('locations'));
    }
}
