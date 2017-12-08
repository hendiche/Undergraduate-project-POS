@extends('admin.base.app')
@section('page_header','Sliders')
@section('create-button')
    <a href="{{ route('slider.create') }}" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline waves-effect waves-light">Add Slider</a>
@endsection
@section('breadcrumblv2')
  <li class="active">Sliders</li>
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
            url:  '{{ route('slider.list') }}',
            data: function(data) {
                data._token = '{{ csrf_token() }}'
            },
            type: 'POST',
        },
        columns: [
            { data: 'cover' , name: 'cover'},
            { data: 'action', name: 'action', orderable: false, searchable: false },

        ],
      })
    });
  </script>
@endpush