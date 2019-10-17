<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Friend;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

    	$faker = Faker::create('pl_PL');

    	/* =============== VARIABLES =============== */

    	$number_of_users = 20;
    	$max_posts_per_user = 20;
    	$max_comments_per_post = 5;
    	$password = '25Marta0169';

    	DB::table('roles')->insert([
    		'id' => 1,
    		'type' => 'admin',
    	]);

    	DB::table('roles')->insert([
    		'id' => 2,
    		'type' => 'student',
    	]);

        DB::table('roles')->insert([
            'id' => 3,
            'type' => 'tutor',
        ]);

    	/* =============== USERS =============== */

    	for ($user_id = 1; $user_id <= $number_of_users; $user_id++) {

    		if ($user_id === 1) {

		    	DB::table('users')->insert([
		    		'name' => 'Grzegorz',
		    		'surname' => 'Poczynajło',
		    		'email' => 'grzegorz_poczynajlo@onet.pl',
		    		//'sex' => 'm',
		    		'role_id' => 1,
		    		'city_id' => 1,
		    		'password' => bcrypt($password),
		    	]);

    		} else {

	    		$sex = $faker->randomElement(['m', 'f']);
	    		$role = $faker->randomElement([2, 3]);
	    		$city = $faker->randomElement([2, 10]);

	    		switch ($sex) {

	    			case 'm':
	    				$name = $faker->firstNameMale;
	    				$surname = $faker->lastNameMale;
	    				$avatar = json_decode(file_get_contents('https://randomuser.me/api/?gender=male'))->results[0]->picture->large;
	    				break;

	    			case 'f':
				    	$name = $faker->firstNameFemale;
				    	$surname = $faker->lastNameFemale;
				    	$avatar = json_decode(file_get_contents('https://randomuser.me/api/?gender=female'))->results[0]->picture->large;
	    				break;

	    		}

		    	DB::table('users')->insert([
		    		'name' => $name,
		    		'surname' => $surname,
		    		'email' => str_replace('-', '', str_slug($name)) . '@' . $faker->safeEmailDomain,
		    		//'sex' => $sex,
		    		'role_id' => $role,
		    		'city_id' => $city,
		    		'avatar' => $avatar,
		    		'password' => bcrypt($password),
		    	]);

    		}

    	/* =============== FRIENDS =============== */

    		for ($i = 1; $i <= $faker->numberBetween($min = 0, $max = $number_of_users - 1); $i++) {

    			$friend_id = $faker->numberBetween($min = 1, $max = $number_of_users);

				$friendship_exists = Friend::where([
					'user_id' => $user_id,
					'friend_id' => $friend_id,
				])->orWhere([
					'user_id' => $friend_id,
					'friend_id' => $user_id,
				])->exists();

    			if ( ! $friendship_exists) {

			    	DB::table('friends')->insert([
			    		'user_id' => $user_id,
			    		'friend_id' => $friend_id,
			    		'accepted' => 1,
			    		'created_at' => $faker->dateTimeThisYear($max = 'now'),
			    	]);

    			}

    		} // friends loop

    	/* =============== POSTS =============== */

    		for ($post_id = 1; $post_id <= $faker->numberBetween($min = 0, $max = $max_posts_per_user); $post_id++) {

		    	DB::table('posts')->insert([
		    		'user_id' => $user_id,
		    		'content' => $faker->paragraph($nbSenteces = 1, $variableNbSentecens = true),
		    		'created_at' => $faker->dateTimeThisYear($max = 'now'),
		    	]);

		/* =============== COMMENTS =============== */

	    		for ($comment_id = 1; $comment_id <= $faker->numberBetween($min = 0, $max = $max_comments_per_post); $comment_id++) {

			    	DB::table('comments')->insert([
			    		'post_id' => $post_id,
			    		'user_id' => $faker->numberBetween($min = 1, $max = $number_of_users),
			    		'content' => $faker->paragraph($nbSenteces = 1, $variableNbSentecens = true),
			    		'created_at' => $faker->dateTimeThisYear($max = 'now'),
			    	]);

	    		} // comments loop

    		} // posts loop

    	} // users loop

        /* =============== CITIES =============== */

        for($i = 1; $i < 10; $i++) {
            DB::table('cities')->insert([
                'name' => $faker->city,
            ]);
        }
    }
}
