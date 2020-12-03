<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

    <title>Crud</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-10 mx-auto">
            <div class="card border-0 shadow">
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                - {{$error}} <br>
                            @endforeach
                        </div>
                    @endif
                    <form class="form-inline" action="{{route('users.store')}}" method="POST">
                        <div class="form-group ml-2">
                            <label for="name"></label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name"
                                   value="{{old('name')}}">
                        </div>
                        <div class="form-group ml-2">
                            <label for="email"></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                   value="{{old('email')}}">
                        </div>
                        <div class="form-group ml-2">
                            <label for="password"></label>
                            <input type="password" name="password" id="password" class="form-control"
                                   placeholder="Password" value="{{old('password')}}">
                        </div>
                        <div class="ml-4">
                            @csrf
                            <button class="btn btn-primary" type="submit">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <form action="{{route('users.destroy', $user)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input
                                    class="btn btn-danger btn-sm"
                                    type="submit"
                                    value="Delete"
                                    onclick="return confirm('Are you sure?')">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
