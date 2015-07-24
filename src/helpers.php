<?php

if (!function_exists('alert')) {
    /**
     * Process an alert message to display to the user.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    function alert($type, $message)
    {
        $processAlert = config('forum.integration.process_alert');
        $processAlert($type, $message);
    }
}

if (!function_exists('permitted')) {
    /**
     * Determine if the given user is permitted to access a named route.
     *
     * @param  array  $parameters
     * @param  string  $routeName
     * @param  object  $user
     * @return boolean
     */
    function permitted($parameters, $routeName, $user)
    {
        $aliases = config('forum.permissions.aliases');
        $routeName = (isset($aliases[$routeName])) ? $aliases[$routeName] : $routeName;
        $permitted = config("forum.permissions.{$routeName}");

        if (is_callable($permitted)) {
            return $permitted($parameters, $user);
        }

        return false;
    }
}
