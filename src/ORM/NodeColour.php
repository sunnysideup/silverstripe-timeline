<?php
namespace Sunnysideup\Timeline\Model\Fields;
use Sunnysideup\Timeline\Forms\ColourSelector;
use SilverStripe\Forms\DropdownField;
class NodeColour extends MyColour
{
    /**
     * @var array<string, string>
     */
    public const COLOURS = [
        '#00446B' => 'Dark Blue 100',
        '#A5CE4F' => 'Green 100',
        '#2BBCF2' => 'Light Blue 100',
        '#3BC2BB' => 'Teal 100',
    ];
    public static function get_dropdown_field(?string $name = 'NodeColour', ?string $title = 'Node Colour'): DropdownField
    {
        $field = ColourSelector::create(
            $name,
            $title,
            self::COLOURS
        );
        return $field;
    }
    public function scaffoldFormField($title = null, $params = null)
    {
        return self::get_dropdown_field(
            $this->name,
            $title
        );
    }
    public function getCssClass()
    {
        return strtolower(self::COLOURS[$this->value] ?? 'error-in-finding-colour');
    }
}
