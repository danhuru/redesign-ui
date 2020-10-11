@extends('layouts.app') @section('content')
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h5>Account preferences</h5>
          <!-- /.card-tools -->
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>

  <section class="content">

    <!-- Default box -->
    <div class="card card-solid">

      <?php if ($integrations->contains('vendor', 'Zoom')) :  ?>
        <div class="card-body">
          <div class="form-check">
            <form>
              @csrf
              <input id="joinZoomAdhoc" class="form-check-input" type="checkbox" <?php if ($preferences->firstWhere('property', 'joinZoomAdhoc')->flag == 1) :
                                                                                    echo "checked";
                                                                                  else : echo "unchecked";
                                                                                  endif; ?> onchange=toggle(this)>
              <label class="form-check-label">Assistant joins Zoom adhoc meetings</label>
            </form>

          </div>
        </div>
      <?php endif; ?>

    </div>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->

</section>
</div>

</section>
</div>
<script type="text/javascript">
  function toggle(item) {
    //    console.log($('meta[name="csrf-token"]').attr('content'))
    request = {
      property: $(item).prop("id"),
      checked: $(item).prop("checked")
    }
    // console.log(request)

    $.post("/preference", {
      data: request
    }, function(data) {
      console.log(data);
      toastr.success('Preference updated');
    }).fail(function() {
      toastr.error('There was an error updating the preference');
    });

  }
</script>
@stop