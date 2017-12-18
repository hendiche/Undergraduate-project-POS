<!DOCTYPE html>
<html>
	<table>
		<thead>
			<tr>
				<th><strong>Number</strong></th>
    			<th><strong>Customer</strong></th>
    			<th><strong>Note</strong></th>
    			<th><strong>Total</strong></th>
    			<th><strong>Date</strong></th>
    			<th><strong>Order</strong></th>
    			<th><strong>Status</strong></th>
    		</tr>
		</thead>

		<tbody>
			
			@foreach($purchases as $purchase)
            <tr>
    			<td>{{$purchase->number}}</td>
    			@if($purchase->type == PurchaseType::USER)
    			<td>{{$purchase->user->name}}</td>
    			@else
    			<td>{{$purchase->guest->name}}</td>
    			@endif
    			
    			<td>{{$purchase->note}}</td>
    			<td>{{$purchase->total}}</td>
    			<td>{{$purchase->created_at}}</td>
    			<td>
    				<ul>
    				@foreach($purchase->menus()->get() as $menu)
    					<li><strong>{{ $menu->name }} x {{$menu->pivot->quantity}}</strong></li>
    					@foreach($menu->foods()->get() as $food)
    					<li>-{{$food->name}}</li>
    					@endforeach
    					
    				@endforeach
    				@foreach($purchase->customs()->get() as $custom)
    					<li><strong>Custom No.{{ $custom->id }} x {{$custom->pivot->quantity}}</strong></li>
						@foreach($custom->foods()->get() as $food)
    					<li>-{{$food->name}}</li>
    					@endforeach
    					
    				@endforeach
    				</ul>
    			</td>
    			<td>{{PurchaseStatus::getString($purchase->status)}}</td>
                </tr>
    		@endforeach
    		
		</tbody>
	</table>
</html>