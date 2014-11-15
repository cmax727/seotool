<?php
class BING{
    private $page;
    
    public function __construct($page){
	    $parsed = parse_url($page);
		$this->page = $parsed['host'];
    }
    
    public function getCountIndexedPageBing(){
	$dx=$this->msn_indexed($this->page);
	return $dx;
    }
    
    //helper function
    private function between($string, $start, $end)
	{
	$string=" " . $string;
	$ini   =strpos($string, $start);

	if ($ini == 0)
    	return "";

	$ini+=strlen($start);
	$len=strpos($string, $end, $ini) - $ini;
	return substr($string, $ini, $len);
    }

    //another helper function
    private function file_get_contents_curl($url, $referer="", $ua="Mozilla/5.0 (X11; U; Linux i686; en-US) AppleWebKit/534.7 (KHTML, like Gecko) Ubuntu/10.04 Chromium/7.0.514.0 Chrome/7.0.514.0 Safari/534.7")
    {
	$ch=curl_init($url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Set curl to return the data instead of printing it to the browser.
	if ($referer!="") {
    	    curl_setopt($ch, CURLOPT_REFERER, $referer);
	} else {
    	    curl_setopt($ch, CURLOPT_REFERER, $url);
	}
	//curl_setopt($ch, CURLOPT_URL, $url);
	if ($ua!="") {
		curl_setopt($ch, CURLOPT_USERAGENT, $ua);
	} else {
		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	}

	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	$data=curl_exec($ch);
	curl_close ($ch);

    return $data;
    }

    //this is the main function
    private function msn_indexed($uri, $badge = 0)
    {
	$uri =trim(str_ireplace('https://', '', $uri));
	$uri =trim(str_ireplace('http://', '', $uri));
	$uri =trim(str_ireplace('https', '', $uri));
	$uri =trim(str_ireplace('http', '', $uri));
	$url ='http://www.bing.com/search?q=site%3A' .urlencode( $uri).'&go=&qs=n&sk=&form=QBLH&mkt=en-WW';
	$data=$this->file_get_contents_curl($url);

	if (strpos($data, 'sb_count')!==FALSE) {
	    return (integer)str_replace(",", "", trim($this->between($data, '<span class="sb_count" id="count">', 'result')));
	} else {
	    return 0;
	}
    }
}

//$url = 'php.net';
//$bing = new BING($url);
//$result = $bing->getCountIndexedPageBing();
//print_r($result);
?>