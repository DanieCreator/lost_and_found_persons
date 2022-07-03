<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class UpdatePassword extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'current_password' => ['required'],
        'password' => ['required', 'string', 'confirmed'],
        'password_confirmation' => ['required'],
    ];

    public function render()
    {
        return view('livewire.users.update-password');
    }

    public function updatePassword()
    {
        $data = $this->validate();

        Validator::make($data, $this->rules)
            ->after(function($validator) use($data){
                if(!Hash::check($data['current_password'], Auth::user()->password)){
                    $validator->errors()->add('current_password', 'The provided password does not match your current password');
                }
            })->validateWithBag('updatePassword');

        Auth::user()->forceFill([
            'password' => Hash::make($data['password'])
        ])->save();
    }
}
