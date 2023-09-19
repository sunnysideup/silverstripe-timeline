<?php

namespace Sunnysideup\Timeline\Model;

use Sheadawson\Linkable\Forms\LinkField;
use SilverStripe\Core\ClassInfo;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Forms\DropdownField;
use Sunnysideup\Timeline\Model\TimelineEntry;
use SilverStripe\ORM\DataObject;
use Sunnysideup\DataObjectSorter\DataObjectOneFieldUpdateController;
use Sunnysideup\SelectedColourPicker\Forms\SelectedColourPickerFormFieldDropdown;
use Sunnysideup\Timeline\Model\CarouselItems\SummaryCarouselItem;
use Sunnysideup\Timeline\Model\Fields\TimelineBackgroundColour;

/**
 * Class \Sunnysideup\Timeline\Model\CarouselItem
 *
 * @property string $Title
 * @property Date $Date
 * @property string $Summary
 * @property string $BackgroundColour
 * @property int $TimelineEntryID
 * @method TimelineEntry TimelineEntry()
 */
class CarouselItem extends DataObject
{
    private static $singular_name = 'Carousel Item';

    private static $plural_name = 'Carousel Items';

    private static $table_name = 'CarouselItem';

    private static $db = [
        'Title' => 'Varchar(255)',
        'Date' => 'Date',
        'Summary' => 'Text',
        'BackgroundColour' => TimelineBackgroundColour::class,
    ];

    private static $has_one = [
        'TimelineEntry' => TimelineEntry::class,
    ];

    private static $default_sort = 'Date DESC';

    private static $indexes = [
        'Date' => true,
        'Title' => true,
    ];

    private static $summary_fields = [
        'ClassNameNice' => 'Type',
        'Title' => 'Title',
        'Date' => 'Date',
        'BackgroundColour.Nice' => 'Background Colour',
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

        $fields->addFieldsToTab(
            'Root.Colour',
            [
                 $fields->dataFieldByName('BackgroundColour'),
                 LinkField::create('ReadMoreLinkID', 'Read More Link'),
             ]
        );
        foreach(array_keys($this->Config()->get('db') + ['ClassName' => 'ClassName']) as $fieldName) {
            $tmpField = $fields->dataFieldByName($fieldName);
            if($tmpField) {
                $description = $tmpField->getDescription();
                $fieldTitle = $this->fieldLabels()[$fieldName] ?? $fieldName;
                $tmpField->setDescription(
                    implode(
                        '<br />',
                        array_filter([
                            $description,
                            DataObjectOneFieldUpdateController::popup_link(
                                static::class,
                                $fieldName,
                                'TimelineEntryID = ' . $this->TimelineEntryID,
                                '',
                                'Edit the \''.$fieldTitle.'\' field for all \''.$this->i18n_plural_name().'\' for \''.$this->TimelineEntry()->Title.'\''
                            )
                        ])
                    )
                );
            }
        }
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
            if(CarouselItem::class === $subClass) {
                $array[$subClass] = '--- please select ---';
            } else {
                $array[$subClass] = Injector::inst()->get($subClass)->singular_name();
            }
        }
        return $array;
    }

    public function getClassNameNice()
    {
        $list = $this->getAvailableTypes();
        return $list[$this->ClassName] ?? 'ERROR';
    }

    protected function onBeforeWrite()
    {
        parent::onBeforeWrite();
        if ($this->ClassName === CarouselItem::class) {
            $this->ClassName = SummaryCarouselItem::class;
        }
    }


    public function getFrontEndField($fieldName = null)
    {
        if($fieldName === 'BackgroundColour') {
            return DropdownField::create(
                'BackgroundColour',
                $this->fieldLabel('BackgroundColour'),
                $this->dbObject('BackgroundColour')->getColours()
            );
        }
        if($fieldName === 'ClassName') {
            return DropdownField::create(
                'ClassName',
                $this->fieldLabel('BackgroundColour'),
                $this->getAvailableTypes()
            );
        }
        return null;
    }


}
