@extends('layouts.app-master')

@section('content')
  <!-- Page Content  -->
  <div id="content" class="p-4 p-md-5">
  @auth
    @php
        $f = request()->query('f')
    @endphp
        <div id="key-table">
            <h3>List of Available Keys</h3>
            <form id="filter-form" method="GET" action="{{ route('home.keym') }}" >
                <div class="form-row justify-content-between mb-3">
                    <div class="col-auto">
                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                        <select name="f" class="custom-select mr-sm-2" id="filter-select" required>
                            <option value="all" {{ $f == 'all' ? "selected" : null}}>All</option>
                            <option value="active" {{ $f == 'active' ? "selected" : null}}>Active</option>
                            <option value="unassigned" {{ $f == 'unassigned' ? "selected" : null}}>Unassigned</option>
                            <option value="expired" {{ $f == 'expired' ? "selected" : null}}>Expired</option>
                        </select>
                    </div>
                </div>
            </form>
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
