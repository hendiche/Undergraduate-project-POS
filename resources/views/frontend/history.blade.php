@extends('master.index')
@push('pageStyle')
<style type="text/css">
	.complete {
		color: #5cb85c
	}
	.uncomplete {
		color: #f0ad4e;
	}
	.table-row:hover {
		cursor: pointer;
		background-color: #eee;
	}
	.color-link {
		color: #0000EE;
	}
</style>
@endpush
@section('content')
<section>
	<div class="container">
		<h1 class="text-center">HISTORY</h1>
		<hr />
		@if (count($histories))
			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
				<table class="table">
					<thead>
						<tr>
							<th>Code</th>
							<th>Date</th>
							<th>Price</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						@foreach($histories as $index => $item)
							<tr class="table-row" data-id = "{{ $item->id }}">
								<td class="color-link">{{ $item->number }}</td>
								<td>{{ Carbon\Carbon::parse($item->created_at)->format('d - M - Y') }}</td>
								<td>Rp {{ number_format($item->total, 2, ',', '.') }}</td>
								<td class="{{ $item->status == 'complete' ? 'complete' : 'uncomplete' }}">{{ ucfirst($item->status) }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		@else
			<div class="well well-lg text-center">
				<h2>Your History is empty</h2>
			</div>
		@endif
	</div>
</section>
@endsection
@push('pageScript')
<script type="text/javascript">
	$(document).ready(function() {
        $('.mpsi-loading-page').css('display', 'none');
        $('.mpsi-page').css('display', 'block');
        $('.mpsi-page').addClass('mpsi-page-animation');

        $('.table-row').on('click', function() {
        	var id = $(this).attr('data-id');
        	var url = '{{ route('frontend.history.detail', ['id' => 'IDURL']) }}';
        	url = url.replace('IDURL', id);
        	window.location.href = url;
        });
	});
</script>
@endpush