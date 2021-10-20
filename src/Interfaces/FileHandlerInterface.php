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
     * @param $files array[]
     * @param $folderPath string
     * @return bool
     */
    public function uploadFiles($files, $folderPath);

    public function renameFile($newName, $filePath);

    public function copyFiles($files, $destinationFolder);

    public function moveFiles($files, $destinationFolder);

    public function deleteFile($filePath);

    public function deleteFiles($filePaths);

}