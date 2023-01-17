<?php

namespace App\Services\Tooling\Module\Utilities;

use App\Services\Tooling\Module\DataMembers\DataMember;
use Illuminate\Support\Collection;

class ColumnsToTextService
{
    private Collection $columns;

    /**
     * @param Collection $columns
     * @return $this
     */
    public function setColumns(Collection $columns) :ColumnsToTextService
    {
        $this->columns = $columns;
        return $this;
    }

    public function getForRequests() :string
    {
        $text = '';
        $lines = [];

        if($this->columns->isNotEmpty()){
            foreach ($this->columns as $column){
                /** @var DataMember $dataMember */
                $dataMember = $column;

                $lines[] = "'{$dataMember->getName()}' => '{($dataMember->nullable) ? 'required':'sometimes'}',";
            }
        }

        return implode("\r\n",$lines);
    }

    public function getForModels() :string
    {
        $text = '';
        $lines = [];

        if($this->columns->isNotEmpty()){
            foreach ($this->columns as $column){
                /** @var DataMember $dataMember */
                $dataMember = $column;

                $lines[] = ";";
            }
        }

        return implode("\r\n",$lines);
    }
}
