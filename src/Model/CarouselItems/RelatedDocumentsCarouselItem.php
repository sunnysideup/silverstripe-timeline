<?php

namespace Sunnysideup\Timeline\Model\CarouselItems;

use Sunnysideup\Timeline\Model\CarouselItem;
use Sunnysideup\Timeline\Model\CarouselItems\SubItems\CarouselRelatedDocument;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\LiteralField;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

/**
 * Class \Sunnysideup\Timeline\Model\CarouselItems\RelatedDocumentsCarouselItem
 *
 * @property string $Style
 * @method DataList|CarouselRelatedDocument[] RelatedDocuments()
 */
class RelatedDocumentsCarouselItem extends CarouselItem
{
    private static $singular_name = 'Related Documents / Links Carousel Item';

    private static $plural_name = 'Related Documents / Links Carousel Items';

    private static $table_name = 'RelatedDocumentsCarouselItem';

    private static $db = [
        'Style' => 'Enum("Documents, Links", "Documents")',
    ];

    private static $has_many = [
      'RelatedDocuments' => CarouselRelatedDocument::class,
    ];

    private static $summary_fields = [
        'RelatedDocuments.Count' => 'Number of Docs',
    ];
    private static $casting = [
        'StyleClass' => 'Varchar',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $gridField = $fields->fieldByName('RelatedDocuments');
        if($gridField) {
            $gridField->getConfig()->addComponent(GridFieldOrderableRows::create('SortOrder'));
            $fields->addFieldsToTab('Root.RelatedDocuments', [
                $gridField
            ]);
        } else {
            $fields->addFieldToTab('Root.RelatedDocuments', LiteralField::create(
                'CarouselNotice',
                '<p><strong>Related Documents will be available once item has been saved.</strong></p>'
            ));
        }
        $fields->fieldByName('Root.RelatedDocuments')->setTitle($this->Style);
        return $fields;
    }

    public function getStyleClass(): string
    {
        return strtolower((string) $this->Style);
    }

}
