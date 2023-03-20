<?php

namespace ObsidianLab;

/** 
 *  Custom Functions 
 */

class ObsidianFunctions
{

    public static function dummyFunction()
    {
        echo '<script>
            console.log("Hello Dummy");
        </script>';
    }

    public function __construct()
    {
        add_action('wp_head', [$this, 'dummyFunction']);
    }
}
