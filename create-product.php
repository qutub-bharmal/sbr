<?php
// error_reporting(~E_NOTICE);

require_once('shopify-api.php');
$class = new Shopify_API();

$sd = $class->create_product();

echo "<pre>";
print_r($sd);
echo "</pre>";
