<?php
class DomainAge{
  private $WHOIS_SERVERS=array(
      "com"               =>  array("whois.verisign-grs.com","/(?<=Creation\sDate:\s)[0-9]+-[a-z]{3}-[0-9]+/","/(?<=Expiration\sDate:\s)[0-9]+-[a-z]{3}-[0-9]+/"),
      "net"               =>  array("whois.verisign-grs.com","/(?<=Creation\sDate:\s)[0-9]+-[a-z]{3}-[0-9]+/","/(?<=Expiration\sDate:\s)[0-9]+-[a-z]{3}-[0-9]+/"),
      "org"               =>  array("whois.pir.org","/(?<=Creation\sDate:\s)[0-9]+-[0-9]+-[0-9]+[A-Z]{1}[0-9]+:[0-9]+:[0-9]+[A-Z]{1}/","/(?<=Expiry\sDate:\s)[0-9]+-[0-9]+-[0-9]+[A-Z]{1}[0-9]+:[0-9]+:[0-9]+[A-Z]{1}/"),
      "info"              =>  array("whois.afilias.info","/(?<=Creation\sDate:\s)[0-9]+-[0-9]+-[0-9]+[A-Z]{1}[0-9]+:[0-9]+:[0-9]+[A-Z]{1}/","/(?<=Expiry\sDate:\s)[0-9]+-[0-9]+-[0-9]+[A-Z]{1}[0-9]+:[0-9]+:[0-9]+[A-Z]{1}/"),
      "biz"               =>  array("whois.neulevel.biz","/(?<=Registration\sDate:\s)[a-zA-Z]{3}\s[a-zA-Z]{3}\s[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]{3}\s[0-9]+/","/(?<=Expiration\sDate:\s)[a-zA-Z]{3}\s[a-zA-Z]{3}\s[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]{3}\s[0-9]+/"),
      "us"                =>  array("whois.nic.us","/(?<=Registration\sDate:\s)[a-zA-Z]{3}\s[a-zA-Z]{3}\s[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]{3}\s[0-9]+/","/(?<=Expiration\sDate:\s)[a-zA-Z]{3}\s[a-zA-Z]{3}\s[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]{3}\s[0-9]+/"),
      "uk"                =>  array("whois.nic.uk","/(?<=Registered\son:\s)[a-z]+\s[a-zA-Z]{3}-[0-9]+/","//"),
      "ca"                =>  array("whois.cira.ca","/(?<=Creation\sdate:\s)[0-9]+/[0-9]+/[0-9]+/","/(?<=Expiry\sdate:\s)[0-9]+/[0-9]+/[0-9]+/"),
      "tel"               =>  array("whois.nic.tel","/(?<=Registration\sDate:\s)[a-zA-Z]{3}\s[a-zA-Z]{3}\s[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]{3}\s[0-9]+/","/(?<=Expiration\sDate:\s)[a-zA-Z]{3}\s[a-zA-Z]{3}\s[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]{3}\s[0-9]+/"),
      "ie"                =>  array("whois.iedr.ie","/(?<=registration:\s)[0-9]+-[a-zA-Z]+-[0-9]+/","/(?<=renewal:\s)[0-9]+-[a-zA-Z]+-[0-9]+/"),
      "it"                =>  array("whois.nic.it","/(?<=Status:\s[a-z]+\sCreated:\s)[0-9]+-[0-9]+-[0-9]+\s[0-9]+:[0-9]+:[0-9]+/","/(?<=Expire\sDate:\s)[0-9]+-[0-9]+-[0-9]+/"),
      "cc"                =>  array("whois.nic.cc","/(?<=Creation\sDate:\s)[0-9]+-[0-9]+-[0-9]+[A-Z]{1}[0-9]+:[0-9]+:[0-9]+[A-Z]{1}/","/(?<=Expiry\sDate:\s)[0-9]+-[0-9]+-[0-9]+[A-Z]{1}[0-9]+:[0-9]+:[0-9]+[A-Z]{1}/"),
      "ws"                =>  array("whois.nic.ws","/(?<=Creation\sDate:\s)[0-9]+-[0-9]+-[0-9]+/","/(?<=Registration\sExpiration\sDate:\s)[0-9]+-[0-9]+-[0-9]+/"),
      "sc"                =>  array("whois2.afilias-grs.net","/(?<=Created\sOn:)[0-9]+-[a-zA-Z]{3}-[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]+/","/(?<=Expiration\sDate:)[0-9]+-[a-zA-Z]+-[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]+/"),
      "mobi"              =>  array("whois.dotmobiregistry.net","/(?<=Created\sOn:)[0-9]+-[a-zA-Z]{3}-[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]+/","/(?<=Expiration\sDate:)[0-9]+-[a-zA-Z]+-[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]+/"),
      "pro"               =>  array("whois.registrypro.pro","/(?<=Created\sOn:)[0-9]+-[a-zA-Z]{3}-[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]+/","/(?<=Expiration\sDate:)[0-9]+-[a-zA-Z]+-[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]+/"),
      "edu"               =>  array("whois.educause.net","/(?<=Domain\srecord\sactivated:\s)[0-9]+-[a-zA-Z]{3}-[0-9]+/","/(?<=Domain\sexpires:\s)[0-9]+-[a-zA-Z]+-[0-9]+/"),
      "tv"                =>  array("whois.nic.tv","/(?<=Creation\sDate:\s)[0-9]+-[0-9]+-[0-9]+T[0-9]+:[0-9]+:[0-9]+Z/","/(?<=Registry\sExpiry\sDate:\s)[0-9]+-[0-9]+-[0-9]+[A-Z]{1}[0-9]+:[0-9]+:[0-9]+[A-Z]{1}/"),
      "travel"            =>  array("whois.nic.travel","/(?<=Domain\sRegistration\sDate:\s)[a-zA-Z]{3}\s[a-zA-Z]{3}\s[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]{3}\s[0-9]+/","/(?<=Domain\sExpiration\sDate:\s)[a-zA-Z]+\s[a-zA-Z]+\s[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]+\s[0-9]+/"),
      "in"                =>  array("whois.inregistry.net","/(?<=Created\sOn:)[0-9]+-[a-zA-Z]{3}-[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]+/","/(?<=Expiration\sDate:)[0-9]+-[a-zA-Z]+-[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]+/"),
      "me"                =>  array("whois.nic.me","/(?<=Domain\sCreate\sDate:)[0-9]+-[a-zA-Z]{3}-[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]+/","/(?<=Domain\sExpiration\sDate:)[0-9]+-[a-zA-Z]+-[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]+/"),
      "cn"                =>  array("whois.cnnic.cn","/(?<=Registration\sDate:\s)[0-9]+-[0-9]+-[0-9]+\s[0-9]+:[0-9]+:[0-9]+/","/(?<=Expiration\sDate:\s)[0-9]+-[0-9]+-[0-9]+\s[0-9]+:[0-9]+:[0-9]+/"),
      "asia"              =>  array("whois.nic.asia","/(?<=Domain\sCreate\sDate:)[0-9]+-[a-zA-Z]{3}-[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]{3}/","//"),
      "ro"                =>  array("whois.rotld.ro","/(?<=Registered\sOn:\s)[0-9]+-[0-9]+-[0-9]+/","//"),
      "aero"              =>  array("whois.aero","/(?<=Created\sOn:)[0-9]+-[a-zA-Z]{3}-[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]+/","/(?<=Expires\sOn:)[0-9]+-[a-zA-Z]+-[0-9]+\s[0-9]+:[0-9]+:[0-9]+\s[A-Z]+/"),
      "nu"                =>  array("whois.nic.nu","/(?<=created:\s)[0-9]+-[0-9]+-[0-9]+/","/(?<=expires:\s)[0-9]+-[0-9]+-[0-9]+/")
  );
  
public function age($domain)
{
    if($parsed = parse_url($domain)) {
        $host = $parsed['host'];
        $domain_parts = explode(".", $host);
        $tld = strtolower(array_pop($domain_parts));
        $name = strtolower(array_pop($domain_parts));

        if(!$server=$this->WHOIS_SERVERS[$tld][0]) {
           return false;
        }

        $res=$this->queryWhois($server, $name.'.'.$tld);
        if(preg_match($this->WHOIS_SERVERS[$tld][1],$res,$match))
        {
        //var_dump($match);
           $answer['created'] = $match[0];
        }
        else{
           $answer['created'] = "Not available";
        }
        if(preg_match($this->WHOIS_SERVERS[$tld][2],$res,$match))
        {
        //var_dump($match);
           $answer['expired'] = $match[0];
        }else{
           $answer['expired'] = "Not available";
        }
        return $answer;
        }
   else {
       $answer['created'] = "Not available";
       $answer['expired'] = "Not available";
       return $answer;
   }
}

private function queryWhois($server,$domain)
{
    $fp = @fsockopen($server, 43, $errno, $errstr, 20) or die("Socket Error " . $errno . " - " . $errstr);
    if($server=="whois.verisign-grs.com")
        $domain="=".$domain;
    fputs($fp, $domain . "\r\n");
    $out = "";
    while(!feof($fp)){
        $out .= fgets($fp);
    }
    fclose($fp);
    return $out;
}
}

