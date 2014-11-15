<!--panel 1-->
    <div class="row">
        <div class="panel" id="overall-perf">
          <div class="panel-heading overal-performance-head">
            <span class="fa fa-list-alt panel-iceo-awesome pull-left"></span>
            <span class="visible-phone pull-left">Review</span>
            <span class="hidden-phone pull-left" style="color:#fff !important">Website / Business Review</span>
            <b class="donaimname" style="color:#fff !important"><?php echo $url ?></b>
          </div>
          <div class="panel-body overal-performance-body">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <div class="radial-progress overal-radial">
                        <input class="knob" data-fgColor="#0073cc" data-thickness=".1" data-width="130" data-height="130" readonly value="<?php echo $totalScore ?>">
                        <script>
                            $(function($) {
                                $(".knob").knob();
                                $(".knob").css('font-size','25px').css('color','#666666').css('font-family','Segoe UI').css('font-weight','100').css('display','inline-block');
                            });
                        </script>
                    </div>
                    
                </div>
                
                
                <div class="col-md-3 col-sm-3 col-md-offset-0 hidden-phone progress-bars-op">
                    <div class="progress-bars">
                    <span class="progress-label-left">Organic SEO:</span>
                    <span class="progress-label-right3"><?php echo getLetterScore($SEOScore) ?><!--<span style="font-size: 12px;">%</span>--></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-3" role="progressbar" style="width: <?php echo $SEOScore ?>%;">
                            <span class="sr-only"><?php echo $SEOScore ?>% Complete</span>
                        </div>
                    </div>
                    </div>
                    
                    <div class="progress-bars">
                    <span class="progress-label-left">Search Engines:</span>
                    <span class="progress-label-right2"><?php echo getLetterScore($searchEngineScore) ?><!--<span style="font-size: 12px;">%</span>--></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-2" role="progressbar" style="width: <?php echo $searchEngineScore ?>%;">
                            <span class="sr-only"><?php echo $searchEngineScore ?>% Complete</span>
                        </div>
                    </div>
                    </div>
                    
                    <div class="progress-bars">
                    <span class="progress-label-left">Social Media:</span>
                    <span class="progress-label-right4"><?php echo getLetterScore($socialScore) ?><!--<span style="font-size: 12px;">%</span>--></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-4" role="progressbar" style="width: <?php echo $socialScore ?>%;">
                            <span class="sr-only"><?php echo $socialScore ?>% Complete</span>
                        </div>
                    </div>
                    </div>

                    <div class="progress-bars">
                    <span class="progress-label-left">Code:</span>
                    <span class="progress-label-right1"><?php echo getLetterScore($codeScore) ?><!--<span style="font-size: 12px;">%</span>--></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-1" role="progressbar" style="width: <?php echo $codeScore ?>%;">
                            <span class="sr-only"><?php echo $codeScore ?>% Complete</span>
                        </div>
                    </div>
                    </div>
                </div>
                
                <div class="col-xs-4 col-xs-offset-1 visible-phone pull-right progress-bars-op pb-relative" style="width:200px;">
                    <div class="progress-bars">
                    <span class="progress-label-left"style="font-size: 18px;">Organic SEO:</span>
                    <span class="progress-label-right3" style="padding-left: 21%;"><?php echo getLetterScore($SEOScore) ?><!--<span style="font-size: 12px;">%</span>--></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-3" role="progressbar" style="width: <?php echo $SEOScore ?>%;">
                            <span class="sr-only"><?php echo $SEOScore ?>% Complete</span>
                        </div>
                    </div>
                    </div>
                    
                    <div class="progress-bars">
                    <span class="progress-label-left"style="font-size: 18px;">Search Engines:</span>
                    <span class="progress-label-right2" style="padding-left: 9%;"><?php echo getLetterScore($searchEngineScore) ?><!--<span style="font-size: 12px;">%</span>--></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-2" role="progressbar" style="width: <?php echo $searchEngineScore ?>%;">
                            <span class="sr-only"><?php echo $searchEngineScore ?>% Complete</span>
                        </div>
                    </div>
                    </div>
                    
                    <div class="progress-bars">
                    <span class="progress-label-left"style="font-size: 18px;">Social Media:</span>
                    <span class="progress-label-right4" style="padding-left: 20%;"><?php echo getLetterScore($socialScore) ?><!--<span style="font-size: 12px;">%</span>--></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-4" role="progressbar" style="width: <?php echo $socialScore ?>%;">
                            <span class="sr-only"><?php echo $socialScore ?>% Complete</span>
                        </div>
                    </div>
                    </div>

                    <div class="progress-bars">
                    <span class="progress-label-left"style="font-size: 18px;">Code:</span>
                    <span class="progress-label-right1" style="padding-left: 55%;"><?php echo getLetterScore($codeScore) ?><!--<span style="font-size: 12px;">%</span>--></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-1" role="progressbar" style="width: <?php echo $codeScore ?>%;">
                            <span class="sr-only"><?php echo $codeScore ?>% Complete</span>
                        </div>
                    </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-3 col-xs-0 col-md-offset-0 col-sm-offset-1 display-image main-preview hidden-phone">
                    <img class="apple-display" width="191px" src="../../../<?php echo $img ?>" alt="preview">
                </div>
            </div>
          </div>
        </div>
    </div>

    <?php if(count($allstat) > 0): ?>
        <div class="row unbreakable">
            <div class="competitors">Your competitors</div>
            <table class="table table-bordered table-hover table-condensed table-responsive competitors-table">
                <thead>
                    <tr>
                        <th style="width:80px">Preview</th>
                        <th>Website</th>
                        <th>PageRank</th>
                        <?php if ($_SESSION['type'] != 'private'): ?>
                            <th>Alexa Rank</th>
                        <?php endif; ?>
                        <?php if ($_SESSION['type'] == 'private'): ?>
                            <th>Organic Keywords</th>
                            <th>How Much they Spend in Google Adwords</th>
                            <?php if ($_SESSION['competitorsType'] == 'true'): ?>
                                <th>Common Keywords</th>
                            <?php endif ?>
                        <?php endif ?>
                        <?php if ($_SESSION['type'] != 'private'): ?>
                            <th>Code</th>
                            <th>Search Engines</th>
                            <th>SEO</th>
                            <th>Social</th>
                        <?php endif; ?>
                        <th>Total Score</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allstat as $key=>$value): ?>
                        <?php $allstat = getScore($key, $allstat) ?>
                    <?php endforeach ?>
                    <?php foreach ($allstat as $key=>$value): ?>
                        <tr>
                            <td style="width:80px;"><img src="../../../<?php echo $value['img'] ?>" width="70px"/></td>
                            <?php $compUrls = parse_url($key); ?>
                            <td><a href="<?php echo $key ?>" target="_blank"><?php echo $compUrls['host'] ?></a></td>
                            <td><?php echo $value['getGoogleToolbarPageRank'] ?></td>
                            <?php if ($_SESSION['type'] != 'private'): ?>
                                <td><?php echo $value['getAlexaGlobalRank'] ?></td>
                            <?php endif; ?>
                            <?php if ($_SESSION['type'] == 'private'): ?>
                                <?php $semI = 0; ?>
                                <?php $organicKeywordsString = ''; ?>
                                <?php foreach ($value['organicKeywords']["data"] as $word): ?>
                                    <?php $organicKeywordsString .= $word["Ph"].', ' ?>
                                    <?php $semI += 1; ?>
                                    <?php if ($semI == 5){
                                        break;
                                    } ?>
                                <?php endforeach; ?>
                                <td><?php echo substr($organicKeywordsString, 0, -2); ?></td>
                                <td>$<?php echo number_format($value['domainRank']['Ac']) ?></td>
                                <?php if ($_SESSION['competitorsType'] == 'true'): ?>
                                    <td><?php echo number_format($value['commonKeywords']) ?></td>
                                <?php endif ?>
                            <?php endif ?>
                            <?php if ($_SESSION['type'] != 'private'): ?>
                                <td><?php echo $value['codeScore'] ?></td>
                                <td><?php echo $value['searchEngineScore'] ?></td>
                                <td><?php echo $value['SEOScore'] ?></td>
                                <td><?php echo $value['socialScore'] ?></td>
                            <?php endif; ?>
                            <td><?php echo $value['totalScore'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <?php if ($_SESSION['type'] == 'private' && count($allstat) > 0): ?>
        <div class="row unbreakable">
            <div class="competitors">Competitors Ads:</div>
            <div class="adwords-wrap">
                <?php foreach ($allstat as $key=>$value): ?>
                    <?php if ($value['adwords'] != 0): ?>
                        <div class="adwords">
                            <a target="_blank" href="<?php echo $value['adwords'][3] ?>"><?php echo $value['adwords'][0] ?></a>
                            <div title="<?php echo $value['adwords'][2] ?>" class="sem-widget-type-ads-domain"><span class="sem-report-block-ad">Ad</span><?php echo $value['adwords'][2] ?></div>
                            <div class="adwords-description"><?php echo $value['adwords'][1] ?></div>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
    <?php endif ?>

    <?php if ($_SESSION['type'] == 'private' && count($allstat) > 0): ?>
        <div class="row unbreakable">
            <div class="competitors">Competitive Positioning Map:</div>
            <script type="text/javascript" src="https://www.google.com/jsapi"></script>
            <script type="text/javascript">
                google.load("visualization", "1", {packages:["corechart"]});
                function drawChart() {
                    var chart_data = new google.visualization.DataTable();
                    chart_data.addColumn('number', 'Paid Keywords');
                    chart_data.addColumn('number', 'Paid Search Traffic');
                    chart_data.addColumn({type: 'string', role: 'annotation'});
                    chart_data.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});
                    <?php foreach ($allstat as $key=>$value): ?>
                        chart_data.addColumn('number', 'Paid Search Traffic');
                        chart_data.addColumn({type: 'string', role: 'annotation'});
                        chart_data.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});
                    <?php endforeach ?>
                    chart_data.addRows([
                        <?php 
                            function numberFormat($n, $precision = 2) {
                                if ($n < 1000) {
                                    $n_format = number_format($n);
                                } else if ($n < 1000000) {
                                    $n_format = number_format($n / 1000, $precision) . 'k';;
                                } else if ($n < 1000000000) {
                                    $n_format = number_format($n / 1000000, $precision) . 'm';
                                } else {
                                    $n_format = number_format($n / 1000000000, $precision) . 'b';
                                }
                                return $n_format;
                            }
                        ?>
                        <?php 
                            $parsed = parse_url($url);
                            $Or = numberFormat($getSEMRushDomainRank['Or']);
                            $Ot = numberFormat($getSEMRushDomainRank['Ot']);
                        ?>
                        [<?php echo $getSEMRushDomainRank["Or"] ?>, <?php echo $getSEMRushDomainRank["Ot"] ?>, '<?php echo $parsed["host"] ?>', createCustomHTMLContent('<?php echo $parsed["host"] ?>', '<?php echo $Or ?>', '<?php echo $Ot ?>'), <?php foreach ($allstat as $key=>$value): ?>null, null, null, <?php endforeach ?>],
                        <?php $i = 0; ?>
                        <?php foreach ($allstat as $key=>$value): ?>
                            <?php 
                                $i++;   
                                $parsed = parse_url($key);
                                $Or = numberFormat($value['domainRank']['Or']);
                                $Ot = numberFormat($value['domainRank']['Ot']);
                            ?>
                            <?php
                                switch ($i) {
                                    case 1:
                                        echo "[{$value['domainRank']['Or']}, null, null, null, {$value['domainRank']['Ot']}, '{$parsed["host"]}', createCustomHTMLContent('{$parsed["host"]}', '{$Or}', '{$Ot}'),";
                                        for ($j = 0; $j < count($allstat) - $i; $j++) { echo "null, null, null, "; }
                                        echo "],";
                                        break;
                                    case 2:
                                        echo "[{$value['domainRank']['Or']}, null, null, null, null, null, null, {$value['domainRank']['Ot']}, '{$parsed["host"]}', createCustomHTMLContent('{$parsed["host"]}', '{$Or}', '{$Ot}'),";
                                        for ($j = 0; $j < count($allstat) - $i; $j++) { echo "null, null, null, "; }
                                        echo "],";
                                        break;
                                    case 3:
                                        echo "[{$value['domainRank']['Or']}, null, null, null, null, null, null, null, null, null, {$value['domainRank']['Ot']}, '{$parsed["host"]}', createCustomHTMLContent('{$parsed["host"]}', '{$Or}', '{$Ot}'),],";
                                        break;
                                }
                            ?>
                        <?php endforeach ?>
                    ]);



                    var options = {
                        legend: 'none',
                        series: {
                            <?php
                                $minQt = $getSEMRushDomainRank['Ot'];
                                $maxQt = $getSEMRushDomainRank['Ot'];

                            ?>
                            <?php foreach ($allstat as $key=>$value): ?>
                                <?php $minQt = min($minQt, $value['domainRank']['Ot']); ?>
                                <?php $maxQt = max($maxQt, $value['domainRank']['Ot']); ?>
                            <?php endforeach ?>
                            <?php $rangeQt = $maxQt - $minQt; ?>
                            <?php $Qt = $getSEMRushDomainRank['Ot']; ?>
                            <?php $sizeQt = ($Qt - $minQt) * 30 / $rangeQt + 10; ?>
                            0: { pointShape: 'circle', pointSize: <?php echo $sizeQt; ?>, lineWidth: 0 },
                            <?php $i = 1; ?>
                            <?php foreach ($allstat as $key=>$value): ?>
                                <?php $Qt = $value['domainRank']['Ot']; ?>
                                <?php $sizeQt = ($Qt - $minQt) * 30 / $rangeQt + 10; ?>
                                <?php echo $i++; ?>: { pointShape: 'circle', pointSize: <?php echo $sizeQt; ?>, lineWidth: 0 },
                            <?php endforeach ?>
                        },
                        tooltip: { isHtml: true },
                        hAxis: { minValue: 0, title: 'Paid Keywords', titleTextStyle: { italic: false } },
                        vAxis: { minValue: 0, title: 'Paid Search Traffic', titleTextStyle: { italic: false } },
                        annotations: { highContrast: true },
                        //backgroundColor: { fill:'transparent' }
                    };

                    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
                    chart.draw(chart_data, options);
                }
                function createCustomHTMLContent(url, keywords, traffic) {
                    return '<div style="padding:5px 5px 5px 5px;">'+
                        '<b>'+url+'</b><br />Keywords:&nbsp;'+keywords+'<br />Traffic:&nbsp;'+traffic+
                        '</div>';
                }
                google.setOnLoadCallback(drawChart)
            </script>
            <div id="chart_div" style="width: 100%; margin-bottom: 10px;"></div>
        </div>
    <?php endif ?>

