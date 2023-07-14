<?php

namespace Sunnysideup\Timeline\Model\CarouselItems\SubItems;

use Sunnysideup\Timeline\Model\CarouselItems\RelatedDocumentsCarouselItem;
use Sheadawson\Linkable\Forms\LinkField;
use Sheadawson\Linkable\Models\Link;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataObject;
use Sunnysideup\PerfectCmsImages\Forms\PerfectCmsImagesUploadField;

class CarouselRelatedDocument extends DataObject
{
    private static $singular_name = 'Carousel Related Document';

    private static $plural_name = 'Carousel Related Documents';

    private static $table_name = 'CarouselRelatedDocument';

    private static $db = [
        'Title'=> 'Varchar(255)',
        'SortOrder' => 'Int',
        'Description' => 'Varchar(255)',
    ];
    private static $has_one = [
        'RelatedDocumentsCarouselItem' => RelatedDocumentsCarouselItem::class,
        'RelatedDocumentLink' => Link::class,
    ];
    private static $owns = [
        'RelatedDocumentLink',
    ];

    private static $field_labels = [
        'Title' => 'Title',
    ];

    private static $indexes = [
        'SortOrder' => true,
        'Title' => true,
    ];

    private static $casting = [
        'StyleClass' => 'Varchar',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldsToTab(
            'Root.Main',
            [
                TextField::create('Title', 'Title')->setDescription('Internal use only - identifies this block for CMS users.'),
                LinkField::create('RelatedDocumentLinkID', 'Related Document Link'),
                TextField::create('Description', 'Description')->setDescription('Description of the related document.'),
            ]
        );
        $fields->dataFieldByName('Title')->setReadonly(true);
        $fields->removeFieldFromTab('Root.Main', 'SortOrder');
        return $fields;
    }
    public function forTemplate()
    {
        return $this->renderWith('Sunnysideup/Timeline/Model/CarouselItems/SubItems/CarouselRelatedDocument');
    }

    public function getStyle(): string
    {
        return (string) $this->RelatedDocumentsCarouselItem()?->Style;
    }

    public function getStyleClass(): string
    {
        return strtolower((string) $this->getStyle());
    }

    /**
     * Event handler called before writing to the database.
     *
     * @uses DataExtension->onAfterWrite()
     */
    public function onBeforeWrite()
    {
        parent::onBeforeWrite();
        $this->Title = $this->RelatedDocumentLink()->Title;
    }

}
