<?php
namespace Roolith\Filemanager;

use Roolith\Filemanager\Interfaces\CoreBehaviorInterface;
use Roolith\Filemanager\Interfaces\DirectoryHandlerInterface;
use Roolith\Filemanager\Interfaces\FileHandlerInterface;
use Roolith\Filemanager\Interfaces\SystemAttributeInterface;

abstract class FileSystem implements CoreBehaviorInterface, DirectoryHandlerInterface, FileHandlerInterface, SystemAttributeInterface
{
    protected $permittedExtensions = [];

    /**
     * Sanitize path string
     *
     * @param $path
     * @return string
     */
    protected function sanitizePath($path)
    {
        $disallowedAccess = ['/../', '/..', '../', '..'];

        return str_replace($disallowedAccess, '/', $path);
    }

    /**
     * Get lists with permitted extensions
     *
     * @param $lists array
     * @param $path string
     * @return array
     */
    protected function getPermittedExtensions($lists, $path)
    {
        $result = ['folders' => [], 'files' => []];
        $total = count($this->permittedExtensions);

        foreach ($lists as $item) {
            if ($item !== '.' && $item !== '..') {
                if (is_dir($path.'/'.$item)) {
                    $result['folders'][] = $item;
                } else {
                    if ($total > 0) {
                        $ext = $this->getFileExtension($item);
                        $ext = strtolower($ext);

                        if (in_array($ext, $this->permittedExtensions)) {
                            $result['files'][] = $item;
                        }
                    } else {
                        $result['files'][] = $item;
                    }
                }
            }
        }

        return $result;
    }

    /**
     * Get file extension
     *
     * @param $file string
     * @return string
     */
    protected function getFileExtension($file)
    {
        return pathinfo($file, PATHINFO_EXTENSION);
    }
}