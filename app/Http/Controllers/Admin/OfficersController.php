<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Officer;
use App\Station;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class OfficersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officers = Officer::with('user')->get();

        return view('admin.officers.index', compact('officers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stations = Station::all(['id', 'name']);

        return view('admin.officers.create', compact('stations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user.name' => ['bail', 'required', 'string', 'max:255'],
            'user.email' => ['bail', 'required', 'email', 'unique:users,email', 'max:255'],
            'user.phone_number' => ['bail', 'required', 'string'],
            'user.national_identification_number' => ['bail', 'required'],
            'officer.station_id' => ['bail', 'required', 'numeric'],
            'officer.ocs' => [],
            'officer.officer_number' => ['bail', 'required', 'numeric'],
        ]);

        $role = Role::firstOrCreate([
            'title' => 'officer',
            'description' => 'With this, you.ve got some real power on the site, though not that powerful'
        ]);

        //Change OCS to boolean
        $data['officer']['ocs'] = array_key_exists('ocs', $data['officer']);

        $user = User::create(array_merge($data['user'], [
            'password' => Hash::make('password'),
            'role_id' => $role->id
        ]));

        $user->officer()->create(array_merge($data['officer'], [
            'creator_id' => $request->user()->id,
        ]));

        return redirect()->route('admin.officers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function show(Officer $officer)
    {
        $officer->load(['user','station']);

        return view('admin.officers.show', compact('officer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function edit(Officer $officer)
    {
        $officer->load(['user','station']);
        
        $stations = Station::all(['id', 'name']);

        return view('admin.officers.edit', compact('officer', 'stations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Officer $officer)
    {
        $data = $request->validate([
            'user.name' => ['bail', 'required', 'string', 'max:255'],
            'user.email' => ['bail', 'required', 'email', 'max:255'],
            'user.phone_number' => ['bail', 'required', 'string'],
            'user.national_identification_number' => ['bail', 'required'],
            'officer.station_id' => ['bail', 'required', 'numeric'],
            'officer.ocs' => [],
            'officer.officer_number' => ['bail', 'required', 'numeric'],
        ]);

        //Change OCS to boolean
        $data['officer']['ocs'] = array_key_exists('ocs', $data['officer']);

        $officer->user->update($data['user']);

        $officer->update($data['officer']);

        return redirect()->route('admin.officers.show', $officer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Officer $officer)
    {
        $officer->delete();

        return redirect()->route('admin.officers.index');
    }
}