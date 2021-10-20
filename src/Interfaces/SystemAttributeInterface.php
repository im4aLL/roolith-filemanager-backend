<?php
namespace Roolith\Filemanager\Interfaces;


interface SystemAttributeInterface
{
    public function allowedExtensions($extensions = []);

    public function setRootFolder($path);

    public function getAll($folderPath, $settings = []);
}