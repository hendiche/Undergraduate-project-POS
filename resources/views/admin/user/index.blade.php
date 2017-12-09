@extends('admin.base.layout')
@section('title')
Users
@endsection
@section('add_button')
    <a href="{{ route('user.create') }}" class="btn btn-round btn-info">Add User</a>
@endsection
@section('top_title')
User Table
@endsection
@section('content')
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