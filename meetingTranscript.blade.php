<div class="tab-pane fade active show" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
	<!-- Live meeting transcript -->
	<div class="card">
		<!-- card-body -->
		<div id="translateStreamWindow" class="card-body" style="height: 60vh; overflow-y: scroll;">
			<!-- Conversations are loaded here -->

			<div id="persistedTranscript" class="timeline">

				<?php foreach ($transcript['hits']['hits'] as $key => $data) : ?>

					<div recordId="{{$data['_id']}}" recordType="transcript">
						<i class="fas fa-user fa-sm bg-green"></i>
						<div class="timeline-item">
							<span class="time"><i class="fas fa-clock"></i>{{date("H:i", strtotime($data['_source']['timestamp']))}}</span>
							<h3 class="timeline-header no-border">
								<!-- <a href="#">{{$data['_source']['speaker']}}</a> -->
								{{$data['_source']['transcript']}}
							</h3>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div id="translateStream" class="timeline">
				{{--
													<div class="time-label">
														--}} {{-- <span class="bg-red">10 Feb. 2014</span>--}}
				{{--
													</div>
													--}}
			</div>
			<!--/.Conversations are loaded here -->

		</div>
		<!-- /.card-body -->
		<!-- card-footer -->
		<div class="card-footer">
			<?php if (date("Y-m-d\TH:i:s") >= $meeting['_source']['start_time'] && (array_key_exists('end_time', $meeting['_source']) && date("Y-m-d\TH:i:s") < $meeting['_source']['end_time'])) : ?>
				<div>
					<img src="dist/img/sound.gif" width="35px" style="float: left; margin-right: 10px" alt="Listening">
				</div>
			<?php endif; ?>
			<div id="currentStream"></div>
		</div>
		<!-- /.card-footer-->
	</div>
	<!--/.Live meeting transcript-->
</div>