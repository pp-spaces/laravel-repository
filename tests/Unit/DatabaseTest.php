<?php

namespace PPSpaces\Tests\Unit;

use PPSpaces\Tests\TestCase;
use PPSpaces\Tests\App\User;

/**
 * Class DatabaseTest
 */
class DatabaseTest extends TestCase
{
    public function test_it_runs_the_migrations()
    {
        $connection = config('database.default');

        factory(User::class)->create();

        $user = User::first();

        $this->assertEquals($connection, $user->getConnectionName());
    }
}
