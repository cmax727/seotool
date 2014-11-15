<?php
require_once 'PHPThumb/vendor/autoload.php';
class WebsiteToImage
{
    const FORMAT_JPG  = 'jpg';
    const FORMAT_JPEG = 'jpeg';
    const FORMAT_PNG  = 'png';
    const FORMAT_TIF  = 'tif';
    const FORMAT_TIFF = 'tiff';
 
    protected $_programPath;
    protected $_outputFile;
    protected $_url;
    protected $_format = self::FORMAT_PNG;
    protected $_quality = 90;
    
    public function getScreenShot(){
        //print_r($_url);
        $url = $this->_outputFile;
        //$IMAGES_DIR = 'tmp/';
        //$tmpfname = $IMAGES_DIR.date("ymd_his", time()).rand(1,50).".png";
        if (file_exists($url)) {
            if (filesize($url) > 1) {
                    //if (file_exists($tmpfname)) {
                        try{
                            $thumb = new PHPThumb\GD($url);
                            $thumb->resize(70);
                            $thumb->crop(0,0,70,70);
                            $thumb->save($url);
                        }
                        catch(exception $e) {
                        }
                    //}
            }
        }
        // return 'analyze2/'.$url;
        return $url;
    }
    public function getMainScreenShot(){
        $url = $this->_outputFile;
        if (file_exists($url)) {
            if (filesize($url) > 1) {
                try{
                    $thumb = new PHPThumb\GD($url);
                    $thumb->resize(181, 102);
                    $thumb->save($url);
                }
                catch(exception $e) {
                }
            }
        }
        // return 'analyze2/'.$url;
        return $url;
    }
    public function start()
    {


        $programPath = escapeshellcmd($this->_programPath);
        $outputFile  = escapeshellarg($this->_outputFile);
        $url         = escapeshellarg($this->_url);
        $format      = escapeshellarg($this->_format);
        $quality     = escapeshellarg($this->_quality);

        $programPath = ".\\..\\..\\wkhtmltoimage.exe";
        //$programPath = "D:\\WWWWW-WORK\\00 recent\\lw-x-seo-automation\\seo_dash2\\wkhtmltoimage.exe";

        //$command = "$programPath --format $format --quality $quality $url $outputFile";
        $command = "$programPath --disable-javascript --width 1280 --crop-h 722 $url $outputFile";
        //$command = 'xvfb-run --server-args="-screen 0, 1024x768x24" '."$programPath --format $format --quality $quality $url $outputFile";
        
        exec($command);
        return $this;
    }
 
    public function setProgramPath($programPath)
    {
        $this->_programPath = $programPath;//'./wkhtmltoimage';
        return $this;
    }

    public function setOutputFile($baseDir='/tmp')
    {
        $baseDir = ".\\..\\..\\tmp";
        clearstatcache();
        $this->_outputFile = $baseDir.'\\'.date("ymd_his", time()).rand(1,500).'.png';
        //$this->_outputFile = ''.date("ymd_his", time()).rand(1,500).'.png';
        //$this->_outputFile = date("ymd_his", time()).rand(1,500).'.png';
        return $this;
    }
 
    public function getOutputFile()
    {
        return $this->_outputFile;
    }
 
    public function getProgramPath()
    {
        return $this->_programPath;
    }
 
    public function setFormat($format)
    {
        $this->_format = $format;
        return $this;
    }
 
    public function getFormat()
    {
        return $this->_format;
    }
 
    public function setQuality($quality)
    {
        $this->_quality = (int)$quality;
        return $this;
    }
 
    public function getQuality()
    {
        return $this->_quality;
    }
 
    public function setUrl($url)
    {
        $this->_url = $url;
        return $this;
    }
 
    public function getUrl()
    {
        return $this->_url;
    }
}
?>