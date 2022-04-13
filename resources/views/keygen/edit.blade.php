@extends('layouts.app-master')

@section('content')
  <!-- Page Content  -->
  <div id="content" class="p-4 p-md-5">
  @auth
    <div class="row">
        <div class="col-sm-12">
            <div id="key-table">
                <h3>Key generation</h3>
                @foreach($arr as $d)
                <form method="post" action="{{ route('key.save') }}">
                <input type="hidden" name="_token" id="csrf_genkey" value="{{ csrf_token() }}" />
                <input type="hidden" name="id" value="{{ $d->id }}" />
                    <div class="form-group">
                        <label for="macaddress">Name</label>
                        <input type="text" class="form-control" name="name" aria-describedby="macaddress" autocomplete="off" required value={{$d->name}}>
                        <small id="macaddress" class="form-text text-muted">User's name</small>
                    </div>
                    <div class="form-group">
                        <label for="macaddress">Mobile Number</label>
                        <input type="text" class="form-control" name="mobile" aria-describedby="macaddress" autocomplete="off" required value={{$d->mobile}}>
                        <small id="macaddress" class="form-text text-muted">User's mobile number</small>
                    </div>
                    <div class="form-group">
                        <label for="macaddress">Phone Model</label>
                        <input type="text" class="form-control" name="phonemodel" aria-describedby="macaddress" autocomplete="off" required value={{$d->phonemodel}}>
                        <small id="macaddress" class="form-text text-muted">User's device model</small>
                    </div>
                    <div class="form-group">
                        <label for="macaddress">Email</label>
                        <input type="text" class="form-control" name="email" aria-describedby="macaddress" autocomplete="off" required value={{$d->email}}>
                        <small id="macaddress" class="form-text text-muted">User's email address</small>
                    </div>
                    <div class="form-group">
                        <label for="key">Mac Address</label>
                        <input type="text" class="form-control" name="macaddress" aria-describedby="key" autocomplete="off" required value={{$d->macaddress}}>
                        <small id="key" class="form-text text-muted">User's mac address</small>
                    </div>
                    <div class="form-group">
                        <label for="key">Product Key</label>
                        <input type="text" class="form-control" name="productKey" aria-describedby="key" required  autocomplete="off" value={{$d->productKey}}>
                        <small id="key" class="form-text text-muted">Product key associated with user's device</small>
                    </div>
                    <div class="form-group">
                        <label for="key">Valid till</label>
                        <input type="text" class="form-control" name="validtill" aria-describedby="key" required  autocomplete="off" value={{$d->validtill}}>
                        <small id="key" class="form-text text-muted">Product key's validity</small>
                    </div>
                    <div class="form-group">
                        <label for="key">Status</label>
                        <select name="status" class="custom-select mr-sm-2" required>
                            <option value="0" {{ $d->status === 0 ? "selected" : null}}>Unassigned</option>
                            <option value="1" {{ $d->status === 1 ? "selected" : null}}>Active</option>
                            <option value="2" {{ $d->status === 2 ? "selected" : null}}>Expired</option>
                        </select>
                        <small id="key" class="form-text text-muted">Product key's status</small>
                    </div>
                    <div>
                        <label for="key">Created On</label>
                        <small id="key" class="form-text text-muted">{{$d->created_at}}</small>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
                @endforeach
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
