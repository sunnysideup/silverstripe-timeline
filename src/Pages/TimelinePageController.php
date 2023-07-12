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

    public function TimelineEntries()
    {
        return TimelineEntry::get();
    }

    protected function init()
    {
        parent::init();
        Requirements::javascript('sunnysideup/timeline: client/dist/app.js');
        Requirements::css('sunnysideup/timeline: client/dist/main.css');
    }


}
