<?php
namespace Roolith\Filemanager\Interfaces;


interface FileHandlerInterface
{
    /**
     * Upload a file
     *
     * @param $file array
     * @param $folderPath string
     * @return bool
     */
    public function upload($file, $folderPath);

    /**
     * Upload multiple files
     *
     * @param $files array
     * @param $folderPath string
     * @return bool
     */
    public function uploadFiles($files, $folderPath);

    /**
     * Rename file
     *
     * @param $newName string
     * @param $filePath string
     * @return bool
     */
    public function renameFile($newName, $filePath);

    /**
     * Copy multiple files
     *
     * @param $files array
     * @param $destinationFolder string
     * @return bool
     */
    public function copyFiles($files, $destinationFolder);

    /**
     * Move files to another location
     *
     * @param $files array
     * @param $destinationFolder string
     * @return bool
     */
    public function moveFiles($files, $destinationFolder);

    /**
     * Delete file
     *
     * @param $filePath string
     * @return bool
     */
    public function deleteFile($filePath);

    /**
     * Delete multiple files
     *
     * @param $filePaths string[]
     * @return bool
     */
    public function deleteFiles($filePaths);
}