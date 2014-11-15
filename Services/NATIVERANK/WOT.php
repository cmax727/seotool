<?php
require_once '../../SEOstats/vendor/autoload.php';
use \SEOstats\Services\Alexa as Alexa;
//class AlocateSeostatException extends Exception {}

class WOT {
    private $page;
    private $api = 'http://api.mywot.com/0.4/public_link_json2?hosts=';
    private $key = '958618f6c318bdecc9780edf7d08f3779dd6baa2';
    private $results;
    public function __construct($page){
	//$url = '';
	//if(!preg_match("/http:\/\//",$page))$url = 'http://'.$page;
	$this->page = $page;

    }
    
    public  function getAllReputation(){
		try
		{
		    //print_r($this->api.$this->page.'/&key='.$this->key);
		    $this->results = file_get_contents($this->api.$this->page.'/&key='.$this->key);//call to api server
		    
		    $this->results = json_decode($this->results);
		    //var_dump($this->results);
		} catch (Exception $e) {
		    $this->results = 0;
		}
		return $this->results;
    }
}
//$page = 'http://ya.org/';
//$a = new WOT('www.beliefnet.com');
//$b = $a->getAllReputation();
//var_dump($b);
//print_r($a->getSiteindexTotal());
//print_r($a->getPagespeedScore());
/*
echo 'Google Backlinks Total site of '.$page.' is '.$a->getGoogleBacklinksTotal().'<br/>';
echo 'Google+ PlusOnes site of '.$page.' is '.$a->getGooglePlusOnes().'<br/>';
echo 'Facebook Interactions site of '.$page.' is ';
print_r($a->getFacebookInteractions());echo '<br/>';
echo 'Twitter Mentions site of '.$page.' is '.$a->getTwitterMentions().'<br/>';
*/
