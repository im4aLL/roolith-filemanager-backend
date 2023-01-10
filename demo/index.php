<?php
require_once __DIR__.'/../vendor/autoload.php';

$driver = new \Roolith\Filemanager\Adapter\LocalFileSystemDriver();
$fileManager = new \Roolith\Filemanager\FileSystem($driver);

echo '<pre>';
print_r($fileManager);
echo '</pre>';