<?php

namespace Jorgenwdm\Barcode\Generators;

use Jorgenwdm\Barcode\Library\Tcpdf1dBarcode;

class Barcode1d extends Barcode 
{    

   public function __construct() {      
      $this->type = "C39";
      $this->width = 2;
      $this->height = 30;
      $this->color = '#000000';
   }


   /**
    * Creates a new barcode object
    * 
    * @param string $barcodeType The type of the barcode eg. "C39"
    * @param string $barcodeText The text for the barcode
    *
    * @return Barcode1d
    */
   public static function create(string $barcodeType, string $barcodeText) : Barcode1d
   {
      $bar = new Barcode1d; 
      $bar->type = $barcodeType;
      $bar->text = $barcodeText;
      return $bar;
   }


   /**
    * Sets the line width and height of the barcode lines
    * 
    * @param int $lineWidth
    * @param int $lineHeight
    *
    * @return Barcode1d
    */
   public function size(int $lineWidth, int $lineHeight) : self 
   {
      $this->width = $lineWidth;
      $this->height = $lineHeight;
      return $this;
   }


   /**
    * Sets the color of the barcode lines in HEX format eg. "#000000"
    * 
    * @param string $color    
    *
    * @return Barcode1d
    */
   public function color(string $color) : self
   {
      $this->color = $color;      
      return $this;
   }


   /**
    * Renders the barcode to an HTML format
    * 
    * @return string   
    */
   public function toHtml() : string
   {
      
      // Initialize the 1d barcode object
      $bar = new Tcpdf1dBarcode($this->text, $this->type);
 
      // Output the barcode as HTML string
      return $bar->getBarcodeHTML($this->width, $this->height, $this->rgbColorWeb() );

   }
   
 
   /**
    * Renders the barcode to an SVG vector image
    * 
    * @return mixed   
    */
   public function toSvg() : mixed
   {
      
      // Initialize the 1d barcode object
      $bar = new Tcpdf1dBarcode($this->text, $this->type);

      // Output the barcode as SVG object
      return $bar->getBarcodeSVG($this->width, $this->height, $this->rgbColorWeb());

   }


   /**
    * Renders the barcode to SVG vector xml data
    * 
    * @return mixed   
    */
    public function toSvgCode() : mixed
    {
       
       // Initialize the 1d barcode object
       $bar = new Tcpdf1dBarcode($this->text, $this->type);
 
       // Output the barcode as SVG object
       return $bar->getBarcodeSVGCode($this->width, $this->height, $this->rgbColorWeb());
 
    }


   /**
    * Renders the barcode to a PNG image
    * 
    * @return mixed   
    */
    public function toPng() : mixed
    {
       
      // Initialize the 1d barcode object
      $bar = new Tcpdf1dBarcode($this->text, $this->type);
        
      // Output the barcode as PNG image
      return $bar->getBarcodePNG( $this->width, $this->height, $this->rgbColor() );
       
    }      
}

