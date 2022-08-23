@extends('dashboard.layout')
@section('page-title', 'User')
@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2 class="text-dark text-center">Users Management</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success mb-2 mt-2" href="{{route('user.buat')}}"> Tambah User Baru</a>
                </div>
            </div>
        </div>


        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <table class="table table-striped shadow">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jabatan</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($data as $key => $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if (!empty($user->getRoleNames()))
                            @foreach ($user->getRoleNames() as $v)
                                <button class="btn btn-dark my-1" disabled>{{ $v }}</button>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{route('user.detail',$user->id)}}">Show</a>
                        <a class="btn btn-primary" href="{{route('user.edit',$user->id)}}">Edit</a>
                        <a href="{{route('user.delete',$user->id)}}" class="btn btn-danger">Delete</a>

                        {{-- {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id], 'style' => 'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!} --}}
                    </td>
                </tr>
            @endforeach
        </table>


        {!! $data->render() !!}


    </div>
@endsection
