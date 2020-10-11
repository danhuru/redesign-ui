@extends('layouts.app') @section('content')
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h5>My Organization</h5>
          <!-- /.card-tools -->
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>

  <section class="content">

    <div class="col-sm-12">

      @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
      @endif
    </div>

    <div class="card">
      <div class="card-header">
        <a href="{{ route('teams.create')}}" class="btn btn-success btn-add-new">
          <i class="fas fa-plus-circle"></i>
        </a>
        <!-- <a class="btn btn-danger" id="bulk_delete_btn"><i class="far fa-trash-alt"></i></a> -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row">
            <div class="col-sm-12 col-md-6"></div>
            <div class="col-sm-12 col-md-6"></div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                <thead>
                  <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Id</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Name</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Parent">Description</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Parent">Type</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Parent">Members</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Parent">Parent Team</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($teams as $team)
                  <tr role="row" class="odd">
                    <td tabindex="0" class="sorting_1">{{$team->id}}</td>
                    <td tabindex="0" class="sorting_1">{{$team->name}}</td>
                    <td>{{$team->description}}</td>
                    <td>{{$team->type}}</td>
                    <td>{{$team->users}}</td>
                    <td>{{$team->parent_team}}</td>
                    <td> <a href="{{ route('teams.edit',$team->id)}}" class="btn btn-primary float-left"><i class="far fa-edit"></i></a>

                      <form action="{{ route('teams.destroy', $team->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger float-right" type="submit"><i class="far fa-trash-alt"></i></button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- <div class="row">
            <div class="col-sm-12 col-md-5">
              <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
            </div>
            <div class="col-sm-12 col-md-7">
              <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                <ul class="pagination">
                  <li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                  <li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                  <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                  <li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                </ul>
              </div>er
            </div>
          </div> -->
        </div>
      </div>
      <!-- /.card-body -->
    </div>

    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title"><i class="voyager-trash"></i> Are you sure you want to delete this role?</h4>
          </div>
          <div class="modal-footer">
            <form action="#" id="delete_form" method="POST">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="ZX1mced8crmYvWl8fzifDEwOqzpmllO1j9F86TLa">
              <input type="submit" class="btn btn-danger pull-right delete-confirm" value="Yes, Delete it!">
            </form>
            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
</div>

</section>
</div>

@stop