<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    /**
     * Display the user profile information
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showProfileInformation(User $user)
    {
        $this->authorize('update', $user);

        return view('users.show.information', compact('user'));
    }

    public function showProfileSettings(User $user)
    {
        $this->authorize('delete', $user);

        return view('users.show.settings', compact('user'));

    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
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
        $this->authorize('update', $user);
    }

}
