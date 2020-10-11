@extends('layouts.app') @section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">
					<span class="project_progress">
						<h5>Your profile is <?php echo $integrationStatus; ?>% Complete

							@if (Auth::user()->getLocalUser()->subscribed('prod_HfFBFTTwPrLbCb'))

							(Meetgeek Pro)

							@elseif (Auth::user()->getLocalUser()->onGenericTrial())

							(Free trial)

							@endif

						</h5>

						<?php if ($integrationStatus == 100) : ?>
							<div class="progress progress">
								<div class="progress-bar bg-green" role="progressbar" aria-volumenow="20" aria-volumemin="0" aria-volumemax="100" style="width: 100%"></div>
							</div>
						<?php else : ?>
							<div class="progress progress">
								<div class="progress-bar bg-orange" role="progressbar" aria-volumenow="20" aria-volumemin="0" aria-volumemax="100" style="width: <?php echo $integrationStatus; ?>%"></div>
							</div>
						<?php endif; ?>

					</span>
					<!-- /.card-tools -->
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<!-- card-header -->
				<div class="card-header">
					<h3 class="card-title">Step 1 - Create your account</h3>
					&nbsp; <span style="font-size: 1em; color: green;"> <i class="fas fa-check-circle"></i>

					</span>

					@if (Auth::user()->getLocalUser()->subscribed('prod_HfFBFTTwPrLbCb'))

					(Meetgeek Pro)

					@elseif (Auth::user()->getLocalUser()->onGenericTrial())

					(Free trial expires on {{ Auth::user()->getLocalUser()->trial_ends_at }})

					@endif

					<div class="card-tools"></div>
				</div>
			</div>
			<div class="card">
				<!-- card-header -->
				<div class="card-header">
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fas fa-minus"></i>
						</button>
					</div>
					<h3 class="card-title">Step 2 - Connect your conference call
						software</h3>
					<?php if ($integrations->contains('type', 'Conference')) :  ?>
						&nbsp; <span style="font-size: 1em; color: green;"> <i class="fas fa-check-circle"></i>

						<?php endif ?>



				</div>
				<!-- /.card-header -->

				<!-- card-body -->
				<div class="card-body">

					<h5>Option 1 - Zoom Integration </h5>
					<h6>Connect your Zoom account with Meetgeek so that it automatically joins your Zoom meetings. You will be able to
						automate your meeting minutes, produce real-time meeting transcripts and much
						more.</h6>

					<div class="col-md-3 col-sm-6 col-12">
						<div class="info-box">
							<span class="info-box-icon"><img src="dist/img/zoom.png" width="48px"></img></span>
							<div class="info-box-content">
								<h6>Zoom</h6>
								<?php if ($integrations->contains('vendor', 'Zoom')) :  ?>
									<span class="info-box-number" style="color: green">Connected</span>
								<?php else : ?>
                                    <a target="_blank" href="https://zoom.us/oauth/authorize?response_type=code&client_id={{ $zoomClientId }}&redirect_uri={{ $zoomRedirectUri }}">
                                        <button type="submit" class="btn btn-primary">Connect</button>
                                    </a>
									<!-- <a href="https://zoom.us/oauth/authorize?response_type=code&client_id=BRFzSl1IQcGBoYKy_kwRw&redirect_uri=https://d70adc75e84e.ngrok.io/redirect" target="_blank" rel="noopener noreferrer"><img src="https://marketplacecontent.zoom.us/zoom_marketplace/img/add_to_zoom.png" height="32" alt="Add to ZOOM" /></a> -->
								<?php endif; ?>
							</div>
						</div>
					</div>

					<!-- <h5>Option 2 (Coming Soon) - Dial In </h5>
					<h6>Invite Meetgeek to join by phone in any meeting software. Just add bot@meetgeek.ai to the meeting invitation and Meetgeek will automatically dialin the call. -->
					<!-- card-body -->
				</div>
			</div>
			<div class="card">
				<!-- card-header -->
				<div class="card-header">
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fas fa-minus"></i>
						</button>
					</div>
					<h3 class="card-title">Step 3 - Connect your calendar</h3>
					<?php if ($integrations->contains('type', 'Calendar')) :  ?>
						&nbsp; <span style="font-size: 1em; color: green;"> <i class="fas fa-check-circle"></i>
						<?php endif ?>

				</div>
				<!-- /.card-header -->
				<!-- card-body -->
				<div class="card-body">

					<h6>Connect your calendar in order to allow Meetgeek to join more of your
						calls and get personalized insights about your time
						spent in meetings.</h6>

					<div class="row" style="padding: 20px 20px 0 20px">
						<div class="col-md-3 col-sm-6 col-12">
							<div class="info-box">
								<span class="info-box-icon"><img src="dist/img/google_calendar.png" width="48px"></img></span>
								<div class="info-box-content">
									<h6>Google Calendar</h6>
									<?php if ($integrations->contains('vendor', 'Google')) :  ?>
										<span class="info-box-number" style="color: green">Connected</span>
									<?php else : ?>
										<button id="googleConnect" type="submit" class="btn btn-primary">Connect</button>
									<?php endif; ?>

								</div>
							</div>
						</div>


						<div class="col-md-3 col-sm-6 col-12">
							<div class="info-box">
								<span class="info-box-icon"><img src="dist/img/outlook_calendar.png" width="48px"></img></span>
								<div class="info-box-content">
									<h6>Outlook Calendar</h6>
									<?php if ($integrations->contains('vendor', 'Microsoft')) :  ?>
										<span class="info-box-number" style="color: green">Connected</span>
									<?php else : ?>
										<button id="outlookConnect" type="submit" class="btn btn-primary">Connect</button>
									<?php endif; ?>

								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="card">
				<!-- card-header -->
				<div class="card-header">
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fas fa-minus"></i>
						</button>
					</div>
					<h3 class="card-title">Step 4 (Coming Soon) - Connect your output tools</h3>
					<?php if ($integrations->contains('type', 'Google')) :  ?>
						&nbsp; <span style="font-size: 1em; color: green;"> <i class="fas fa-check-circle"></i>
						<?php endif ?>

				</div>
				<!-- /.card-header -->
				<!-- card-body -->
				<div class="card-body">

					<h6>Connect your task management or collaboration software (such as
						Jira or Slack) in order to distribute your meeting minutes through
						multiple channels, enable automated workflows and ensure follow-ups are performed.</h6>

					<!-- <div class="col-md-3 col-sm-6 col-12">
						<div class="info-box">
							<span class="info-box-icon"><img
								src="dist/img/jira.png"></img></span>
							<div class="info-box-content">
								<h5>Jira Atlassian</h5>
									<?php if ($integrations->contains('vendor', 'Jira')) :  ?>
									<span class="info-box-number" style="color: green">Connected</span>
									<?php else : ?>
										<button type="submit" class="btn btn-primary" disabled>Connect</button>
									<?php endif; ?>

							</div>
						</div>
					</div> -->
				</div>
			</div>
			<!-- card-body -->
		</div>

	</section>
	<!-- /.content -->
</div>
<script src="https://cdn.auth0.com/js/auth0/9.11/auth0.min.js"></script>
<script src="js/integrations.js"></script>
@stop
