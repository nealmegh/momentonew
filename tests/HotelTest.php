<?php

use App\User;

class HotelTest extends TestCase {

    public function testNewHotel()
    {
        //create new manager
        $faker = Faker\Factory::create();

        $user = new User();
        $user->name = $faker->name;
        $user->email = $faker->companyEmail;
        $password = $user->password = $faker->word;
        $user->user_type = 3;

        $saved = $user->save();
        $this->assertTrue($saved); //"Manager {$user->email} created!"

        //now trying to access hotel dashboard
        $resp = $this->call('GET', 'auth/login');
        $this->assertEquals(200, $resp->getStatusCode());

        //try login
        $isLoggedIn = Auth::attempt(['email' => $user->email, 'password' => $password]);
        $this->assertTrue($isLoggedIn);

        //accessing manager/hotel/new page
        $resp = $this->call('GET', 'manager/hotel/new');
        $this->assertEquals(200, $resp->getStatusCode());


        // posting no data
        $resp = $this->call('POST', 'manager/hotel/new');
        $this->assertEquals(500, $resp->getStatusCode());
        $this->assertFalse($resp->isValidateable());

        //now posting some data
        $params = array(
            '_token' => csrf_token(),
            'name' => $faker->company,
            'category_id' => 1,
            'grade_id' => 5,
            'address' => $faker->streetAddress,
            'country' => $faker->country,
            'state' => $faker->city,
            'city' => $faker->city,
            'zip' => rand(11111,99999),
            'email' => $faker->email,
            'fax' => $faker->phoneNumber,
            'phone' => $faker->phoneNumber,
            'cell' => $faker->phoneNumber,
            'distance_from_airport' => $faker->numberBetween(5,100),
            'distance_from_market' => $faker->numberBetween(5,25),
            'pet_allowed' => rand(0,1),
            'google_map' => $faker->realText(),
            'general_information' => $faker->realText(),
            'service_information' => $faker->realText(),
            'other_information' => $faker->realText(),
            'policy' => $faker->realText(),
            'terms' => $faker->realText(),
            'privacy' => $faker->realText(),
            'facilities' => array(rand(1,3),rand(4,5),rand(6,7)),
        );

        $resp = $this->call('POST', 'manager/hotel/new', $params);

        file_put_contents(__DIR__ . '/messages.html', var_export($params, 1));
    }
}
