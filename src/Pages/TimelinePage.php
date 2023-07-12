<?php

namespace Sunnysideup\Timeline\Pages;

use SilverStripe\CMS\Controllers\ContentController;
use Sunnysideup\Timeline\Model\TimelineEntry;
use Page;

class TimelinePage extends Page
{
    private static $icon_class = 'font-icon-clock';

    public function canCreate($member = null, $context = array())
    {
        return TimelinePage::get()->count() ? false : true;
    }
}
