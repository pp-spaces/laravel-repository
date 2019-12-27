<?php

namespace PPSpaces\Tests\Feature\App;

use PPSpaces\Tests\App\User;
use PPSpaces\Tests\TestCase;
use PPSpaces\Tests\App\Http\Repositories\UserRepository;

/**
 * Class DatabaseTest
 */
class RepositoryTest extends TestCase
{
    public function test_it_get_all_data_from_repository()
    {
        // When we have 50 users
        $users = factory(User::class, 50)->create();

        // Then make make the repository
        $users = new UserRepository();

        // Should give us all available users
        $this->assertCount(50, $users->get());
    }
}