<?php include ('panels.php'); ?>

    <div class="row">
        <div class="panel" id="overall-perf">
          <div class="panel-heading overal-performance-head">
            <span class="fa fa-list-alt panel-iceo-awesome pull-left"></span>
            <span class="visible-phone pull-left">Overall</span>
            <span class="hidden-phone pull-left">Overall Performance Summary</span>
            <b class="donaimname"><?php echo $url ?></b>
          </div>
          <div class="panel-body overal-performance-body">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <div class="radial-progress overal-radial">
                        <input class="knob-main" data-fgColor="#0073cc" data-thickness=".1" data-width="130" data-height="130" readonly value="<?php echo $totalScore ?>">
                        <script>
                            $(function($) {
                                $(".knob-main").knob({
                                  'draw' : function () { 
                                    $(this.i).val('<?php echo getLetterScore($totalScore) ?>')
                                  }
                                });
                                $(".knob-main").css('font-family-size','25px').css('color','#666666').css('font-family','Segoe UI').css('font-weight','100').css('display','inline-block');
                            });
                        </script>
                        <script>
                            $(function($) {
                                $(".knob").knob();
                                $(".knob").css('font-family-size','25px').css('color','#666666').css('font-family','Segoe UI').css('font-weight','100').css('display','inline-block');
                            });
                        </script>
                    </div>
                    
                </div>
                
                
                <div class="col-md-3 col-sm-3 col-md-offset-0 hidden-phone progress-bars-op">
                    <div class="progress-bars">
                    <span class="progress-label-left">SEO:</span>
                    <span class="progress-label-right3"><?php echo getLetterScore($SEOScore) ?><!--<span style="font-size: 12px;">%</span>--></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-3" role="progressbar" style="width: <?php echo $SEOScore ?>%;">
                            <span class="sr-only"><?php echo $SEOScore ?>% Complete</span>
                        </div>
                    </div>
                    </div>
                    
                    <div class="progress-bars">
                    <span class="progress-label-left">Search Engines:</span>
                    <span class="progress-label-right2"><?php echo getLetterScore($searchEngineScore) ?><!--<span style="font-size: 12px;">%</span>--></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-2" role="progressbar" style="width: <?php echo $searchEngineScore ?>%;">
                            <span class="sr-only"><?php echo $searchEngineScore ?>% Complete</span>
                        </div>
                    </div>
                    </div>
                    
                    <div class="progress-bars">
                    <span class="progress-label-left">Social Media:</span>
                    <span class="progress-label-right4"><?php echo getLetterScore($socialScore) ?><!--<span style="font-size: 12px;">%</span>--></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-4" role="progressbar" style="width: <?php echo $socialScore ?>%;">
                            <span class="sr-only"><?php echo $socialScore ?>% Complete</span>
                        </div>
                    </div>
                    </div>

                    <div class="progress-bars">
                    <span class="progress-label-left">Code:</span>
                    <span class="progress-label-right1"><?php echo getLetterScore($codeScore) ?><!--<span style="font-size: 12px;">%</span>--></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-1" role="progressbar" style="width: <?php echo $codeScore ?>%;">
                            <span class="sr-only"><?php echo $codeScore ?>% Complete</span>
                        </div>
                    </div>
                    </div>
                    
                </div>
                
                <div class="col-xs-4 col-xs-offset-1 visible-phone pull-right progress-bars-op pb-relative" style="width:200px;">
                    <div class="progress-bars">
                    <span class="progress-label-left"style="font-size: 18px;">SEO:</span>
                    <span class="progress-label-right3" style="padding-left: 51%;"><?php echo getLetterScore($SEOScore) ?><!--<span style="font-size: 12px;">%</span>--></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-3" role="progressbar" style="width: <?php echo $SEOScore ?>%;">
                            <span class="sr-only"><?php echo $SEOScore ?>% Complete</span>
                        </div>
                    </div>
                    </div>
                    
                    <div class="progress-bars">
                    <span class="progress-label-left"style="font-size: 18px;">Search Engines:</span>
                    <span class="progress-label-right2" style="padding-left: 0%;"><?php echo getLetterScore($searchEngineScore) ?><!--<span style="font-size: 12px;">%</span>--></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-2" role="progressbar" style="width: <?php echo $searchEngineScore ?>%;">
                            <span class="sr-only"><?php echo $searchEngineScore ?>% Complete</span>
                        </div>
                    </div>
                    </div>
                    
                    <div class="progress-bars">
                    <span class="progress-label-left"style="font-size: 18px;">Social Media:</span>
                    <span class="progress-label-right4" style="padding-left: 10%;"><?php echo getLetterScore($socialScore) ?><!--<span style="font-size: 12px;">%</span>--></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-4" role="progressbar" style="width: <?php echo $socialScore ?>%;">
                            <span class="sr-only"><?php echo $socialScore ?>% Complete</span>
                        </div>
                    </div>
                    </div>

                    <div class="progress-bars">
                    <span class="progress-label-left"style="font-size: 18px;">Code:</span>
                    <span class="progress-label-right1" style="padding-left: 45%;"><?php echo getLetterScore($codeScore) ?><!--<span style="font-size: 12px;">%</span>--></span>
                    <div class="progress bar-progress">
                        <div class="progress-bar bar-1" role="progressbar" style="width: <?php echo $codeScore ?>%;">
                            <span class="sr-only"><?php echo $codeScore ?>% Complete</span>
                        </div>
                    </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-3 col-xs-0 col-md-offset-0 col-sm-offset-1 display-image main-preview hidden-phone">
                    <img class="apple-display" width="191px" src="<?php echo $img ?>" alt="preview">
                </div>
            </div>
          </div>
        </div>
    </div>
