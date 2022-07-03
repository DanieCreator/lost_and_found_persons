<?php

namespace App\Http\Controllers\Officer;

use App\Role;
use App\User;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportRequest;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::all();

        return view('officer.reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::firstOrCreate(
            ['title' => 'default'],
            ['description' => 'No powers, just a regular dude, with power of your profile only']
        );

        $users = User::where('role_id', $role->id)
            ->get();
            
        return view('officer.reports.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\StoreReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {
        $data = $request->validated();

        //dd($data);

        $extraItems = [];

        if(isset($data['keys']) && isset($data['keys'])){

            if(count($data['keys']) === count($data['values'])){

                $keys = $data['keys'];
                $values = $data['values'];
                
                for ($i=0; $i < count($data['keys']); $i++) { 
                    $extraItems[$keys[$i]] = $values[$i];
                }

            }else{
                Log::warning('Mismatch in keys and values count');
            }
        }else{
            Log::notice('Keys and / or values not set');
        }

        if(!empty($extraItems)){
            $data['extra_items'] = json_encode($extraItems);
        }

        if(isset($data['last_seen_with'])){
            $data['last_seen_with'] = json_encode($data['last_seen_with']);
        }

        $data['officer_id'] = $request->user()->officer->id;
        $data['station_id'] = $request->user()->officer->station_id;
        
        $report = Report::create($data);

        $report->users()->attach($data['observers']);

        Log::info('Report created, ID: ' . $report->id);

        return redirect()->route('officer.reports.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        return view('officer.reports.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        return view('officer.reports.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
