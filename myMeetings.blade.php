@extends('layouts.app') @section('content')
<div class="content-wrapper">
	<div class="content-header">


		<div class="card">
			<div class="card-header">

				<!-- <form class="navbar-form navbar-left" role="search" style="float:left; min-width:370px"> -->
				<div class="input-group input-group-sm" style="width:50%; float:left">
					<input id="searchBar" class="form-control " type="search" placeholder="Search meetings, notes, topics, transcripts" aria-label="Search">
					<!-- <div class="input-group-append">
							<button class="btn btn-navbar" type="submit">
								<i class="fas fa-search"></i>
							</button>
						</div> -->
				</div>
				<!-- </form> -->

				<ul class="nav nav-pills" style="float: right">
					<!-- <li class="nav-item"><a id="myMeetings" class="nav-link active" href="#activity" data-toggle="tab">My Meetings</a></li>
					<li class="nav-item"><a id="allMeetings" class="nav-link" href="#timeline" data-toggle="tab">All Meetings</a></li> -->
					<!-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">+</a></li> -->
					<div class="fc-left">
						<h6 id="currentInterval" class="mt-2"></h6>
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

			<!-- <ul class="nav nav-pills">

				<li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Advisors</a></li>
				<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Wix</a></li>
				<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Google Cloud</a></li>
				<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Machine Learning</a></li>
				<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">+</a></li>

			</ul> -->

		</div>

	</div>
	<!-- /.content-header -->
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid"></div>
		<section class="content">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Meetings</h3>
								<div class="card-tools">
									<!-- Collapse Button -->
									<div class="float-right">

										<!-- {{$offset}}-{{$offset+49}}/{{$total}} -->
										<div class="btn-group">
											<!-- <button type="button" id="showPrevious" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
											<button type="button" id="showNext" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button> -->
											<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
										</div>
										<!-- /.btn-group -->
									</div>
								</div>
							</div>
							<div class="card-body">
								<img id="loadingBarForMeetings" src="dist/img/loadingbars.gif" width="70px" style="margin-left: auto; margin-right: auto; display: block;"></img>

								<div id="meetingContent" class="timeline">
									@include('myMeetingsMeetingResults')
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div id="notesCard" class="card" style="display:none">
							<div class="card-header">
								<h3 class="card-title">Highlights</h3>
								<div class="card-tools">
									<!-- Collapse Button -->
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
								</div>
							</div>
							<div class="card-body">
								<img id="loadingBarForNotes" src="dist/img/loadingbars.gif" width="70px" style="margin-left: auto; margin-right: auto; display: block;"></img>
								<div id="notesContent" class="timeline">
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div id="transcriptsCard" class="card" style="display:none">
							<div class="card-header">
								<h3 class="card-title">Transcript</h3>
								<div class="card-tools">
									<!-- Collapse Button -->
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
								</div>
							</div>
							<div class="card-body">
								<img id="loadingBarForTranscripts" src="dist/img/loadingbars.gif" width="70px" style="margin-left: auto; margin-right: auto; display: block;"></img>
								<div id="transcriptContent" class="timeline">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
</div>

</section>

</div>
</section>
</div>
<script src="plugins/moment.js"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="js/search.js"></script>
<script type="text/javascript">
	function toggle(item, meetingId) {

		request = {
			meetingId: meetingId,
			joinToggle: $(item).prop("checked")
		}

		console.log(request)

		$.post("/meeting", {
			data: request
		}, function(data) {
			console.log(data);
			toastr.success('Meeting updated');
		}).fail(function() {
			toastr.error('There was an error updating the meeting');
		});
	}
</script>
@stop