<?php

declare(strict_types=1);

use function GuylianGilsingWebsite\APIs\Application\application_cleanup;
use function GuylianGilsingWebsite\APIs\Application\get_application_instance;

require_once __DIR__.'/../src/bootstrap.php';

echo '<pre>';
var_dump($_SERVER);
echo '</pre>';

get_application_instance()->run();
application_cleanup();
