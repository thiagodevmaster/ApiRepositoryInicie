<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserSystemTest extends TestCase
{
    /**
     * @test
     */
    public function check_if_users_columns_is_correct()
    {
        $user = new User();
        $expect = [
            'name',
            'email',
            'password'
        ];

        $array_compared = array_diff($expect, $user->getFillable());

        $this->assertEquals(0, count($array_compared));
    }
}
