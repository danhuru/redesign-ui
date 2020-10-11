@foreach ($sentences as $sentence)

<div>
	<i class="far fa-calendar bg-green"></i>
	<div class="timeline-item">
		<span class="time">
			<a href="/meeting/{{$sentence['_source']['meeting_id']}}">
				{{ $sentence['_source']['meeting_subject'] }}
			</a>
			|
			<i class="fas fa-clock"></i>
			{{date("d-m-o H:i e", strtotime($sentence['_source']['timestamp']))}}
		</span>
		<h3 class="timeline-header">
			@if (array_key_exists('highlight', $sentence))
			{!! $sentence['highlight']['transcript'][0] !!}
			@endif
		</h3>
	</div>
</div>

@endforeach