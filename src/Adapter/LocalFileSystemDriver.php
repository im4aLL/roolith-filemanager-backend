<?php

namespace Roolith\Filemanager\Adapter;

use Roolith\Filemanager\Interfaces\FileSystemDriverInterface;
use Roolith\Filemanager\Interfaces\System\LocalFileSystemInterface;
use Roolith\Filemanager\Interfaces\SystemAttributeInterface;
use Roolith\Filemanager\Utils\Helper;

class LocalFileSystemDriver implements FileSystemDriverInterface, LocalFileSystemInterface
{
    private $rootFolder;
    private $permittedExtensions = [];
    protected $timeFormat = 'd/m/Y';

    /**
     * @inheritDoc
     */
    public function getUrlByFilePath($path)
    {
        // TODO: Implement getUrlByFilePath() method.
    }

    /**
     * @inheritDoc
     */
    public function renameFolder($newName, $folderPath)
    {
        // TODO: Implement renameFolder() method.
    }

    /**
     * @inheritDoc
     */
    public function deleteDirectory($path)
    {
        // TODO: Implement deleteDirectory() method.
    }

    /**
     * @inheritDoc
     */
    public function deleteDirectories($paths)
    {
        // TODO: Implement deleteDirectories() method.
    }

    /**
     * @inheritDoc
     */
    public function createDirectory($directoryName, $path)
    {
        // TODO: Implement createDirectory() method.
    }

    /**
     * @inheritDoc
     */
    public function copyDirectory($directoryPath, $destinationPath)
    {
        // TODO: Implement copyDirectory() method.
    }

    /**
     * @inheritDoc
     */
    public function moveDirectory($directoryPath, $destinationPath)
    {
        // TODO: Implement moveDirectory() method.
    }

    /**
     * @inheritDoc
     */
    public function upload($file, $folderPath)
    {
        // TODO: Implement upload() method.
    }

    /**
     * @inheritDoc
     */
    public function uploadFiles($files, $folderPath)
    {
        // TODO: Implement uploadFiles() method.
    }

    /**
     * @inheritDoc
     */
    public function renameFile($newName, $filePath)
    {
        // TODO: Implement renameFile() method.
    }

    /**
     * @inheritDoc
     */
    public function copyFiles($files, $destinationFolder)
    {
        // TODO: Implement copyFiles() method.
    }

    /**
     * @inheritDoc
     */
    public function moveFiles($files, $destinationFolder)
    {
        // TODO: Implement moveFiles() method.
    }

    /**
     * @inheritDoc
     */
    public function deleteFile($filePath)
    {
        // TODO: Implement deleteFile() method.
    }

    /**
     * @inheritDoc
     */
    public function deleteFiles($filePaths)
    {
        // TODO: Implement deleteFiles() method.
    }

    /**
     * @inheritDoc
     */
    public function setFolderPermission($path, $permission)
    {
        // TODO: Implement setFolderPermission() method.
    }

    /**
     * @inheritDoc
     */
    public function setFilePermission($path, $permission)
    {
        // TODO: Implement setFilePermission() method.
    }

    /**
     * @inheritDoc
     */
    public function allowedExtensions($extensions = [])
    {
        $this->permittedExtensions = $extensions;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getAll($folderPath = '')
    {
        $folderPath = Helper::sanitizePath($folderPath);

        $lists = scandir($this->rootFolder.$folderPath);

        return $this->getPermittedExtensions($lists, $this->rootFolder.$folderPath);
    }

    /**
     * @inheritDoc
     */
    public function setRootFolder($path)
    {
        $this->rootFolder = $path;

        return $this;
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
                    $result['folders'][] = $this->getDirectoryStat($item, $path);
                } else {
                    if ($total > 0) {
                        $ext = Helper::getFileExtension($item);

                        if (in_array($ext, $this->permittedExtensions)) {
                            $result['files'][] = $this->getFileStat($item, $path);
                        }
                    } else {
                        $result['files'][] = $this->getFileStat($item, $path);
                    }
                }
            }
        }

        return $result;
    }

    /**
     * Get directory stat
     *
     * @param string $folder
     * @param string $path
     * @return array
     */
    protected function getDirectoryStat($folder, $path)
    {
        return [
            'name' => $folder,
            'size' => Helper::formatBytes($this->dirSize($path.'/'.$folder)),
            'mtime' => Helper::formatTime(filemtime($path.'/'.$folder))
        ];
    }

    /**
     * Get file stat
     *
     * @param string $file
     * @param string $path
     * @return array
     */
    protected function getFileStat($file, $path)
    {
        return [
            'name' => $file,
            'size' => Helper::formatBytes($this->fileSize($path.'/'.$file)),
            'ext' => Helper::getFileExtension($file),
            'mtime' => Helper::formatTime(filemtime($path.'/'.$file)),
        ];
    }

    /**
     * Get directory size in bytes
     *
     * @param string $directory
     * @return int
     */
    protected function dirSize($directory)
    {
        $size = 0;

        foreach (new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($directory)) as $file) {
            $size += $file->getSize();
        }

        return $size;
    }

    /**
     * Get file size in bytes
     *
     * @param $filePath
     * @return int
     */
    protected function fileSize($filePath)
    {
        return filesize($filePath);
    }

    /**
     * @inheritDoc
     */
    public function setTimeFormat($timeFormat)
    {
        $this->timeFormat = $timeFormat;

        return $this;
    }
}