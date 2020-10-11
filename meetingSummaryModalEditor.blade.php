<div class="modal fade" id="modal-editor" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="card card-outline card-info">
				<div class="card-header">

					<div class="form-group row">
						<label for="from" class="col-sm-2 col-form-label">From</label>

						<div class="col-sm-10">
							<input type="email" class="form-control" id="fromInput" placeholder="from" value="{{Auth::user()->email}}">
						</div>
					</div>

					<div class="form-group row">
						<label for="to" class="col-sm-2 col-form-label">To</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="toInput" placeholder="to" value="{{implode(',',$participants)}}">
						</div>
					</div>

					<div class="form-group row">
						<label for="subject" class="col-sm-2 col-form-label">Subject</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="subject" placeholder="to" value="{{$meeting['_source']['subject']}}">
						</div>
					</div>

					<div class="form-group row">
						<label for="template" class="col-sm-2 col-form-label">MoM template</label>
						<div class="col-sm-10">
							<div class="form-group">
								<select class="form-control" disabled>
									<option selected>Standard MoM</option>
									<option disabled>Business Meeting Agenda</option>
									<option disabled>My Custom template</option>
								</select>
							</div>
						</div>
					</div>

				</div>

				<div id="contentArea" class="card-body pad">
					<textarea id="emailBody" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px;">
					@include('meetingSummaryModalEditorBody')
					</textarea>
				</div>

			</div>
			<!-- /.modal-dialog -->
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button onclick="sendMoM()" type="button" class="btn btn-primary">Send</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#emailBody').wysihtml5();
</script>