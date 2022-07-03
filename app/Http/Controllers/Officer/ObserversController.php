<?php

namespace App\Http\Controllers\Officer;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreObserverRequest;

class ObserversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::firstOrCreate([
            'title' => 'default',
            'description' => 'No powers, just a regular dude, with power of your profile only'
        ]);

        $users = User::where('role_id', $role->id)
            ->get();

        return view('officer.observers.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('officer.observers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\StoreObserverRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreObserverRequest $request)
    {
        $data = $request->validated();

        $role = Role::firstOrCreate([
            'title' => 'default',
            'description' => 'No powers, just a regular dude, with power of your profile only'
        ]);

        $user = User::create(array_merge($data, [
            'password' => Hash::make('password'),
            'role_id' => $role->id
        ]));

        return redirect()->route('officer.observers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
