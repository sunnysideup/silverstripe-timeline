<?php

namespace Sunnysideup\Timeline\Model;

use Sunnysideup\Timeline\Admin\TimelineAdmin;
use Sunnysideup\Timeline\Blocks\TimelineBlock;
use Sunnysideup\Timeline\Model\CarouselItem;
use Sheadawson\Linkable\Forms\LinkField;
use Sheadawson\Linkable\Models\Link;
use SilverStripe\Core\ClassInfo;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldAddNewButton;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\LiteralField;
use SilverStripe\ORM\DataObject;
use Sunnysideup\Timeline\Model\Fields\TimelineNodeColour;
use Symbiote\GridFieldExtensions\GridFieldAddNewMultiClass;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
use UncleCheese\DisplayLogic\Forms\Wrapper;

class TimelineEntry extends DataObject
{
    //######################
    //## Names Section
    //######################
    private static $singular_name = 'Time Line Entry';

    private static $plural_name = 'Time Line Entries';

    private static $table_name = 'TimelineEntry';
    //######################
    //## Model Section
    //######################
    private static $db = [
        'Title' => 'Varchar',
        'DateForOrdering' => 'Date',
        'Description' => 'Text',
        'EntryType' => 'Enum("Read more, Carousel", "Carousel")',
        'Position' => 'Enum("Left, Right", "Right")',
        'NodeColour' => TimelineNodeColour::class,
    ];

    private static $has_one = [
        // 'TimelineBlock' => TimelineBlock::class,
        'ReadMoreLink' => Link::class,
    ];

    private static $has_many = [
        'CarouselItems' => CarouselItem::class,
    ];

    //######################
    //## Further DB Field Details
    //######################
    private static $owns = [
        'ReadMoreLink',
    ];
    private static $indexes = [
        'DateForOrdering' => true,    // for sortable gridfield
    ];

    private static $default_sort = [
        'DateForOrdering' => 'DESC',
    ];
    //######################
    //## Field Names and Presentation Section
    //######################
    private static $field_labels = [
        // 'TimelineBlock' => 'Block',
        'Title' => 'Date Title',
        'DateForOrdering' => 'Date for sort purposes',
        'Position' => 'Entry Position'
    ];
    private static $summary_fields = [
        'Title' => 'Date Title',
        'DateForOrdering.Nice' => 'Date',
        // 'TimelineBlock.Title' => 'Block',
        'Position' => 'Entry Position'
    ];

    private static $primary_model_admin_class = TimelineAdmin::class;

    public function CMSEditLink()
    {
        $controller = Injector::inst()->get($this->Config()->get('primary_model_admin_class'));
        return $controller->Link() . $this->ClassName . '/EditForm/field/' . $this->ClassName . '/item/' . $this->ID . '/edit';
    }

    public function CMSAddLink()
    {
        $controller = Injector::inst()->get($this->Config()->get('primary_model_admin_class'));
        return $controller->Link() . $this->ClassName . '/EditForm/field/' . $this->ClassName . '/item/new';
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $config = GridFieldConfig_RelationEditor::create();
        $gridField = GridField::create('CarouselItems', 'Carousel Items', $this->CarouselItems(), $config);
        // $gridFieldAddNewMultiClass = new GridFieldAddNewMultiClass();
        // $gridField->getConfig()->addComponent(GridFieldOrderableRows::create('SortOrder'));
        // ->addComponent($gridFieldAddNewMultiClass->setClasses($subClasses));
        $fields->addFieldsToTab(
            'Root.Main',
            [
                TimelineNodeColour::get_dropdown_field('NodeColour', 'Node Colour')->displayIf('EntryType')->isEqualTo('Carousel')->end(),
                LinkField::create('ReadMoreLinkID', 'Read More Link')->hideUnless('EntryType')->isEqualTo('Read more')->end(),
            ]
        );
        if ($this->exists()) {
            $fields->removeByName('CarouselItems');
            $fields->addFieldToTab('Root.Main', $gridField);
            $fields->replaceField('CarouselItems', Wrapper::create($gridField)->displayIf('EntryType')->isEqualTo('Carousel')->end());
        } else {
            $carouselNotice = LiteralField::create(
                'CarouselNotice',
                '<p><strong>Carousel items will be available once entry has been saved.</strong></p>'
            );
            if(class_exists(TimelineBlock::class)) {
                $fields->insertAfter(
                    'TimelineBlock',
                    Wrapper::create($carouselNotice)
                    ->displayIf('EntryType')
                    ->isEqualTo('Carousel')
                    ->end()
                );
            }
        }
        return $fields;
    }
    public function NodeColour()
    {
        return str_replace(' ', '-', $this->dbObject('NodeColour')->CssClass());
    }
    public function EntryPosition()
    {
        return strtolower($this->dbObject('Position'));
    }
    public function EntryType()
    {
        return strtolower(str_replace(' ', '-', $this->dbObject('EntryType')));
    }
    public function EntryTense()
    {
        return $this->dbObject('DateForOrdering') <= date('Y-m-d') ? 'past' : 'future';
    }
}
