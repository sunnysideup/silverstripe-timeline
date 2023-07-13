<?php

namespace Sunnysideup\Timeline\Admin;

use Sunnysideup\Timeline\Model\TimelineEntry;
use SilverStripe\Admin\ModelAdmin;
use SilverStripe\Forms\LiteralField;
use SilverStripe\ORM\DataObject;
use Sunnysideup\Timeline\Model\CarouselItem;
use Sunnysideup\Timeline\Pages\TimelinePage;

class TimelineAdmin extends ModelAdmin
{
    private static $managed_models = [
        TimelineEntry::class,
        CarouselItem::class,
    ];


    private static $url_segment = 'timeline';

    private static $menu_title = 'Time Line';

    private static $menu_icon_class = 'font-icon-clock';

    private static $menu_priority = 1;


    public function getEditForm($id = null, $fields = null)
    {
        $form = parent::getEditForm($id, $fields);
        $page = DataObject::get_one(TimelinePage::class);
        if($page) {
            $form->Fields()->push(
                LiteralField::create(
                    'TimelineInfo',
                    '<p>Use the <a href="">Timeline Full List</a> page to view the timeline.</p>'
                )
            );
        }
        return $form;
    }

}
