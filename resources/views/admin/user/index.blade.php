@extends('admin.base.app')
@section('page_header','Users')
@section('create-button')
    <a href="{{ route('user.create') }}" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline waves-effect waves-light">Add User</a>
@endsection
@section('breadcrumblv2')
  <li class="active">Users</li>
@endsection
@section('content')

<div class="row">
  <div class="col-sm-12">
    <div class="white-box">
      <div class="table-responsive">
        <table id="type-table" class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Action</th>
            </tr>
          </thead>
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