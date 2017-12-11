@extends('admin.base.layout')
@section('title')
Customs
@endsection
@section('add_button')
    <a href="{{ route('custom.create') }}" class="btn btn-round btn-info">Add Custom</a>
@endsection
@section('top_title')
Custom Table
@endsection
@section('content')
<table id="type-table" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Foods</th>
      <th>Total</th>
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
            url:  '{{ route('custom.list') }}',
            data: function(data) {
                data._token = '{{ csrf_token() }}'
            },
            type: 'POST',
        },
        columns: [
            { data: 'id' , name: 'id'},
            { data: 'foods' , name: 'foods', orderable: false, searchable: false },
            { data: 'total' , name: 'total'},
            { data: 'action', name: 'action', orderable: false, searchable: false },

        ],
      })
    });
  </script>
@endpush