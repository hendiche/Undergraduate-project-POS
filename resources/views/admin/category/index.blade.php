@extends('admin.base.layout')
@section('page_header','Categories')
@section('create-button')
    <a href="{{ route('category.create') }}" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline waves-effect waves-light">Add Category</a>
@endsection
@section('breadcrumblv2')
  <li class="active">Categories</li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Default Example <small>Users</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <p class="text-muted font-13 m-b-30">
          DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
        </p>
        <table id="#type-table" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
           </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@include('shared.delete-modal')
@endsection

@push('pageRelatedJs')
  <script>
    $(document).ready(function () {

      var dataTable = $('#type-table').DataTable({
        dom: 'lfrtip',
        orderCellsTop: true,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            url:  '{{ route('category.list') }}',
            data: function(data) {
                data._token = '{{ csrf_token() }}'
            },
            type: 'POST',
        },
        columns: [
            { data: 'name' , name: 'name'},
            { data: 'action', name: 'action', orderable: false, searchable: false },

        ],
      })
    });
  </script>
@endpush