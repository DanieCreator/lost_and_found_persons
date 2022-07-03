<?php

namespace Tests\Feature\User;

use App\File;
use App\User;
use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Users\ProfilePicture;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UploadProfilePictureTest extends TestCase
{

    use RefreshDatabase;

    private $user = null;

    public function setUp():void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();

        $this->be($this->user);
    }
    
    /**
     * @test
     * 
     * @group profile-picture
     */
    public function user_can_upload_profile_picture()
    {
        //Arrange
        $this->withoutExceptionHandling();
        Storage::fake('public');

        $file = UploadedFile::fake()->image('avatar.png');

        //Act
        Livewire::test(ProfilePicture::class)
            ->set('photo', $file)
            ->call('changeProfilePicture');
            
        //Assert
        $this->assertCount(1, File::all());
        Storage::disk('public')->assertExists(File::first()->path);
        $this->assertNotNull($this->user->fresh()->file);

    }
}
