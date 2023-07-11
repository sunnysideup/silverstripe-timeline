
<?php

namespace Sunnysideup\Timeline\Model\CarouselItems;

namespace Sunnysideu\Timeline\Model;

use Sunnysideu\Timeline\Model\CarouselItem;
use Sunnysideu\Timeline\Model\CarouselRelatedDocument;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\LiteralField;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class RelatedDocumentsCarouselItem extends CarouselItem
{
    private static $singular_name = 'Related Documents Carousel Item';
    private static $plural_name = 'Related Documents Carousel Items';
    private static $table_name = 'RelatedDocumentsCarouselItem';
    private static $db = [
        'Title' => 'Varchar(255)'
    ];
    private static $has_many = [
        'RelatedDocuments' => CarouselRelatedDocument::class,
    ];
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $gridField = GridField::create('RelatedDocuments', 'Related Document Links', $this->RelatedDocuments());
        $config = GridFieldConfig_RecordEditor::create();
        $gridField->setConfig($config);
        $gridField->getConfig()->addComponent(GridFieldOrderableRows::create('SortOrder'));
        if ($this->exists()) {
            $fields->addFieldsToTab('Root.Main', [
                $gridField
            ]);
        } else {
            $fields->addFieldToTab('Root.Main', LiteralField::create(
                'CarouselNotice',
                '<p><strong>Related Documents will be available once item has been saved.</strong></p>'
            ));
        }
        return $fields;
    }
}
