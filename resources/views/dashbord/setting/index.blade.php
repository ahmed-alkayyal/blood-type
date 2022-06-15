@extends('dashbord.app')
{{-- @inject('client', 'App\Models\Client') --}}
@section('bageName')
Governorate
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-2">
                <p>facebook link</p>
            </div>
            <div class="col col-md-10">
                <p>{{$settings->fb_link}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-2">
                <p>facebook link</p>
            </div>
            <div class="col col-md-10">
                <p>{{$settings->fb_link}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-2">
                <p>facebook link</p>
            </div>
            <div class="col col-md-10">
                <p>{{$settings->fb_link}}</p>
            </div>
        </div>
    </div>
@endsection

