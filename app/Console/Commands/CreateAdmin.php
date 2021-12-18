<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create application admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $firstName = 'Nishant';
        // $email = 'nsi@gmail.com';
        // $pwd = 'nish@123#';
        // $details = [
        //     'title' => "Congratulations $firstName",
        //     'body' => 'We have onboarded you as admin. Please use your email to login',
        //     'url' => url('/admin')
        // ];
     
        // Mail::to('send_to_email@gmail.com')->send(new \App\Mail\AdminWelcomeEmail($details));

        $this->info('Welcome to Sharayu Travels...');
        $firstName = $this->validate_cmd(function() {
            return $this->ask('Enter your first name..');
        }, ['first_name','required|alpha|max:10']);
        $middleName = $this->validate_cmd(function() {
            return $this->ask('Enter your middle name..');
        }, ['middle_name','max:10']);
        $lastName = $this->validate_cmd(function() {
            return $this->ask('Enter your last name..');
        }, ['last_name','required|alpha|max:10']);

        $email = $this->validate_cmd(function() {
            return $this->ask('Enter your email..');
        }, ['email','required|email']);
        $this->line('Password is required with a minimum of 8 & max of 16 characters.'.PHP_EOL.'Should have at least 1 lowercase AND 1 uppercase AND 1 number AND 1 symbol.');
        $pwd = $this->validate_cmd(function() {
            return $this->secret('Enter your password..');
        }, ['password','required|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/|min:8|max:16']);
        $gender = $this->choice(
            'What is your gender?',
            ['male', 'female'],
            0
        );

        $user = new User();
        $user->first_name = $firstName;
        $user->middle_name = $middleName;
        $user->last_name = $lastName;
        $user->email = $email;
        $user->password = Hash::make($pwd);
        $user->gender = strtolower($gender);
        $user->is_admin = 1;
        $user->save();
        $user->sendEmailVerificationNotification();
        $this->info('Thank you, your account is created with admin role. Kindly check your email for verification process');
    }


    /**
     * Validate an input.
     *
     * @param  mixed   $method
     * @param  array   $rules
     * @return string
     */
    public function validate_cmd($method, $rules)
    {
        $value = $method();
        $validate = $this->validateInput($rules, $value);

        if ($validate !== true) {
            $this->warn($validate);
            $value = $this->validate_cmd($method, $rules);
        }
        return $value;
    }

    public function validateInput($rules, $value)
    {

        $validator = Validator::make([$rules[0] => $value], [ $rules[0] => $rules[1] ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            return $error->first($rules[0]);
        }else{
            return true;
        }

    }
}
