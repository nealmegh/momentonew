<?php

use App\User;

class UserTest extends TestCase {


    private $user;

    public function setUp()
    {
        parent::setUp();
        $this->loadUser(1);
    }

    /**
     * Make sure we insert super user as system's first user
     */
    public function testFirstUserIsSuperAdmin()
    {
        $isAdmin = $this->user->userType->id == 1 ? true : false;

        $this->assertTrue($isAdmin);
    }

    public function testUserCreation()
    {
        $faker = Faker\Factory::create();

        $user = new User();
        $user->name = $faker->name;
        $user->email = $faker->companyEmail;
        $user->password = $faker->randomDigit;
        $user->user_type = 3;

        $saved = $user->save();
        $this->assertTrue($saved);

        $userFromDb = User::find($user->id);

        $this->assertEquals($user->name, $userFromDb->name);
        $this->assertNotEquals('password', $userFromDb->password);// so data saved as hash
        $this->assertEquals($user->password, $userFromDb->password);
        $this->assertEquals($user->email, $userFromDb->email);
        $this->assertEquals(
            $user->user_type,
            $userFromDb->userType->id
        );
    }

    /**
     * @param int $userId
     * @return \Illuminate\Support\Collection|null|static
     */
    private function loadUser($userId = 1)
    {
        $this->user = User::find($userId);
    }
}
