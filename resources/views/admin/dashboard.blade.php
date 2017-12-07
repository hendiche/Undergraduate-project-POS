@extends('admin.base.app')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Dashboard</h4> </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}">SNP</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!--row -->
<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats"> <i class="ti-user bg-megna"></i>
                <div class="bodystate">
                    <h4></h4> <span class="text-muted">Registered User</span> </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-3 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats"> <i class="ti-user bg-info"></i>
                <div class="bodystate">
                    <h4>{{Vendors::count()}}</h4> <span class="text-muted">Registered Restaurant</span> </div>
            </div>
        </div>
    </div> --}}
    <div class="col-md-3 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats"> <i class="ti-wallet bg-success"></i>
                <div class="bodystate">
                    <h4>13</h4> <span class="text-muted">Today's Ops.</span> </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats"> <i class="ti-wallet bg-inverse"></i>
                <div class="bodystate">
                    <h4>$34650</h4> <span class="text-muted">Earning</span> </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">New User List</h3>
            <p class="text-muted">this is the registered user</p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Register Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> --}}
@endsection