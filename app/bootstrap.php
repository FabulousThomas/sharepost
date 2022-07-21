<?php
// Load Config file
require_once 'config/config.php';
// Load url redirect
require_once 'helpers/url_redirect.php';

// Load Libraries
// require_once 'libraries/controller.php';
// require_once 'libraries/core.php';
// require_once 'libraries/database.php';

// Auto Load Libraries
spl_autoload_register(function ($className) {
   require_once 'libraries/' . $className . '.php';
});
