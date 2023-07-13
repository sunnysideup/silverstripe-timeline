<?php

namespace Sunnysideup\Timeline\Model\Fields;

use SilverStripe\Forms\DropdownField;
use TractorCow\Colorpicker\Color;

class NodeColour extends Color
{
    private static $casting = [
        'CssClass' => 'Varchar',
    ];

    public function CssClass()
    {
        return $this->getCssClass();
    }

    /**
     * @var array<string, string>
     */
    public const COLOURS = [
        '#00446B' => 'Dark Blue',
    ];

    public static function get_dropdown_field(?string $name = 'NodeColour', ?string $title = 'Node Colour'): DropdownField
    {
        $field = DropdownField::create(
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
