<?php

use App\User;

class AuthorizationTest extends TestCase {


    public function testAdminDashboard()
    {
        //I try to access admin dashboard
        $response = $this->call('GET', 'admin/dashboard');
        $this->assertEquals(302, $response->getStatusCode());

        //it says me to login in order to access the dashboard
        $user = Auth::loginUsingId(1);

        //after login now I can access my admin dashboard
        $response = $this->call('GET', 'admin/dashboard');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testManagerDashboard()
    {
        //I try to access manager dashboard
        $response = $this->call('GET', 'manager/dashboard');
        $this->assertEquals(302, $response->getStatusCode());

        //it says me to login in order to access the dashboard
        $faker = Faker\Factory::create();

        $user = new User();
        $user->name = $faker->name;
        $user->email = $faker->companyEmail;
        $user->password = $faker->randomDigit;
        $user->user_type = 3;

        $saved = $user->save();
        $this->assertTrue($saved);
        $user = Auth::loginUsingId($user->id);

        //after login now I can access my manager dashboard
        $response = $this->call('GET', 'manager/dashboard');
        $this->assertEquals(200, $response->getStatusCode());
    }

}
