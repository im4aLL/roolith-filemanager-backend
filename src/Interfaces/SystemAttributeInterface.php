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
     * @return array
     */
    public function getAll($folderPath = '');

    /**
     * Set time format
     *
     * @param string $timeFormat
     * @return $this
     */
    public function setTimeFormat($timeFormat);
}