<?php

namespace Sunnysideup\Timeline\Model;

use SilverStripe\Core\ClassInfo;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Forms\DropdownField;
use Sunnysideup\Timeline\Model\TimelineEntry;
use SilverStripe\ORM\DataObject;

class CarouselItem extends DataObject
{
    private static $singular_name = 'Carousel Item';

    private static $plural_name = 'Carousel Items';

    private static $table_name = 'CarouselItem';

    private static $db = [
        'SortOrder' => 'Int',
        'Title' => 'Varchar(255)'
    ];

    private static $default_sort = [
        'SortOrder' => 'ASC',
    ];

    private static $indexes = [
        'SortOrder' => true,
        'Title' => true,
    ];

    private static $has_one = [
        'TimelineEntry' => TimelineEntry::class,
    ];
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        if(! $this->exists()) {
            $fields->addFieldsToTab(
                'Root.Main',
                [
                    DropdownField::create(
                        'ClassName',
                        'Type',
                        $this->getAvailableTypes()
                    )
                ],
                'Title'
            );
        } else {
            $fields->replaceField('TimelineEntryID', $fields->dataFieldByName('TimelineEntryID')->performReadonlyTransformation());
        }
        $fields->removeFieldFromTab('Root.Main', 'SortOrder');
        return $fields;
    }
    public function forTemplate()
    {
        return $this->renderWith('Sunnysideup/Timeline/Model/' . substr(strrchr(get_class($this), '\\'), 1));
    }

    public function getAvailableTypes(): array
    {
        $array = [];
        $subClasses = ClassInfo::subclassesFor(CarouselItem::class, false);
        foreach ($subClasses as $key => $subClass) {
            $array[$subClass] = Injector::inst()->get($subClass)->singular_name();
        }
        return $array;
    }
}
