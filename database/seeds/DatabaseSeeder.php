<?php

use App\Entity\Hotel\Facility;
use App\Entity\Hotel\Grade;
use App\Entity\Hotel\Category;
use App\Entity\FacilityType;
use App\Entity\Hotel\Room\RoomType;
use App\User;
use App\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

//		$this->call('UserTableSeeder');
//		$this->call('UserTypeSeeder');
//		$this->call('FacilityTypeSeeder');
//		$this->call('HotelCategorySeeder');
//		$this->call('HotelGradeSeeder');
		$this->call('HotelRoomTypeSeeder');
	}

}

class UserTableSeeder extends Seeder {
    public function run()
    {
        User::create(array(
            'name' => 'admin',
            'email' => 'faisal.islam70@gmail.com',
            'password' => 'admin@123',
            'user_type' => true
        ));
    }
}

class UserTypeSeeder extends Seeder {
    public function run()
    {
        $types = array(
            array('id' => 1, 'name' => 'Super Admin'),
            array('id' => 2, 'name' => 'Agent'),
            array('id' => 3, 'name' => 'Hotel Manager'),
            array('id' => 4, 'name' => 'Client')
        );
        foreach($types as $type) {
            UserType::create($type);
        }
    }
}

class FacilityTypeSeeder extends Seeder {
    public function run()
    {
        $facilities = array(
            'Fitness Center', 'Hot tub', 'Indoor pool', 'Wifi', 'Restaurant',
            'Breakfast in the room', 'Parking','Safety deposit box'
        );
        foreach($facilities as $facility) {
            FacilityType::create(array('name' => $facility));
        }
    }
}

class HotelCategorySeeder extends Seeder {
    public function run()
    {
        $categories = array(
            'International', 'Domestic'
        );
        foreach($categories as $category) {
            Category::create(array('name' => $category));
        }
    }
}

class HotelGradeSeeder extends Seeder {
    public function run()
    {
        $grades = array(
            '1 star', '2 star', '3 star', '4 star', '5 star', '6 star', '7 star'
        );
        foreach($grades as $grade) {
            Grade::create(array('name' => $grade));
        }
    }
}

class HotelRoomTypeSeeder extends Seeder {
    public function run()
    {
        $types = array(
            'Super Deluxe', 'Deluxe', 'Standard', 'Cottage', 'Kutir'
        );
        foreach ($types as $type) {
            RoomType::create(array('name' => $type));
        }
    }
}
