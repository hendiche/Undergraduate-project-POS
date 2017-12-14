<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div>
	<h1 style="text-align: center;"><strong>SUTIBUN NASI PADANG</strong></h1>
	<h3 style="text-align: center;">JL.Rumah Sutibun No.1,Batam,Kepulauan Riau</h3>
	<h3 style="text-align: center;">0812345678</h3>
</div>
<div style="padding-left: 20%">
	<table style="width: 100%">
		<tr>
			<td>No.{{$purchase->number}}</td>
		</tr>
		<tr>
			<td>Date {{$purchase->created_at}}</td>
		</tr>
		<tr>
			<td></td>
		</tr>
		@foreach($purchase->menus()->get() as $menu)
		<tr>
			<td>{{$menu->name}}</td>
			<td>x {{$menu->pivot->quantity}}</td>
			<td>Rp.{{$menu->pivot->subtotal}}</td>
		</tr>
		@endforeach
		@foreach($purchase->customs()->get() as $custom)
		<tr>
			<td>Custom No.{{$custom->id}}</td>
			<td>x {{$custom->pivot->quantity}}</td>
			<td>Rp.{{$custom->pivot->subtotal}}</td>
		</tr>
		@endforeach
		<tr>
			<td>-----------------</td>
			<td>-----------------</td>
			<td>-----------------</td>
		</tr>
		<tr>
			<td></td>
			<td>Total : </td>
			<td>Rp.{{$purchase->total}}</td>
		</tr>
	</table>
</div>
</body>
</html>