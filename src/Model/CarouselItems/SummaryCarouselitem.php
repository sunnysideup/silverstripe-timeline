<?php

namespace Sunnysideup\Timeline\Model\CarouselItems;

use Sunnysideup\Timeline\Model\CarouselItem;
use Sheadawson\Linkable\Forms\LinkField;
use Sheadawson\Linkable\Models\Link;
use SilverStripe\Assets\Image;
use Sunnysideup\PerfectCmsImages\Forms\PerfectCmsImagesUploadField;

class SummaryCarouselItem extends CarouselItem
{
    private static $singular_name = 'Summary Carousel Item';
    private static $plural_name = 'Summary Carousel Items';
    private static $table_name = 'SummaryCarouselItem';
    private static $db = [
        'Title' => 'Varchar(255)',
        'Summary' => 'Text',
    ];
    private static $has_one = [
        'Icon' => Image::class,
        'ProjectLink' => Link::class,
    ];
    private static $owns = [
        'Icon',
    ];
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldsToTab(
            'Root.Main',
            [
                PerfectCmsImagesUploadField::create('Icon', 'Summary Icon', null, 'CarouselSummaryIcon'),
                LinkField::create('ProjectLinkID', 'Project Page Link'),
            ]
        );
        return $fields;
    }
}
