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

    public function test_it_can_generate_model_repository_command()
    {
        $this->artisan('make:repository', [
            'name' => 'UserRepository',
            '--model' => 'User',
            '--no-interaction'
        ])
            // ->expectsQuestion('A App\User model does not exist. Do you want to generate it? (yes/no)', 'yes')
            // ->expectsOutput('Model created successfully.')
            // ->expectsOutput('Repository created successfully.')
            ->assertExitCode(0);
    }
}
