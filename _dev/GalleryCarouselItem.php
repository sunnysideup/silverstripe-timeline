<?php

namespace Sunnysideup\Timeline\Model\CarouselItems;

use Sunnysideup\Timeline\Model\CarouselItem;
use Sunnysideup\Timeline\Model\CarouselItems\SubItems\CarouselGalleryImage;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\TextField;
use Sunnysideup\PerfectCmsImages\Forms\PerfectCmsImagesUploadField;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class GalleryCarouselItem extends CarouselItem
{
    private static $singular_name = 'Gallery Carousel Item';

    private static $plural_name = 'Gallery Carousel Items';

    private static $table_name = 'GalleryCarouselItem';

    private static $has_many = [
        'GalleryImages' => CarouselGalleryImage::class,
    ];

    private static $owns = [
        'GalleryImages',
    ];

    private static $summary_fields = [
        'GalleryImages.Count' => 'Gallery Images',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $gridField = GridField::create('GalleryImages', 'Gallery Images', $this->GalleryImages());
        $config = GridFieldConfig_RecordEditor::create();
        $gridField->setConfig($config);
        $gridField->getConfig()->addComponent(GridFieldOrderableRows::create('SortOrder'));
        $fields->addFieldToTab(
            'Root.Main',
            TextField::create('Title', 'Title')
                ->setDescription('For internal use - to identify this Carousel item in the list.'),
        );
        if ($this->exists()) {
            $fields->removeByName('GalleryImages');
            $fields->addFieldToTab('Root.Main', $gridField);
        } else {
            $galleryNotice = LiteralField::create(
                'GalleryNotice',
                '<p><strong>Gallery images will be available once Gallery Carousel Item has been created.</strong></p>'
            );
            $fields->insertAfter('TimelineEntry', $galleryNotice);
        }
        return $fields;
    }
}
