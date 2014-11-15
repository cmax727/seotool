<?php if ($_SESSION['type'] == 'private'): ?>
	<div class="sidebar" data-spy="affix" data-offset-top="395">
<?php else: ?>
	<div class="sidebar" data-spy="affix" data-offset-top="220">
<?php endif; ?>

<div class="accordion-group">
	<div class="panel-heading sidebar-head websitereview"><a data-scroll href="#overall-perf">
		<span class="fa fa-list-alt pull-left"></span>
		<div class="headingtext">WEBSITE REVIEW</div></a>
	</div>
</div>

<?php if(count($allstat) > 0): ?>
    <div class="accordion-group">
        <div class="panel-heading sidebar-head websitereview"><a data-scroll href="#competitors-panel">
            <span class="fa fa-star star-sidebar pull-left"></span>
            <div class="headingtext">COMPETITORS</div></a>
        </div>
    </div>
<?php endif; ?>

<div class="accordion-group">
	<div class="panel-heading sidebar-head seo-review"><a class="accordion-toggle" data-scroll data-parent="#accordion" href="#seo-panel">
	<span class="glyphicon glyphicon-chevron-right pull-right"></span>
		<div class="headingtext">ORGANIC SEO</div></a>
	</div>
</div>

<div class="accordion-group">
	<div class="panel-heading sidebar-head se-review"><a class="accordion-toggle" data-scroll data-parent="#accordion" href="#searchengines-panel">
	<span class="glyphicon glyphicon-chevron-right pull-right"></span>
		<div class="headingtext">SEARCH ENGINES</div></a>
	</div>
</div>

<div class="accordion-group">
	<div class="panel-heading sidebar-head sm-review"><a class="accordion-toggle" data-scroll data-parent="#accordion" href="#social-panel">
	<span class="glyphicon glyphicon-chevron-right pull-right"></span>
		<div class="headingtext">SOCIAL MEDIA</div></a>
	</div>
</div>

<div class="accordion-group">
	<div class="panel-heading sidebar-head codereview"><a class="accordion-toggle" data-scroll data-parent="#accordion" href="#code-panel">
	<span class="glyphicon glyphicon-chevron-right pull-right"></span>
	<div class="headingtext">CODE</div></a>
	</div>
</div>

<div class="accordion-group">
	<div class="panel-heading sidebar-head websitereview optimizesite">
		<a data-scroll href="#">
		<span class="fa fa-star star-sidebar pull-left"></span>
		<div class="headingtext">OPTIMIZE THIS SITE!</div></a>
	</div>
</div>

<div class="accordion-group">
	<div class="panel-heading sidebar-head websitereview optimizesite">
		<a data-scroll href="#" onclick="ajax_clean();return false;">
		<span class="fa fa-star star-sidebar pull-left"></span>
		<div class="headingtext">CLEAN RESULTS</div></a>
	</div>
</div>

<div class="accordion-group">
	<div class="panel-heading sidebar-head websitereview optimizesite">
		<a data-scroll href="../../Services/NATIVERANK/getPdf.php">
		<span class="fa fa-star star-sidebar pull-left"></span>
		<div class="headingtext">GET PDF</div></a>
	</div>
</div>

</div>

<script>
    function ajax_clean() {
    	url = $('#domainInput').val();
        $.ajax({
            type: "POST",
            url: "/Services/NATIVERANK/service.php",
            data: "url="+url+"&service=clean",
            success: function(msg){
                location.reload();
            }
        });
    }
</script>
