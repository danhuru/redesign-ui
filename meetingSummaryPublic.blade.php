	<div class="card">
	</div>

	<!-- TODO get attendess from Zoom -->
	<div id="atendees" class="card-body" style="padding: 0.3rem">
		<span class="badge badge-info" style="font-size: 100%">
			Atendees </span>
		<!-- <div>Iulian, Raluca, Dan</div> -->
	</div>
	<div>
		<!-- Notes Decisions -->
		<div class="card-body" style="padding: 0.3rem">
			<span class="badge badge-success" style="font-size: 100%">Decisions</span>

			<ul id="notesDecisionsPersisted" class="todo-list ui-sortable" data-widget="todo-list">

				<?php foreach ($transcript['hits']['hits'] as $key => $data) : ?>
					<?php
					if (
						array_key_exists('prediction_type', $data['_source']) &&
						$data['_source']['prediction_type'] == 'Decision' &&
						$data['_source']['prediction_score'] > env("HIGHLIGHTS_THRESHOLD")
					) : ?>

						<li recordId="{{$data['_source']['id']}}" recordType="Decision">
							<span>
								<i class="far fa-flag"></i>
								{{$data['_source']['transcript']}}
							</span>
							<!-- <div class="tools"><i class="fas fa-trash"></i></div> -->
						</li>

					<?php endif; ?>
				<?php endforeach; ?>

			</ul>

			<ul id="notesDecisions" class="todo-list ui-sortable" data-widget="todo-list"></ul>
		</div>
		<!-- /Notes Decisions -->

		<!-- Notes Concerns -->
		<div class="card-body" style="padding: 0.3rem">
			<span class="badge badge-warning" style="font-size: 100%">Concerns </span>


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
							</span>
							<!-- <div class="tools"><i class="fas fa-trash"></i></div> -->
						</li>

					<?php endif; ?>
				<?php endforeach; ?>

			</ul>



			<ul id="notesConcerns" class="todo-list ui-sortable" data-widget="todo-list"></ul>
		</div>
		<!-- Notes /Concerns -->

		<!-- Notes Actions -->
		<div class="card-body" style="padding: 0.3rem">
			<span class="badge badge-danger" style="font-size: 100%">Actions</span>
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
							</span>
							<!-- <div class="tools"><i class="fas fa-trash"></i></div> -->
						</li>

					<?php endif; ?>

				<?php endforeach; ?>

			</ul>

			<ul id="notesActions" class="todo-list ui-sortable" data-widget="todo-list"></ul>
		</div>
		<!-- /Notes Actions -->

		<!-- Notes Notes -->
		<div class="card-body" style="padding: 0.3rem">
			<span class="badge badge-primary" style="font-size: 100%">Notes</span>
			<ul id="notesNotesPersisted" class="todo-list ui-sortable" data-widget="todo-list">

				<?php foreach ($transcript['hits']['hits'] as $key => $data) : ?>
					<?php if (
						array_key_exists('prediction_type', $data['_source']) &&
						$data['_source']['prediction_type'] == 'Note' &&
						$data['_source']['prediction_score'] > env("HIGHLIGHTS_THRESHOLD")
					) : ?>

						<li recordId="{{$data['_source']['id']}}" recordType="Notes">
							<span>
								<i class="fas fa-sticky-note"></i>
								{{$data['_source']['transcript']}}
							</span>
							<!-- <div class="tools"><i class="fas fa-trash"></i></div> -->
						</li>

					<?php elseif (
						array_key_exists('type', $data['_source']) &&
						$data['_source']['type'] == 'command' &&
						$data['_source']['intent_display_name'] == 'Note'
					) : ?>

						<li recordId="{{$data['_source']['id']}}" recordType="Action">
							<span>
								<i class="fas fa-location-arrow"></i>
								{{$data['_source']['transcript']}}
							</span>
							<!-- <div class="tools"><i class="fas fa-trash"></i></div> -->
						</li>

					<?php endif; ?>
				<?php endforeach; ?>

			</ul>

			<ul id="notesNotes" class="todo-list ui-sortable" data-widget="todo-list"></ul>
		</div>
		<!-- Notes Notes -->
	</div>