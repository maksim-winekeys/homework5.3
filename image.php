<?php
require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

$img = Image::make('tiger.jpg');

$img->resize(200, null, function (\Intervention\Image\Constraint $constraint) {
    $constraint->aspectRatio();
});
$img->text('Watermark', $img->getWidth() - 10, $img->getHeight() - 10, function (\Intervention\Image\AbstractFont $font) {
    $font->size(14);
    $font->file('montserrat.ttf');
    $font->color([2555, 255, 255, 0.3]);
    $font->align('right');
    $font->valign('bottom');
});
$img->save('test.jpg');
echo $img->response('jpg');