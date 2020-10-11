@extends('layouts.app') @section('content')
<div class="content-wrapper">

	<div class="content-header">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">
					<div>
						<h5 style="float:left">Sales Performance - Overview</h5>
					</div>
					<!-- /.card-tools -->

					<ul class="nav nav-pills" style="float: right">
						<!-- <li class="nav-item"><a id="myMeetings" class="nav-link active" href="#activity" data-toggle="tab">My Meetings</a></li>
					<li class="nav-item"><a id="allMeetings" class="nav-link" href="#timeline" data-toggle="tab">All Meetings</a></li> -->
						<!-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">+</a></li> -->

						<div class="fc-left">
							<h6 id="currentInterval" class="mt-2">Jul 26th-Aug 1st, 2020</h6>
						</div>
						<div class="fc-center">
							<div class="btn-group">
								<button id="goLeft" type="button" class="fc-prev-button btn btn-primary ml-2" aria-label="prev"><span class="fa fa-chevron-left"></span></button>
								<button id="goRight" type="button" class="fc-next-button btn btn-primary" aria-label="next"><span class="fa fa-chevron-right"></span></button>
							</div>
							<button id="today" type="button" class="fc-today-button btn btn-primary ml-1">today</button>
						</div>
						<div class="fc-right" style="float:right">
							<div class="btn-group">
								<button id="dayStep" type="button" class="fc-timeGridDay-button btn btn-primary ml-4">day</button>
								<button id="weekStep" type="button" class="fc-timeGridWeek-button btn btn-primary">week</button>
								<button id="monthStep" type="button" class="fc-dayGridMonth-button btn btn-primary">month</button>
							</div>
						</div>
					</ul>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>

	<section class="content">
		<div class="container-fluid">

			<div class="row" style="padding: 0px 20px 0 20px">
				<div class="col-md-3 col-sm-6 col-12">
					<div class="info-box">
						<div class="info-box-content" style="text-align: center;">
							<h1><b>457</b></h1>
							<h6>Hours in customer calls</h6>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 col-12">
					<div class="info-box">
						<div class="info-box-content" style="text-align: center; color: red;">
							<h1><b>53%</b></h1>
							<h6>Customer satisfaction score</h6>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 col-12">
					<div class="info-box">
						<div class="info-box-content" style="text-align: center; color: orange;">
							<h1><b>-3%</b></h1>
							<h6>Behind Competition</h6>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 col-12">
					<div class="info-box">
						<div class="info-box-content" style="text-align: center;">
							<h1><b>132</b></h1>
							<h6>Total Calls</h6>
						</div>
					</div>
				</div>

			</div>

			<div class="row" style="padding: 0px 20px 0 20px">

				<div class="col-md-6">
					<div class="card card-black">
						<div class="card-header">
							<h3 class="card-title">Winning talks</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div id="sentimentPerTopic" style="width: 100%; height: 400px; background-color: #FFFFFF;"></div>
						</div>

					</div>
				</div>

				<div class="col-md-6">
					<div class="card card-black">
						<div class="card-header">
							<h3 class="card-title">Top concerns raised by customers</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div id="topConcerns" style="width: 100%; height: 400px; background-color: #FFFFFF;"></div>
						</div>

					</div>
				</div>

			</div>

			<div class="row" style="padding: 0px 20px 0 20px">

				<div class="col-md-6">
					<div class="card card-black">
						<div class="card-header">
							<h3 class="card-title">Competitors mentioned</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div id="competitors" style="width: 100%; height: 400px; background-color: #FFFFFF;"></div>
						</div>

					</div>
				</div>

				<div class="col-md-6">
					<div class="card card-black">
						<div class="card-header">
							<h3 class="card-title">Customer Meeting Satisfaction Score</h3>
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

		</div>

</div>

</div>

</section>
</div>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/pie.js"></script>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/serial.js"></script>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/radar.js"></script>
<script src="js/sales_charts.js"></script>
@stop