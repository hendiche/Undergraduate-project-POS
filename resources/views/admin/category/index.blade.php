@extends('admin.base.layout')
@section('title')
Categories
@endsection
@section('add_button')
    <a href="{{ route('category.create') }}" class="btn btn-round btn-info">Add Category</a>
@endsection
@section('top_title')
Category Table
@endsection
@section('content')
<table id="type-table" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Name</th>
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