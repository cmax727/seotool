<?php 
    session_start();     
    error_reporting(E_ERROR);
    $_SESSION['type'] = 'private';
    $url =  $_SESSION['url'];
    $finish =  $_SESSION['finish'];
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
    if ($getAlexaGlobalRank == 0)
        $getAlexaGlobalRank = 100000;
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
    if ($getWOT == null)
        $getWOT = array();
    $getWOT =  reset($getWOT);
    
    function objectToArray($d) {
        if (is_object($d)) {
                $d = get_object_vars($d);
        }
        if (is_array($d)) {
                return array_map(__FUNCTION__, $d);
        } else {
            // Return array
                return $d;
        }
    }
    
    function test_reputation($rep){
        if($rep >= 80)return 'Excellent';
        if($rep >= 60 && $rep < 80)return 'Good';
        if($rep >= 40 && $rep < 60)return 'Unsatisfactory';
        if($rep >= 20 && $rep < 40)return 'Poor';
        if($rep > 0 && $rep < 20)return 'Very poor';
        return "not available";
    }
    
     function test_categories($cat){
        if($cat == '101')return 'Malware or viruses';
        if($cat == '102')return 'Poor customer experience';
        if($cat == '103')return 'Phishing';
        if($cat == '104')return 'Scam';
        if($cat == '105')return 'Potentially illegal';
        if($cat == '201')return 'Misleading claims or unethical';
        if($cat == '202')return 'Privacy risks';
        if($cat == '203')return 'Suspicious';
        if($cat == '204')return 'Hate, discrimination';
        if($cat == '205')return 'Spam';
        if($cat == '206')return 'Potentially unwanted programs';
        if($cat == '207')return 'Ads / pop-ups';
        if($cat == '301')return 'Online tracking';
        if($cat == '302')return 'Alternative or controversial medicine';
        if($cat == '303')return 'Opinions, religion, politics';
        if($cat == '304')return 'Other';
        if($cat == '501')return 'Good site';
        if($cat == '401')return 'Adult content';
        if($cat == '402')return 'Incidental nudity';
        if($cat == '403')return 'Gruesome or shocking';
        if($cat == '404')return 'Site for kids';
        return 'Not available';
    }
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

<!-- Responsive and mobile friendly stuff -->
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Stylesheets -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/normalize.css">
<link rel="stylesheet" href="assets/css/layout.css">
<link href="assets/css/localseov3.css" rel="stylesheet">

<link href='http://fonts.googleapis.com/css?family=Alef:400,700' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
          <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->

<link href='http://fonts.googleapis.com/css?family=Alef:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script type='text/javascript' src="assets/js/bootstrap-progressbar.js"></script>
<!--[if IE]><script type="text/javascript" src="js/excanvas.js"></script><![endif]-->
<script src="assets/js/jquery.knob.js"></script>
    <script>
    $(function($) {
    $(".knob").knob();
    });
    </script>



</head>



