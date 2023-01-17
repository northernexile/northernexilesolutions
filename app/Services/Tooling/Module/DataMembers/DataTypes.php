<?php

namespace App\Services\Tooling\Module\DataMembers;

class DataTypes
{
    const ID = 'ID';
    const STRING = 'STRING';
    const BIGINT = 'BIGINT';
    const TEXT = 'TEXT';
    const DECIMAL = 'DECIMAL';
    const BOOLEAN ='BOOLEAN';
    const DATE = 'DATE';
    const DATETIME = 'DATETIME';
    private static array $types = [
        self::ID,
        self::STRING,
        self::BIGINT,
        self::TEXT,
        self::DECIMAL,
        self::BOOLEAN,
        self::DATE,
        self::DATETIME
    ];

    /**
     * @return array|string[]
     */
    public static function getTypes() :array
    {
        return self::$types;
    }
}
