<?php
/*error_reporting(-1);
require_once('W3CValidator.php');
$url = "http://www.google.com";
$validator = new W3CValidator($url);
var_dump ($_SESSION['validate'] = $output['validate'] = $validator->validate() );

exit;*/


error_reporting(E_ERROR | E_PARSE);
function getAllStat($i,$url){

    if(strpos($url,"://")===false && substr($url,0,1)!="/") $url = "http://".$url;
    $parsed = parse_url($url);
    if (!isset($parsed['scheme'])) {
        $parsed['scheme'] = 'http';
    }
    $url = $parsed['scheme'].'://'.$parsed['host'];
    require_once('PageParser.php');
    require_once('WOT.php');
    require_once('W3CValidator.php');
    require_once('SEO.php');
    require_once('BING.php');
    require_once('SiteUtils.php');
    require_once('SEMRush.php');
    require_once('../../createimage.php');
    
    $_validator = new W3CValidator($url);
    $_SESSION['allstat'][$url]['validate'] = $_validator->validate();
    $_pageParser = new PageParser($url);
    $_pageParser->parsePage();
    $_SESSION['allstat'][$url]['countImagesAltTexts'] = $_pageParser->countImagesAltTexts();
    $_SESSION['allstat'][$url]['checkCleanUrls'] = $_pageParser->checkCleanUrls();
    $_siteutils = new SiteUtils($url);
    $_SESSION['allstat'][$url]['getWWWResolve'] = ($_siteutils->getWWWResolve())?"true":"false";
    $_SESSION['allstat'][$url]['getIpCanonicalization'] = ($_siteutils->getIpCanonicalization())?"true":"false";
    $_SESSION['allstat'][$url]['hasFavicon'] = ($_siteutils->hasFavicon())?"true":"false";
    $_SESSION['allstat'][$url]['checkLang'] = $_pageParser->checkLang();
    $_SESSION['allstat'][$url]['checkMetaCharset'] = $_pageParser->checkMetaCharset();
    $_seo = new SEO($url);
    $_SESSION['allstat'][$url]['getPagespeedScore'] = $_seo->getPagespeedScore();

    $_pr = $_seo->getGoogleToolbarPageRank();
    if (strpos($_pr,'Failed') !== false) {
        $_SESSION['allstat'][$url]['getGoogleToolbarPageRank'] = 0;
    } else {
        $_SESSION['allstat'][$url]['getGoogleToolbarPageRank'] = $_seo->getGoogleToolbarPageRank();
    }
    $_SESSION['allstat'][$url]['getSiteindexTotal'] = $_seo->getSiteindexTotal($url);
    $_SESSION['allstat'][$url]['getGoogleBacklinksTotal'] = $_seo->getGoogleBacklinksTotal();
    $_SESSION['allstat'][$url]['getAlexaGlobalRank'] = $_seo->getAlexaGlobalRank();
    $_wot = new WOT($url);
    $_getWOT = $_wot->getAllReputation();
    $_getWOT = reset($_getWOT);
    $_SESSION['allstat'][$url]['getWOT'] = $_getWOT;
    $_seoBING = new BING($url);
    $_SESSION['allstat'][$url]['getSiteindexTotalBing'] = $_seoBING->getCountIndexedPageBing();

    $_siteutils = new SiteUtils($url);
    $_SESSION['allstat'][$url]['hasRobots'] = ($_siteutils->hasRobots())?"true":"false";
    $_sitemap = $_siteutils->hasSitemaps();
    $_SESSION['allstat'][$url]['hasSitemaps'] = ($_sitemap != 'false')?$_sitemap:"false";
    $_SESSION['allstat'][$url]['checkTitle'] = $_pageParser->checkTitle();
    $_SESSION['allstat'][$url]['checkMetaDescription'] = $_pageParser->checkMetaDescription();
    $_SESSION['allstat'][$url]['checkMetaKeywords'] = $_pageParser->checkMetaKeywords();
    $_SESSION['allstat'][$url]['countWords'] = $_pageParser->countWords();
    $_SESSION['allstat'][$url]['countH1'] = $_pageParser->countH1();


    $_SESSION['allstat'][$url]['getGooglePlusOnes'] = $_seo->getGooglePlusOnes();
    $_SESSION['allstat'][$url]['getFacebookInteractions'] = $_seo->getFacebookInteractions();
    $_SESSION['allstat'][$url]['getTwitterMentions'] = $_seo->getTwitterMentions();
    $websiteToImage = new WebsiteToImage();
    $_SESSION['allstat'][$url]['img'] = $websiteToImage->setProgramPath('../../wkhtmltoimage.exe')->setOutputFile('../../tmp')->setUrl($url)->start()->getScreenShot();
    require_once('SEMRush.php');
    $a = new SEMRush($url);
    $_SESSION['allstat'][$url]['adwords'] = $a->getSEMRushAdWords();
    $_SESSION['allstat'][$url]['domainRank'] = $a->getSEMRushDomainRank();
    $_SESSION['allstat'][$url]['organicKeywords'] = $a->getSEMRushOrganicKeywords();
}


