<?php
namespace Roolith\Filemanager\Interfaces;


interface PermissionHandlerInterface
{
    public function setFolderPermission($path, $permission);

    public function setFilePermission($path, $permission);
}