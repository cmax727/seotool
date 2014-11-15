<?php 

    session_start();
    $url =  $_SESSION['url'];
    /*if (!$url) {
      header("Location: index.php");
      die();
    }*/
    /*
    *   Domain Age
    */
    $getDomainAge = json_decode($_SESSION['getDomainAge'],true);
    //file_put_contents("/tmp/my.log",$_SESSION['getDomainAge'].'\r\n',FILE_APPEND);
    //file_put_contents("/tmp/my.log",$getDomainAge['created'],FILE_APPEND);
    /*
    *   End Domain Age
    */
    /*
    *   Alexa Rank
    */
    $getAlexaGlobalRank =  $_SESSION['getAlexaGlobalRank'];
    /*
    *   END Alexa Rank
    */


    /*
    *   Page Size
    */
    $pagesize =  $_SESSION['pagesize'];
    /*
    *   Page Size
    */

    /*
    *   SEMRush
    */
    $getSEMRushDomainRank =  $_SESSION['getSEMRushDomainRank'];
    $getSEMRushOrganicKeywords =  $_SESSION['getSEMRushOrganicKeywords'];
    /*
    *   END SEMRush
    */
    /*
    *   WOT Reputation - get all json data  from wot api server
    */
    $getWOT = $_SESSION['getWOT'];
    $getWOT =  reset($getWOT);
    
    $_0 = '0';
    $_4 = '4';

    $trustworthiness = $getWOT->$_0;
    $trustworthiness = $trustworthiness[0];
    $childsafety = $getWOT->$_4;
    $childsafety = $childsafety[0];
    $categories = $getWOT->categories;
    /*
    *   END WOT Reputation
    */

    $countImagesAltTexts = $_SESSION['countImagesAltTexts'];
    $checkTitle = $_SESSION['checkTitle'];
    $checkMetaDescription = $_SESSION['checkMetaDescription'];
    $checkMetaKeywords = $_SESSION['checkMetaKeywords'];
    $countWords = $_SESSION['countWords'];
    $getMostMeetWords = $_SESSION['getMostMeetWords'];
    $checkCleanUrls = $_SESSION['checkCleanUrls'];
    $getGoogleToolbarPageRank = $_SESSION['getGoogleToolbarPageRank'];
    $getGoogleBacklinksTotal = $_SESSION['getGoogleBacklinksTotal'];
    //var_dump($getGoogleBacklinksTotal);die();
    $getGooglePlusOnes = $_SESSION['getGooglePlusOnes'];
    $getPagespeedScore = $_SESSION['getPagespeedScore'];
    $getSiteindexTotal = $_SESSION['getSiteindexTotal'];
    //var_dump($getPagespeedScore);die();
    $getSiteindexTotalBing = $_SESSION['getSiteindexTotalBing'];
    $getFacebookInteractions = $_SESSION['getFacebookInteractions'];
    $getTwitterMentions = $_SESSION['getTwitterMentions'];
    $hasRobots = $_SESSION['hasRobots'];
    $hasSitemaps = $_SESSION['hasSitemaps'];
    //var_dump($getSitemaps);die();
    $validate =  $_SESSION['validate'];
    $getWWWResolve = $_SESSION['getWWWResolve'];
    $getIpCanonicalization = $_SESSION['getIpCanonicalization'];
    $hasFavicon = $_SESSION['hasFavicon'];
    $countH1 = $_SESSION['countH1'];
    $checkLang = $_SESSION['checkLang'];
    $checkMetaCharset = $_SESSION['checkMetaCharset'];
    $img = $_SESSION['img'];

    $errorScore = (count($validate['errors'])/15 > 1) ? 100 : count($validate['errors'])/15*100;
    $warnScore = (count($validate['warnings'])/30 > 1) ? 100 : count($validate['warnings'])/30*100;
    $w3CScore = 100 - (0.6*$errorScore + 0.4*$warnScore);
    $arr = explode('/', $countImagesAltTexts);
    if ($arr[1] == 0) {
      $imageAltScore = 100;
    } else {
      $imageAltScore = round($arr[0]/$arr[1]*100);
    }
    $arr = explode('/', $checkCleanUrls);
    if ($arr[1] == 0) {
      $cleanUrlScore = 100;
    } else {
      $cleanUrlScore = round($arr[0]/$arr[1]*100);
    }
    $codeScore = 0.3*$w3CScore + 0.2*$getPagespeedScore + 0.1*$imageAltScore + 0.05*$cleanUrlScore;
    if ($getWWWResolve) {$codeScore = $codeScore + 0.1*100;}
    if ($getIpCanonicalization) {$codeScore = $codeScore + 0.05*100;}
    if ($hasFavicon) {$codeScore = $codeScore + 0.05*100;}
    if ($checkLang != '') {$codeScore = $codeScore + 0.05*100;}
    if ($checkMetaCharset != '') {$codeScore = $codeScore + 0.1*100;}
    $codeScore = round($codeScore);

    $googleIndexScore = log($getSiteindexTotal+1)/10;
    if ($googleIndexScore > 1) {$googleIndexScore = 1;}
    $bingIndexScore = log($getSiteindexTotalBing+1)/10;
    if ($bingIndexScore > 1) {$bingIndexScore = 1;}
    $backLinksScore = log($getGoogleBacklinksTotal+1)/5;
    if ($backLinksScore > 1) {$backLinksScore = 1;}
    $alexaScore = 1000/$getAlexaGlobalRank;
    if ($alexaScore > 1) {$alexaScore = 1;}
    $searchEngineScore = round(0.25*$getGoogleToolbarPageRank*10 + 0.15*$googleIndexScore*100 + 0.15*$bingIndexScore*100 + 0.05*$backLinksScore*100 + 
        0.15*$alexaScore*100 + 0.15*$trustworthiness + 0.1*$childsafety);

    $SEOScore = 0;
    if ($hasRobots == 'true') $SEOScore += 5;
    if ($hasSitemaps != 'false') $SEOScore += 20;
    if (strlen($checkTitle) >= 5) $SEOScore += 20;
    if (strlen($checkMetaDescription) >= 60) $SEOScore += 15;
    if (strlen($checkMetaKeywords) >= 20) $SEOScore += 5;
    if ($countWords >= 50) $SEOScore += 15;
    if($countH1 == 1) $SEOScore += 20;

    $googlePlusScore = log($getGooglePlusOnes+1)/10;
    if ($googlePlusScore > 1) {$googlePlusScore = 1;}
    $facebookScore = log($getFacebookInteractions['total_count']+1)/10;
    if ($facebookScore > 1) {$facebookScore = 1;}
    $twitterScore = log($getTwitterMentions+1)/10;
    if ($twitterScore > 1) {$twitterScore = 1;}
    $socialScore = round(0.3*$googlePlusScore*100 + 0.35*$facebookScore*100 + 0.35*$twitterScore*100);
    $totalScore = round(($codeScore + $searchEngineScore + $SEOScore + $socialScore)/4);


    $userName = $_SESSION["userName"];
    $userEmail = $_SESSION["userEmail"];
    $userPhone = $_SESSION["userPhone"];
    $competitorsType = $_SESSION["competitorsType"];
    $competitor1 = $_SESSION["competitor1"];
    $competitor2 = $_SESSION["competitor2"];
    $competitor3 = $_SESSION["competitor3"];

    $allstat = $_SESSION["allstat"];
    if (!function_exists('getScore')) {
        function getScore($urlstmp, $allstat){
            $_validate =  $allstat[$urlstmp]['validate'];
            $_countImagesAltTexts = $allstat[$urlstmp]['countImagesAltTexts'];
            $_checkCleanUrls = $allstat[$urlstmp]['checkCleanUrls'];
            $_getWWWResolve = $allstat[$urlstmp]['getWWWResolve'];
            $_getIpCanonicalization = $allstat[$urlstmp]['getIpCanonicalization'];
            $_hasFavicon = $allstat[$urlstmp]['hasFavicon'];
            $_checkLang = $allstat[$urlstmp]['checkLang'];
            $_checkMetaCharset = $allstat[$urlstmp]['checkMetaCharset'];
            $_getPagespeedScore = $allstat[$urlstmp]['getPagespeedScore'];

            $_errorScore = (count($_validate['errors'])/15 > 1) ? 100 : count($_validate['errors'])/15*100;
            $_warnScore = (count($_validate['warnings'])/30 > 1) ? 100 : count($_validate['warnings'])/30*100;
            $_w3CScore = 100 - (0.6*$_errorScore + 0.4*$_warnScore);
            $_arr = explode('/', $_countImagesAltTexts);
            if ($_arr[1] == 0) {
                $_imageAltScore = 100;
            } else {
            $_imageAltScore = round($_arr[0]/$_arr[1]*100);
            }
            $_arr = explode('/', $_checkCleanUrls);
            if ($_arr[1] == 0) {
              $_cleanUrlScoreScore = 100;
            } else {
              $_cleanUrlScoreScore = round($_arr[0]/$_arr[1]*100);
            }
            $_codeScore = round(0.3*$_w3CScore + 0.2*$_getPagespeedScore + 0.1*$_imageAltScore + 0.05*$_cleanUrlScoreScore);
            if ($_getWWWResolve) {$_codeScore = $_codeScore + 0.1*100;}
            if ($_getIpCanonicalization) {$_codeScore = $_codeScore + 0.05*100;}
            if ($_hasFavicon) {$_codeScore = $_codeScore + 0.05*100;}
            if ($_checkLang != '') {$_codeScore = $_codeScore + 0.05*100;}
            if ($_checkMetaCharset != '') {$_codeScore = $_codeScore + 0.1*100;}
            $_codeScore = round($_codeScore);
            $allstat[$urlstmp]['codeScore'] = $_codeScore;


            $_getGoogleToolbarPageRank = $allstat[$urlstmp]['getGoogleToolbarPageRank'];
            $_getSiteindexTotal = $allstat[$urlstmp]['getSiteindexTotal'];
            $_getSiteindexTotalBing = $allstat[$urlstmp]['getSiteindexTotalBing'];
            $_getGoogleBacklinksTotal = $allstat[$urlstmp]['getGoogleBacklinksTotal'];
            $_getAlexaGlobalRank = $allstat[$urlstmp]['getAlexaGlobalRank'];
            $_getWOT = $allstat[$urlstmp]['getWOT'];
            $_0 = '0';
            $_4 = '4';
            $_trustworthiness = $_getWOT->$_0;
            $_trustworthiness = $_trustworthiness[0];
            $_childsafety = $_getWOT->$_4;
            $_childsafety = $_childsafety[0];

            $_googleIndexScore = log($_getSiteindexTotal+1)/10;
            if ($_googleIndexScore > 1) {$_googleIndexScore = 1;}
            $_bingIndexScore = log($_getSiteindexTotalBing+1)/10;
            if ($_bingIndexScore > 1) {$_bingIndexScore = 1;}
            $_backLinksScore = log($_getGoogleBacklinksTotal+1)/5;
            if ($_backLinksScore > 1) {$_backLinksScore = 1;}
            $_alexaScore = 1000/$_getAlexaGlobalRank;
            if ($_alexaScore > 1) {$_alexaScore = 1;}
            $_searchEngineScore = round(0.25*$_getGoogleToolbarPageRank*10 + 0.15*$_googleIndexScore*100 + 0.15*$_bingIndexScore*100 + 
                0.05*$_backLinksScore*100 + 0.15*$_alexaScore*100 + 0.15*$_trustworthiness + 0.1*$_childsafety);
            $allstat[$urlstmp]['searchEngineScore'] = $_searchEngineScore;


            $_hasRobots = $allstat[$urlstmp]['hasRobots'];
            $_hasSitemaps = $allstat[$urlstmp]['hasSitemaps'];
            $_checkTitle = $allstat[$urlstmp]['checkTitle'];
            $_checkMetaDescription = $allstat[$urlstmp]['checkMetaDescription'];
            $_checkMetaKeywords = $allstat[$urlstmp]['checkMetaKeywords'];
            $_countWords = $allstat[$urlstmp]['countWords'];
            $_countH1 = $allstat[$urlstmp]['countH1'];

            $_SEOScore = 0;
            if ($_hasRobots == 'true') $_SEOScore += 5;
            if ($_hasSitemaps != 'false') $_SEOScore += 20;
            if (strlen($_checkTitle) >= 5) $_SEOScore += 20;
            if (strlen($_checkMetaDescription) >= 60) $_SEOScore += 15;
            if (strlen($_checkMetaKeywords) >= 20) $_SEOScore += 5;
            if ($_countWords >= 50) $_SEOScore += 15;
            if($_countH1 == 1) $_SEOScore += 20;
            $allstat[$urlstmp]['SEOScore'] = $_SEOScore;


            $_getGooglePlusOnes = $allstat[$urlstmp]['getGooglePlusOnes'];
            $_getSiteindexTotal = $allstat[$urlstmp]['getSiteindexTotal'];
            $_getSiteindexTotalBing = $allstat[$urlstmp]['getSiteindexTotalBing'];
            $_getFacebookInteractions = $allstat[$urlstmp]['getFacebookInteractions'];
            $_getTwitterMentions = $allstat[$urlstmp]['getTwitterMentions'];

            $_googlePlusScore = log($_getGooglePlusOnes+1)/10;
            if ($_googlePlusScore > 1) {$_googlePlusScore = 1;}
            $_facebookScore = log($_getFacebookInteractions['total_count']+1)/10;
            if ($_facebookScore > 1) {$_facebookScore = 1;}
            $_twitterScore = log($_getTwitterMentions+1)/10;
            if ($_twitterScore > 1) {$_twitterScore = 1;}
            $_socialScore = round(0.3*$_googlePlusScore*100 + 0.35*$_facebookScore*100 + 0.35*$_twitterScore*100);
            $allstat[$urlstmp]['socialScore'] = $_socialScore;


            $_totalScore = round(($_codeScore + $_searchEngineScore + $_SEOScore + $_socialScore)/4);
            $allstat[$urlstmp]['totalScore'] = $_totalScore;
            return $allstat;
        }

    }

    if (!function_exists('getLetterScore')) {
        function getLetterScore($score) {
            if ($score >= 0 && $score <= 20) {
                return 'F';
            } else if ($score >= 21 && $score <= 40) {
                return 'D';
            } else if ($score >= 41 && $score <= 60) {
                return 'C-';
            } else if ($score >= 61 && $score <= 70) {
                return 'C';
            } else if ($score >= 71 && $score <= 80) {
                return 'C+';
            } else if ($score >= 81 && $score <= 90) {
                return 'B-';
            } else if ($score >= 91 && $score <= 99) {
                return 'B+';
            } else if ($score == 100) {
                return 'A';
            }
        }
    }
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Local SEO Company | Local Search Engine Optimization Services</title>
<meta name="description" content="Local SEO offers local SEO services to small and medium business. Our Local SEO services can help any local business acquire new customers through digital marketing, Google Local business marketing, small business SEO and online directories.">

