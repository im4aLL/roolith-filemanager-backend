<?php

namespace Roolith\Filemanager\Adapter;

use Roolith\Filemanager\Interfaces\FileSystemDriverInterface;

class LocalFileSystemDriver implements FileSystemDriverInterface
{
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
        // TODO: Implement allowedExtensions() method.
    }

    /**
     * @inheritDoc
     */
    public function getAll($folderPath = '', $settings = [])
    {
        // TODO: Implement getAll() method.
    }
}