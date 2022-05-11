@extends('dashbord.app')
{{-- @inject('client', 'App\Models\Client') --}}
@section('bageName')
Cities
@endsection
@section('content')

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">show cities</h3>

                {{-- <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                    </button>
                </div> --}}
                </div>
                <div class="card-body">
                    <a href="{{url(route('city.create'))}}" class="btn btn-primary" style="margin: 10px"><i class="fas fa-plus"></i>Create new cite</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">edit</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recordS as $record)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$record->name}}</td>
                                <td><a href="{{url(route('city.edit',$record->id))}}" class="btn btn-primary">edit</a></td>
                                <td>
                                    {!! Form::open([
                                        'action'    => ['App\Http\Controllers\CiteController@destroy',$record->id],
                                        'method'    =>'delete',
                                        ]) !!}
                                        <button type="submit" class="btn btn-danger">delete</button>
                                        {!! Form::close() !!}
                                    {{-- <a href="{{url(route('governorate.destroy',$record->id))}}" class="btn btn-danger">delete</a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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

