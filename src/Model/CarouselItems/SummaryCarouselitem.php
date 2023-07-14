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

    private static $has_icon = false;
    private static $db = [
        'Summary' => 'Text',
    ];

    private static $has_one = [
        'Icon' => Image::class,
        'MoreInformation' => Link::class,
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
                LinkField::create('MoreInformationID', 'More information link'),
            ]
        );
        if($this->Config()->get('has_icon')) {
            $fields->addFieldsToTab(
                'Root.Main',
                [
                    PerfectCmsImagesUploadField::create('Icon', 'Summary Icon', null, 'CarouselSummaryIcon'),
                ]
            );
        } else {
            $fields->removeByName('Icon');
        }
        return $fields;
    }
}