class SiteUtils{
	private $page;
	private $robotstxt;
	
	public function __construct($page){
	    $this->page = $page;
	}
	
	public function hasRobots(){
	    $parsed = parse_url($this->page);
		//error_log(implode("\n", $parsed)."\n", 3, "/var/www4seo/error.log");
	    $robotstxt = @file("{$parsed['scheme']}://{$parsed['host']}/robots.txt");
		//error_log("{$parsed['scheme']}://{$parsed['host']}/robots.txt"."\n", 3, "/var/www4seo/error.log");
		//error_log(empty($robotstxt)."\n", 3, "/var/www4seo/error.log");
	    if(empty($robotstxt)){
	        return false;
	    }else{
		$this->robotstxt = $robotstxt;
		return true;
	    }
	}
	
	public function hasSitemaps(){
	    $str;
	    $parsed = parse_url($this->page);
	    $sitemap = @file("{$parsed['scheme']}://{$parsed['host']}/sitemap.xml");
	    $sm = "{$parsed['scheme']}://{$parsed['host']}/sitemap.xml";
	    //$robots = "robots.txt</a>";
	    if(empty($sitemap)){
	        if($this->hasRobots()){
	    	    $arr = $this->robotstxt;
	    	    for($i = 0;$i<count($arr);$i++){
		    		if(!preg_match("/Sitemap:/i",$arr[$i]))continue;
		    		$str = $arr[$i];
		    		$str = trim(substr($str,8));
		    		$sitemap = @file($str);
		    		if(empty($sitemap)){
		    		    return false;
		    		}else{
		    		    return $str;
		    		}
	    	    }
	    	    return false;
	        }else{
	    	    return false;
	        }
	    }else{
			return $sm;
	    }
	}
	
