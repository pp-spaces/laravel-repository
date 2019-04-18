<?php

namespace PPSpaces\Tests\Unit;

use PPSpaces\Tests\TestCase;
use PPSpaces\Tests\App\User;

/**
 * Class DatabaseTest
 */
class DatabaseTest extends TestCase
{
    public function test_it_can_migrate_test_database()
    {
        $connection = config('database.default');

        factory(User::class)->create();

        $user = User::first();

        $this->assertEquals($connection, $user->getConnectionName());
    }
}
