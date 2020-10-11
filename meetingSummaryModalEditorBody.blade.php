<div class="card-body" style="padding: 0.3rem">

	<a href='{{URL::signedRoute("publicSummary", ["meetingId" => Session::get("meetingId")])}}'>View MoM details in browser </a>

	<h6>Meeting Minutes - {{$meeting['_source']['subject']}}</h6>
	<strong>Location:</strong> {{ucfirst($meeting['_source']['source'])}} <br>
	<strong>Date:</strong> {{date("d-m-o H:i e", strtotime($meeting['_source']['start_time']))}} <br>

	<strong>Atendees:</strong>
	{{ implode(',',$participantsActual) }}
	<br>

	@if (array_key_exists('agenda', $meeting['_source']))
	<strong>Agenda:</strong> <br>
	{{ $meeting['_source']['agenda'] }} <br>
	@endif

	<br>

	<!-- Notes Actions -->

	<span class="badge badge-danger" style="font-size: 100%">
		Actions Items
	</span>
	<ul id="notesActionsPersisted" class="todo-list ui-sortable" data-widget="todo-list">

		<?php foreach ($transcript['hits']['hits'] as $key => $data) : ?>

			<?php if (
				array_key_exists('prediction_type', $data['_source']) &&
				$data['_source']['prediction_type'] == 'Action' &&
				$data['_source']['prediction_score'] > env("HIGHLIGHTS_THRESHOLD")
			) : ?>

				<li recordId="{{$data['_source']['id']}}" recordType="Action">
					<span>
						<i class="fas fa-location-arrow"></i>
						{{$data['_source']['transcript']}}
						<a href="javascript:void(0)" id="{{$data['_source']['id']}}" class="ajax-tippy">(Context)</a>
					</span>
					<!-- <div class="tools"><i class="fas fa-trash"></i></div> -->
				</li>

			<?php elseif (
				array_key_exists('type', $data['_source']) &&
				$data['_source']['type'] == 'command' &&
				$data['_source']['intent_display_name'] == 'Action'
			) : ?>

				<li recordId="{{$data['_source']['id']}}" recordType="Action">
					<span>
						<i class="fas fa-location-arrow"></i>
						{{$data['_source']['transcript']}}
						<a href="javascript:void(0)" id="{{$data['_source']['id']}}" class="ajax-tippy">(Context)</a>
					</span>
					<!-- <div class="tools"><i class="fas fa-trash"></i></div> -->
				</li>

			<?php endif; ?>
		<?php endforeach; ?>

	</ul>

	<ul id="notesActions" class="todo-list ui-sortable" data-widget="todo-list"></ul>
</div>
<!-- /Notes Actions -->

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

		@endif @endforeach </ul>
	<ul id="notesFacts" class="todo-list ui-sortable" data-widget="todo-list">
	</ul>
</div>
<!-- /Fact -->

<!-- Notes Concerns -->
<div class="card-body" style="padding: 0.3rem">
	<span class="badge badge-warning" style="font-size: 100%">
		Concerns
	</span>

	<ul id="notesConcernsPersisted" class="todo-list ui-sortable" data-widget="todo-list">

		<?php foreach ($transcript['hits']['hits'] as $key => $data) : ?>
			<?php if (
				array_key_exists('prediction_type', $data['_source']) &&
				$data['_source']['prediction_type'] == 'Concern' &&
				$data['_source']['prediction_score'] > env("HIGHLIGHTS_THRESHOLD")
			) : ?>

				<li recordId="{{$data['_source']['id']}}" recordType="Concern">
					<span>
						<i class="fas fa-exclamation-circle"></i>
						{{$data['_source']['transcript']}}
						<a href="javascript:void(0)" id="{{$data['_source']['id']}}" class="ajax-tippy">(Context)</a>
					</span>
					<!-- <div class="tools"><i class="fas fa-trash"></i></div> -->
				</li>

			<?php endif; ?>
		<?php endforeach; ?>

	</ul>



	<ul id="notesConcerns" class="todo-list ui-sortable" data-widget="todo-list"></ul>
</div>
<!-- Notes /Concerns -->

</div>

<script type="text/javascript">
	tippy('.ajax-tippy', {
		allowHTML: true,
		interactive: true,
		theme: 'light',
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

			$.get('/transcript/{{ Session::get("meetingId")}}/context/' + instance.reference.id, {
				filter: filter
			}, function(data) {

				if (data === " ") data = 'No results found'
				// console.log(data)
				instance._src = data;
				instance.setContent(data);
				// $('#meetingContent').html(data);
				// $('#loadingBarForMeetings').hide();
				instance._isFetching = false;
			});

			// fetch('/transcript/{{ Session::get("meetingId")}}/context/' + instance.reference.id)
			// 	.then((response) => response.html())
			// 	.then((html) => {
			// 		instance._src = html;
			// 		// const template = document.getElementById('contextTemplate');
			// 		console.log(html)
			// 		// console.log(response.html)
			// 		instance.setContent("bau");
			// 	})
			// 	.catch((error) => {
			// 		instance._error = error;
			// 		instance.setContent(`Request failed. ${error}`);
			// 	})
			// 	.finally(() => {
			// 		instance._isFetching = false;
			// 	});
		},
		onHidden(instance) {
			instance.setContent('Loading...');
			// Unset these properties so new network requests can be initiated
			instance._src = null;
			instance._error = null;
		},
	});
</script>