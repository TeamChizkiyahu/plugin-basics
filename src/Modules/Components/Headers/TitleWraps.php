<?php

namespace PBASICS\Modules\Components\Headers;

use PBASICS\Modules\Components\ElementWraps\Wrap;
use InvalidArgumentException;

class TitleWraps
{
    /**
     * Generates a block containing a title, tag, and description.
     *
     * @param string $containerClass The class name to use for the container element.
     * @param string $title The title of the block.
     * @param string $tag The tagline for the title.
     * @param string $desc The description for the block.
     *
     * @throws InvalidArgumentException If any of the input parameters are not strings.
     *
     * @return string The generated title block.
     */
    public static function title_block($containerClass, $title, $tag, $desc)
    {
        if (!is_string($containerClass) || !is_string($title) || !is_string($tag) || !is_string($desc)) {
            throw new InvalidArgumentException('The title must be a string.');
        }

        return Wrap::class_container_wrap(
            $containerClass,
            self::title_header($title, $tag, $desc)
        );
    }


    /**
     * Creates a title header container with a main title, tagline, and description.
     *
     * @param string $title The main title to be displayed.
     * @param string $tag The tagline to accompany the title.
     * @param string $desc A description to provide more context to the title and tagline.
     *
     * @return string The formatted title header as a string.
     */
    public static function title_header($title, $tag, $desc)
    {
        return sprintf(
            '<div class="container">' .
                '<div>' .
                '<h1>%s</h1>' .
                '<p>%s</p>' .
                '<p>%s</p>' .
                '</div>' .
                '</div>',
            $title,
            $tag,
            $desc
        );
    }
}
