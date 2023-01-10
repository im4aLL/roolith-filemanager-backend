<?php
namespace Roolith\Filemanager\Interfaces;


interface DirectoryHandlerInterface
{
    /**
     * Rename a folder
     *
     * @param $newName string
     * @param $folderPath string
     * @return bool
     */
    public function renameFolder($newName, $folderPath);

    /**
     * Delete a directory
     *
     * @param $path string
     * @return bool
     */
    public function deleteDirectory($path);

    /**
     * Delete multiple directories
     *
     * @param $paths string[]
     * @return bool
     */
    public function deleteDirectories($paths);

    /**
     * Create directory
     *
     * @param $directoryName string
     * @param $path string
     * @return bool
     */
    public function createDirectory($directoryName, $path);

    /**
     * Copy and paste a directory into destination path
     *
     * @param $directoryPath string
     * @param $destinationPath string
     * @return bool
     */
    public function copyDirectory($directoryPath, $destinationPath);

    /**
     * Cut-and-paste directory to destination path
     *
     * @param $directoryPath string
     * @param $destinationPath string
     * @return bool
     */
    public function moveDirectory($directoryPath, $destinationPath);
}