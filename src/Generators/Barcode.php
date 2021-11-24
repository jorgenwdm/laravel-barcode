<?php

namespace Jorgenwdm\Barcode\Generators;

abstract class Barcode
{     
   // Public properties
   public string $type;
   public string $text;
   public string $width;
   public string $height;
   public string $color;
   

   // Constructor
   public function __construct() {}


   // Abstract functions to be extended
   abstract public static function create(string $barcodeType, string $barcodeText) : self ;
   abstract public function size(int $width, int $height) : self ;
   abstract public function color(string $color) : self ;
   abstract public function toSvg() : mixed;
   abstract public function toSvgCode() : mixed;
   abstract public function toPng() : mixed;
   abstract public function toHtml() : string;
   
   
   /**
    * Returns the HEX color of this object as an RGB color array
    *
    * @return array
    */
   protected function rgbColor() : array
   {      
      return $this->hex2rgb($this->color);
   }


   /**
    * Returns the HEX color of this object as an RGB web format string eg. "rgb(255,0,0)" 
    *
    * @return string
    */   
   protected function rgbColorWeb() : string
   {      
      return 'rgb(' . implode( ',', $this->rgbColor() ) . ')';
   }
   
   
   /**
    * Converts a HEX color value to an RGB color array
    *
    * @return array
    */   
   protected function hex2rgb( string $hex ) : array
   {
       if ($hex[0] == '#') $hex = substr($hex, 1);
       list($r, $g, $b) = array_map("hexdec", str_split($hex, (strlen( $hex ) / 3)));
       return array( $r, $g, $b );
   }

}

