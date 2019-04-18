<?php

namespace PPSpaces\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesDatabase;

    /**
     * To load your package service provider
     *
     * @param [mixed] $app
     * @return void
     */
    protected function getPackageProviders($app)
    {
        return ['PPSpaces\RepositoryServiceProvider'];
    }
}
