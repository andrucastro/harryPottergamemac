<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $team1 = factory(App\Team::class, 1)->create([
            'name' => 'Gryffindor',
            'color' => '#6b0405',
            'image' => '/img/dashboard/team1.jpg',
            'coupon' => '/img/coupons/team1.png',
        ]);
        $team2 = factory(App\Team::class, 1)->create([
            'name' => 'Ravenclaw',
            'color' => '#013064',
            'image' => '/img/dashboard/team2.jpg',
            'coupon' => '/img/coupons/team2.png',
        ]);
        $team3 = factory(App\Team::class, 1)->create([
            'name' => 'Hufflepuff',
            'color' => '#0c0500',
            'image' => '/img/dashboard/team3.jpg',
            'coupon' => '/img/coupons/team3.png',
        ]);
        $team4 = factory(App\Team::class, 1)->create([
            'name' => 'Slytherin',
            'color' => '#013505',
            'image' => '/img/dashboard/team4.jpg',
            'coupon' => '/img/coupons/team4.png',
        ]);


        $waypoint1 = factory(App\Waypoint::class, 1)->create([
            'title' => 'Garrick Ollivander',
            'description' => 'World’s Best Wandmaker',
            'content' => 'Ollivander has a new muggle invention building wands for him. Swing by his shop to pick one up or attend his class',
            'image' => 'ollivander.gif',
            'point_value' => 100,
            'code' => 'silvery eyes',
        ]);
        $waypoint2 = factory(App\Waypoint::class, 1)->create([
            'title' => 'Rubeus Hagrid',
            'description' => 'Hogwarts Gamekeeper, Care of Magical Creatures Professor',
            'content' => 'Hagrid’s creatures are going to be featured in a special class this week. You’ll find him there getting them ready.',
            'image' => 'hagrid.jpg',
            'point_value' => 100,
            'code' => 'rare',
        ]);
        $waypoint3 = factory(App\Waypoint::class, 1)->create([
            'title' => 'Hermione Granger',
            'description' => '"cleverest witch of her age"',
            'content' => 'Hermione has been researching in the Restricted Section lately.',
            'image' => 'hermione.jpg',
            'point_value' => 100,
            'code' => 'tens of thousands of books',
        ]);
        $waypoint4 = factory(App\Waypoint::class, 1)->create([
            'title' => 'Dobby',
            'description' => 'House-elf and Harry Potter’s Loyal Friend',
            'content' => 'Dobby and Hermione don’t agree on the treatment of house-elves. It is a very controversial topic, with many opposing viewpoints. ',
            'image' => 'dobby.jpg',
            'point_value' => 100,
            'code' => 'right',
        ]);
        $waypoint5 = factory(App\Waypoint::class, 1)->create([
            'title' => 'Minerva McGonagall',
            'description' => 'Hogwarts Deputy Head-Mistress, Head of Gryffindor House, Transfiguration Professor',
            'content' => '<p>Professor McGonagall is greeting new students near the “Great Hall” or main entrance. Be sure to listen to her, she knows a lot about valuable resources for new students.</p>',
            'image' => 'mcgonagall.jpg',
            'point_value' => 100,
            'code' => 'once',
        ]);
        $waypoint6 = factory(App\Waypoint::class, 1)->create([
            'title' => 'Albus Dumbledore',
            'description' => 'Hogwarts Headmaster, Founder of the Order of the Phoenix',
            'content' => '<p>Professor Dumbledore as Headmaster knows the staff very well. He can list them all for you and tell you where all their offices are.</p>',
            'image' => 'dumbledore.jpg',
            'point_value' => 100,
            'code' => 'wizard',
        ]);
        $waypoint7 = factory(App\Waypoint::class, 1)->create([
            'title' => 'Filius Flitwick',
            'description' => 'Charms Professor',
            'content' => 'Professor Flitwick is selecting books for his charms class. He usually goes to a section of the library meant for smaller people, though most of the books are meant for younger audiences.',
            'image' => 'flitwick.jpg',
            'point_value' => 100,
            'code' => 'excited',
        ]);
        $waypoint8 = factory(App\Waypoint::class, 1)->create([
            'title' => 'Gilderoy Lockhart',
            'description' => 'ex-Defense Against the Dark Arts Professor, Current Patient of St. Mungo’s Hospital',
            'content' => 'Gilderoy Lockhart has come for a book signing for his most popular novel, “Magical Me.”',
            'image' => 'lockhart.jpg',
            'point_value' => 100,
            'code' => 'copies',
        ]);
        $waypoint9 = factory(App\Waypoint::class, 1)->create([
            'title' => 'Ron Weasley',
            'description' => 'Best Friend Extraordinaire',
            'content' => 'Ron Weasley is searching for his library research classroom. He said its near some bathrooms, which has him worried that Moaning Myrtle’s cries will distract him from listening to the professor.',
            'image' => 'ron.jpg',
            'point_value' => 100,
            'code' => 'doors',
        ]);
        $waypoint10 = factory(App\Waypoint::class, 1)->create([
            'title' => 'Arthur Weasley',
            'description' => 'Misuse of Muggle Artifacts Office',
            'content' => 'Have you seen Mr. Weasley’s new ‘webpage?’ He said it is one of the most impressive muggle inventions. He has created a whole database explaining some other muggle inventions he has found interesting.',
            'image' => 'weasley.jpg',
            'point_value' => 100,
            'code' => 'ingenious',
        ]);
        $waypoint11 = factory(App\Waypoint::class, 1)->create([
            'title' => 'Xenophilius Lovegood',
            'description' => 'Editor of <i>The Quibbler</i>',
            'content' => '<p>A rumor is being passed around that the first assignment in the History of Magic class is going to be writing a paper based on current news.</p><p>You can find the latest issue of <i>The Quibbler</i> fresh off the press.</p>',
            'image' => 'lovegood.jpg',
            'point_value' => 100,
            'code' => 'press',
        ]);
        $waypoint12 = factory(App\Waypoint::class, 1)->create([
            'title' => 'Remus Lupin',
            'description' => 'Werewolf; Member of The Order of the Phoenix',
            'content' => '<p>Professor Lupin is new to Hogwarts, and he seems to be very concerned with doing a good job. He has been reading some of the newest books in the library to catch up on methods of handling grindylows and boggarts.</p>',
            'image' => 'lupin.jpg',
            'point_value' => 100,
            'code' => 'corner',
        ]);

        /*$user = factory(App\User::class, 1)->create([
            'first_name' => 'Jon',
            'last_name' => 'Fackrell',
            'netid' => 'fackrelj',
            'email' => 'fackrellj@byui.edu',
            'password' => Hash::make('secret'),
            'remember_token' => str_random(10),
            'stage' => 'HUNT',
            'team_id' => 1,
            'points' => 0,
        ]);*/

    }
}
