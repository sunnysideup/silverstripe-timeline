<?php

namespace Sunnysideup\Timeline\Model\CarouselItems;

use Sheadawson\Linkable\Forms\LinkField;
use Sheadawson\Linkable\Models\Link;
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

    private static $db = [
        'Title' => 'Varchar(255)',
        'Description' => 'Varchar(255)',
        'Type' => 'Enum("Inset, Background", "Background")'
    ];

    private static $has_one = [
        'Image' => Image::class,
        'MoreInformation' => Link::class,
    ];

    private static $owns = [
        'Image',
        'MoreInformation',
    ];

    private static $cascade_deletes = [
        'Image',
        'MoreInformation',
    ];

    private static $summary_fields = [
        'Type' => 'Type',
    ];

    private static $defaults = [
        'Type' => 'Background',
    ];

    private static $casting = [
        'TypeClass' => 'Varchar',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldsToTab(
            'Root.Main',
            [
                PerfectCmsImagesUploadField::create('Image', 'Image', null, 'CarouselImageImage'),
                LinkField::create('MoreInformationID', 'More information link'),
            ]
        );
        $fields->removeByName('Type');
        return $fields;
    }
    // public function getCMSCompositeValidator(): CompositeValidator
    // {
    //     $compositeValidator = parent::getCMSCompositeValidator();
    //     $compositeValidator->addValidator(RequiredFields::create(['Image']));
    //     return $compositeValidator;
    // }
    public function IsInset(): bool
    {
        return $this->Type === 'Inset';
    }

    public function IsBackground(): bool
    {
        return ! $this->IsInset();
    }

    public function getTypeClass(): string
    {
        return strtolower((string)$this->Type);
    }

    public function HasTextContent(): bool
    {
        return (bool) $this->Title || $this->Description || $this->MoreInformationID;
    }
}
