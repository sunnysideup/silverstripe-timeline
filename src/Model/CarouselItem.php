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

    private static $has_one = [
        'TimelineEntry' => TimelineEntry::class,
    ];

    private static $default_sort = [
        'SortOrder' => 'ASC',
    ];

    private static $indexes = [
        'SortOrder' => true,
        'Title' => true,
    ];

    private static $summary_fields = [
        'ClassNameNice' => 'Type',
        'Title' => true,
    ];


    private static $casting = [
        'ClassNameNice' => 'Varchar',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldsToTab(
            'Root.Main',
            [
                DropdownField::create(
                    'ClassName',
                    'Type',
                    $this->getAvailableTypes()
                )
                // ->setEmptyString('--- ERROR ---')
            ],
            'Title'
        );

        if($this->exists()) {
            $fields->replaceField('TimelineEntryID', $fields->dataFieldByName('TimelineEntryID')->performReadonlyTransformation());
            $fields->replaceField('ClassName', $fields->dataFieldByName('ClassName')->performReadonlyTransformation());
        }

        $fields->removeFieldFromTab('Root.Main', 'SortOrder');
        return $fields;
    }

    public function forTemplate()
    {
        return $this->renderWith(str_replace('\\', '/', get_class($this)));
    }

    public function getAvailableTypes(): array
    {
        $array = [];
        $subClasses = ClassInfo::subclassesFor(CarouselItem::class, true);
        foreach ($subClasses as $key => $subClass) {
            $array[$subClass] = Injector::inst()->get($subClass)->singular_name();
        }
        return $array;
    }

    public function getClassNameNice()
    {
        $list = $this->getAvailableTypes();
        return $list[$this->ClassName] ?? 'ERROR';
    }

}
