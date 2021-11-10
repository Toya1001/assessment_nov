<?php

namespace App\Http\Livewire;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterLogin extends Component

{
    public $displayLogin = false;

    public $displayRegister = false;

    public $student = false; 
    public $teacher = false;

    public $email, $password, $name, $password_confirmation;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->displayLogin = true;
    }

    public function register()
    {
        $this->displayLogin = false;
    }


    public function submit()
    {
        $valid = $this->validate();

        if (Auth::attempt($valid)) {
            return redirect('teacher');
        }
        return session()->flash('message', 'Invalid Login');
    }

 
    public function updatedEmail()
    {
    }

    public function registerOnSubmit()
    {
        
        $this->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:6'],
            'password_confirmation' => ['min:6',],
        ]);



        if($this->teacher)   {
            $teacher = User::where('email', $this->email)->count();
            if ($teacher == 1) {
                return session()->flash('message', 'An Account already Exist');
            } else {
                User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                    'role' => 1,
                ]);

                $userid = User::where('email', $this->email)->value('id');
                Teacher::create([
                    'user_id'=> $userid,
                ]);
                return redirect()->route('login');
            }
        } elseif ($this->student){

            $user = User::where('email', $this->email)->count();
            if ($user == 1) {
                return session()->flash('message', 'An Account already Exist');
            } else {
                User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                    'role' => 2,
                ]);

                $userid = User::where('email', $this->email)->value('id');

                Student::create([
                    'user_id' => $userid,
                ]);
                return redirect()->route('login');
            }
        }
    }

    public function render()
    {
        return view('livewire.register-login');
    }
}
