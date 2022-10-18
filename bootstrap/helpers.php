<?php

if (! function_exists('flatten_recursive')) {
    /**
     * Assign high numeric IDs to a config item to force appending.
     *
     * @param  array  $array
     * @return array
     */
    function flatten_recursive(array $array)
    {
        $result = [];
        foreach ($array as $item) {
            if (is_array($item)) {
                $result[] = array_filter($item, function($array) {
                    return ! is_array($array);
                });
                $result = array_merge($result, flatten_recursive($item));
            } 
        }
        return array_filter($result);
    }
}