<!-- Stylesheets -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="all">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" media="all">
<link href="css/font-awesome.min.css" rel="stylesheet" media="all">
<link href="css/localseov3PDF.css" rel="stylesheet" media="all">

<style type="text/css" media="all">
    @font-face {
        font-family: 'Alef' !important;
        font-style: normal !important;
        font-weight: 400 !important;
        src: local('Alef Regular'), local('Alef-Regular'), url('fonts/Alef400.woff') format('woff') !important;
    }
    @font-face {
        font-family: 'Alef' !important;
        font-style: normal !important;
        font-weight: 700 !important;
        src: local('Alef Bold'), local('Alef-Bold'), url('fonts/Alef700.woff') format('woff') !important;
    }
    @font-face {
        font-family: 'Oswald' !important;
        font-style: normal !important;
        font-weight: 400 !important;
        src: local('Oswald Regular'), local('Oswald-Regular'), url('fonts/Oswald.woff') format('woff') !important;
    }
</style>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap-progressbar.js"></script>
<script src="js/jquery.knob.js"></script>
<script>
    $(function($) {
        $(".knob").knob();
    });
</script>

<style type="text/css" media="all">
    .row {
        margin: 0 !important;
        padding: 0 !important;
    }
    .unbreakable {
        page-break-inside: avoid !important;
        display:inline-block;
    }
    .unbreakable.row {
        width: 100%;
    }
    .unbreakable:after {
        content: '';
        display:block;
        height:0px;
        visibility: hidden;
    }
    .progress-label-right1, .progress-label-right2, .progress-label-right3, .progress-label-right4 {
        float: right !important;
        width: 50px !important;
        padding-left: 0 !important; 
    }
    .main-preview {
        float: right !important;
    }
    .progress-bars-op {
        width: 280px !important;
    }
    .radial-progress {
        text-align: center !important;
        position: relative !important;
    }
    .radial-progress > div {
        margin-bottom: 20px !important;
        margin-left: auto !important;
        margin-right: auto !important;
    }
    body { 
        -webkit-print-color-adjust: exact !important;
    }
    .panel-default > .panel-heading {
        background-color: #f5f5f5 !important;
        border-color: #ddd !important;
        color: #333 !important;
    }
    .panel-default {
        border-color: #ddd !important;
    }
    .panel {
        background-color: #fff !important;
        border: 1px solid transparent !important;
        border-radius: 4px !important;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05) !important;
        margin-bottom: 20px !important;
    }
    .dns-label {
        margin-bottom: 0 !important;
    }
