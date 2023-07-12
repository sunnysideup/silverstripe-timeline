<?php

namespace Sunnysideup\Timeline\Model\CarouselItem;

use Sunnysideup\Timeline\Model\BlogPost;
use Sunnysideup\Timeline\Model\CarouselItem;
use SilverStripe\Forms\DropdownField;

class BlogPostCarouselItem extends CarouselItem
{
    private static $singular_name = 'Blog Post Carousel Item';
    private static $plural_name = 'Blog Post Carousel Items';
    private static $table_name = 'BlogPostCarouselItem';
    private static $db = [
        'Title' => 'Varchar(255)'
    ];
    private static $has_one = [
        'BlogPost' => BlogPost::class,
    ];
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $blogPost = DropdownField::create('BlogPostID', 'Blog Post', BlogPost::get()->map('ID', 'Title'))->setEmptyString('(Select one)');
        $fields->addFieldsToTab('Root.Main', [
            $blogPost
        ]);
        return $fields;
    }
}
