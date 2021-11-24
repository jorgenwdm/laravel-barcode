<?php

use Jorgenwdm\Barcode\Generators\Barcode1d;
use Jorgenwdm\Barcode\Generators\Barcode2d;

if (! function_exists('create_barcode')) {

    /**
     * Renders a barcode
     *
     * @param string $category The category of the barcode eg. 1D, 2D
     * @param string $type The type of the barcode eg. C39, DATAMATRIX
     * @param string $text
     * @param int $width
     * @param int $height
     * @param string $hexColor
     * @return mixed 
     */
    function create_barcode( string $barcodeCategory, string $barcodeType, string $barcodeText, int $width, int $height, string $hexColor, string $output ) : mixed
    {
        $bar = null;
        
        if( $barcodeCategory == "2D" ){
        
            $bar = Barcode2d::create($barcodeType,$barcodeText)->size($width,$height)->color($hexColor);
        
        } else {
        
            $bar = Barcode1d::create($barcodeType,$barcodeText)->size($width,$height)->color($hexColor);

        }

        switch ($output) {
            case 'SVG':
                return $bar->toSvg();
                break;

            case 'SVGCODE':
                return $bar->toSvgCode();
                break;    

            case 'PNG':
                return $bar->toPng();
                break;
            
            default:
                return $bar->toHtml();
                break;

        }
    }
}