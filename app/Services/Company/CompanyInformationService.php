<?php

namespace App\Services\Company;

class CompanyInformationService implements \JsonSerializable
{
    /**
     * @return string
     */
    public function getVatNumber() :string
    {
        return config('company.vat');
    }

    /**
     * @return string
     */
    public function getCompaniesHouseNumber() :string
    {
        return config('company.id');
    }

    /**
     * @return array
     */
    public function jsonSerialize() :array
    {
        return [
            'vatNumber' => $this->getVatNumber(),
            'companiesHouseNumber' => $this->getCompaniesHouseNumber()
        ];
    }
}
