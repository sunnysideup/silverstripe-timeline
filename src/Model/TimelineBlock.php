<?php
namespace Sunnysideup\Timeline\Model;

if(class_exists('DNADesign\Elemental\Models\BaseElement')) {

    use DNADesign\Elemental\Models\BaseElement;
    use Sunnysideup\Timeline\Model\TimelineEntry;
    use SilverStripe\Forms\TextField;

    class TimelineBlock extends BaseElement
    {
        private static $table_name = 'TimelineBlock';

        private static $singular_name = 'Timeline Block';

        private static $plural_name = 'Timeline Blocks';

        private static $description = 'Show a timeline of events';

        private static $icon = 'font-icon-clock';

        private static $has_many = [
            'TimelineEntries' => TimelineEntry::class,
        ];

        private static $default_values = [
            'TopPadding' => 'none',
            'BottomPadding' => 'none',
        ];

        private static $inline_editable = false;

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            return $fields;
        }

        /**
         * @return string
         */
        public function getType()
        {
            return 'Timeline Block';
        }
    }
}
