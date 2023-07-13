<?php

namespace Sunnysideup\Timeline\Model\CarouselItems;

use Sunnysideup\Timeline\Model\CarouselItem;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\CompositeValidator;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\TextField;
use Sunnysideup\PerfectCmsImages\Forms\PerfectCmsImagesUploadField;

class ImageCarouselItem extends CarouselItem
{
    private static $singular_name = 'Image Carousel Item';

    private static $plural_name = 'Image Carousel Items';

    private static $table_name = 'ImageCarouselItem';

    private static $has_one = [
        'Image' => Image::class,
    ];

    private static $owns = [
        'Image',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldsToTab(
            'Root.Main',
            [
                TextField::create('Title', 'Title')->setDescription('Title is not displayed, only used for identification of the item in the CMS.'),
                PerfectCmsImagesUploadField::create('Image', 'Carousel Image Image', null, 'CarouselImageImage'),
            ]
        );
        return $fields;
    }
    // public function getCMSCompositeValidator(): CompositeValidator
    // {
    //     $compositeValidator = parent::getCMSCompositeValidator();
    //     $compositeValidator->addValidator(RequiredFields::create(['Image']));
    //     return $compositeValidator;
    // }
}
