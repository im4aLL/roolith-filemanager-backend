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
     * @return array
     */
    protected function getPermittedExtensions($lists)
    {
        $result = ['folders' => [], 'files' => []];

        foreach ($lists as $item) {
            if (is_dir($item) && $item !== '.' && $item !== '..') {
                $result['folders'][] = $item;
            } else {
                if (count($this->permittedExtensions) > 0) {
                    $ext = $this->getFileExtension($item);
                    $ext = strtolower($ext);

                    if (in_array($ext, $this->permittedExtensions)) {
                        $result['files'][] = $item;
                    }
                } else if ($item !== '.' && $item !== '..') {
                    $result['files'][] = $item;
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