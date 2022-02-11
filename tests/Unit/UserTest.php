<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\DB;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login_form()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_user_duplication()
    {
        $user1 = User::make([
            'name'=> 'Faithful',
            'email' => 'faithful@gmail.com'
        ]);

        $user2 = User::make([
            'name'=> 'Bola',
            'email' => 'bolanle@gmail.com'
        ]);

        $this->assertTrue($user1->name != $user2->name);
    }

    public function test_delete_user()
    {
        $user = User::factory()->count(1)->make();

        $user = User::first();

        if($user) {
            $user->delete();
        }

        $this->assertTrue(true);
    }

    public function test_it_stores_new_users()
    {
        $response = $this->post('/register', [
            'name' => 'Faith',
            'email' => 'ugbeshefaith@gmail.com',
            'password' => '1234'
            
        ]);

        $response->assertRedirect('/');
    }

    public function test_if_data_does_not_exist_in_the_database() 
    {
        $this->assertDatabaseMissing('users', [
            'name' => 'John'
        ]);
    }
}
 