</style>

</head>



<body style="width:770px;">
    <div style="color:#000;background-color: #EBEBEC;margin-left:15px;margin-right:15px;">
        <?php if ($_SESSION['logo'] == 'nativerank'): ?>
            <img src="../../img/nativerank_logo.png" style="float:left" height="75"/>
        <?php else: ?>
            <img src="../../img/logoPdf.png" style="float:left" height="75"/>
        <?php endif; ?>
        <span style="float:right; background: url(../../img/phonePdf.png) no-repeat scroll left center rgba(0, 0, 0, 0); color: #C90D0D; font-weight: 700; font-family: 'Alef',sans-serif;padding-left: 24px;margin-top: 25px;">
        <?php if ($_SESSION['logo'] == 'nativerank'): ?>
            1 800-520-8850
        <?php else: ?>
            1 800-520-8850
        <?php endif; ?>
    </span>
    </div>
    <div id="main-container">
        <?php if (!is_null($url)): ?>
            <div class="col-md-12">
                <?php if (!is_null($userName) && $userName != ""): ?>
                    <div class="input-group userdata-container">
                        <input class="form-control userdata" type="text" name="userName" placeholder="Name"
                            <?php if (isset($userName)) echo ' value="'.$userName.'"' ?>
                        >
                        <input class="form-control userdata" type="text" name="userEmail" placeholder="Email"
                            <?php if (isset($userEmail)) echo ' value="'.$userEmail.'"' ?>
                        >
                        <input class="form-control userdata" type="text" name="userPhone" placeholder="Phone"
                            <?php if (isset($userPhone)) echo ' value="'.$userPhone.'"' ?>
                        >
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-12">
                <?php if (isset($competitorsType) && $competitorsType == "false"): ?>
                    <div class="input-group competitorsdata-container ">
                        <input class="form-control competitorsdata" type="text" name="competitor1" placeholder="Competitor #1 URL"
                            <?php if (isset($competitor1)) echo ' value="'.$competitor1.'"' ?>
                        >
                        <input class="form-control competitorsdata" type="text" name="competitor2" placeholder="Competitor #2 URL"
                            <?php if (isset($competitor2)) echo ' value="'.$competitor2.'"' ?>
                        >
                        <input class="form-control competitorsdata" type="text" name="competitor3" placeholder="Competitor #3 URL"
                            <?php if (isset($competitor3)) echo ' value="'.$competitor3.'"' ?>
                        >
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-12">
                <?php include ('contentPdf.php'); ?>
            </div>
        <?php endif; ?>
    </div>
    <script>
        jQuery('a').each(function() {
            jQuery(this)[0].outerHTML = $(this)[0].innerHTML;
        });
    </script>
</body>
</html>
