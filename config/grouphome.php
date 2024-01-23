<?php

use MatanYadaev\EloquentSpatial\Enums\Srid;

return [
    'no_photo' => 'https://placehold.jp/707070/ffffff/250x150.png?text=NO%20PHOTO',

    'geo' => [
        /** SRID（空間参照ID） */
        'srid' => Srid::WGS84->value,
    ],
];
