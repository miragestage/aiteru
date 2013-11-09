<?php
 
$services_json = getenv('VCAP_SERVICES');
$services = json_decode($services_json, true);
$config = null;
foreach ($services as $name => $service) {
    if (0 === stripos($name, 'mysql')) {
        $config = $service[0]['credentials'];
        break;
    }
}
is_null($config) && die('MySQL service information not found.');
 
$db_hostname = $config["hostname"];
$db_hostport = $config["port"];
$db_username = $config["user"];
$db_password = $config["password"];

echo $db_hostname;
echo $db_hostport;
echo $db_password;
echo $db_username;
