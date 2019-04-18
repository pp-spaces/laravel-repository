<?php

namespace PPSpaces\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @see \PPSpaces\Repositories\Repository
 */
class Repository extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'PPSpaces\Repositories\Repository';
    }
}
