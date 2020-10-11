@foreach ($highlights as $highlight)

<div>
	<i class="far fa-calendar bg-green"></i>
	<div class="timeline-item">
		<span class="time">
			<a href="/meeting/{{$highlight['_source']['meeting_id']}}">
				{{ $highlight['_source']['meeting_subject'] }}
			</a>
			@if (array_key_exists('prediction_type', $highlight['_source']))
			| {{ $highlight['_source']['prediction_type'] }} |

			@else Voice Command
			@endif

			<i class="fas fa-clock"></i>
			{{date("d-m-o H:i e", strtotime($highlight['_source']['timestamp']))}}
		</span>
		<h3 class="timeline-header">
			@if (array_key_exists('highlight', $highlight))
			{!! $highlight['highlight']['transcript'][0] !!}
			@endif
		</h3>
	</div>
</div>

@endforeach