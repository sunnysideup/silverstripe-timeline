<?php

namespace Sunnysideup\Timeline\Model;

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
        'RelatedDocumentIcon' => Image::class,
        'RelatedDocumentLink' => Link::class,
    ];
    private static $owns = [
        'RelatedDocumentIcon',
        'RelatedDocumentLink',
    ];
    private static $field_labels = [
        'Title' => 'Title',
    ];

    private static $indexes = [
        'SortOrder' => true,
        'Title' => true,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldsToTab(
            'Root.Main',
            [
                PerfectCmsImagesUploadField::create('RelatedDocumentIcon', 'Related Document Icon', null, 'CarouselRelatedDocumentIcon'),
                TextField::create('Title', 'Title')->setDescription('Internal use only - identifies this block for CMS users.'),
                LinkField::create('RelatedDocumentLinkID', 'Related Document Link'),
                TextField::create('Description', 'Description')->setDescription('Description of the related document.'),
            ]
        );
        $fields->removeFieldFromTab('Root.Main', 'SortOrder');
        return $fields;
    }
    public function forTemplate()
    {
        return $this->renderWith('Sunnysideup/Timeline/Model/CarouselItems/SubItems/CarouselRelatedDocument');
    }
}
