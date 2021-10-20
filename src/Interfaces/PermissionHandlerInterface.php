<?php
namespace Roolith\Filemanager\Interfaces;


interface PermissionHandlerInterface
{
    /**
     * Set folder permission
     *
     * @param $path string
     * @param $permission integer
     * @return bool
     */
    public function setFolderPermission($path, $permission);

    /**
     * Set file permission
     *
     * @param $path string
     * @param $permission integer
     * @return bool
     */
    public function setFilePermission($path, $permission);
}