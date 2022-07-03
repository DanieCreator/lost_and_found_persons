<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Report;
use App\Station;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        Gate::authorize('access-admin-dashboard');

        $tally = array();

        $tally['users'] = User::count();

        $tally['admins'] = User::group(Role::firstOrCreate(
            ['title' => 'admin'],
            ['description' => 'The most powerful role in the system']))->count();

        $tally['officers'] = User::group(Role::firstOrCreate(
            ['title' => 'officer'],
            ['description' => 'With this, you.ve got some real power on the site, though not that powerful']))->count();

        $tally['observers'] = User::group(Role::firstOrCreate(['title' => 'default'],
            ['description' => 'No powers, just a regular dude, with power of your profile only']))->count();

        $tally['reports'] = Report::count();

        $tally['locations'] = Station::distinct('location')->count();
        
        $tally['stations'] = Station::count();
        
        return view('admin.dashboard', compact('tally'));
    }
}
