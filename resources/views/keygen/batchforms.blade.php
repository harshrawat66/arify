@extends('layouts.app-master')

@section('content')
  <!-- Page Content  -->
  <div id="content" class="p-4 p-md-5">
  @auth
  {{$arr['body'] ?? ''}}
    <div class="row">
        <div class="col-sm-12">
            <div id="key-table">
                <h3>Batch Key generation</h3>
                <form id="batch-key-form">
                <input type="hidden" name="_token" id="batch_csrf_genkey" value="{{ csrf_token() }}" />
                <div class="form-group">
                        <label for="batchname">Batch number</label>
                        <input type="text" class="form-control" id="batchname" aria-describedby="batchname" autocomplete="off" required>
                        <small id="batchname" class="form-text text-muted">Enter Batch Number</small>
                    </div>
                    <div class="form-group">
                        <label for="batchcount">No. of keys to be generated</label>
                        <input type="number" class="form-control" id="batchcount" aria-describedby="batchcount" autocomplete="off" required>
                        <small id="batchcount" class="form-text text-muted">Enter number of keys to be generated</small>
                    </div>
                    <button type="submit" class="btn btn-success">Generate</button>
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
