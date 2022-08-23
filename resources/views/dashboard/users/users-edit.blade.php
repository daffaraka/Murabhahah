@extends('dashboard.layout')
@section('page-title', 'Edit User')
@section('content')
    <div class="container p-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2 class="text-center text-dark">Create New User</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
                </div>
            </div>
        </div>


        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('user.update',$user->id) }}" method="POST">
            @csrf
            <div class="row p-3">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{$user->name}}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{$user->email}}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                </div>
                
                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Password Confirmation:</strong>
                        <input type="password" name="password_confirmation" placeholder="Password" class="form-control">
                    </div>
                </div> 

                <div class="col-xs-12 col-sm-12 col-md-12" >
                    <div class="form-group" style="height: 100px;">
                        <strong>Role:</strong>
                        <select name="roles[]" class="form-control h-100" multiple >
                            @foreach ($roles as $item)
                            <option value[]="{{$item}}">{{$item}}</option>
                            @endforeach
                           
                        </select>
                        {{-- {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'multiple']) !!} --}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        {{-- {!! Form::open(['route' => 'user.store', 'method' => 'POST']) !!}

        {!! Form::close() !!} --}}


    </div>


@endsection