	public function hasFavicon(){
	    $str;
	    $parsed = parse_url($this->page);
	    $sitemap = @file("{$parsed['scheme']}://{$parsed['host']}/favicon.ico");
	    if(empty($sitemap)){
			return false;
	    }else{
			return true;
	    }
	}

	public function getDomainAge(){
		$w=new DomainAge();
		return $w->age($this->page);
	}
	
	/*
	*	www resolve - false if redirection true
	*/
	public function getWWWResolve(){
	    $redirection = false;
	    $www = false;
	    if(!preg_match("/www\./i",$this->page))$www = true;
	    $parsed = parse_url($this->page);
	    $host = $parsed['host'];
	    if(!$this->is_redirect_url($host) ||  !$this->is_redirect_url('www'.$host)) $redirection = true;
	    return $redirection;
	}
	
	private function is_redirect_url($url){
	    $ch = curl_init();
            $timeout = 20;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION,false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:16.0) Gecko/20100101 Firefox/16.0');
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURL_NOBODY, true);
            $page = curl_exec($ch);
            $info = curl_getinfo($ch);
            if(!empty($info['redirect_url'])){
        	return false;
            }else{
        	return true;;
            }
            curl_close($ch);
	}
	/*
	*	Ip Canonicalization - true if redirection none
	*/
	public function getIpCanonicalization(){
	    $parsed = parse_url($this->page);
	    $host = $parsed['host'];
	    $ip = gethostbyname($host);
	    $redirection = $this->is_redirect_url($ip);
	    return $redirection;
	}
}
    
    //$a = new DomainAge();
    //$a = new SiteUtils("http://seo.bevolved.net/");
    //$a = new SiteUtils("http://yaltakino.com/");
    //$a = new SiteUtils("www.alfacircles.com");
    //$a->age("https://developer.mozilla.org");
    //print_r(($a->getIpCanonicalization())?"true":"false");
    //print_r($b = ($a->hasRobots())?"true":"false");
    //echo '<br/>';
    //print_r($b = ($a->hasSitemaps())?"true":"false");
?>
