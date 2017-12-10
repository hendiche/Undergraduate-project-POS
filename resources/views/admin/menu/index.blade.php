@extends('admin.base.layout')
@section('title')
Menus
@endsection
@section('add_button')
    <a href="{{ route('menu.create') }}" class="btn btn-round btn-info">Add Menu</a>
@endsection
@section('top_title')
Menu Table
@endsection
@section('content')
<table id="type-table" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Name</th>
      <th>Price</th>
      <th>Status</th>
      <th>Cover</th>
      <th>Foods</th>
      <th>Description</th>
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
            url:  '{{ route('menu.list') }}',
            data: function(data) {
                data._token = '{{ csrf_token() }}'
            },
            type: 'POST',
        },
        columns: [
            { data: 'name' , name: 'name'},
            { data: 'price' , name: 'price'},
            { data: 'status' , name: 'status'},
            { data: 'cover' , name: 'cover'},
            { data: 'foods' , name: 'foods', orderable: false, searchable: false },
            { data: 'description' , name: 'description'},
            { data: 'action', name: 'action', orderable: false, searchable: false },

        ],
      })
    });
  </script>
@endpush