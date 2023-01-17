<?php

namespace App\Services\Tooling\Module\Template\Write;

use Illuminate\Support\Facades\File;


class TemplateWriteService
{
    /** @var string  */
    private string $fileName;
    /** @var string  */
    private string $path;
    /** @var string  */
    private string $content;

    /**
     * @param string $fileName
     * @return TemplateWriteService
     */
    public function setFileName(string $fileName): TemplateWriteService
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * @param string $path
     * @return TemplateWriteService
     */
    public function setPath(string $path): TemplateWriteService
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @param string $content
     * @return TemplateWriteService
     */
    public function setContent(string $content): TemplateWriteService
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function write() :bool
    {
        if(!$this->content){
            throw new \Exception('Error creating file: no content');
        }
        if(!$this->path){
            throw new \Exception('Error creating file: no path');
        }
        if(!$this->fileName){
            throw new \Exception('Error creating file: no file name');
        }

        return File::put($this->path.$this->fileName,$this->content);
    }
}
