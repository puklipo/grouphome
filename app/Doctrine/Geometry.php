<?php

namespace App\Doctrine;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class Geometry extends Type
{
    public const GEOMETRY = 'geometry';

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return self::GEOMETRY;
    }

    public function getName()
    {
        return self::GEOMETRY;
    }
}
