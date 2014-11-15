<?php
require_once '../../SEOstats/vendor/autoload.php';
//use \SEOstats\Services\Alexa as Alexa;
class AlocateSeostatException extends Exception {}

class SEMRush {
    private $page;
    private $tmp;
    public function __construct($page){
        $this->page = $page;
    }

    public function getSEMRushDomainRank(){
        try
        {
            $this->tmp = \SEOstats\Services\SemRush::getDomainRank($this->page);
        } catch (Exception $e) {
            $this->tmp = 0;
        }
        return $this->tmp;
    }

    public function getSEMRushOrganicKeywords(){
        try
        {
            $this->tmp = \SEOstats\Services\SemRush::getOrganicKeywords($this->page);
        } catch (Exception $e) {
            $this->tmp = 0;
        }
        return $this->tmp;
    }

    public function getSEMRushCompetitors(){
        try
        {
            $this->tmp = \SEOstats\Services\SemRush::getCompetitorsBevolvedEdition($this->page);
            //print_r($this->page);
        } catch (Exception $e) {
            //print_r($e);
            $this->tmp = 0;
        }
        return $this->tmp;
    }

    public function getSEMRushAdWords(){
        try
        {
            $this->tmp = \SEOstats\Services\SemRush::getAdWordsBevolvedEdition($this->page);
            //print_r($this->page);
        } catch (Exception $e) {
            //print_r($e);
            $this->tmp = 0;
        }
        return $this->tmp;
    }
}

//$a = new SEMRush("http://yahoo.com/");
//print_r($a->getSEMRushOrganicKeywords());
//print_r($a->getSEMRushCompetitors());