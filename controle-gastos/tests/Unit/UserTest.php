<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    public function setUser(): array
    {
        $user = new User ([
            'name' => 'Testando Um',
            'email' => 'teste@email.com',
            'password' => '123456'
        ]);

        return [[$user]];
    }
    /**
     * A basic unit test example.
     * @dataProvider setUser
     * @return void
     */
    public function testHasKeys(User $user)
    {
        $this->assertIsObject($user);
        $this->assertArrayHasKey('name', $user);
        $this->assertArrayHasKey('email', $user);
        $this->assertArrayHasKey('password', $user);
    }

    /**
     * A basic unit test example.
     * @dataProvider setUser
     * @return void
     */
    public function testIsEmail(User $user)
    {
        $this->assertSame($user->email, filter_var($user->email, FILTER_VALIDATE_EMAIL));
    }

    /**
     * A basic unit test example.
     * @dataProvider setUser
     * @return void
     */
    public function testPasswordLength(User $user)
    {
        
    }
}
