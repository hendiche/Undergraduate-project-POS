@extends('admin.base.layout')
@section('title')
Foods
@endsection
@section('add_button')
    <a href="{{ route('food.create') }}" class="btn btn-round btn-info">Add Food</a>
@endsection
@section('top_title')
Food Table
@endsection
@section('content')
<table id="type-table" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Cover</th>
      <th>Name</th>
      <th>Price</th>
      <th>Category</th>
      <th>Status</th>
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
            url:  '{{ route('food.list') }}',
            data: function(data) {
                data._token = '{{ csrf_token() }}'
            },
            type: 'POST',
        },
        columns: [
            { data: 'cover' , name: 'cover'},
            { data: 'name' , name: 'name'},
            { data: 'price' , name: 'price'},
            { data: 'category_id' , name: 'category_id'},
            { data: 'status' , name: 'status'},
            { data: 'action', name: 'action', orderable: false, searchable: false },

        ],
      })
    });
  </script>
@endpush