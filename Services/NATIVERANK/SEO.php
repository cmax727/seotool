<?php
require_once '../../SEOstats/vendor/autoload.php';
use \SEOstats\Services\Alexa as Alexa;
//class AlocateSeostatException extends Exception {}

class SEO {
    private $page;
    private $pagerank;
    private $BacklinksTotal;
    private $FacebookShares;
    private $GooglePlusShares;
    private $PagespeedAnalysis;
    private $TwitterShares;
    private $PagespeedScore;
    private $SiteindexTotal;
    private $AlexaGraph;
    
    public function __construct($page){
	$url = '';
	//if(!preg_match("/http:\/\//",$page))$url = 'http://'.$page;
	$this->page = $page;

    }
    
    public function getGoogleToolbarPageRank(){
	try
	{
	    $this->pagerank = \SEOstats\Services\Google::getPageRank($this->page);
	} catch (Exception $e) {
	    $this->pagerank = 0;
	}
	return $this->pagerank;
    }
    
    public function getGoogleBacklinksTotal(){
	try
	{
	    $this->BacklinksTotal = \SEOstats\Services\Google::getBacklinksTotal($this->page);
	} catch (Exception $e) {
	    $this->BacklinksTotal = 0;
	}
	return $this->BacklinksTotal;
    }
    
    public function getGooglePlusOnes(){
	try
	{
	    $this->GooglePlusShares = \SEOstats\Services\Social::getGooglePlusShares($this->page);
	} catch (Exception $e) {
	    //var_dump($e);
	    $this->GooglePlusShares = 0;
	}
	return $this->GooglePlusShares;
    }
    
    public function getPagespeedAnalysis(){
	try
	{
	    $this->PagespeedAnalysis = \SEOstats\Services\Google::getPagespeedAnalysis($this->page);
	} catch (Exception $e) {
	    $this->PagespeedAnalysis = 0;
	}
	return $this->PagespeedAnalysis;
    }
    
    public function getPagespeedScore(){
	try
	{
	    $this->PagespeedScore = \SEOstats\Services\Google::getPagespeedScore($this->page);
	} catch (Exception $e) {
	    $this->PagespeedScore = 0;
	}
	return $this->PagespeedScore;
    }
    
    public function getSiteindexTotal($url){
	try
	{
	    //$parsed = parse_url($this->page);
	    $this->SiteindexTotal = \SEOstats\Services\Google::getSiteindexTotal($url);
	} catch (Exception $e) {
	    $this->SiteindexTotal = 0;
	}
	return $this->SiteindexTotal;
    }
    
    public function getFacebookInteractions(){
	try
	{
	    $this->FacebookShares = \SEOstats\Services\Social::getFacebookShares($this->page);
	} catch (Exception $e) {
	    $this->FacebookShares = 0;
	}
	return $this->FacebookShares;
    }
    
    public function getTwitterMentions(){
	try
	{
	    $this->FacebookShares = \SEOstats\Services\Social::getTwitterShares($this->page);
	} catch (Exception $e) {
	    $this->FacebookShares = 0;
	}
	return $this->FacebookShares;
    }
    
    public function getAlexaGlobalRank(){
	try
	{
	    //file_put_contents("/tmp/my.log",$this->page);
	    $this->AlexaGraph = Alexa::getMyGlobalRank($this->page);
	}catch (Exeption $e) {
	    //var_dump($e);
	    $this->AlexaGraph = 0;
	}
	return $this->AlexaGraph;
    }	
}
/*$page = array();
$page[] = "http://answers.com/";
$page[] = "http://ask.com/";
$page[] = "http://facebook.com/";
$page[] = "http://yelp.com/";
//var_dump($page);
for($i = 0; $i < count($page); $i++){
    $a = new SEO($page);
    print_r('/'.$a->getSiteindexTotal($page[$i]));
    //unset($a);
}*/
/*$page2 = 'http://kayak.com/';
$a = new SEO($page2);
print_r($a->getGooglePlusOnes());*/
//print_r($a->getSiteindexTotal());
//print_r($a->getPagespeedScore());
/*
echo 'Google Backlinks Total site of '.$page.' is '.$a->getGoogleBacklinksTotal().'<br/>';
echo 'Google+ PlusOnes site of '.$page.' is '.$a->getGooglePlusOnes().'<br/>';
echo 'Facebook Interactions site of '.$page.' is ';
print_r($a->getFacebookInteractions());echo '<br/>';
echo 'Twitter Mentions site of '.$page.' is '.$a->getTwitterMentions().'<br/>';
*/
