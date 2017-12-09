@extends('admin.base.layout')
@section('page_header','Users')
@section('create-button')
    <a href="{{ route('user.create') }}" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline waves-effect waves-light">Add User</a>
@endsection
@section('breadcrumblv2')
  <li class="active">Users</li>
@endsection
@section('content')

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Users Table</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="type-table" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
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
            url:  '{{ route('user.list') }}',
            data: function(data) {
                data._token = '{{ csrf_token() }}'
            },
            type: 'POST',
        },
        columns: [
            { data: 'name' , name: 'name'},
            { data: 'email' , name: 'email'},
            { data: 'phone' , name: 'phone'},
            { data: 'address' , name: 'address'},
            { data: 'action', name: 'action', orderable: false, searchable: false },

        ],
      })
    });
  </script>
@endpush