    <div class="row unbreakable">
        <div id="seo-panel" class="panel panel-default">
          <div class="heading-main section-heading section-heading-seo">
                Organic SEO - Do you pass the test?
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="progress-bars visible-phone">
                        <span class="progress-label-left"><?php echo getLetterScore($SEOScore) ?></span>
                        <div class="progress bar-progress">
                            <div class="progress-bar bar-3" role="progressbar" style="width: <?php echo $SEOScore ?>%; background:<?php 
                                if($SEOScore >= 0 && $SEOScore <= 33)echo 'red';
                                if($SEOScore > 33 && $SEOScore <= 66)echo 'orange';
                                if($SEOScore > 66)echo 'green';
                            ?>;">
                                <span class="sr-only"><?php echo $SEOScore ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="radial-progress hidden-phone gps-radial">
                        <input class="knob-seo" data-fgColor="<?php 
                            if($SEOScore >= 0 && $SEOScore <= 33)echo 'red';
                            if($SEOScore > 33 && $SEOScore <= 66)echo 'orange';
                            if($SEOScore > 66)echo 'green';
                        ?>" data-step="1" data-min="0" data-max="100" data-thickness=".1" data-width="90" data-height="90" readonly value="<?php echo $SEOScore ?>">
                    </div>  
                    <script>
                        $(function($) {
                            $(".knob-seo").knob({
                              'draw' : function () { 
                                $(this.i).val('<?php echo getLetterScore($SEOScore) ?>')
                              }
                            });
                            $(".knob-seo").css('font-family-size','25px').css('color','#666666').css('font-family','Segoe UI').css('font-weight','100').css('display','inline-block');
                        });
                    </script>
                </div>
                <div class="col-md-9 col-sm-9">
                    <span class="body-text">
                        The eight check's below investigate some of the most overlooked SEO items for your website.<br/>
                        These eight item's could possibaly rocket you to the 1st page, or keep you buried.
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>

<!--panel 9-->
    <div class="row unbreakable">
        <div id="robots-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="fa fa-check-circle panel-fa-icon-robots pull-left"></span>
                Robots.txt file
            <?php if ($hasRobots): ?>
                <span class="glyphicon glyphicon-ok-circle pull-right"></span>
            <?php else: ?>
                <span class="glyphicon glyphicon-remove-circle pull-right"></span>
            <?php endif; ?>
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <?php if($hasRobots): ?>
                        <p class="blackaction" style="font-size:15pt;"><a href="<?php echo $url ?>/robots.txt">robots.txt file</a></p>
                        <p class="passed">Passed</p>
                    <?php else: ?>
                        <p class="action-needed">Action needed!</p>
                    <?php endif; ?>
                </div>
                <div class="col-md-9 col-sm-9">
                    <?php if(!$hasRobots): ?>
                        <span class="body-text"><b style="font-size:20px; color:black;">Create robots.txt file</b></span>
                    <?php endif; ?>
                    <span class="body-text">Also known as the Robots Exclusion Protocol, this snippet of code tells a web crawler, or robot, what parts of your site you want to be indexed. They are instructions you provide about which pages you want to be ranked, and those you don’t. Parts of your site you consider irrelevant to the theme of your website as a whole may be blocked from a robot, but still visible the public.</span>
                    <span class="source-label pull-left">SOURCE: OUR CRAWLER</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>

<!--panel 10-->
    <div class="row unbreakable">
        <div id="sitemap-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="fa fa-sitemap panel-fa-icon-sitemap pull-left"></span>
                Sitemap
            <?php if ($hasSitemaps): ?>
                <span class="glyphicon glyphicon-ok-circle pull-right"></span>
            <?php else: ?>
                <span class="glyphicon glyphicon-remove-circle pull-right"></span>
            <?php endif; ?>
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <?php if($hasSitemaps): ?>
                        <p class="passed">Passed</p>
                        <p class="blackaction"><a href="<?php echo $hasSitemaps ?>">Sitemap.xml</a></p>
                    <?php else: ?>
                        <p class="action-needed">Action needed!</p>
                    <?php endif; ?>
                </div>
                <div class="col-md-9 col-sm-9">
                    <?php if(!$hasSitemaps): ?>
                        <span class="body-text"><b style="font-size:20px; color:black;">Create sitemap</b></span>
                    <?php endif; ?>
                    <span class="body-text">Most simply, an XML Sitemap is a list of pages on your website, and can signal to a search engine pages that may not have been crawled already. This includes dynamic pages that are accessible only through forms or user entries, that cannot normally be found by robots. Google allows XML Sitemap uploads through Webmaster tools to ensure every page can be indexed, including anything you may have missed with the robots.txt file.</span>
                    <span class="source-label pull-left">SOURCE: OUR CRAWLER</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>
<!--panel 11-->
    <div class="row unbreakable">
        <div id="pt-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="fa fa-file-o panel-fa-icon-pt pull-left"></span>
                Page Title
            <span class="glyphicon <?php 
                if(strlen($checkTitle) < 5) {
                    echo 'glyphicon-remove-circle';
                } else {
                    echo 'glyphicon-ok-circle';
                }
            ?> pull-right"></span>
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <?php if(strlen($checkTitle) >= 5): ?>
                        <p class="dns-label"><?php echo $checkTitle ?></p>
                        <p class="passed">Passed</p>
                    <?php elseif (strlen($checkTitle) > 0): ?>
                        <p class="dns-label"><?php echo $checkTitle ?></p>
                        <p class="attention">Attention</p>
                    <?php else: ?>
                        <p class="action-needed">Action needed!</p>
                    <?php endif; ?>
                </div>
                <div class="col-md-9 col-sm-9">
                    <?php if(strlen($checkTitle) < 5): ?>
                        <span class="body-text"><b style="font-size:20px; color:black;">Make your title meaningful</b></span>
                    <?php endif; ?>
                    <span class="body-text">The Page Title, or Title Tag, is the main descriptor of a web page or document. It tells a search engine what the page is about, what is displayed about your page on a SERP and what is displayed on a browser tab. The title tag should be kept under 70 characters to display correctly, and should be a concise, relevant, keyword rich description of the content that is on the page.</span>
                    <span class="source-label pull-left">SOURCE: OUR CRAWLER</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>