function setKeywords($i, $url, $count){
    if(strpos($url,"://")===false && substr($url,0,1)!="/") $url = "http://".$url;
    $parsed = parse_url($url);
    if (!isset($parsed['scheme'])) {
        $parsed['scheme'] = 'http';
    }
    $url = $parsed['scheme'].'://'.$parsed['host'];
    $_SESSION['allstat'][$url]['commonKeywords'] = $count;
}

if (isset($_POST["url"])) {
    $serv = $_POST["service"];
    $url = $_POST["url"];

    if(strpos($url,"://")===false && substr($url,0,1)!="/") $url = "http://".$url;
    $parsed = parse_url($url);
    $parsed['scheme'] = 'http';
    $url = $parsed['scheme'].'://'.$parsed['host'];

    session_start();
    $_SESSION["url"] = $url;
    
    if($serv == 'parser') {
        require_once('PageParser.php');
        $pageParser = new PageParser($url);
        $pageParser->parsePage();
        $_SESSION['countImagesAltTexts'] = $output['countImagesAltTexts'] = $pageParser->countImagesAltTexts();
        $_SESSION['checkTitle'] = $output['checkTitle'] = $pageParser->checkTitle();
        $_SESSION['checkMetaDescription'] = $output['checkMetaDescription'] = $pageParser->checkMetaDescription();
        $_SESSION['checkMetaKeywords'] = $output['checkMetaKeywords'] = $pageParser->checkMetaKeywords();
        $_SESSION['countWords'] = $output['countWords'] = $pageParser->countWords();
        $_SESSION['getMostMeetWords'] = $output['getMostMeetWords'] = $pageParser->getMostMeetWords();
        $_SESSION['checkCleanUrls'] = $output['checkCleanUrls'] = $pageParser->checkCleanUrls();
        $_SESSION['pagesize'] = $output['pagesize'] = $pageParser->getPageSize();
        $_SESSION['countH1'] = $output['countH1'] = $pageParser->countH1();
        $_SESSION['getPageSize'] = $output['getPageSize'] = $pageParser->getPageSize();
        $_SESSION['checkLang'] = $output['checkLang'] = $pageParser->checkLang();
        $_SESSION['checkMetaCharset'] = $output['checkMetaCharset'] = $pageParser->checkMetaCharset();
        $_SESSION['pdfName'] = 'tmp/html/'.date("ymd_his", time()).rand(1,500);
        require_once('../../createimage.php');
        $websiteToImage = new WebsiteToImage();
        $_SESSION['img'] = $websiteToImage->setProgramPath('../../wkhtmltoimage.exe')->setOutputFile('../../tmp')->setUrl($url)->start()->getMainScreenShot();
    } else if($serv == 'getWOT') {
        require_once('WOT.php');
        $wot = new WOT($url);
        $_SESSION['getWOT'] = $output['getWOT'] = $wot->getAllReputation();
    } else if($serv == 'validate') {
        require_once('W3CValidator.php');
        $validator = new W3CValidator($url);
        $_SESSION['validate'] = $output['validate'] = $validator->validate();
    } else if($serv == 'getGoogleToolbarPageRank' || $serv == 'getGoogleBacklinksTotal' || $serv == 'getGooglePlusOnes' || 
        $serv == 'getFacebookInteractions' || $serv == 'getTwitterMentions' || $serv == 'getPagespeedAnalysis' || 
        $serv == 'getPagespeedScore' || $serv == 'getSiteindexTotal' || $serv == 'getAlexaGlobalRank') {
        require_once('SEO.php');
        $seo = new SEO($url);
        if($serv == 'getGoogleToolbarPageRank') {
            $pr = $seo->getGoogleToolbarPageRank();
            if (strpos($pr,'Failed') !== false) {
                $_SESSION['getGoogleToolbarPageRank'] = $output['getGoogleToolbarPageRank'] = 0;
            } else {
                $_SESSION['getGoogleToolbarPageRank'] = $output['getGoogleToolbarPageRank'] = $seo->getGoogleToolbarPageRank();
            } 
        } else if($serv == 'getGoogleBacklinksTotal') {
            $_SESSION['getGoogleBacklinksTotal'] = $output['getGoogleBacklinksTotal'] = $seo->getGoogleBacklinksTotal();
        } else if($serv == 'getGooglePlusOnes') {
            $_SESSION['getGooglePlusOnes'] = $output['getGooglePlusOnes'] = $seo->getGooglePlusOnes();
        } else if($serv == 'getFacebookInteractions') {
            $_SESSION['getFacebookInteractions'] = $output['getFacebookInteractions'] = $seo->getFacebookInteractions();
        } else if($serv == 'getTwitterMentions') {
            $_SESSION['getTwitterMentions'] = $output['getTwitterMentions'] = $seo->getTwitterMentions();
        } else if($serv == 'getPagespeedAnalysis') {
            $_SESSION['getPagespeedAnalysis'] = $output['getPagespeedAnalysis'] = $seo->getPagespeedAnalysis();
        } else if($serv == 'getPagespeedScore') {
            $_SESSION['getPagespeedScore'] = $output['getPagespeedScore'] = $seo->getPagespeedScore();
        } else if($serv == 'getSiteindexTotal') {
            $_SESSION['getSiteindexTotal'] = $output['getSiteindexTotal'] = $seo->getSiteindexTotal($url);
        } else if($serv == 'getAlexaGlobalRank') {
            $_SESSION['getAlexaGlobalRank'] = $output['getAlexaGlobalRank'] = $seo->getAlexaGlobalRank();
        } else {
            $output['error'] = 'Service not Found';
        } 
    } else if ($serv == 'getSiteindexTotalBing') {
        require_once('BING.php');
        $seo = new BING($url);
        $_SESSION['getSiteindexTotalBing'] = $output['getSiteindexTotalBing'] = $seo->getCountIndexedPageBing();
    } else if($serv == 'hasRobots' || $serv == 'hasSitemaps' || $serv == 'getDomainAge' || $serv == 'getWWWResolve' || 
        $serv == 'getIpCanonicalization' || $serv == 'hasFavicon') {
        require_once('SiteUtils.php');
        $siteutils = new SiteUtils($url);
        if($serv == 'hasRobots') {
            $_SESSION['hasRobots'] = $output['hasRobots'] = ($siteutils->hasRobots()) ? "true" : "false";
        } else if($serv == 'hasSitemaps') {
            $sitemap = $siteutils->hasSitemaps();
            $_SESSION['hasSitemaps'] = $output['hasSitemaps'] = ($sitemap != 'false') ? $sitemap : "false";
        } else if($serv == 'getDomainAge') {
            $tmp = json_encode($siteutils->getDomainAge());
            $_SESSION['getDomainAge'] = $output['getDomainAge'] = $tmp;
        } else if($serv == 'getWWWResolve') {
            $_SESSION['getWWWResolve'] = $output['getWWWResolve'] = ($siteutils->getWWWResolve())?"true":"false";
        } else if($serv == 'getIpCanonicalization') {
            $_SESSION['getIpCanonicalization'] = $output['getIpCanonicalization'] = ($siteutils->getIpCanonicalization())?"true":"false";
        } else if($serv == 'hasFavicon') {
            $_SESSION['hasFavicon'] = $output['hasFavicon'] = ($siteutils->hasFavicon())?"true":"false";
        } else {
            $output['error'] = 'Service not Found';
        } 
    } else if ($serv == 'getSEMRushDomainRank' || $serv == 'getSEMRushOrganicKeywords') {
        require_once('SEMRush.php');
        $seo = new SEMRush($url);
        if($serv == 'getSEMRushDomainRank') {
            $_SESSION['getSEMRushDomainRank'] = $output['getSEMRushDomainRank'] = $seo->getSEMRushDomainRank();
        } else if('getSEMRushOrganicKeywords') {
            $_SESSION['getSEMRushOrganicKeywords'] = $output['getSEMRushOrganicKeywords'] = $seo->getSEMRushOrganicKeywords();
        } else {
            $output['error'] = 'Service not Found';
        } 
    } else if($serv == 'clean') {
        session_unset();
        session_destroy();
    } else if($serv == 'competitors') {
        $urlArray = array();
        $urlArray = array();
        $_SESSION['allstat'] = array();

        require_once('SEMRush.php');
        $seo = new SEMRush($url);
        $tmps = $seo->getSEMRushCompetitors($url);
        if(count($tmps) > 0 ){
            foreach($tmps as $url => $keywords) {
                $urlArray[] = $url;
                setKeywords(0,$url, $keywords);
            }
        }
        $_SESSION['competitors'] = $urlArray;
        $output = count($urlArray);
    } else if($serv == 'competitorsManual') {
        $urlArray = array();
        $_SESSION['allstat'] = array();
        if($_POST["count"] > 0) {
            if (isset($_POST["competitor0"])) {
                $urlArray[] = fixUrl($_POST["competitor0"]);
            }
            if (isset($_POST["competitor1"])) {
                $urlArray[] = fixUrl($_POST["competitor1"]);
            }
            if (isset($_POST["competitor2"])) {
                $urlArray[] = fixUrl($_POST["competitor2"]);
            }
        }
        $_SESSION['competitors'] = $urlArray;
        $output = count($urlArray);
    } else if($serv == 'competitor1') {
        getAllStat(1,$_SESSION['competitors'][1]);
    } else if($serv == 'competitor2') {
        getAllStat(2,$_SESSION['competitors'][2]);
    } else if($serv == 'competitor3') {
        getAllStat(3,$_SESSION['competitors'][3]);
    } else if($serv == 'competitor0') {
        getAllStat(0,$_SESSION['competitors'][0]);
    } else if($serv == 'start') {
        $_SESSION['userName'] = $_POST["userName"];
        $_SESSION['userEmail'] = $_POST["userEmail"];
        $_SESSION['userPhone'] = $_POST["userPhone"];
        $_SESSION['competitorsType'] = $_POST["competitorsType"];
        $_SESSION['competitor1'] = $_POST["competitor1"];
        $_SESSION['competitor2'] = $_POST["competitor2"];
        $_SESSION['competitor3'] = $_POST["competitor3"];
        $_SESSION['logo'] = $_POST["logo"] == "undefined" ? null : $_POST["logo"];
        include_once('DB.php');
        $competitorsDB  = $_SESSION['competitorsType'] == 'true' ? 'Auto' : $_SESSION['competitor1'].'|'.$_SESSION['competitor2'].'|'.$_SESSION['competitor3'];
        $stmt = $mysql->prepare('INSERT INTO users (email, url, name, phone, competitors) VALUES (?, ?, ?, ?, ?)');
        $stmt->bind_param('sssss', $_SESSION['userEmail'], $url, $_SESSION['userName'], $_SESSION['userPhone'], $competitorsDB);
        $stmt->execute();
    } else if($serv == 'finish') {
        $_SESSION['finish'] = true;
        $output = true;
    } else {
        $output['error'] = 'Service not Found';
    } 
} else {
    $output['error'] = 'URL is not set';
} 
$output = json_encode($output);
echo $output;
function fixUrl($url) {
    if(strpos($url,"://")===false && substr($url,0,1)!="/") $url = "http://".$url;
    $parsed = parse_url($url);
    $parsed['scheme'] = 'http';
    $url = $parsed['scheme'].'://'.$parsed['host'];
    return $url;
}
?>