@extends('layouts.app-master')

@section('content')
  <!-- Page Content  -->
  <div id="content" class="p-4 p-md-5">
  @auth
    @php
    $q = request()->query('q');
    $f = request()->query('where');
    @endphp
        <div>
            <h3>Search</h3>
            <form id="filter-form" method="GET" action="{{ route('home.post') }}" >
                <div class="col-sm-6 offset-md-3">
                    <div class="input-group">
                        <input id="filter-q" type="text" class="form-control" name="q" value="{{ $q }}" placeholder="Search here..." aria-label="Search here..." required autocomplete="off">
                        <div class="input-group-append">
                            <select name="where" class="custom-select" required>
                                <option value="name" {{ $f == 'name' ? "selected" : null}}>Search in Name</option>
                                <option value="email" {{ $f == 'email' ? "selected" : null}}>Search in Email</option>
                                <option value="mobile" {{ $f == 'mobile' ? "selected" : null}}>Search in Mobile</option>
                                <option value="macaddress" {{ $f == 'macaddress' ? "selected" : null}}>Search in MAC Address</option>
                                <option value="productKey" {{ $f == 'productKey' ? "selected" : null}}>Search in Keys</option>
                            </select>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="key-table" class="mt-5">
            <table class="table table-striped">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Mobile</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Device Model</th>
                        <th scope="col" class="text-center">MAC Address</th>
                        <th scope="col" class="text-center">Key</th>
                        <th scope="col" class="text-center">Validity</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($arr as $d)
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>{{$d->name}}</td>
                            <td>{{$d->mobile}}</td>
                            <td>{{$d->email}}</td>
                            <td>{{$d->phonemodel}}</td>
                            <td>{{$d->macaddress}}</td>
                            <td>{{$d->productKey}}</td>
                            <td>{{$d->validtill}}</td>
                            <td class="text-center"><form method="post" action="{{ route('key.edit') }}"><input type="hidden" name="_token" value="{{ csrf_token() }}" /><input type="hidden" name="keyId" value={{$d->id}}><button class="btn btn-success" type="submit">View <i class="fa fa-arrow-right text-white"></i></button></form></td>
                        </tr>
                    @empty
                        <tr>No data found!</tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <nav id="pagination">
        {{ $arr->links('layouts.pagination') }}
        </nav>
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