<!--panel 12-->

    <div class="row unbreakable">
        <div id="dns-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-meta-d pull-left">IP</span>
                H1 heading
            <span class="glyphicon <?php 
                if($countH1 > 1 || $countH1 == 0) {
                    echo 'glyphicon-remove-circle';
                } else {
                    echo 'glyphicon-ok-circle';
                }
            ?> pull-right"></span>
          </div>                    
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <?php if($countH1 > 1 || $countH1 == 0): ?>
                        <p class="action-needed">Action needed!</p>
                     <?php else: ?>
                        <p class="passed">Passed</p>
                    <?php endif; ?>
                </div>
                <div class="col-md-9 col-sm-9">
                    <?php if($countH1 > 1): ?>
                        <span class="body-text"><b style="font-size:20px; color:black;">Page should have only 1 h1 tag</b></span>
                     <?php elseif($countH1 == 0): ?>
                        <span class="passed">Create h1 heading</span>
                    <?php endif; ?>
                    <span class="body-text">Heading tags are used to differentiate the heading of a page from the rest of the content on that page, and are easily the most important.  Every page should have one – and only one - well-constructed header tag which is relevant to the content of the page that follows.  Headers give the user a clear idea of what the page is about, and hence a better user experience which translates to better organic rankings.</span>
                    <span class="source-label pull-left pull-down">SOURCE: OUR CRAWLER</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row unbreakable">
        <div id="meta-d-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-meta-d pull-left">>_</span>
                Meta Description
            <span class="glyphicon <?php 
                if(strlen($checkMetaDescription) < 60) {
                    echo 'glyphicon-remove-circle';
                } else {
                    echo 'glyphicon-ok-circle';
                }
            ?> pull-right"></span>
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <p class="meta-label"><?php echo $checkMetaDescription ?></p>
                    <?php if(strlen($checkMetaDescription) < 60): ?>
                        <p class="action-needed">Action needed!</p>
                     <?php else: ?>
                        <p class="passed">Passed</p>
                    <?php endif; ?>
                </div>
                <div class="col-md-9 col-sm-9">
                    <?php if(strlen($checkMetaDescription) < 60): ?>
                        <span class="body-text"><b style="font-size:20px; color:black;">Make your meta description meaningful</b></span>
                    <?php endif; ?>
                    <span class="body-text">The Meta Description is an HTML attribute describing in more detail the content of a web page. It is a short paragraph around 150-160 characters designed to inform a searcher exactly what they will find when they click to your website. It should directly relate to the content on the page and the Title Tag.</span>
                    <span class="source-label pull-left pull-down">SOURCE: OUR CRAWLER</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>
<!--panel 13-->
    <div class="row unbreakable">
        <div id="meta-k-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-meta-k pull-left"><\></span>
                Meta Keywords
            <span class="glyphicon <?php 
                if(strlen($checkMetaKeywords) < 20) {
                    echo 'glyphicon-remove-circle';
                } else {
                    echo 'glyphicon-ok-circle';
                }
            ?> pull-right"></span>
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <p class="meta-label"><?php echo $checkMetaKeywords ?></p>
                    <?php if(strlen($checkMetaKeywords) < 20): ?>
                        <p class="action-needed">Action needed!</p>
                     <?php else: ?>
                        <p class="passed">Passed</p>
                    <?php endif; ?>
                </div>
                <div class="col-md-9 col-sm-9">
                    <?php if(strlen($checkMetaKeywords) < 20): ?>
                        <span class="body-text"><b style="font-size:20px; color:black;">Improve Meta Keywords</b></span>
                    <?php endif; ?>
                    <span class="body-text">Meta Keywords are a list of words, separated by commas, in the HTML of a website that provide descriptive elements of a website page, indicating to a search engine what the page is about. Meta Keywords can improve organic rank, aid in improving landing page relevancy for Paid Search quality score and help organize the messaging of a page.</span>
                    <span class="source-label pull-left pull-down">SOURCE: OUR CRAWLER</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>
    
<!--panel 14-->
    <div class="row unbreakable">
        <div id="wc-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-wc pull-left">W#</span>
                Word Count
            <span class="glyphicon <?php 
                if($countWords < 50) {
                    echo 'glyphicon-remove-circle';
                } else {
                    echo 'glyphicon-ok-circle';
                }
            ?> pull-right"></span>
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <p class="alt-label"><?php echo $countWords ?></p>
                    <?php if($countWords < 50): ?>
                        <p class="action-needed">Action needed!</p>
                     <?php else: ?>
                        <p class="passed">Passed</p>
                    <?php endif; ?>
                </div>
                <div class="col-md-9 col-sm-9">
                    <?php if($countWords < 50): ?>
                        <span class="body-text"><b style="font-size:20px; color:black;">Fill your page with more information</b></span>
                    <?php endif; ?>
                    <span class="body-text">This a measure of the amount of written content on a web page.  While there is no exact answer, the more content you have on a page, that is relevant to the subject of the page, the more that page will seem relevant to a user search query to an engine.</span>
                    <span class="source-label pull-left pull-down">SOURCE: OUR CRAWLER</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row unbreakable">
        <div id="wc-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-wc pull-left">W#</span>
                Most Used Words
            <span class="glyphicon glyphicon-ok-circle pull-right"></span>
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <?php foreach ($getMostMeetWords as $key => $value): ?>
                        <p class="dns-label"><?php echo $key ?> - <?php echo $value ?></p>
                    <?php endforeach; ?>
                </div>
                <div class="col-md-9 col-sm-9">
                    <span class="body-text">Just how relevant is your site content?</span>
                    <span class="source-label pull-left pull-down">SOURCE: OUR CRAWLER</span>
                </div>
            </div>
          </div>
        </div>
    </div>





    <div class="row unbreakable">
        <div id="searchengines-panel" class="panel panel-default">
          <div class="heading-main section-heading section-heading-searchengines">
                SEARCH ENGINES - How do the Search Engines See Your Business?
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="progress-bars visible-phone">
                        <span class="progress-label-left"><?php echo getLetterScore($searchEngineScore) ?></span>
                        <div class="progress bar-progress">
                            <div class="progress-bar bar-3" role="progressbar" style="width: <?php echo $searchEngineScore ?>%; background:<?php 
                                if($searchEngineScore >= 0 && $searchEngineScore <= 33)echo 'red';
                                if($searchEngineScore > 33 && $searchEngineScore <= 66)echo 'orange';
                                if($searchEngineScore > 66)echo 'green';
                            ?>;">
                                <span class="sr-only"><?php echo $searchEngineScore ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="radial-progress hidden-phone gps-radial">
                        <input class="knob-searchengines" data-fgColor="<?php 
                            if($searchEngineScore >= 0 && $searchEngineScore <= 33)echo 'red';
                            if($searchEngineScore > 33 && $searchEngineScore <= 66)echo 'orange';
                            if($searchEngineScore > 66)echo 'green';
                        ?>" data-step="1" data-min="0" data-max="100" data-thickness=".1" data-width="90" data-height="90" readonly value="<?php echo $searchEngineScore ?>">
                    </div>  
                    <script>
                        $(function($) {
                            $(".knob-searchengines").knob({
                              'draw' : function () { 
                                $(this.i).val('<?php echo getLetterScore($searchEngineScore) ?>')
                              }
                            });
                            $(".knob-searchengines").css('font-family-size','25px').css('color','#666666').css('font-family','Segoe UI').css('font-weight','100').css('display','inline-block');
                        });
                    </script>
                </div>
                <div class="col-md-9 col-sm-9">
                    <span class="body-text">
                        These ten tests, investigate how search engines like Google, Yahoo, and Bing see your bussiness and your website.<br/>
                        Creating an amazing product or service is not enough you wouldn't open a new building with putting a sign on the door...
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>

