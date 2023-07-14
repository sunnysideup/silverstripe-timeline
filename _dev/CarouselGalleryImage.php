<?php

namespace Sunnysideup\Timeline\Model\CarouselItems\SubItems;

use Sunnysideup\Timeline\Model\CarouselItems\GalleryCarouselItem;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataObject;
use Sunnysideup\PerfectCmsImages\Forms\PerfectCmsImagesUploadField;

class CarouselGalleryImage extends DataObject
{
    private static $singular_name = 'Carousel Gallery Image';
    private static $plural_name = 'Carousel Gallery Images';
    private static $table_name = 'CarouselGalleryImage';
    private static $db = [
        'Title'=> 'Varchar(255)',
        'SortOrder' => 'Int',
    ];
    private static $has_one = [
        'GalleryCarouselItem' => GalleryCarouselItem::class,
        'GalleryTileImage' => Image::class,
        'GalleryFullImage' => Image::class,
    ];
    private static $owns = [
        'GalleryTileImage',
        'GalleryFullImage',
    ];
    private static $field_labels = [
        'Title' => 'Title',
    ];

    private static $default_sort = [
        'SortOrder' => 'ASC',
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
                TextField::create('Title', 'Title')->setDescription('Use the Title to identify the Gallery Images in the list, as well as the title for the cover image.'),
                PerfectCmsImagesUploadField::create('GalleryTileImage', 'Gallery Tile Image', null, 'CarouselGalleryTileImage'),
                PerfectCmsImagesUploadField::create('GalleryFullImage', 'Gallery Full Image', null, 'CarouselGalleryFullImage'),
            ]
        );
        $fields->removeFieldFromTab('Root.Main', 'SortOrder');
        return $fields;
    }
    public function forTemplate()
    {
        return $this->renderWith('Sunnysideup/Timeline/Model/CarouselItems/SubItems/CarouselGalleryImage');
    }
}
