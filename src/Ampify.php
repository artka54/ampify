<?php
// Tested with Ckeditor
// Img tag to be formatted must contain style attribute with height and width and alt tag otherwise bugs will occur

namespace artka54\ampify;

class Ampify {
    
    public $content;
    public $imgSeparator = "<img";
    public $imgResponsiveBreakpoint;
    

    public function __construct($content, $imgResponsiveBreakpoint = 775) {
        $this->content = $content;
        $this->imgResponsiveBreakpoint = $content;
    }
    
    
    /**
     * Convert img tags to amp-img specification.
     *
     * @param  string  $content
     * @return string  $ampContent
     */
    public function ampifyImgs() {
        $explodedContent = explode($this->imgSeparator, $this->content);
        $explodedContent = $this->reattachSeparator($explodedContent);

        $newContent = [];

        foreach ($explodedContent as $value) { // every item has one img tag except if the text did not start with an instant <img then the first is without
            
            $srcAttributeExists = preg_match("/src=.*>/", $value);
            
            if($srcAttributeExists == 1) {

                $styleAttributeExists = preg_match("/style=.*>/", $value, $style);
                
                if ($styleAttributeExists == 1) {
                    preg_match("/height:(\d*)px/", $style[0], $height);
                    preg_match("/width:(\d*)px/", $style[0], $width);
                    preg_match("/src=\"(.*?)\"/", $value, $src);
                    preg_match("/alt=\"(.*?)\"/", $value, $alt);

                    $imgHeight = $height[1];
                    $imgWidth  = $width[1];

                    $imgSrc = $src[1];

                    if(isset($alt[1])) {
                        $imgAlt = $alt[1];
                    } else {
                        $imgAlt = ""; // The img alt tag is empty
                    }

                    $ampedImgWithContent = $this->constructAmpImg($value, $imgHeight, $imgWidth, $imgSrc, $imgAlt);

                    // push back the amped content into array
                    array_push($newContent, $ampedImgWithContent);
                } else {
                    throw new \Exception('<img> tags must contain style attribute with height and width.');
                }
                    
            } else if($srcAttributeExists == 0) { // This could be the first item of an array with no img tag
                array_push($newContent, $value);
            }
            
        }
        
        // Re join the amped array items which contained img tags
        $implodedNewContent = implode("", $newContent);
        return $implodedNewContent; 
    }
   
    
    /**
     * Reattach seperator which was lost after the string explosion into an array
     *
     * @param  array  $content
     * @return array  $content
     */
    public function reattachSeparator($content) {
        $separator = $this->imgSeparator;
        $content = array_map(function($val) use ($separator) {
            // If html content starts with text then after the array explosion the first item in array will contain only text and <img tag should not be reattached to it
            if (preg_match('/src=\".+\"/', $val) == 1) {
                return $separator . $val;
            } else if (preg_match('/src=\".+\"/', $val) == 0) { // there is array item without src, do not add img tag o
                return $val;
            }

        }, $content);
        
        return $content;
    }
    
    
    /**
     * Construct amp-img compatible image from <img> within content
     *
     * @param  array  $oneImgWithContent
     * @param  int  $height
     * @param  int  $width
     * @param  string  $imgSrc
     * @param  string  $imgAlt
     * @return array  $content
     */
    public function constructAmpImg($oneImgWithContent, $height, $width, $imgSrc, $imgAlt) {
        $ampImgTagOpen = "<amp-img height=$height width=$width src='$imgSrc' alt='$imgAlt' media='(min-width: 775px)' >"; // fully constructed amp img opening tag
        
        $ampImgTagOpenResponsive = "<amp-img height=$height width=$width src='$imgSrc' alt='$imgAlt' media='(max-width: 775px)' layout='responsive'>"; // fully constructed amp img opening tag - RESPONSIVE version
        
        // Fully replace the img tag with the constructed amp-img tag
        $oneAmpImgWithContent = preg_replace("/<img(.*?)>/", "$ampImgTagOpen</amp-img>$ampImgTagOpenResponsive</amp-img>", $oneImgWithContent);
        
        return $oneAmpImgWithContent;
    }
    
    
    
    // TO DO3:
    // Create Ampify() method which checks if <img or <video etc tags present and call appropriate funcs to convert each to the amp version
    
}

?>