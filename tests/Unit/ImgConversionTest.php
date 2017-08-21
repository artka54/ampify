<?php
namespace artka54\ampify\Tests\Unit;

use artka54\ampify\Ampify;

class TestImgTagConversion extends \PHPUnit\Framework\TestCase
{
    
    public $content = 'Beginning qwqdw qwwqddwq <img alt="here is the alt" src="http://example.com/blahblah.png" style="height:599px; width:900px"> qqdwwqdwqd  </br>  <img alt="" src="https://theciatalking.com/images/juststartedwatchingrickandmortylol.jpg" style="height:599px; width:900px"> qwdqwdqw <img alt="the alt tag here yoyoyo" src="http://example.com/lol/bildiite.jpg" style="height:599px; width:1000px"><img src="http://nerealspiemeers.lv/bildes/biuidiite.png" style="height:599px; width:1000px"> <span>test</span> zzzzzz';
    
    public $contentAmped = "Beginning qwqdw qwwqddwq <amp-img height=599 width=900 src='http://example.com/blahblah.png' alt='here is the alt' media='(min-width: 775px)' ></amp-img><amp-img height=599 width=900 src='http://example.com/blahblah.png' alt='here is the alt' media='(max-width: 775px)' layout='responsive'></amp-img> qqdwwqdwqd  </br>  <amp-img height=599 width=900 src='https://theciatalking.com/images/juststartedwatchingrickandmortylol.jpg' alt='' media='(min-width: 775px)' ></amp-img><amp-img height=599 width=900 src='https://theciatalking.com/images/juststartedwatchingrickandmortylol.jpg' alt='' media='(max-width: 775px)' layout='responsive'></amp-img> qwdqwdqw <amp-img height=599 width=1000 src='http://example.com/lol/bildiite.jpg' alt='the alt tag here yoyoyo' media='(min-width: 775px)' ></amp-img><amp-img height=599 width=1000 src='http://example.com/lol/bildiite.jpg' alt='the alt tag here yoyoyo' media='(max-width: 775px)' layout='responsive'></amp-img><amp-img height=599 width=1000 src='http://nerealspiemeers.lv/bildes/biuidiite.png' alt='' media='(min-width: 775px)' ></amp-img><amp-img height=599 width=1000 src='http://nerealspiemeers.lv/bildes/biuidiite.png' alt='' media='(max-width: 775px)' layout='responsive'></amp-img> <span>test</span> zzzzzz";
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }    
    
    public function createAmpifyInstance() {
        $Ampify = new Ampify($this->content);
        
        return $Ampify;
    }
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testImgConversion()
    {
        $Ampify   = new Ampify($this->content);
        $Ampified = $Ampify->ampifyImgs();
        
        $this->assertEquals($Ampified, $this->contentAmped);
    }
}
