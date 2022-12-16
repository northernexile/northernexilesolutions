<?php

namespace App\Services\Tooling\Module\Utilities;

use Illuminate\Support\Str;

class EntityStringsService
{
    /** @var string  */
    public const MODULE = '[ModuleSingular]';
    /** @var string  */
    public const MODULE_LOWERCASE = '[ModuleSingularLowercase]';
    /** @var string  */
    public const MODULE_PLURAL = '[ModulePlural]';
    /** @var string  */
    public const MODULE_PLURAL_LOWERCASE = '[ModulePluralLowercase]';

    /** @var string[]  */
    public const REPLACE = [
        self::MODULE,
        self::MODULE_LOWERCASE,
        self::MODULE_PLURAL,
        self::MODULE_PLURAL_LOWERCASE
    ];
    /**
     * @var string
     */
    private string $identifier = '';

    /**
     * @param string $identifier
     * @return $this
     */
    public function setIdentifier(string $identifier='') :EntityStringsService
    {
        $this->identifier = $identifier;
        return $this;
    }

    /**
     * @return string
     */
    private function getModuleNameSingular() :string
    {
        return Str::ucfirst(Str::singular($this->identifier));
    }

    /**
     * @return string
     */
    public function getRoutesFolder() :string
    {
        return 'routes/api/';
    }

    /**
     * @return string
     */
    public function getModuleNameLowercase() :string
    {
        return Str::lower($this->getModuleNameSingular());
    }

    /**
     * @return string
     */
    public function getModuleNamePlural() :string
    {
        return Str::plural($this->getModuleNameSingular());
    }

    /**
     * @return string
     */
    public function getModuleNamePluralLowercase() :string
    {
        return Str::lower($this->getModuleNamePlural());
    }

    /**
     * @return string
     */
    public function getControllerName() :string
    {
        return $this->getModuleNameSingular().'Controller';
    }

    /**
     * @return string
     */
    public function getControllerFileName() :string
    {
        return $this->getControllerName().'.php';
    }

    /**
     * @return string
     */
    private function getControllerNamespace() :string
    {
        return 'App\Http\Controllers\'';
    }

    /**
     * @return string
     */
    public function getControllerFilePath() :string
    {
        return 'app/Http/Controllers/';
    }

    /**
     * @return string
     */
    public function getServicesFilePath() :string
    {
        return 'app/Services/';
    }

    /**
     * @return string
     */
    public function getModuleDirectoryName() :string
    {
        return Str::ucfirst(Str::singular($this->identifier));
    }

    /**
     * @param string $request
     * @return string
     */
    private function getRequestFileName(string $request) :string
    {
        return $this->getModuleDirectoryName().$request.'Request';
    }

    /**
     * @param string $request
     * @return string
     */
    private function getServiceFileName(string $request) :string
    {
        return $this->getModuleDirectoryName().$request.'Service';
    }

    /**
     * @return string
     */
    public function getCreateRequestFileName() :string
    {
        return $this->getRequestFileName('Create');
    }

    /**
     * @return string
     */
    public function getDeleteAllRequestFileName() :string
    {
        return $this->getRequestFileName('DeleteAll');
    }

    /**
     * @return string
     */
    public function getDeleteRequestFileName() :string
    {
        return $this->getRequestFileName('Delete');
    }

    /**
     * @return string
     */
    public function getListRequestFileName() :string
    {
        return $this->getRequestFileName('List');
    }

    /**
     * @return string
     */
    public function getSearchRequestFileName() :string
    {
        return $this->getRequestFileName('Search');
    }

    /**
     * @return string
     */
    public function getUpdateRequestFileName() :string
    {
        return $this->getRequestFileName('Update');
    }

    /**
     * @return string
     */
    public function getViewRequestFileName() :string
    {
        return $this->getRequestFileName('View');
    }

    /**
     * @return string
     */
    public function getDeleteAllServiceFileName() :string
    {
        return $this->getServiceFileName('DeleteAll');
    }

    /**
     * @return string
     */
    public function getDeleteServiceFileName() :string
    {
        return $this->getServiceFileName('Delete');
    }

    /**
     * @return string
     */
    public function getListServiceFileName() :string
    {
        return $this->getServiceFileName('List');
    }

    /**
     * @return string
     */
    public function getSaveServiceFileName() :string
    {
        return $this->getServiceFileName('Save');
    }

    /**
     * @return string
     */
    public function getViewServiceFileName() :string
    {
        return $this->getServiceFileName('View');
    }

    /**
     * @return string
     */
    public function getSearchServiceFileName() :string
    {
        return $this->getServiceFileName('Search');
    }

    /**
     * @return string
     */
    public function getRequestsFilePath() :string
    {
        return 'app/Http/Requests/';
    }

    /**
     * @return string
     */
    public function getFullControllerNamespacePath() :string
    {
        return $this->getControllerNamespace().$this->getControllerName();
    }

    /**
     * @param string $file
     * @return string
     */
    public function apply(string $file) :string
    {
        $output = $file;
        foreach (self::REPLACE as $searchFor){
            switch ($searchFor){
                case self::MODULE:
                    $output = Str::replace($searchFor,$this->getModuleNameSingular(),$output);
                    break;
                case self::MODULE_LOWERCASE:
                    $output = Str::replace($searchFor,$this->getModuleNameLowercase(),$output);
                    break;
                case self::MODULE_PLURAL:
                    $output = Str::replace($searchFor,$this->getModuleNamePlural(),$output);
                    break;
                case self::MODULE_PLURAL_LOWERCASE:
                    $output = Str::replace($searchFor,$this->getModuleNamePluralLowercase(),$output);
                    break;
            }
        }

        return $output;
    }
}
