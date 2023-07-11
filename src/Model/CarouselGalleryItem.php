<?php
namespace Sunnysideup\Timeline\Model;
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
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab('Root.Main', 'SortOrder');
        return $fields;
    }
    public function forTemplate()
    {
        return $this->renderWith('Sunnysideup/Timeline/Model/' . substr(strrchr(get_class($this), '\\'), 1));
    }
}
