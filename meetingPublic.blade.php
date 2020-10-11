<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<!-- /.content-header -->
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="card">
					@include('meetingHeaderPublic')
				</div>
				<!-- /.card -->
				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<section class="col-lg-7">
						<!-- start tabs -->
						<div class="card">

							<div class="card-body">
								@include('meetingSummaryPublic')
							</div>
							<!-- </div> -->
							<!-- /.card -->
						</div>
						<!-- /start tabs -->
					</section>
					<!-- /.Left col -->
					<!-- right col -->
					<!-- right col -->
				</div>
				<!-- /.row (main row) -->
			</div>
			<!-- /.container-fluid -->
		</section>

	</div>
</div>
<script src="js/stream.js"></script>
<script type="text/javascript">
	tippy('.ajax-tippy', {
		allowHTML: true,
		interactive: true,
		onCreate(instance) {
			// Setup our own custom state properties
			instance._isFetching = false;
			instance._src = null;
			instance._error = null;
			instance.setContent('Loading...');
		},
		onShow(instance) {
			if (instance._isFetching || instance._src || instance._error) {
				return;
			}

			instance._isFetching = true;

			$.get('/transcript/{{ Session::get("meetingId")}}/context/' + instance.reference.id, {}, function(data) {

				if (data === " ") data = 'No results found'
				instance._src = data;
				instance.setContent(data);
				// $('#meetingContent').html(data);
				// $('#loadingBarForMeetings').hide();
				instance._isFetching = false;
			});
		},
		onHidden(instance) {
			instance.setContent('Loading...');
			// Unset these properties so new network requests can be initiated
			instance._src = null;
			instance._error = null;
		},
	});
</script>