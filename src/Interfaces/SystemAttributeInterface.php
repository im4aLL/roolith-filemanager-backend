<?php
namespace Roolith\Filemanager\Interfaces;


interface SystemAttributeInterface
{
    /**
     * Allow extensions
     *
     * @param array $extensions
     * @return $this
     */
    public function allowedExtensions($extensions = []);

    /**
     * Set root folder
     *
     * @param $path string
     * @return $this
     */
    public function setRootFolder($path);

    /**
     * Get list of files
     *
     * @param $folderPath string
     * @param array $settings
     * @return array
     */
    public function getAll($folderPath, $settings = []);
}