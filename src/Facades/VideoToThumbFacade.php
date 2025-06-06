<?php

namespace KSolutions\VideoToThumb\Facades;

use Illuminate\Support\Facades\Facade;

class VideoToThumbFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'videotothumb';
    }
}
