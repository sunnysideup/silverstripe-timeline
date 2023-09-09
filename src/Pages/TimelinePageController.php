<?php

namespace Sunnysideup\Timeline\Pages;

use SilverStripe\CMS\Controllers\ContentController;
use Sunnysideup\Timeline\Model\TimelineEntry;
use PageController;
use SilverStripe\Control\Director;
use SilverStripe\View\Requirements;

/**
 * Class \Sunnysideup\Timeline\Pages\TimelinePageController
 *
 * @property TimelinePage $dataRecord
 * @method TimelinePage data()
 * @mixin TimelinePage
 */
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
        // if(Director::isDev()) {
        //     Requirements::javascript('sunnysideup/timeline: client/dist/runtime.js');
        // }
        // Requirements::javascript('sunnysideup/timeline: client/dist/app.js');
        Requirements::css('sunnysideup/timeline: client/dist/main.css');
    }


}
