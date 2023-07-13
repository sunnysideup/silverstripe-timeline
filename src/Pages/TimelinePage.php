<?php

namespace Sunnysideup\Timeline\Pages;

use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\Forms\FieldList;
use Sunnysideup\Timeline\Model\TimelineEntry;
use Page;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class TimelinePage extends Page
{
    private static $icon_class = 'font-icon-clock';

    public function canCreate($member = null, $context = array())
    {
        return TimelinePage::get()->count() ? false : true;
    }

    /**
     * CMS Fields
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldsToTab(
            'Root.Timeline',
            [
                GridField::create(
                    'TimelineEntries',
                    'Timeline Entries',
                    TimelineEntry::get(),
                    GridFieldConfig_RecordEditor::create()
                )
            ]
        );
        return $fields;
    }

}
