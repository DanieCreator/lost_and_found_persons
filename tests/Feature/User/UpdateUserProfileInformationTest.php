<?php

namespace Tests\Feature\User;

use App\User;
use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Livewire\Users\ProfileInformation;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateUserProfileInformationTest extends TestCase
{
    use RefreshDatabase;
    
    private User $user;

    public function setUp():void
    {
        parent::setUp();

        $this->actingAs($this->user = factory(User::class)->create());
    }

    /**
     * @test
     * 
     * @group profile-information
     */
    public function a_user_can_update_own_profile()
    {
        $this->assertCount(1, User::all());
        $this->assertEquals($this->user->name, User::first()->name);

        $newUser = factory(User::class)->make();
        
        Livewire::test(ProfileInformation::class)
            ->set('name', $newUser->name)
            ->set('email', $newUser->email)
            ->set('phone_number', $newUser->phone_number)
            ->set('national_identification_number', $newUser->national_identification_number)
            ->call('save');

        $this->assertCount(1, User::all());
    }
}
