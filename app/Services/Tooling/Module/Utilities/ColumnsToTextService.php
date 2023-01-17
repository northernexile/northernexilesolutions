<?php

namespace App\Services\Tooling\Module\Utilities;

use App\Services\Tooling\Module\DataMembers\DataMember;
use App\Services\Tooling\Module\DataMembers\DataTypes;
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
                $required = $dataMember->isNullable() ? 'sometimes' : 'required';
                $lines[] = "'{$dataMember->getName()}' => '{$required}'";
            }
        }

        return implode("\r\n",$lines);
    }

    /**
     * @return array|string[]
     * @throws \Exception
     */
    public function getForModels() :array
    {
        $properties = [];
        $fillable = [];

        if($this->columns->isNotEmpty()){
            foreach ($this->columns as $column){
                /** @var DataMember $dataMember */
                $dataMember = $column;
                switch ($dataMember->getType()){
                    case DataTypes::ID:
                    case DataTypes::BIGINT:
                        $type = 'int';
                        break;
                    case DataTypes::STRING:
                    case DataTypes::TEXT:
                        $type = 'string';
                        break;
                    case DataTypes::BOOLEAN:
                        $type = 'bool';
                        break;
                    case DataTypes::DECIMAL:
                        $type = 'float';
                        break;
                    case DataTypes::DATETIME:
                    case DataTypes::DATE:
                        $type = 'Carbon';
                        break;
                    default:
                        throw new \Exception('Unknown/disallowed column type');
                }
                $properties[] = "* @property ".$type.($dataMember->isNullable() ? "|null" : "")." $".$dataMember->getName();
                if($dataMember->getName() !== 'id'){
                    $fillable[] = $dataMember->getName();
                }
            }
        }

        return [
            'properties'=>implode("\r\n",$properties),
            'fillable'=>implode(",\r\n",$fillable)
        ];
    }
}