<!--panel 6-->
    <div class="row unbreakable">
        <div id="gpr-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-gpr pull-left">PR</span>
                Google Page Rank
            <span class="glyphicon <?php 
                if($getGoogleToolbarPageRank >= 0 && $getGoogleToolbarPageRank <= 3)echo 'glyphicon-remove-circle';
                if($getGoogleToolbarPageRank > 3 && $getGoogleToolbarPageRank <= 6)echo 'glyphicon-screenshot';
                if($getGoogleToolbarPageRank > 6)echo 'glyphicon-ok-circle';
            ?> pull-right"></span>
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <p class="attention <?php
                        if($getGoogleToolbarPageRank <= 3 || $getGoogleToolbarPageRank > 6)echo 'hide';
                    ?>">Attention</p>
                    <p class="action-needed <?php
                        if($getGoogleToolbarPageRank > 3 )echo 'hide';
                    ?>">Action needed!</p>
                    
                    <div class="progress-bars visible-phone">
                    <span class="progress-label-left"><?php echo $getGoogleToolbarPageRank ?><span style="font-size: 12px;">of 10</span></span></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-3" role="progressbar" style="width: <?php echo $getGoogleToolbarPageRank/10*100 ?>%; background:<?php 
                            if($getGoogleToolbarPageRank >= 0 && $getGoogleToolbarPageRank <= 3)echo 'red';
                            if($getGoogleToolbarPageRank > 3 && $getGoogleToolbarPageRank <= 6)echo 'orange';
                            if($getGoogleToolbarPageRank > 6)echo 'green';
                        ?>;">
                            <span class="sr-only"><?php echo $getGoogleToolbarPageRank ?></span>
                        </div>
                    </div>
                    </div>
                    
                    <div class="radial-progress hidden-phone gps-radial">
                        <input class="knob" data-fgColor="<?php 
                            if($getGoogleToolbarPageRank >= 0 && $getGoogleToolbarPageRank <= 3)echo 'red';
                            if($getGoogleToolbarPageRank > 3 && $getGoogleToolbarPageRank <= 6)echo 'orange';
                            if($getGoogleToolbarPageRank > 6)echo 'green';
                        ?>" data-step="1" data-min="0" data-max="10" data-thickness=".1" data-width="90" data-height="90" readonly value="<?php echo $getGoogleToolbarPageRank ?>">
                        <span class="radial-inside-content">of 10</span>
                    </div>  
                    <p class="passed <?php
                    if($getGoogleToolbarPageRank <= 6)echo 'hide';
                    ?>">Passed</p>

                </div>
                <div class="col-md-9 col-sm-9">
                    <?php if($getGoogleToolbarPageRank <= 6): ?>
                        <span class="body-text"><b style="font-size:20px; color:black;">Optimize your site for Search Engines</b></span>
                    <?php endif; ?>
                    <span class="body-text">This Algorithm was designed by Google to measure how important your website appears. It is a link analysis based equation which assigns a numerical weight to hyperlinked documents to your site, measuring relative importance. Page Rank is a determining factor in where your website appears on a SERP after a user query.</span>
                    <span class="source-label pull-left">SOURCE: GOOGLE</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>

<!--panel 7-->

    <div class="row unbreakable">
        <div id="cpi-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-gpi pull-left">#</span>
                Pages Indexed by Google
          <span class="glyphicon glyphicon-ok-circle pull-right"></span>
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <p class="alt-label" style="font-size:20pt;"><?php echo $getSiteindexTotal ?></p>
                </div>
                
                <div class="col-md-9 col-sm-9">
                    <span class="body-text">This directly refers to the number of pages on your website a search crawled, or indexed. If your pages are not indexable, you cannot rank organically. Having useful, relevant and high quality content on indexed website pages is a strong indicator to search engines that your site is valuable for a user, and more likely to rank organically.</span>
                    <span class="source-label pull-left">SOURCE: GOOGLE</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row unbreakable">
        <div id="cpi-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-gpi pull-left">#</span>
                Pages Indexed by Bing
          <span class="glyphicon glyphicon-ok-circle pull-right"></span>
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <p class="alt-label" style="font-size:20pt;"><?php echo $getSiteindexTotalBing ?></p>
                </div>
                
                <div class="col-md-9 col-sm-9">
                    <span class="body-text">This directly refers to the number of pages on your website a search crawled, or indexed. If your pages are not indexable, you cannot rank organically. Having useful, relevant and high quality content on indexed website pages is a strong indicator to search engines that your site is valuable for a user, and more likely to rank organically.</span>
                    <span class="source-label pull-left">SOURCE: BING</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>
