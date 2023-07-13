<?php

namespace Sunnysideup\Timeline\Model\Fields;

use SilverStripe\Core\Config\Config;
use SilverStripe\Forms\DropdownField;
use TractorCow\Colorpicker\Color;

class TimelineBackgroundColour extends TimelineNodeColour
{
    /**
     * @var array<string, string>
     */
    private static $colours = [];

    /**
     * @var array<string, string>
     */
    public const DEFAULT_COLOURS = [
        '#FF0000' => 'Red',
        '#0000FF' => 'Blue',
        '#00FF00' => 'Green',
        '#FFFFFF' => 'White',
        '#000000' => 'Black',
    ];

    public static function get_dropdown_field(?string $name = 'BackgroundColour', ?string $title = 'Node Colour'): DropdownField
    {
        $field = DropdownField::create(
            $name,
            $title,
            self::get_colours()
        );
        return $field;
    }

}
