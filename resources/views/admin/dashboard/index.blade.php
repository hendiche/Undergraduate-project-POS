@extends('admin.base.layout')
@section('content')
@section('title')
Dashboard
@endsection
@section('add_button')
    <a href="{{ route('dashboard.create') }}" class="btn btn-round btn-info">Add Order</a>
@endsection
@section('top_title')
Order Table
@endsection
@section('content')
<table id="type-table" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>No.</th>
      <th>Status</th>
      <th>Order</th>
      <th>Note</th>
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
            url:  '{{ route('dashboard.list') }}',
            data: function(data) {
                data._token = '{{ csrf_token() }}'
            },
            type: 'POST',
        },
        columns: [
            { data: 'number' , name: 'number'},
            { data: 'status' , name: 'status'},
            { data: 'order' , name: 'order', orderable: false, searchable: false},
            { data: 'note' , name: 'note'},
            { data: 'total' , name: 'total'},
            { data: 'action', name: 'action', orderable: false, searchable: false },

        ],
      })
    });
  </script>
@endpush
@endsection