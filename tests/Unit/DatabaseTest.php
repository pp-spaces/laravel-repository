<?php

namespace PPSpaces\Tests\Unit;

use PPSpaces\Tests\TestCase;
use PPSpaces\Tests\App\User;

/**
 * Class DatabaseTest
 */
class DatabaseTest extends TestCase
{
    public function test_it_uses_the_default_database_connection()
    {
        factory(User::class)->create();

        $connection = config('database.default');

        $user = User::first();


        $this->assertEquals($connection, $user->getConnectionName());
    }
}
