<?php

namespace App\Imports\Concerns;

trait WithImport
{
    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'id';
    }
}
