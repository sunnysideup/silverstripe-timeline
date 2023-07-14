<?php

namespace Sunnysideup\Timeline\Pages;

use SilverStripe\CMS\Controllers\ContentController;
use Sunnysideup\Timeline\Model\TimelineEntry;
use PageController;
use SilverStripe\View\Requirements;

class TimelinePageController extends PageController
{
    private static $allowed_actions = [
        'index',
    ];

    public function index()
    {
        return [];
    }

    protected function init()
    {
        parent::init();
        // Requirements::javascript('sunnysideup/timeline: client/dist/runtime.js');
        // Requirements::javascript('sunnysideup/timeline: client/dist/app.js');
        Requirements::css('sunnysideup/timeline: client/dist/main.css');
    }


}
