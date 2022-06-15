@extends('dashbord.app')
{{-- @inject('model', 'App\Models\Post') --}}
@section('bageName')
Create post
@endsection
@section('content')

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">create post </h3>
                </div>
                <div class="card-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::model($model,[
                        'action' => ['App\Http\Controllers\PostController@update',$model->id],
                        'method'    =>'Put',
                        'files' => true,
                        ]) !!}
                            <div class="form-group">
                                <label for="title">title</label>
                                {!!Form::text('title',null,[
                                    'class'=>'form-control',
                                    'placeholder'=>'post title',
                                ]);!!}
                            </div>
                            <div class="form-group">
                                <label for="content">content</label>
                                {!!Form::textarea('content',null,[
                                    'class'=>'form-control',
                                    'placeholder'=>'post content',
                                ]);!!}
                            </div>
                            <div class="form-group">
                                <label for="image">image</label>
                                {!!Form::file('image',[
                                    'class'=>'form-control',
                                ]);!!}
                            </div>
                            {!!Form::select('category_id',$category, null, [
                                'placeholder' => 'category_id',
                                'class'=>'form-control',
                            ]);
                                !!}
                            <div class="form-group">
                                <button class="btn btn-success" type="submit" style="margin: 20px 0">edit</button>
                            </div>
                    {!! Form::close() !!}
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