<!--panel 8-->
    <div class="row unbreakable">
        <div id="cuc-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="fa fa-chain panel-fa-icon-g-chain pull-left"></span>
                Google Backlinks Count
            <span class="glyphicon glyphicon-ok-circle pull-right"></span>
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <p class="alt-label"><?php echo $getGoogleBacklinksTotal ?></p>
                </div>
                <div class="col-md-9 col-sm-9">
                    <span class="body-text">A measure of the number of inbound links to your site. While inbound links from spammy websites can hurt you, links from sites with a high domain authority are an indicator to search engines that your site is important, and therefore more likely to rank organically. A hyperlink’s anchor text and congruency to website content are highly weighted in determining SERP ranking.</span>
                    <span class="source-label pull-left">SOURCE: GOOGLE</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row unbreakable">
        <div id="cuc-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-gpi pull-left">#</span>
                Alexa Rank
            <span class="glyphicon glyphicon-ok-circle pull-right"></span>
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <p class="alt-label"><?php echo $getAlexaGlobalRank ?></p>
                </div>
                <div class="col-md-9 col-sm-9">
                    <span class="body-text">
                        "Alexa rank" is your site's"rating", according to Alexa’s data as collected from the toolbarsinstalled on their users' browsers. Assuming that their users arerepresentative and assuming that their data is valid, sites are rated accordingto the traffic (visitors) they get. The number one site would be the site that,according to Alexa's data, gets the most visitors and/or pageviews.
                    </span>
                    <span class="source-label pull-left">SOURCE: Alexa</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row unbreakable">
        <div id="cuc-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-gpi pull-left">#</span>
                SEMrush Domain Rank
            <span class="glyphicon glyphicon-ok-circle pull-right"></span>
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <p class="alt-label"><?php echo $getSEMRushDomainRank["Rk"] ?></p>
                </div>
                <div class="col-md-9 col-sm-9">
                    <span class="body-text">
                        Web-based metrics help webmasters understand how their web pages rank against other web pages, particularly if they’re using search engine optimization (SEO) to improve their web ranking and authority. These same web analytics may be referred to as ranking metrics, in contexts where they’re used to figure out how a web page ranks within search engine results pages (SERPs).
                    </span>
                    <span class="source-label pull-left">SOURCE: SEMrush</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row unbreakable">
        <div id="cuc-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-gpi pull-left">#</span>
                SEMrush Organic Keywords
            <span class="glyphicon glyphicon-ok-circle pull-right"></span>
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <?php $semI = 0; ?>
                    <?php foreach ($getSEMRushOrganicKeywords["data"] as $word): ?>
                        <p class="dns-label"><?php echo $word["Ph"] ?> - <?php echo $word["Po"] ?></p>
                        <?php $semI += 1; ?>
                        <?php if ($semI == 5){
                            break;
                        } ?>

                    <?php endforeach; ?>
                </div>
                <div class="col-md-9 col-sm-9">
                    <span class="body-text">.</span>
                    <span class="source-label pull-left">SOURCE: SEMrush</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row unbreakable">
        <div id="iat-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-gpi pull-left">#</span>
                Web of Trust Trustworthiness
            <span class="glyphicon <?php 
                if($trustworthiness >= 60) {
                    echo 'glyphicon-ok-circle';
                } elseif ($trustworthiness >= 40) {
                    echo 'glyphicon-screenshot';
                } else {
                    echo 'glyphicon-remove-circle';
                }
            ?> pull-right"></span>
          </div>
          
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="progress-bars visible-phone">
                    <span class="progress-label-left"><?php echo $trustworthiness ?> <span style="font-size: 12px;">of 100</span></span>
                    <span class="pull-right"><?php echo $trustworthiness ?><span style="font-size: 12px;">%</span></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-3" role="progressbar" style="width: <?php echo $trustworthiness ?>%; background:   <?php 
                            if($trustworthiness >= 0 && $trustworthiness <= 33)echo 'red';
                            if($trustworthiness > 33 && $trustworthiness <= 66)echo 'orange';
                            if($trustworthiness > 66)echo 'green';
                        ?>;">
                            <span class="sr-only"><?php echo $trustworthiness ?>% Complete</span>
                        </div>
                    </div>
                    </div>
                    <div class="radial-progress hidden-phone gps-radial">
                        <input class="knob" data-fgColor="<?php 
                            if($trustworthiness >= 0 && $trustworthiness <= 33)echo 'red';
                            if($trustworthiness > 33 && $trustworthiness <= 66)echo 'orange';
                            if($trustworthiness > 66)echo 'green';
                        ?>" data-thickness=".1" data-width="90" data-height="90" readonly value="<?php echo $trustworthiness ?>">
                        <span class="radial-inside-content">of 100</span>
                    </div>
                    <?php if($trustworthiness >= 60): ?>
                        <p class="passed">Passed</p>
                    <?php elseif ($trustworthiness >= 40): ?>
                        <p class="attention">Attention</p>
                    <?php else: ?>
                        <p class="action-needed">Action needed!</p>
                    <?php endif; ?>

                </div>
                <div class="col-md-9 col-sm-9">
                    <?php if($trustworthiness >= 0 && $trustworthiness <= 66): ?>
                        <span class="body-text"><b style="font-size:20px; color:black;">Increase your site's trustworthiness</b></span>
                    <?php endif; ?>
                    <span class="body-text">Result from the website reputation rating tool Web of Trust (WOT), as it pertains to the trustworthiness of your website.  Data is collected from millions of users worldwide and other trusted data sources. Past instance of issues with malware and phishing can have a negative effect, but so can issues like deceitful content, excessive ad pop-ups, etc.</span>
                    <span class="source-label pull-left">SOURCE: WOT</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row unbreakable">
        <div id="iat-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-gpi pull-left">#</span>
                Web of Trust Child Safety
            <span class="glyphicon <?php 
                if($childsafety >= 60) {
                    echo 'glyphicon-ok-circle';
                } elseif ($childsafety >= 40) {
                    echo 'glyphicon-screenshot';
                } else {
                    echo 'glyphicon-remove-circle';
                }
            ?> pull-right"></span>
          </div>
          
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="progress-bars visible-phone">
                    <span class="progress-label-left"><?php echo $childsafety ?> <span style="font-size: 12px;">of 100</span></span></span>
                    <span class="pull-right"><?php echo $childsafety ?><span style="font-size: 12px;">%</span></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-3" role="progressbar" style="width: <?php echo $childsafety ?>%; background:   <?php 
                            if($childsafety >= 0 && $childsafety <= 33)echo 'red';
                            if($childsafety > 33 && $childsafety <= 66)echo 'orange';
                            if($childsafety > 66)echo 'green';
                        ?>;">
                            <span class="sr-only"><?php echo $childsafety ?>% Complete</span>
                        </div>
                    </div>
                    </div>
                    <div class="radial-progress hidden-phone gps-radial">
                        <input class="knob" data-fgColor="<?php 
                            if($childsafety >= 0 && $childsafety <= 33)echo 'red';
                            if($childsafety > 33 && $childsafety <= 66)echo 'orange';
                            if($childsafety > 66)echo 'green';
                        ?>" data-thickness=".1" data-width="90" data-height="90" readonly value="<?php echo $childsafety ?>">
                        <span class="radial-inside-content">of 100</span>
                    </div>
                    <?php if($childsafety >= 60): ?>
                        <p class="passed">Passed</p>
                    <?php elseif ($childsafety >= 40): ?>
                        <p class="attention">Attention</p>
                    <?php else: ?>
                        <p class="action-needed">Action needed!</p>
                    <?php endif; ?>

                </div>
                <div class="col-md-9 col-sm-9">
                    <?php if($childsafety >= 0 && $childsafety <= 66): ?>
                        <span class="body-text"><b style="font-size:20px; color:black;">Increase your site's child safety</b></span>
                    <?php endif; ?>
                    <span class="body-text">Result from the website reputation rating tool Web of Trust (WOT).  Data is collected from millions of users worldwide and other trusted data sources. If your site contains instances of adult content like nudity, sexual content, violence or obviously endorses illegal activity, your WOT rating will suffer.</span>
                    <span class="source-label pull-left">SOURCE: WOT</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>






    <div class="row unbreakable">
        <div id="social-panel" class="panel panel-default">
          <div class="heading-main section-heading section-heading-social">
                SOCIAL MEDIA - Why is Social Media Imporant?
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="progress-bars visible-phone">
                        <span class="progress-label-left"><?php echo getLetterScore($socialScore) ?></span>
                        <div class="progress bar-progress">
                            <div class="progress-bar bar-3" role="progressbar" style="width: <?php echo $socialScore ?>%; background:<?php 
                                if($socialScore >= 0 && $socialScore <= 33)echo 'red';
                                if($socialScore > 33 && $socialScore <= 66)echo 'orange';
                                if($socialScore > 66)echo 'green';
                            ?>;">
                                <span class="sr-only"><?php echo $socialScore ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="radial-progress hidden-phone gps-radial">
                        <input class="knob-social" data-fgColor="<?php 
                            if($socialScore >= 0 && $socialScore <= 33)echo 'red';
                            if($socialScore > 33 && $socialScore <= 66)echo 'orange';
                            if($socialScore > 66)echo 'green';
                        ?>" data-step="1" data-min="0" data-max="100" data-thickness=".1" data-width="90" data-height="90" readonly value="<?php echo $socialScore ?>">
                    </div>  
                    <script>
                        $(function($) {
                            $(".knob-social").knob({
                              'draw' : function () { 
                                $(this.i).val('<?php echo getLetterScore($socialScore) ?>')
                              }
                            });
                            $(".knob-social").css('font-family-size','25px').css('color','#666666').css('font-family','Segoe UI').css('font-weight','100').css('display','inline-block');
                        });
                    </script>
                </div>
                <div class="col-md-9 col-sm-9">
                    <span class="body-text">
                        Social media networks were a novelty 5 years ago, but today their importance is no longer debated. <br/>
                        These are the definitive benefits of social media marketing that are listed:<br/>
                        Increased exposure, Increased traffic, Develop loyal fans,Improved search ranking, Reduced marketing expenses,Improved sales,Bigger Branding
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>


