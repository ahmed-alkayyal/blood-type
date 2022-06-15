@extends('dashbord.app')
@inject('model', 'App\Models\DonationRequest')
@section('bageName')
Create donation request
@endsection
@section('content')

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">create donation request </h3>
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
                        // 'action' => ['GovernorateController@store'],
                        'action' => 'App\Http\Controllers\donationRequestController@store',
                        'files' => true,
                        ]) !!}
                            <div class="form-group">
                                <label for="name">patient_name</label>
                                {!!Form::text('patient_name',null,[
                                    'class'=>'form-control',
                                    // 'placeholder'=>'post title',
                                ]);!!}
                            </div>
                            <div class="form-group">
                                <label for="hospital_name">hospital_name</label>
                                {!!Form::text('hospital_name',null,[
                                    'class'=>'form-control',
                                    // 'placeholder'=>'post content',
                                ]);!!}
                            </div>
                            <div class="form-group">
                                <label for="hospital_address">hospital_address</label>
                                {!!Form::text('hospital_address',null,[
                                    'class'=>'form-control',
                                    // 'placeholder'=>'post content',
                                ]);!!}
                            </div>
                            <div class="form-group">
                                <label for="latitude">latitude</label>
                                {!!Form::number('latitude',null,[
                                    'class'=>'form-control',
                                    'min'   =>"1"
                                    // 'placeholder'=>'post content',
                                ]);!!}
                            </div>
                            <div class="form-group">
                                <label for="longitude">longitude</label>
                                {!!Form::number('longitude',null,[
                                    'class'=>'form-control',
                                    'min'   =>"1"
                                    // 'placeholder'=>'post content',
                                ]);!!}
                            </div>
                            <div class="form-group">
                                <label for="patient_phone">patient_phone</label>
                                {!!Form::number('patient_phone',null,[
                                    'class'=>'form-control',
                                    'min'   =>"1"
                                    // 'placeholder'=>'post content',
                                ]);!!}
                            </div>
                            <div class="form-group">
                                <label for="patient_age">patient_age</label>
                                {!!Form::number('patient_age',null,[
                                    'class'=>'form-control',
                                    'min'   =>"1"
                                    // 'placeholder'=>'post content',
                                ]);!!}
                            </div>
                            <div class="form-group">
                                <label for="bags_num">bags_num</label>
                                {!!Form::number('bags_num',null,[
                                    'class'=>'form-control',
                                    'min'   =>"1"
                                    // 'placeholder'=>'post content',
                                ]);!!}
                            </div>
                            <div class="form-group">
                                <label for="details">details</label>
                                {!!Form::textarea('details',null,[
                                    'class'=>'form-control',
                                    // 'placeholder'=>'post content',
                                ]);!!}
                            </div>
                            {!!Form::select('city_id',$city, null, [
                                    'placeholder' => 'city_id',
                                    'class'=>'form-control',
                                ]);
                            !!}
                            {!!Form::select('blood_type_id',$bloodtype, null, [
                                    'placeholder' => 'blood_type_id',
                                    'class'=>'form-control',
                                ]);
                            !!}
                            {!!Form::select('client_id',$client, null, [
                                    'placeholder' => 'client_id',
                                    'class'=>'form-control',
                                ]);
                            !!}
                            <div class="form-group">
                                <button class="btn btn-success" type="submit" style="margin: 20px 0">submit</button>
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

