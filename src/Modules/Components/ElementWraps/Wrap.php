<?php

namespace PBASICS\Modules\Components\ElementWraps;

use InvalidArgumentException;

class Wrap
{

    /**
     * Wraps the content with a div having class "wrap".
     *
     * @param string $wrap The content to wrap
     *
     * @throws InvalidArgumentException If the wrap is not a string
     *
     * @return void
     */
    public static function wp_wrap($wrap)
    {
        if (!is_string($wrap)) {
            throw new InvalidArgumentException('The wrap must be a string.');
        }


        $wrap_resp = sprintf(
            '<div class="wrap">' .
                '<div>' .
                '<div>' .
                '%s' .
                '</div>' .
                '</div>' .
                '</div>',
            $wrap
        );

        echo $wrap_resp;
    }

    /**
     * Provides a page wrap for the given content.
     * 
     * @param string $content The content to be wrapped.
     * 
     * @throws InvalidArgumentException If the content is not a string.
     * 
     * @return string The content wrapped in a page format.
     */
    public static function page_wrap($content)
    {
        if (!is_string($content)) {
            throw new InvalidArgumentException('The content must be a string.');
        }

        $wrap_resp = sprintf('%s', $content);

        return $wrap_resp;
    }

    /**
     * The page_direct_html_wrap function is used to wrap the passed HTML content into a single string and return the result.
     * The function takes any number of string arguments, concatenates them and returns the result.
     * The arguments are concatenated using a space as the separator, but a custom separator can be specified by changing the $separator variable.
     * @throws InvalidArgumentException if any of the arguments passed is not a string
     * @return string the concatenated HTML content
     */
    public static function page_direct_html_wrap($wrap)
    {

        // Get all the passed arguments
        $args = func_get_args();

        // Check if each argument is a string
        foreach ($args as $arg) {
            if (!is_string($arg)) {
                throw new InvalidArgumentException('All args must be strings.');
            }
        }
        // Concatenate all the arguments, separated by a space or a custom separator
        $separator = ' ';
        $output  = implode($separator, $args);

        $wrap_resp = sprintf('%s', $output);

        return $wrap_resp;
    }

    /**
     *
     * Class container_wrap
     *
     * This method generates a container HTML element with a string as its content.
     *
     * @param string $wrap The string content to be placed inside the container HTML element.
     *
     * @throws InvalidArgumentException If the input content is not a string.
     * @return string The resulting HTML element with the string content inside.
     */
    public static function container_wrap($wrap)
    {
        if (!is_string($wrap)) {
            throw new InvalidArgumentException('The input wrap for the container must be a string.');
        }

        $wrap_resp = sprintf(
            '<div class="container">' .
                '<div>' .
                '<div>' .
                '%s' .
                '</div>' .
                '</div>' .
                '</div>',
            $wrap
        );

        return $wrap_resp;
    }


    /**
     *
     * Generates a container wrap with a custom class.
     *
     * This function generates a container wrap with a custom class for styling purposes. It takes two arguments,
     * the $class and the $wrap. The $class argument specifies the class for the container and the $wrap
     * argument is the content to be placed within the container.
     *
     * @param string $class The custom class for the container.
     * @param string $wrap The content to be placed within the container.
     * @throws InvalidArgumentException If the $wrap argument is not a string.
     * @return string The container wrap with the custom class.
     */
    public static function class_container_wrap($class, $wrap)
    {

        if (!is_string($wrap)) {
            throw new InvalidArgumentException('The input wrap for the custom class container must be a string.');
        }

        $wrap_resp = sprintf(
            '<div class="%s">' .
                '<div>' .
                '<div>' .
                '%s' .
                '</div>' .
                '</div>' .
                '</div>',
            $class,
            $wrap
        );

        return $wrap_resp;
    }
}
