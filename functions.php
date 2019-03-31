<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function ClassAutoloader($class_name) {

    /**
     * If the class being requested does not start with our prefix,
     * we know it's not one in our project
     */
    if (0 !== strpos($class_name, 'DPT')) {
        return;
    }

//    $new_class_name = "class-".$class_name;
    $file_name = str_replace(
            '_', // Prefix | Underscores 
            '-', // Remove | Replace with hyphens
            strtolower($class_name) // lowercase
    );

    // Compile our path from the current location
    $file = dirname(__FILE__) . '/includes/class-' . $file_name . '.php';

    // If a file is found
    if (file_exists($file)) {
        // Then load it up!
        require_once "$file";
    } else {
        echo $file . " not exist";
    }
}

spl_autoload_register('ClassAutoloader');

$init = new DPT_Initializer();

add_filter('nonce_life', function () {
    return 1 * HOUR_IN_SECONDS;
});

