<?php

namespace Sunnysideup\Timeline\Admin;

use Sunnysideup\Timeline\Model\TimelineFullEntry;
use SilverStripe\Admin\ModelAdmin;

class TimelineAdmin extends ModelAdmin
{
    private static $managed_models = [
        TimelineFullEntry::class,
    ];
    private static $url_segment = 'timeline';
    private static $menu_title = 'Time Line';
    private static $icon_class = 'font-icon-clock';
}
