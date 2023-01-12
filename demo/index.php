<?php
use Roolith\Filemanager\Adapter\LocalFileSystemDriver;
use Roolith\Filemanager\FileSystem;

require_once __DIR__.'/../vendor/autoload.php';

$driver = new LocalFileSystemDriver();
$driver->setRootFolder(__DIR__ . '/files');
$fileManager = new FileSystem($driver);

echo '<pre>';
print_r($fileManager->folder('/B')->get());
echo '</pre>';