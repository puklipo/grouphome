<?php

namespace App\Support;

use BaconQrCode\Renderer\Color\Rgb;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\Fill;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Support\HtmlString;

class QrCode
{
    public static function svg(string $url): HtmlString
    {
        $fill = Fill::uniformColor(
            new Rgb(red: 255, green: 255, blue: 255),
            new Rgb(red: 45, green: 55, blue: 72)
        );

        $svg = (new Writer(new ImageRenderer(
            new RendererStyle(size: 192, margin: 1, fill: $fill),
            new SvgImageBackEnd))
        )->writeString($url);

        return str($svg)->trim()->toHtmlString();
    }
}
