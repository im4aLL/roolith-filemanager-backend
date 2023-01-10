<?php
namespace Roolith\Filemanager;

use Roolith\Filemanager\Interfaces\FileSystemDriverInterface;

class FileSystem
{
    protected $driver;

    public function __construct(FileSystemDriverInterface $driver)
    {
        $this->driver = $driver;
    }
}