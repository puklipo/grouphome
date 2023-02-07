<?php

namespace App\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class Geometry extends Type
{
    public const GEOMETRY = 'geometry';

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return self::GEOMETRY;
    }

    public function getName(): string
    {
        return self::GEOMETRY;
    }
}
