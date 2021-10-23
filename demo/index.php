<?php
require_once __DIR__.'/../vendor/autoload.php';

$localFileManager = new \Roolith\Filemanager\Local\LocalFileManager();
$localFileManager->setRootFolder(__DIR__.'/files')
    ->allowedExtensions([]);

echo '<pre>';
print_r($localFileManager->getAll());
echo '</pre>';