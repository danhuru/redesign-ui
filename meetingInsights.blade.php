<div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">

	<div class="row" style="padding: 0px 20px 0 20px">

		@if(auth()->user()->getLocalUser()->can('beta'))

		<div class="col-md-6" style="float: left;">

			<div class="card card-black">
				<div class="card-header">
					<h3 class="card-title">Meeting topics</h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
							<i class="fas fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="card-body">
					<div id="meetingsPerTopic" style="width: 100%; height: 400px; background-color: #FFFFFF;"></div>
				</div>

			</div>

		</div>

		@endif

		<div class="col-md-12" style="float: left;">

			<div class="card card-black">
				<div class="card-header">
					<h3 class="card-title">Meeting satisfaction score</h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
							<i class="fas fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="card-body">
					<div id="masterScore" style="width: 100%; height: 400px; background-color: #FFFFFF;"></div>
				</div>

			</div>
		</div>

	</div>

	<div class="row" style="padding: 0px 20px 0 20px">

		@if(auth()->user()->getLocalUser()->can('beta'))

		<div class="col-md-6" style="float: left;">
			<div class="card card-black">
				<div class="card-header">
					<h3 class="card-title">Top Word Mentions</h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
							<i class="fas fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="card-body">
					<div id="wordCloud" style="width: 100%; height: 400px; background-color: #FFFFFF;"></div>
				</div>

			</div>
		</div>

		@endif

	</div>

</div>

<script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/pie.js"></script>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/serial.js"></script>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/plugins/wordCloud.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<!-- amCharts javascript code -->
<script src="js/meeting_charts.js"></script>
<script>
	am4core.ready(function() {

		// Themes begin
		am4core.useTheme(am4themes_animated);
		// Themes end

		var chart = am4core.create("wordCloud", am4plugins_wordCloud.WordCloud);
		var series = chart.series.push(new am4plugins_wordCloud.WordCloudSeries());

		series.accuracy = 4;
		series.step = 15;
		series.rotationThreshold = 0.7;
		series.maxCount = 200;
		series.minWordLength = 2;
		series.labels.template.tooltipText = "{word}: {value}";
		series.fontFamily = "Courier New";
		series.maxFontSize = am4core.percent(30);

		$.get("/transcript/".concat(meetingId), {}, function(data) {

			fullText = "";
			sentences = data['hits']['hits'];
			sentences.forEach(sentence => {
				fullText = fullText.concat(sentence._source.transcript).concat(" ");

			});
			series.text = fullText;
		});


	}); // end am4core.ready()
</script>