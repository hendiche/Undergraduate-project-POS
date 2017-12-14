@extends('admin.base.layout')
@section('title')
Purchases
@endsection
@section('add_button')
    <a href="{{ route('purchase.export') }}" class="btn btn-round btn-info">Export Data</a>
@endsection
@section('top_title')
Purchase Table
@endsection
@section('content')
<table id="type-table" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Number</th>
      <th>Customer</th>
      <th>Note</th>
      <th>Total</th>
      <th>Date</th>
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
            url:  '{{ route('purchase.list') }}',
            data: function(data) {
                data._token = '{{ csrf_token() }}'
            },
            type: 'POST',
        },
        columns: [
            { data: 'number' , name: 'number'},
            { data: 'customer' , name: 'customer'},
            { data: 'note' , name: 'note'},
            { data: 'total' , name: 'total'},
            { data: 'created_at' , name: 'created_at'},
            { data: 'status' , name: 'status'},
            { data: 'action', name: 'action', orderable: false, searchable: false },

        ],
      })
    });
  </script>
@endpush