<!--panel 15-->
    <div class="row unbreakable">
        <div id="twitter-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="fa fa-twitter panel-fa-icon-twitter pull-left"></span>
                Twitter Mentions
            <span class="glyphicon glyphicon-ok-circle pull-right"></span>
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <p class="alt-label"><?php echo $getTwitterMentions ?></p>
                    <?php if ($twitterScore < 0.5): ?>
                        <p class="action-needed">Action needed!</p>
                    <?php endif ?>
                </div>
                <div class="col-md-9 col-sm-9">
                    <?php if($twitterScore < 0.5): ?>
                        <span class="body-text"><b style="font-size:20px; color:black;">Improve your presence on Twitter</b></span>
                    <?php endif; ?>
                    <span class="body-text">Social signals can have an impact on how your domain is viewed in terms of its authority.  Twitter mentions are an indicator of this to search engines, and that links shared via Twitter can have a direct impact on rankings.</span>
                    <span class="source-label pull-left">SOURCE: TWITTER</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>
<!--panel 16-->
    <div class="row unbreakable">
        <div id="facebook-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="fa fa-facebook panel-fa-icon-facebook pull-left"></span>
                Facebook Interactions
            <span class="glyphicon glyphicon-ok-circle pull-right"></span>
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <p class="w3c-errors-label">Shares</p>
                    <p class="w3c-errors-var"><?php echo $getFacebookInteractions['share_count'] ?></p>
                    <p class="w3c-errors-label">Likes</p>
                    <p class="w3c-errors-var"><?php echo $getFacebookInteractions['like_count'] ?></p>
                    <p class="w3c-errors-label">Comments</p>
                    <p class="w3c-errors-var"><?php echo $getFacebookInteractions['comment_count'] ?></p>
                    <?php if ($facebookScore < 0.5): ?>
                        <p class="action-needed">Action needed!</p>
                    <?php endif ?>
                </div>
                <div class="col-md-9 col-sm-9">
                    <?php if($facebookScore < 0.5): ?>
                        <span class="body-text"><b style="font-size:20px; color:black;">Improve your presence on Facebook</b></span>
                    <?php endif; ?>
                    <span class="body-text">Like Twitter, your Facebook interactions play a role in building authority for your domain, and therefor also directly impact your organic results.  The more relevant you seem socially, the stronger an indicator it is.</span>
                    <span class="source-label pull-left">SOURCE: FACEBOOK</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>
<!--panel 17-->
    <div class="row unbreakable">
        <div id="google-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="fa fa-google-plus panel-fa-icon-g-plus pull-left"></span>
                Google + 1's
            <span class="glyphicon glyphicon-ok-circle pull-right"></span>
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <p class="w3c-errors-var"><?php echo $getGooglePlusOnes ?></p>
                    <?php if ($googlePlusScore < 0.5): ?>
                        <p class="action-needed">Action needed!</p>
                    <?php endif ?>
                </div>
                <div class="col-md-9 col-sm-9">
                    <?php if($googlePlusScore < 0.5): ?>
                        <span class="body-text"><b style="font-size:20px; color:black;">Improve your presence on Google+</b></span>
                    <?php endif; ?>
                    <span class="body-text">.</span>
                    <span class="source-label pull-left">SOURCE: GOOGLE+</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>                  






    <div class="row unbreakable">
        <div id="code-panel" class="panel panel-default">
          <div class="heading-main section-heading section-heading-code">
                CODE - How well is your site coded?
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="progress-bars visible-phone">
                        <span class="progress-label-left"><?php echo getLetterScore($codeScore) ?></span>
                        <div class="progress bar-progress">
                            <div class="progress-bar bar-3" role="progressbar" style="width: <?php echo $codeScore ?>%; background:<?php 
                                if($codeScore >= 0 && $codeScore <= 33)echo 'red';
                                if($codeScore > 33 && $codeScore <= 66)echo 'orange';
                                if($codeScore > 66)echo 'green';
                            ?>;">
                                <span class="sr-only"><?php echo $codeScore ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="radial-progress hidden-phone gps-radial">
                        <input class="knob-code" data-fgColor="<?php 
                            if($codeScore >= 0 && $codeScore <= 33)echo 'red';
                            if($codeScore > 33 && $codeScore <= 66)echo 'orange';
                            if($codeScore > 66)echo 'green';
                        ?>" data-step="1" data-min="0" data-max="100" data-thickness=".1" data-width="90" data-height="90" readonly value="<?php echo $codeScore ?>">
                    </div>  
                    <script>
                        $(function($) {
                            $(".knob-code").knob({
                              'draw' : function () { 
                                $(this.i).val('<?php echo getLetterScore($codeScore) ?>')
                              }
                            });
                            $(".knob-code").css('font-family-size','25px').css('color','#666666').css('font-family','Segoe UI').css('font-weight','100').css('display','inline-block');
                        });
                    </script>
                </div>
                <div class="col-md-9 col-sm-9">
                    <span class="body-text">
                        This section, covers 11 main area's nuts and bolts of your website code. <br/>
                        Errors in the code may cause drastic effects in eyes, of Google, Yelp, and other major engines, and not be noticable when looking at the wesbite.
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>

