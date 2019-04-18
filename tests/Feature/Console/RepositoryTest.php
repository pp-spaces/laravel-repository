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
        ])
            ->expectsOutput('Repository created successfully.')
            ->assertExitCode(0);
    }

    public function test_it_can_generate_model_repository_command()
    {
        $this->artisan('make:repository', [
            'name' => 'UserRepository',
            '--model' => 'PPSpaces\Tests\App\User'
        ])
            ->expectsOutput('Repository created successfully.')
            ->assertExitCode(0);
    }
}
