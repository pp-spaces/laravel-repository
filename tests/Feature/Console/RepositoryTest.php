<?php

namespace PPSpaces\Tests\Feature\Console;

use PPSpaces\Tests\App\User;
use PPSpaces\Tests\TestCase;

/**
 * Class DatabaseTest
 */
class RepositoryTest extends TestCase
{
    public function test_it_can_generate_repository_command()
    {
        $this->artisan('make:repository', [
            'name' => 'LogsRepository'
        ])->assertExitCode(0);
    }
}
