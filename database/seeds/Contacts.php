<?php

use Illuminate\Database\Seeder;

class Contacts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Contact::class, 500)->create();
    }
}