<!--panel 2-->
    <div class="row unbreakable">
        <div id="w3c-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-w3 pull-left">W3</span>
                W3C Validator
            <span class="glyphicon <?php 
                if($w3CScore >= 0 && $w3CScore <= 33)echo 'glyphicon-remove-circle';
                if($w3CScore > 33 && $w3CScore <= 66)echo 'glyphicon-screenshot';
                if($w3CScore > 66)echo 'glyphicon-ok-circle';
            ?> pull-right"></span>
          </div>                    
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3 hidden-phone">
                    <p class="w3c-errors-label">Errors</p>
                    <p class="w3c-errors-var"><?php echo count($validate['errors']) ?></p>
                    <p class="w3c-warnings-label">Warnings</p>
                    <p class="w3c-warnings-var"><?php echo count($validate['warnings']) ?></p>
                </div>
                <div class="col-md-3 col-sm-3 visible-phone w3c-phone-count">
                    <span class="col-md-12 col-sm-12 w3c-errors-label">Errors</span>
                    <span class="col-md-8 col-md-offset-4 col-sm-8 col-sm-offset-4 w3c-errors-var"><?php echo count($validate['errors']) ?></span>
                </div>
                <div class="col-md-3 col-sm-3 visible-phone w3c-phone-count">
                    <span class="col-md-12 col-sm-12 w3c-warnings-label">Warnings</span>
                    <span class="col-md-8 col-md-offset-4 col-sm-8 col-sm-offset-4 w3c-warnings-var"><?php echo count($validate['warnings']) ?></span>
                </div>
                <div class="col-md-9 col-sm-9">
                    <span class="body-text">This determines how well your website's code is structured according to industry standards. Multiple errors will cause your website to operate poorly, and lead to a poor user experience. Improperly structured code will negatively impact your search engine performance.</span>
                    <div class="pull-down"><span class="source-label pull-left pull-down">SOURCE: W3C VALIDATOR</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span></div>
                </div>
            </div>
          </div>
        </div>
    </div>

<!--panel 3-->
    <div class="row unbreakable">
        <div id="gps-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="fa fa-dashboard panel-fa-icon-gps pull-left"></span>
                Google Pagespeed Score
            <span class="glyphicon <?php 
                if($getPagespeedScore >= 0 && $getPagespeedScore <= 33)echo 'glyphicon-remove-circle';
                if($getPagespeedScore > 33 && $getPagespeedScore <= 66)echo 'glyphicon-screenshot';
                if($getPagespeedScore > 66)echo 'glyphicon-ok-circle';
            ?> pull-right"></span>
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="progress-bars visible-phone">
                    <span class="progress-label-left"><?php echo $getPagespeedScore ?> <span style="font-size: 12px;">of 100</span></span></span>
                    <span class="pull-right"><?php echo $getPagespeedScore ?><span style="font-size: 12px;">%</span></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-3" role="progressbar" style="width: <?php echo $getPagespeedScore ?>%; background: <?php 
                            if($getPagespeedScore >= 0 && $getPagespeedScore <= 33)echo 'red';
                            if($getPagespeedScore > 33 && $getPagespeedScore <= 66)echo 'orange';
                            if($getPagespeedScore > 66)echo 'green';
                        ?>;">
                            <span class="sr-only"><?php echo $getPagespeedScore ?>% Complete</span>
                        </div>
                    </div>
                    </div>
                    <div class="radial-progress hidden-phone gps-radial">
                        <input class="knob" data-fgColor="<?php 
                            if($getPagespeedScore >= 0 && $getPagespeedScore <= 33)echo 'red';
                            if($getPagespeedScore > 33 && $getPagespeedScore <= 66)echo 'orange';
                            if($getPagespeedScore > 66)echo 'green';
                        ?>" data-thickness=".1" data-width="90" data-height="90" readonly value="<?php echo $getPagespeedScore ?>">
                        <span class="radial-inside-content">of 100</span>
                    </div>
                    <p class="attention <?php
                        if($getPagespeedScore <= 33 || $getPagespeedScore > 66)echo 'hide';
                    ?>">Attention</p>
                    <p class="action-needed <?php
                        if($getPagespeedScore > 33 )echo 'hide';
                    ?>">Action needed!</p>
                    <p class="passed <?php
                        if($getPagespeedScore <= 66)echo 'hide';
                    ?>">Passed</p>
                </div>
                <div class="col-md-9 col-sm-9">
                    <span class="body-text">
                    A measurement of how quickly your website loads. The speed of 
                    your website is an important indicator to Google and other search 
                    engines. A user is more likely to click away from your website if it 
                    takes too long to load. Variables such as image size, content 
                    format, video &amp; audio players and rich content are all factors.</span>
                    <span class="source-label pull-left">SOURCE: GOOGLE</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>
    
<!--panel 4-->          
    <div class="row unbreakable">
        <div id="iat-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="fa fa-picture-o panel-fa-icon-itc pull-left"></span>
                Images Alt Text Count
            <span class="glyphicon <?php 
                if($imageAltScore >= 0 && $imageAltScore <= 33)echo 'glyphicon-remove-circle';
                if($imageAltScore > 33 && $imageAltScore <= 66)echo 'glyphicon-screenshot';
                if($imageAltScore > 66)echo 'glyphicon-ok-circle';
            ?> pull-right"></span>
          </div>
          
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <?php $arr = explode('/', $countImagesAltTexts); ?>
                    <div class="progress-bars visible-phone">
                    <span class="progress-label-left"><?php echo $arr[0] ?> <span style="font-size: 12px;">of <?php echo $arr[1] ?></span></span></span>
                    <span class="pull-right"><?php echo $imageAltScore ?><span style="font-size: 12px;">%</span></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-3" role="progressbar" style="width: <?php echo $imageAltScore ?>%; background: <?php 
                            if($imageAltScore >= 0 && $imageAltScore <= 33)echo 'red';
                            if($imageAltScore > 33 && $imageAltScore <= 66)echo 'orange';
                            if($imageAltScore > 66)echo 'green';
                        ?>;">
                            <span class="sr-only"><?php echo $imageAltScore ?>% Complete</span>
                        </div>
                    </div>
                    </div>
                    <div class="radial-progress hidden-phone gps-radial">
                        <input class="knob" data-fgColor="<?php 
                            if($imageAltScore >= 0 && $imageAltScore <= 33)echo 'red';
                            if($imageAltScore > 33 && $imageAltScore <= 66)echo 'orange';
                            if($imageAltScore > 66)echo 'green';
                        ?>" data-thickness=".1" data-width="90" data-height="90" data-max="<?php echo $arr[1] ?>" readonly value="<?php echo $arr[0] ?>">
                        <span class="radial-inside-content">of <?php echo $arr[1] ?></span>
                    </div>
                    <p class="attention <?php
                        if($imageAltScore <= 33 || $imageAltScore > 66)echo 'hide';
                    ?>">Attention</p>
                    <p class="action-needed <?php
                        if($imageAltScore > 33 )echo 'hide';
                    ?>">Action needed!</p>
                    <p class="passed <?php
                    if($imageAltScore <= 66)echo 'hide';
                    ?>">Passed</p>
                    
                </div>
                <div class="col-md-9 col-sm-9">
                    <?php if($imageAltScore >= 0 && $imageAltScore <= 66): ?>
                        <span class="body-text"><b style="font-size:20px; color:black;">Add alt text to your images</b></span>
                    <?php endif; ?>
                    <span class="body-text">
                    Alt Text (or Alt Attribute) is HTML/XHTML language used to 
                    describe the image it is associated with, allowing programs designed 
                    for blind users and search engine crawlers to understand what the 
                    purpose and content of the image is. Search engine bots can take 
                    the information in an Alt Attribute image to better understand the 
                    overall page content.</span>
                    <span class="source-label pull-left">SOURCE: OUR CRAWLER</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span>
                </div>
                
            </div>
          </div>
        </div>
    </div>
