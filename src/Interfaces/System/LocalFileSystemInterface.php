<?php
namespace Roolith\Filemanager\Interfaces\System;

interface LocalFileSystemInterface
{
    /**
     * Set root folder
     *
     * @param $path string
     * @return $this
     */
    public function setRootFolder($path);
}