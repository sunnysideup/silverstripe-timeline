<?php

namespace Sunnysideup\Timeline\Control;

use SilverStripe\CMS\Controllers\ContentController;
use Sunnysideup\Timeline\Model\TimelineEntry;

class TimelineController extends ContentController
{
    private static $allowed_actions = [
        'index',
    ];

    private static $url_segment = 'timeline-full-list';
    private static $enable = true;

    public function index()
    {
        if(! $this->Config()->get('enable')) {
            return $this->httpError(404);
        }
        return $this->renderWith('Sunnysideup\Timeline\Control\TimelineController');
    }

    public function TimelineEntries()
    {
        return TimelineEntry::get();
    }

}
