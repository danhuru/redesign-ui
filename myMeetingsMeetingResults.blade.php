@foreach ($meetings as $meeting) <div>
	<i class="@if($meeting['_source']['start_time']> date('c') ) far fa-calendar bg-orange @else far fa-calendar bg-green @endif"></i>
	<div class="timeline-item">
		<span class="time"><i class="fas fa-clock"></i> {{date("d-m-o H:i e", strtotime($meeting['_source']['start_time']))}} </span>

		<h3 class="timeline-header">
			<a href="/meeting/{{$meeting['_source']['id']}}">

				@if (array_key_exists('highlight', $meeting) && array_key_exists('subject', $meeting['highlight']) )

				{!! $meeting['highlight']['subject'][0] !!}

				@else

				{{ $meeting['_source']['subject'] }}

				@endif

			</a>
		</h3>

		<div class="timeline-body">


			@if (array_key_exists('topics', $meeting['_source']))
			@foreach ($meeting['_source']['topics'] as $topic)

			<span class="badge badge-success"> {{ $topic['name'] }} </span>

			@endforeach
			<br>

			@endif

			{!!$meeting['_source']['agenda'] !!}
		</div>

		<div class="timeline-footer">
			<label class="switch">
				<input class="switch-input" type="checkbox" @if($meeting['_source']['automatic_join']==='true' ) checked @endif $@if($meeting['_source']['start_time']> date("c") ) enabled @else disabled @endif onchange=toggle(this,"{{$meeting['_source']['id']}}") />
				<span class="switch-label" @if($meeting['_source']['start_time'] < date('c') ) style="background: lightgrey" @endif data-on="On" data-off="Off">
				</span>
				<span class="switch-handle"></span>
			</label>
		</div>
	</div>
</div>

@endforeach