<?php
namespace Roolith\Filemanager;

use Roolith\Filemanager\Interfaces\FileSystemDriverInterface;
use Roolith\Filemanager\Interfaces\FileSystemInterface;
use Roolith\Filemanager\Transformer\DefaultTransformer;

class FileSystem implements FileSystemInterface
{
    protected $driver;
    protected $defaultTransformer;
    protected $folder = '';
    protected $result = [];
    protected $response;

    public function __construct(FileSystemDriverInterface $driver)
    {
        $this->driver = $driver;
        $this->defaultTransformer = new DefaultTransformer();
        $this->response = new Response();
    }

    /**
     * @inheritDoc
     */
    public function folder($path)
    {
        $this->folder = $path;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function get()
    {
        return $this->setResult()->result;
    }

    /**
     * @inheritDoc
     */
    public function getJson()
    {
        return $this->setResult()->response->jsonEncode();
    }

    /**
     * @inheritDoc
     */
    public function getJsonResponse()
    {
        return $this->setResult()->response->json();
    }

    /**
     * Set result
     *
     * @return $this
     */
    protected function setResult()
    {
        $this->result = $this->driver->getAll($this->folder);
        $this->response->setData($this->result);

        return $this;
    }

    public function uploadFile($file, $path)
    {
        // TODO: Implement uploadFile() method.
    }
}