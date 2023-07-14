<?php

namespace Sunnysideup\Timeline\Model\Fields;

use SilverStripe\Core\Config\Config;
use SilverStripe\Forms\DropdownField;
use TractorCow\Colorpicker\Color;

class TimelineNodeColour extends Color
{
    private static $casting = [
        'CssClass' => 'Varchar',
        'ReadableColor' => 'Varchar',
    ];


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
    ];

    public static function get_dropdown_field(?string $name = 'NodeColour', ?string $title = 'Node Colour'): DropdownField
    {
        $field = DropdownField::create(
            $name,
            $title,
            self::get_colours()
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


    public function CssClass(): string
    {
        return $this->getCssClass();
    }

    public function getCssClass(): string
    {
        $colours = self::get_colours();
        return strtolower($colours[$this->value] ?? 'error-in-finding-colour');
    }

    public static function get_colours(): array
    {
        return (array) Config::inst()->get(static::class, 'colours', Config::UNINHERITED) ?: static::DEFAULT_COLOURS;
    }


    public function ReadableColor(): string
    {
        return $this->getReadableColor();
    }
    public function getReadableColor(): string
    {
        // Remove '#' if it's present
        $hexColor = ltrim((string) $this->value, '#');

        // Check if the color is valid
        if(strlen($hexColor) == 6) {
            // Convert the color from hexadecimal to RGB
            $r = hexdec(substr($hexColor, 0, 2)) / 255;
            $g = hexdec(substr($hexColor, 2, 2)) / 255;
            $b = hexdec(substr($hexColor, 4, 2)) / 255;

            // Calculate the relative luminance
            $luminance = 0.2126 * $r + 0.7152 * $g + 0.0722 * $b;

            // Return either black or white, depending on the luminance
            if($luminance > 0.5) {
                return '#000000'; // Black color
            } else {
                return '#ffffff'; // White color
            }
        } else {
            return false; // Invalid color
        }
    }
}
