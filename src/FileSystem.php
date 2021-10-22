<?php
namespace Roolith\Filemanager;

use Roolith\Filemanager\Interfaces\CoreBehaviorInterface;
use Roolith\Filemanager\Interfaces\DirectoryHandlerInterface;
use Roolith\Filemanager\Interfaces\FileHandlerInterface;
use Roolith\Filemanager\Interfaces\SystemAttributeInterface;

abstract class FileSystem implements CoreBehaviorInterface, DirectoryHandlerInterface, FileHandlerInterface, SystemAttributeInterface
{
    public function sanitizePath($path)
    {
        $disallowedAccess = ['/../', '/..', '../', '..'];

        return str_replace($disallowedAccess, '/', $path);
    }
}