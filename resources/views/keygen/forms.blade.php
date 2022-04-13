@extends('layouts.app-master')

@section('content')
  <!-- Page Content  -->
  <div id="content" class="p-4 p-md-5">
  @auth
  {{$arr['body'] ?? ''}}
    <div class="row">
        <div class="col-sm-12">
            <div id="key-table">
                <h3>Key generation</h3>
                <form id="one-key-form">
                <input type="hidden" name="_token" id="csrf_genkey" value="{{ csrf_token() }}" />
                <div class="form-group">
                        <label for="macaddress">Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="macaddress" autocomplete="off" required>
                        <small id="macaddress" class="form-text text-muted">Enter user's name</small>
                    </div>
                    <div class="form-group">
                        <label for="macaddress">Mobile Number</label>
                        <input type="text" class="form-control" id="mobile" aria-describedby="macaddress" autocomplete="off" required>
                        <small id="macaddress" class="form-text text-muted">Enter user's mobile number</small>
                    </div>
                    <div class="form-group">
                        <label for="macaddress">Email</label>
                        <input type="text" class="form-control" id="email" aria-describedby="macaddress" autocomplete="off" required>
                        <small id="macaddress" class="form-text text-muted">Enter user's email address</small>
                    </div>
                    <div class="form-group">
                        <label for="key">key</label>
                        <input type="text" class="form-control" id="product-key" aria-describedby="key" disabled autocomplete="off">
                        <small id="key" class="form-text text-muted">Generated key</small>
                    </div>
                    <button type="submit" class="btn btn-success">Create</button>
                    <button type="button" class="btn btn-md btn-info" id="one-key-form-btn">
                            Request key
                    </button>
                </form>
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
