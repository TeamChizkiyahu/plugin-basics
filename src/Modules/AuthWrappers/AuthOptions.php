<?php

namespace PBASICS\Modules\AuthWrappers;

class AuthOptions
{

    /**
     * Checks if the current user is an administrator and has access to the WordPress dashboard.
     * 
     * @param string $content The content to be displayed if the user is an administrator.
     * 
     * @return string Returns the content if the user is an administrator, an empty string otherwise.
     */
    public static function wp_admin_auth($content)
    {
        //  Admin Check:
        if (is_admin() && defined('ABSPATH') && current_user_can('manage_options')) {
            return $content;
        }
        return '';
    }


    /**
     * Check if the current user is an administrator.
     * If the user does not have the manage_options capability, the script will exit.
     */
    public static function auth_admin_user_check()
    {
        if (!current_user_can('manage_options')) {
            // This user is not an administrator
            exit;
        }
    }

    /**
     * Checks if the current user is an administrator visiting an admin interface page.
     * If not, the script exits.
     *
     * @return void
     */
    public static function auth_page_user_check()
    {
        // This user is not an administrator nor visiting a admin interface page
        if (!is_admin() || !current_user_can('manage_options')) {
            exit;
        }
    }

    /**
     * Checks if the current user has sufficient permissions to access the page.
     * If the current user does not have `manage_options` capability, then it calls the `wp_die` function with the message "You do not have sufficient permissions to access this page.".
     *
     * @return void
     */
    public static function admin_or_wpdie()
    {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }
    }
}