<!--panel 5-->
    <div class="row unbreakable">
        <div id="cuc-panel" class="panel panel-default">
          <div class="panel-heading  heading-main">
            <span class="fa fa-chain panel-fa-icon-cuc pull-left"></span>
                Clean Urls Count
            <span class="glyphicon <?php 
                if($cleanUrlScore >= 0 && $cleanUrlScore <= 33)echo 'glyphicon-remove-circle';
                if($cleanUrlScore > 33 && $cleanUrlScore <= 66)echo 'glyphicon-screenshot';
                if($cleanUrlScore > 66)echo 'glyphicon-ok-circle';
            ?>  pull-right"></span>
          </div>
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <?php $arr = explode('/', $checkCleanUrls); ?>
                    <div class="progress-bars visible-phone">
                    <span class="progress-label-left"><?php echo $arr[0] ?>of <?php echo $arr[1] ?></span></span></span>
                    <span class="pull-right"><?php echo $cleanUrlScore ?><span style="font-size: 12px;">%</span></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-3" role="progressbar" style="width: 100%; background:<?php 
                            if($cleanUrlScore >= 0 && $cleanUrlScore <= 33)echo 'red';
                            if($cleanUrlScore > 33 && $cleanUrlScore <= 66)echo 'orange';
                            if($cleanUrlScore > 66)echo 'green';
                        ?>;">
                            <span class="sr-only"><?php echo $cleanUrlScore ?>%</span>
                        </div>
                    </div>
                    </div>
                    
                    <div class="radial-progress gps-radial hidden-phone">
                        <input class="knob" data-fgColor="<?php 
                            if($cleanUrlScore >= 0 && $cleanUrlScore <= 33)echo 'red';
                            if($cleanUrlScore > 33 && $cleanUrlScore <= 66)echo 'orange';
                            if($cleanUrlScore > 66)echo 'green';
                        ?>" data-step="1" data-min="0" data-max="<?php echo $arr[1] ?>" data-thickness=".1" data-width="90" 
                            data-height="90" readonly value="<?php echo $arr[0] ?>">
                        <span class="radial-inside-content">of <?php echo $arr[1] ?></span>
                    </div>
                    <p class="attention <?php
                        if($cleanUrlScore <= 33 || $cleanUrlScore > 66)echo 'hide';
                    ?>">Attention</p>
                    <p class="action-needed <?php
                        if($cleanUrlScore > 33 )echo 'hide';
                    ?>">Action needed!</p>
                    <p class="passed <?php
                    if($cleanUrlScore <= 66)echo 'hide';
                    ?>">Passed</p>
                </div>
                <div class="col-md-9 col-sm-9">
                    <?php if($cleanUrlScore >= 0 && $cleanUrlScore <= 66): ?>
                        <span class="body-text"><b style="font-size:20px; color:black;">Clean your URLs</b></span>
                    <?php endif; ?>
                    <span class="body-text">
                    This refers to how easy the URL paths are to read. For Ex: 
                    www.domain.com/about-us vs 
                    www.domain.com/index.php?page=2 Clean URL’s enhance the 
                    look and feel of a website to a user, and make it more appealing 
                    when shared across Social Networks. Although not a strong indicator 
                    to search engines, a clean URL is important nonetheless.</span>
                    <span class="source-label pull-left">SOURCE: OUR CRAWLER</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span>
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row unbreakable">
        <div id="dns-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-dns pull-left">DNS</span>
                DNS
            <span class="glyphicon glyphicon-ok-circle pull-right"></span>
          </div>                    
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3 hidden-phone">
                    <p class="dns-label">Created</p>
                    <p class="dns-var"><?php echo $getDomainAge['created'] ?></p>
                    <p class="dns-label">Expires</p>
                    <p class="dns-var"><?php echo $getDomainAge['expired'] ?></p>
                </div>
                <div class="col-md-3 col-sm-3 visible-phone w3c-phone-count">
                    <span class="col-md-12 col-sm-12 dns-label">Created</span>
                    <span class="col-md-8 col-sm-8 dns-var"><?php echo $getDomainAge['created'] ?></span>
                </div>
                <div class="col-md-3 col-sm-3 visible-phone w3c-phone-count">
                    <span class="col-md-12 col-sm-12 dns-label">Expires</span>
                    <span class="col-md-8 col-sm-8 dns-var"><?php echo $getDomainAge['expired'] ?></span>
                </div>
                <div class="col-md-9 col-sm-9">
                    <span class="body-text">Domain Name System (DNS)</span>
                    <div class="pull-down"><span class="source-label pull-left pull-down">SOURCE: WHOIS</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span></div>
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row unbreakable">
        <div id="dns-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-www pull-left">WWW</span>
                WWW Resolve
            <span class="glyphicon <?php 
                if(!$getWWWResolve)echo 'glyphicon-remove-circle';
                if($getWWWResolve)echo 'glyphicon-ok-circle';
            ?> pull-right"></span>
          </div>                    
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <?php if(!$getWWWResolve): ?>
                        <p class="action-needed">Action needed!</p>
                     <?php else: ?>
                        <p class="passed">Passed</p>
                    <?php endif; ?>
                </div>
                <div class="col-md-9 col-sm-9">
                    <?php if(!$getWWWResolve): ?>
                        <span class="body-text"><b style="font-size:20px; color:black;">Create WWW redirect</b></span>
                    <?php endif; ?>
                    <span class="body-text">This is a simple redirection command in the configuration file of your server.  It will force “www.” to be inserted before your domain name, or remove it.  This can prevent a search engine from seeing two different URL’s, http://resolve.com vs. http://www.resolve.com for example, and therefore viewing the domains as having duplicate content.</span>
                    <div class="pull-down"><span class="source-label pull-left pull-down">SOURCE: OUR CRAWLER</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span></div>
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row unbreakable">
        <div id="dns-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-ip pull-left">IP</span>
                IP Canonicalization
            <span class="glyphicon <?php 
                if(!$getIpCanonicalization)echo 'glyphicon-remove-circle';
                if($getIpCanonicalization)echo 'glyphicon-ok-circle';
            ?> pull-right"></span>
          </div>                    
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <?php if(!$getIpCanonicalization): ?>
                        <p class="action-needed">Action needed!</p>
                     <?php else: ?>
                        <p class="passed">Passed</p>
                    <?php endif; ?>
                </div>
                <div class="col-md-9 col-sm-9">
                    <?php if(!$getIpCanonicalization): ?>
                        <span class="body-text"><b style="font-size:20px; color:black;">Redirects IP to site address</b></span>
                    <?php endif; ?>
                    <span class="body-text">
                        In order to pass this test you must consider using a 301 re-write rule in your .htaccess file so that your site's IP points to your domain name. 
                        If your site is running on apache server, you could put these lines in your .htaccess after RewriteEngine on line: <br/>
                        RewriteCond %{HTTP_HOST} ^XXX\.XXX\.XXX\.XXX RewriteRule (.*) http://www.yourdomain.com/$1 [R=301,L]<br/>
                        Note that you must proper format the first line using your IP (replace X characters with proper digits from your IP) and the second line using your domain name.
                    </span>
                    <div class="pull-down"><span class="source-label pull-left pull-down">SOURCE: OUR CRAWLER</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span></div>
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row unbreakable">
        <div id="dns-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-ico pull-left">ico</span>
                Favicon
            <span class="glyphicon <?php 
                if(!$hasFavicon)echo 'glyphicon-remove-circle';
                if($hasFavicon)echo 'glyphicon-ok-circle';
            ?> pull-right"></span>
          </div>                    
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <?php if(!$hasFavicon): ?>
                        <p class="action-needed">Action needed!</p>
                     <?php else: ?>
                        <p class="passed">Passed</p>
                    <?php endif; ?>
                </div>
                <div class="col-md-9 col-sm-9">
                    <?php if(!$hasFavicon): ?>
                        <span class="body-text"><b style="font-size:20px; color:black;">Add favicon</b></span>
                    <?php endif; ?>
                    <span class="body-text">
                        A favicon also known as a shortcut icon, Web site icon, tab icon or bookmark icon,is a file containing one or more small icons, most commonly 16×16 pixels,associated with a particular Web site A web designer can create such an icon and install it into a Web site. 
                    </span>
                    <div class="pull-down"><span class="source-label pull-left pull-down">SOURCE: OUR CRAWLER</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span></div>
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row unbreakable">
        <div id="dns-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-size pull-left">Kb</span>
                Page Size
            <span class="glyphicon glyphicon-ok-circle pull-right"></span>
          </div>                    
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <p class="page-size-var">
                        <?php echo round($pagesize) ?> Kb
                    </p>
                    <p class="passed">Passed</p>
                </div>
                <div class="col-md-9 col-sm-9">
                    <span class="body-text">The size of your your page can directly affect how quickly your website will load on a browser.  Search engines look more favorably on sites with fast load speeds because they create a better experience for a user.  Compressing images, cleaning up CSS and HTML and getting rid of unnecessary object are some ways to fix this quickly.</span>
                    <div class="pull-down"><span class="source-label pull-left pull-down">SOURCE: OUR CRAWLER</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span></div>
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row unbreakable">
        <div id="dns-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-lang pull-left">Abc</span>
                Language
            <span class="glyphicon <?php 
                if($checkLang == '') {
                    echo 'glyphicon-remove-circle';
                } else {
                    echo 'glyphicon-ok-circle';
                }
            ?> pull-right"></span>
          </div>                    
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <p class="lang-var">
                        <?php echo $checkLang ?>
                    </p>
                    <?php if($checkLang == ''): ?>
                        <p class="action-needed">Action needed!</p>
                     <?php else: ?>
                        <p class="passed">Passed</p>
                    <?php endif; ?>
                </div>
                <div class="col-md-9 col-sm-9">
                    <?php if($checkLang == ''): ?>
                        <span class="body-text"><b style="font-size:20px; color:black;">Add language tag</b></span>
                    <?php endif; ?>
                    <span class="body-text">.</span>
                    <div class="pull-down"><span class="source-label pull-left pull-down">SOURCE: OUR CRAWLER</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span></div>
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row unbreakable">
        <div id="dns-panel" class="panel panel-default">
          <div class="panel-heading heading-main">
            <span class="panel-label-icon-charset pull-left">UTF</span>
                Charset
            <span class="glyphicon <?php 
                if($checkMetaCharset == '') {
                    echo 'glyphicon-remove-circle';
                } else {
                    echo 'glyphicon-ok-circle';
                }
            ?> pull-right"></span>
          </div>                    
          <div class="panel-body body-main">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <p class="charset-var">
                        <?php if($checkMetaCharset == ''): ?>
                            <?php echo "-" ?>
                        <?php else: ?>
                            <?php echo $checkMetaCharset ?>
                        <?php endif; ?>
                    </p>
                    <?php if($checkMetaCharset == ''): ?>
                        <p class="action-needed">Action needed!</p>
                     <?php else: ?>
                        <p class="passed">Passed</p>
                    <?php endif; ?>
                </div>
                <div class="col-md-9 col-sm-9">
                    <?php if($checkMetaCharset == ''): ?>
                        <span class="body-text"><b style="font-size:20px; color:black;">Add charset tag</b></span>
                    <?php endif; ?>
                    <span class="body-text">
                        The term charset, is short for “character set”. Charsets areidentifiers used to describe a series of universal characters used in web andinternet protocols such as HTML and Microsoft Windows.<br/>
                        Universal characters are used in many languages for encoding and fordesignating a font format for pages or to digitally represent text. A charsettable or tables list the type of charsets and its standard. Unicode, ascii andiso are types of charsets that reference text or universal symbols or charactersused in various languages and meta tags.
                    </span>
                    <div class="pull-down"><span class="source-label pull-left pull-down">SOURCE: OUR CRAWLER</span>
                    <span class="influence-label pull-right">INFLUENCE:
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    </span></div>
                </div>
            </div>
          </div>
        </div>
    </div>
