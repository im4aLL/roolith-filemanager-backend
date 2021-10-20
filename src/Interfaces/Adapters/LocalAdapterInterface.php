<?php
namespace Roolith\Filemanager\Interfaces\Adapters;

use Roolith\Filemanager\Interfaces\CoreBehaviorInterface;
use Roolith\Filemanager\Interfaces\DirectoryHandlerInterface;
use Roolith\Filemanager\Interfaces\FileHandlerInterface;
use Roolith\Filemanager\Interfaces\PermissionHandlerInterface;
use Roolith\Filemanager\Interfaces\SystemAttributeInterface;

interface LocalAdapterInterface extends CoreBehaviorInterface, DirectoryHandlerInterface, FileHandlerInterface, PermissionHandlerInterface, SystemAttributeInterface
{
}