@extends('dashbord.app')
@inject('model', 'App\Models\Post')
@section('bageName')
show post
@endsection
@section('content')

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">show post </h3>
                </div>
                <div style="width: 750px;margin: 20px auto;text-align: center;">
                    <h1>{{$record->title}}</h1>
                    <p>{{$record->content}}</p>
                    <div>
                        <img src="{{asset($record->image)}}" style="width: 50%" alt="{{$record->title}}">
                    </div>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
@endsection

