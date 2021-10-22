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
     * Get list of files
     *
     * @param $folderPath string
     * @param array $settings
     * @return array
     */
    public function getAll($folderPath = '', $settings = []);
}