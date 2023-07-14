<?php

namespace Sunnysideup\Timeline\Pages;

use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\Forms\FieldList;
use Sunnysideup\Timeline\Model\TimelineEntry;
use Page;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class TimelinePage extends Page
{
    private static $icon_class = 'font-icon-clock';

    private static $table_name = 'TimelinePage';
    private static $db = [
        'ShowAll' => 'Boolean',
    ];
    private static $many_many = [
        'TimelineEntries' => TimelineEntry::class,
    ];

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
                CheckboxField::create(
                    'ShowAll',
                    'Show All Timeline Entries'
                )
            ],
            'TimelineEntries'
        );
        if($this->ShowAll) {
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
        } else {
            $fields->addFieldsToTab(
                'Root.Timeline',
                [
                    GridField::create(
                        'TimelineEntries',
                        'Timeline Entries',
                        $this->TimelineEntries(),
                        GridFieldConfig_RelationEditor::create()
                    )
                ]
            );

        }
        return $fields;
    }

}
