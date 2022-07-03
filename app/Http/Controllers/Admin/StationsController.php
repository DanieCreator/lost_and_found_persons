<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Station;
use Illuminate\Http\Request;

class StationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all();

        return view('admin.stations.index', compact('stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validations());

        Station::firstOrCreate(
            ['name' => $request->name],
            $data
        );

        return redirect()->route('admin.stations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station)
    {
        return view('admin.stations.show', compact('station'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $station)
    {
        return view('admin.stations.edit', compact('station'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Station $station)
    {
        $data = $request->validate(array_merge(
            $this->validations(),[
                'name' => ['required', 'string'],
            ]
        ));

        $station->update($data);

        return redirect()->route('admin.stations.show', $station);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        $station->delete();

        return redirect()->route('admin.stations.index');
    }

    private function validations():array
    {
        return [
            'name' => ['required', 'string', 'unique:stations'],
            'location' => ['required'],
            'lat' => [],
            'lng' => [],
        ];
    }
}
