<?php
namespace Roolith\Filemanager\Interfaces;


interface CoreBehaviorInterface
{
    /**
     * Get URL by file path
     *
     * @param $path
     * @return string
     */
    public function getUrlByFilePath($path);
}