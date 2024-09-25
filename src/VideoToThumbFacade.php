<?php

namespace KSolutions\VideoToThumb;

use Illuminate\Support\Facades\Facade;

class VideoToThumbFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'videotothumb';
    }
}
