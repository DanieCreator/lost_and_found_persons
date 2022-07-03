<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserProfileManagementTest extends TestCase
{
    use RefreshDatabase;
    
    private $user = null;
    
    public function setUp():void
    {
        parent::setUp();

        $this->be($this->user = factory(User::class)->create());
    }

    /**
     * @test
     * 
     * @group profile
     */
    public function user_can_visit_own_profile()
    {
        //Arrange
        $this->withoutExceptionHandling();

        //Act
        $response = $this->get(route('users.profile.show', $this->user));

        //Assert
        $response->assertOk();
        $response->assertViewIs('users.show.information');
        $response->assertViewHas('user');
    }

    /**
     * @test
     * 
     * @group profile
     */
    public function user_blocked_from_seeing_others_profiles()
    {
        //Arrange
        $this->withoutExceptionHandling();
        $this->expectException(AuthorizationException::class);
        $user = factory(User::class)->create();

        //Act
        $response = $this->get(route('users.profile.show', $user));

    }


    /**
     * @test
     * 
     * @group profile
     */
    public function user_can_visit_profile_own_settings()
    {
        //Arrange
        $this->withoutExceptionHandling();

        //Act
        $response = $this->get(route('users.profile.settings', $this->user));

        //Assert
        $response->assertOk();
        $response->assertViewIs('users.show.settings');
        $response->assertViewHas('user');

    }

    /**
     * @test
     * 
     * @group profile
     */
    public function malicious_users_bocked_seeing_others_profiles()
    {
        //Arrange
        $this->withoutExceptionHandling();
        $this->expectException(AuthorizationException::class);
        $user = factory(User::class)->create();

        //Act
        $response = $this->get(route('users.profile.settings', $user));

    }    
}
