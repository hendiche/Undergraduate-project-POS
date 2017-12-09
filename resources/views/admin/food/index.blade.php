@extends('admin.base.app')
@section('page_header','Foods')
@section('create-button')
    <a href="{{ route('food.create') }}" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline waves-effect waves-light">Add Food</a>
@endsection
@section('breadcrumblv2')
  <li class="active">Categories</li>
@endsection
@section('content')

<div class="row">
  <div class="col-sm-12">
    <div class="white-box">
      <div class="table-responsive">
        <table id="type-table" class="table table-striped">
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