<body>

	<div class="container-full block">
		<a href="#mobileClass" id="anchor">.</a>
		<?php include ('header.php'); ?>
		<div id="mobileClass"></div>
		<div class="container hidden-pull"></div>
        <?php if (!is_null($url)): ?>
            <?php include ('assets/templates/sidebar-sm.php'); ?>
            <?php include ('assets/templates/sidebar-smm.php'); ?>
            <?php include ('assets/templates/sidebar-xs.php'); ?>
        <?php endif; ?>
        <script>
            var url;
            counter_end = 31;
            function ajax_submit(form) {
                counter = 0;
                url = $('#domainInput').val();
                $('.progressbarmaintext').removeClass('hide');
                $('#progressbarmain').removeClass('hide');
                var userName = $('[name=userName]').val();
                var userEmail = $('[name=userEmail]').val();
                var userPhone = $('[name=userPhone]').val();
                competitorsType = $('[name=competitorsType]')[0].checked;
                competitor1 = $('[name=competitor1]').val();
                competitor2 = $('[name=competitor2]').val();
                competitor3 = $('[name=competitor3]').val();
                logo = $('[name=logo]:checked').val();
                if (userName == "" || userEmail == "" || userPhone == "") {
                    alert("Please fill all fields!");
                    return;
                }
                $.ajax({
                    type: "POST",
                    url: "/Services/NATIVERANK/service.php",
                    data: "url="+url+"&service=clean",
                    success: function(msg){
                        $.ajax({
                            type: "POST",
                            url: "/Services/NATIVERANK/service.php",
                            data: "url="+url+"&service=start&userName="+userName+"&userEmail="+userEmail+"&userPhone="+userPhone+"&logo="+logo+
                                "&competitorsType="+competitorsType+"&competitor1="+competitor1+"&competitor2="+competitor2+"&competitor3="+competitor3,
                            success: function(msg){
                                check();
                            }
                        });
                    }
                });
            }
            function check() {
                var array = new Array( "validate", "getPagespeedScore", "parser","getDomainAge","getWWWResolve","getIpCanonicalization","hasFavicon",
                            "hasRobots", "hasSitemaps", "getGoogleToolbarPageRank", "getGoogleBacklinksTotal", 
                            "getGooglePlusOnes", "getSiteindexTotal", "getSiteindexTotalBing", "getFacebookInteractions", 
                            "getTwitterMentions", "getAlexaGlobalRank","getSEMRushDomainRank","getSEMRushOrganicKeywords",
                            "getWOT" );
                for(var i = 0; i < array.length; i++){
                // for(var i = 2; i < 3; i++){
                    var serviceNameString = array[i];
                    $.ajax({
                        type: "POST",
                        url: "/Services/NATIVERANK/service.php",
                        data: "url="+url+"&service="+array[i],
                        success: function(msg) {
							console.log(msg);
                            var result = $.parseJSON(msg);
                            
                            for(key in result) {
                                counter++;
                                $('#barmain')[0].style.width=counter/counter_end*100+'%';
                                if(counter == counter_end){
                                    $('.progressbarmaintext').addClass('hide');
                                    $('#progressbarmain').addClass('hide');
                                    $('.progressbarcompetitorstext').removeClass('hide');
                                    $('#progressbarcompetitors').removeClass('hide');
                                    if (competitorsType) {
                                        $.ajax({
                                            type: "POST",
                                            url: "/Services/NATIVERANK/service.php",
                                            data: "url="+url+"&service=competitors",
                                            success: function(msg){
                                                checkCompetitors(msg);
                                            }
                                        });
                                    } else {
                                        result = 0;
                                        competitors = new Array();
                                        if (competitor1 != "") {
                                            competitors[result] = competitor1;
                                            result++;
                                        }
                                        if (competitor2 != "") {
                                            competitors[result] = competitor2;
                                            result++;
                                        }
                                        if (competitor3 != "") {
                                            competitors[result] = competitor3;
                                            result++;
                                        }
                                        urlCompetitor = "url="+url+"&service=competitorsManual&count="+result;
                                        for(var i = 0; i < result; i++){
                                            urlCompetitor = urlCompetitor+"&competitor"+i+"="+competitors[i];
                                        }
                                        $.ajax({
                                            type: "POST",
                                            url: "/Services/NATIVERANK/service.php",
                                            data: urlCompetitor,
                                            success: function(msg){
                                                checkCompetitorsManual(result);
                                            }
                                        });
                                    }
                                }
                            }
                        }
                    });
                }
            }
            function checkCompetitors(msg) {
                result = parseInt($.parseJSON(msg));
                counter = 0;
                if (result == 0){
                    $.ajax({
                        type: "POST",
                        url: "/Services/NATIVERANK/service.php",
                        data: "url="+url+"&service=finish",
                        success: function(msg){
                            window.location.href = 'index.php';
                        }
                    });
                    return;
                }

                for(var i = 0; i < result; i++){
                    $.ajax({
                        type: "POST",
                        url: "/Services/NATIVERANK/service.php",
                        data: "url="+url+"&service=competitor"+i,
                        success: function(msg){
                            counter++;
                            $('#barcompetitors')[0].style.width=counter/result*100+'%';
                            if(counter == result) {
                                $.ajax({
                                    type: "POST",
                                    url: "/Services/NATIVERANK/service.php",
                                    data: "url="+url+"&service=finish",
                                    success: function(msg){
                                        window.location.href = 'index.php';
                                    }
                                });
                            }
                        }
                    });
                }
            }
            function checkCompetitorsManual(result) {
                counter = 0;
                if (result == 0){
                    $.ajax({
                        type: "POST",
                        url: "/Services/NATIVERANK/service.php",
                        data: "url="+url+"&service=finish",
                        success: function(msg){
                            window.location.href = 'index.php';
                        }
                    });
                    return;
                }
                for(var i = 0; i < result; i++){
                    $.ajax({
                        type: "POST",
                        url: "/Services/NATIVERANK/service.php",
                        data: "url="+url+"&service=competitor"+i,
                        success: function(msg){
                            counter++;
                            $('#barcompetitors')[0].style.width=counter/result*100+'%';
                            if(counter == result) {
                                $.ajax({
                                    type: "POST",
                                    url: "/Services/NATIVERANK/service.php",
                                    data: "url="+url+"&service=finish",
                                    success: function(msg){
                                        window.location.href = 'index.php';
                                    }
                                });
                            }
                        }
                    });
                }
            }
        </script>

		<div id="main-container" class="button-container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0 main-butt">
					<form name="form" method="post" onsubmit="ajax_submit(this);return false;" class="form-inline form-domain">
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
                        <div class="input-group competitorsdata-container competitorsdata-container-checked">
                            <span class="input-group-addon competitors-checkbox">
                                <input type="checkbox" id="competitors_checkbox" name="competitorsType" 
                                    <?php if (!isset($competitorsType) || $competitorsType == "true") echo ' checked' ?>
                                >
                                Competitors: <span id="competitors_type">SEMrush</span>
                            </span>
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
                        <div class="input-group center">
                            <label class="radio-inline">
                                <input type="radio" name="logo" value="localseo"
                                    <?php if ((isset($_SESSION['logo']) && $_SESSION['logo'] == "localseo") || !isset($_SESSION['logo'])) echo ' checked' ?>
                                >
                                <img src="assets/img/logoPdf.png" height="75" />
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="logo" value="nativerank"
                                    <?php if (isset($_SESSION['logo']) && $_SESSION['logo'] == "nativerank") echo ' checked' ?>
                                >
                                <img src="assets/img/nativerank_logo.png" height="75" />
                            </label>
                        </div>
                        <div class="input-group">
                            <input class="form-control" id="domainInput" type="text" name="url" placeholder="domain.com"
                                <?php if (isset($url)) echo ' value="'.$url.'"' ?>
                            >
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-primary">Analyze!</button>
                            </div>
                        </div>
					</form>
				</div>
			</div>
        <script>
            $("#competitors_checkbox").change(function() {
                if(this.checked) {
                    $(".competitorsdata-container").addClass("competitorsdata-container-checked");
                    $("#competitors_type")[0].innerHTML = "SEMrush";
                } else {
                    $(".competitorsdata-container").removeClass("competitorsdata-container-checked");
                    $("#competitors_type")[0].innerHTML = "Manual";
                }
            });
            if($("#competitors_checkbox")[0].checked) {
                $(".competitorsdata-container").addClass("competitorsdata-container-checked");
                $("#competitors_type")[0].innerHTML = "SEMrush";
            } else {
                $(".competitorsdata-container").removeClass("competitorsdata-container-checked");
                $("#competitors_type")[0].innerHTML = "Manual";
            }
        </script>
            <div class="row">
                <div class="progressbarmaintext hide">Analyzing your site!</div>
                <div id="progressbarmain" class="hide">
                    <div class="row" style="width: 0%" id="barmain"></div>
                </div>
                <div class="progressbarcompetitorstext hide">Analyzing your competitors!</div>
                <div id="progressbarcompetitors" class="hide">
                    <div style="width: 0%" id="barcompetitors"></div>
                </div>
            </div>
			
		</div>
		<div id="main-container">
            <?php if (!is_null($url) && !is_null($finish)): ?>
                <div class="col-md-4 visible-desktop">
    			<?php include ('assets/templates/sidebar.php'); ?>
                </div>
                <div class="col-md-8">
    			<?php include ('assets/templates/content.php'); ?>
                </div>
            <?php endif; ?>
		</div>
		<div class="container hidden-pull-down"></div>
		<?php include ('footer.php'); ?>
	</div>
	<script src='assets/js/smooth-scroll.js'></script>
    <script src="assets/js/shevron.js"></script>
	<script>
		smoothScroll.init({
			speed: 500,
			easing: 'easeInOutCubic',
			offset: 0,
			updateURL: false,
			callbackBefore: function ( toggle, anchor ) {},
			callbackAfter: function ( toggle, anchor ) {}
		});
	</script>

</body>
</html>
