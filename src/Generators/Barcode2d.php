<?php

namespace Jorgenwdm\Barcode\Generators;

use Jorgenwdm\Barcode\Library\Tcpdf2dBarcode;

class Barcode2d extends Barcode 
{    

   public function __construct() {      
      $this->type = "QRCODE";
      $this->width = 6;
      $this->height = 6;
      $this->color = '#000000';
   }


   /**
    * Creates a new barcode object
    * 
    * @param string $barcodeType The type of the barcode eg. "QRCODE"
    * @param string $barcodeText The text for the barcode
    *
    * @return Barcode2d
    */
   public static function create(string $barcodeType, string $barcodeText) : Barcode2d
   {
        $bar = new Barcode2d();   
        $bar->type = $barcodeType;
        $bar->text = $barcodeText;
        return $bar;
   }


   /**
    * Sets the rectangle width and height that the 2D barcode consists of
    * 
    * @param int $rectangleWidth
    * @param int $rectangleHeight
    *
    * @return Barcode2d
    */
   public function size(int $rectangleWidth, int $rectangleHeight) : self 
   {
        $this->width = $rectangleWidth;
        $this->height = $rectangleHeight;
        return $this;
   }


   /**
    * Sets the color of the barcode element rectangles in HEX format eg. "#000000"
    * 
    * @param string $color    
    *
    * @return Barcode2d
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
      
      // Initialize the 2d barcode object
      $bar = new Tcpdf2dBarcode($this->text, $this->type);
 
      // Output the barcode as HTML string
      return $bar->getBarcodeHTML($this->width, $this->height, $this->rgbColorWeb() );

   }
 
   
   /**
    * Renders the barcode to an SVG vector image format
    * 
    * @return mixed   
    */
   public function toSvg() : mixed
   {
      
      // Initialize the 2d barcode object
      $bar = new Tcpdf2dBarcode($this->text, $this->type);

      // Output the barcode as SVG object
      return $bar->getBarcodeSVG($this->width, $this->height, $this->rgbColorWeb());

   }


   /**
    * Renders the barcode to an SVG vector xml data
    * 
    * @return mixed   
    */
    public function toSvgCode() : mixed
    {
       
       // Initialize the 2d barcode object
       $bar = new Tcpdf2dBarcode($this->text, $this->type);
 
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
       
      // Initialize the 2d barcode object
      $bar = new Tcpdf2dBarcode($this->text, $this->type);
        
      // Output the barcode as PNG image
      return $bar->getBarcodePNG( $this->width, $this->height, $this->rgbColor() );
       
    }
}