<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;


class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }


    public function testDatabase()
    {
        $user = factory(User::class)->make();
    }

    public function testNewUserRegistration()
    {
        $this->visit(route('register'))
            ->type('firstName', 'firstName')
            ->type('secondName', 'secondName')
            ->type('familyName', 'familyName')
            ->type('123456789', 'id_number')
            ->type('1@1', 'email')
            ->type('1231adsdas', 'password')
            ->type('0592231497', 'phoneNumber')
            ->type('01', 'area')
            ->type('0101', 'mosque')
            ->type('0101', 'group')
            ->type('0101', 'hqmcm_id')
            ->type('area_admin', 'user_type')
            ->press('تسجيل')
            ->seePageIs('/register');
    }

}
