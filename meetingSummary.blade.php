<div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
	<div class="card">
		<div class="card-header">
			<!-- <input type="text" id="email" hidden></input> <input type="text" id="subject" hidden></input> Share to: &nbsp; <span style="font-size: 1em; color: blue;"> <i class="far fa-envelope blue" onclick=mail() style="cursor: pointer"></i> &nbsp; -->

			Share by &nbsp;
			<button id="momEditor" type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default" title="Email">
				<i class="far fa-envelope blue"></i>
			</button>
			<!-- </span> <i class="fab fa-jira"></i> &nbsp; <i class="fab fa-slack"></i> &nbsp; <i class="fab fa-trello"></i> -->
			<!-- &nbsp; <i class="fab fa-microsoft"></i> -->
			<!-- /.card-tools -->

		</div>
	</div>

	@include('meetingSummaryModalEditor')

	<div id="atendees" class="card-body" style="padding: 0.3rem">
		<span class="badge badge-info" style="font-size: 100%">
			Atendees </span> <br>

		{{ implode(',',$participantsActual) }}
	</div>
	<div>

		<!-- Actions -->
		<div class="card-body" style="padding: 0.3rem">
			<span class="badge badge-danger" style="font-size: 100%">Actions</span>
			<ul id="notesActionsPersisted" class="todo-list ui-sortable" data-widget="todo-list">

				@foreach ($transcript['hits']['hits'] as $key => $data)

				@if (
				array_key_exists('prediction_type', $data['_source']) &&
				$data['_source']['prediction_type'] == 'Action' &&
				$data['_source']['prediction_score'] > env("HIGHLIGHTS_THRESHOLD_ACTION")
				)

				<li recordId="{{$data['_source']['id']}}" class="ownerComplete" recordType="Action">
					<span>
						<i class="fas fa-location-arrow"></i>
						{{$data['_source']['transcript']}}
						<a href="javascript:void(0)" id="{{$data['_source']['id']}}" class="ajax-tippy">(Context)</a>
					</span>
					<!-- <div class="tools"><i class="fas fa-trash"></i></div> -->
				</li>

				@elseif (
				array_key_exists('type', $data['_source']) &&
				$data['_source']['type'] == 'command' &&
				$data['_source']['intent_display_name'] == 'Action'
				)

				<li recordId="{{$data['_source']['id']}}" recordType="Action">
					<span>
						<i class="fas fa-location-arrow"></i>
						{{$data['_source']['transcript']}}
					</span>
					<!-- <div class="tools"><i class="fas fa-trash"></i></div> -->
				</li>

				@endif

				@endforeach

			</ul>

			<ul id="notesActions" class="todo-list ui-sortable" data-widget="todo-list"></ul>
		</div>
		<!-- /Actions -->

		<!-- Fact -->
		<div class="card-body" style="padding: 0.3rem">
			<span class="badge badge-primary" style="font-size: 100%">Facts</span>
			<ul id="notesActionsPersisted" class="todo-list ui-sortable" data-widget="todo-list">

				@foreach ($transcript['hits']['hits'] as $key => $data)

				@if (
				array_key_exists('prediction_type', $data['_source']) &&
				$data['_source']['prediction_type'] == 'Fact' &&
				$data['_source']['prediction_score'] > env("HIGHLIGHTS_THRESHOLD_FACT")
				)

				<li recordId="{{$data['_source']['id']}}" class="ownerComplete" recordType="Fact">
					<span>
						<i class="fas fa-location-arrow"></i>
						{{$data['_source']['transcript']}}
						<a href="javascript:void(0)" id="{{$data['_source']['id']}}" class="ajax-tippy">(Context)</a>
					</span>
					<!-- <div class="tools"><i class="fas fa-trash"></i></div> -->
				</li>

				@elseif ( array_key_exists('type', $data['_source']) && $data['_source']['type']=='command' && $data['_source']['intent_display_name']=='Fact' )

				<li recordId="{{$data['_source']['id']}}" recordType="Fact">
					<span>
						<i class="fas fa-location-arrow"></i>
						{{$data['_source']['transcript']}}
					</span>
					<!-- <div class="tools"><i class="fas fa-trash"></i></div> -->
				</li>

				<@endif @endforeach </ul> <ul id="notesFacts" class="todo-list ui-sortable" data-widget="todo-list">
			</ul>
		</div>
		<!-- /Fact -->

		<!-- Concerns -->
		<div class="card-body" style="padding: 0.3rem">
			<span class="badge badge-warning" style="font-size: 100%">Concerns </span>


			<ul id="notesConcernsPersisted" class="todo-list ui-sortable" data-widget="todo-list">

				@foreach ($transcript['hits']['hits'] as $key => $data)
				@if (
				array_key_exists('prediction_type', $data['_source']) &&
				$data['_source']['prediction_type'] == 'Concern' &&
				$data['_source']['prediction_score'] > env("HIGHLIGHTS_THRESHOLD_CONCERN")
				)

				<li recordId="{{$data['_source']['id']}}" recordType="Concern">
					<span>
						<i class="fas fa-exclamation-circle"></i>
						{{$data['_source']['transcript']}}
						<a href="javascript:void(0)" id="{{$data['_source']['id']}}" class="ajax-tippy">(Context)</a>
					</span>
					<!-- <div class="tools"><i class="fas fa-trash"></i></div> -->
				</li>

				@endif
				@endforeach

			</ul>

			<ul id="notesConcerns" class="todo-list ui-sortable" data-widget="todo-list"></ul>
		</div>
		<!-- /Concerns -->

	</div>
</div>

<script src="js/meeting_summary.js"></script>

<script type="text/javascript">
	function sendMoM() {


		from = $('#fromInput').val();
		to = $('#toInput').val().split(";");
		subject = $('#subject').val();
		html_body = $('textarea').text();

		var request = JSON.stringify({
			"from": from,
			"to": to,
			"subject": subject,
			"body": html_body
		});

		message = "<html lang=\"en\" style=\"height: auto; overflow: hidden;\">";
		head = "   <head>\r\n      <!-- Change to public so that JS and CSS do not get broken by url parameters-->\r\n      <base href=\"\/public\">\r\n      <meta charset=\"utf-8\">\r\n      <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n\r\n      <!-- Theme style -->\r\n      <link rel=\"stylesheet\" href=\"https:\/\/app.meetgeek.ai\/dist\/css\/adminlte.min.css\">\r\n  \r\n   <\/head>"

		console.log(head)

		message = message.concat(head);
		message = message.concat('<body>')
		message = message.concat(html_body)
		message = message.concat('</body>')
		message = message.concat('</html>')

		console.log("Sending MoM:", JSON.stringify(message));

		$.post("/email", {
			data: request
		}, function(data) {
			console.log(data);
			toastr.success('MoM sent successfully');
		}).fail(function() {
			toastr.error('There was an error sending the MoM');
		});

	}
</script>
<script type="text/javascript">
	$('#momEditor').on('click', function(event) {

		$('#modal-editor').modal({
			show: false
		})

		meetingId = '{{ Session::get("meetingId")}}'

		$.get("/refreshMeetingSummaryModalEditorData", {
				meetingId: meetingId
			},

			function(data) {
				$('#emailBody').html(data)
				$('#modal-editor').modal('show');

			})

	})
</script>