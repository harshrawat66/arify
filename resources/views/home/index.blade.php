@extends('layouts.app-master')

@section('content')
  <!-- Page Content  -->
  <div id="content" class="p-4 p-md-5">
  @auth
  <div class="row">
    
    <div class="col-sm-12">
        <h2>Dashboard</h2>
    </div>
    <div class="col-sm-12 col-md-3 text-center">
        <div class="card bg-warning text-dark">
            <div class="card-body" style="height: 100px;">
                <div class="d-flex flex-row">
                    Keys Available
                </div>
                <div class="d-flex flex-row align-items-center justify-content-between">
                    <div>{{$arr['available']}}</div>
                    <div><button class="btn btn-sm btn-info" id="dashboard-nav-btn">View <i class="fa fa-arrow-right text-white"></i></button></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-3 text-center">
        <div class="card bg-success text-white">
            <div class="card-body" style="height: 100px;">
                <div class="d-flex flex-row">
                    Keys Active
                </div>
                <div class="d-flex flex-row">
                {{$arr['active']}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-3 text-center">
        <div class="card bg-info text-white">
            <div class="card-body" style="height: 100px;">
                <div class="d-flex flex-row">
                    Keys Expired
                </div>
                <div class="d-flex flex-row">
                {{$arr['expired']}}
                </div>
            </div>
        </div>
    </div>
  </div>


  @endauth
        @guest
            <div class="row">
                <div class="col-sm-12 text-center">
                    Session Expired, Please <a href="/">Login</a> Again! 
                </div>
            </div>
        @endguest
  </div>
</div>
</div>
@endsection
