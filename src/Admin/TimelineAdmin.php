<?php

namespace Sunnysideup\Timeline\Admin;

use Sunnysideup\Timeline\Model\TimelineEntry;
use SilverStripe\Admin\ModelAdmin;
use SilverStripe\Forms\LiteralField;
use SilverStripe\ORM\DataObject;
use Sunnysideup\Timeline\Model\CarouselItem;
use Sunnysideup\Timeline\Pages\TimelinePage;

/**
 * Class \Sunnysideup\Timeline\Admin\TimelineAdmin
 *
 */
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
        $page = DataObject::get_one(TimelinePage::class, ['ShowAll' => true]);
        if($page) {
            $form->Fields()->push(
                LiteralField::create(
                    'TimelineInfo',
                    '<p>View a list of <a href="">All Entries</a>.</p>'
                )
            );
        }
        return $form;
    }

}
