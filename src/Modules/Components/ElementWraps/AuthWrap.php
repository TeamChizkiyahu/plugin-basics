<?php

namespace PBASICS\Includes\WpAdminUi\Components\WpWrap;

use PBASICS\Modules\AuthWrappers\AuthOptions;
use PBASICS\Modules\Components\ElementWraps\Wrap;

class AuthWrap
{
    /**
     * Wraps the content of a WordPress admin page with authentication checks.
     *
     * @param callable $content The content to be wrapped.
     *
     * @return string The wrapped content, if the current user is an administrator. An empty string otherwise.
     */
    public static function wp_admin_page_wrap($content)
    {
        return self::wp_auth_wrap($content);
    }

    /**
     *
     * Executes the given content callback and returns the output after applying authentication and wrapping.
     * @param callable $contentCallback The callback function that returns the content to be processed.
     * @return string The processed content after applying authentication and wrapping.
     */
    protected static function wp_auth_wrap(callable $contentCallback)
    {
        $content = $contentCallback();
        return AuthOptions::wp_admin_auth(
            Wrap::wp_wrap(
                Wrap::page_wrap($content)
            )
        );
    }
}
