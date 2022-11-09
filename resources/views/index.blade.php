<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <h2 class="text-center py-5">Todo App</h2>

        <form action="/create" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" class="form-control rounded-0 p-3" placeholder="Add any todo...">
                <button type="submit" class="btn btn-primary rounded-0 w-100 mt-3">ADD</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <td>Todo</td>
                        <td>Status</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todos as $todo)
                        <tr>
                            <td>{{ $todo->name }}</td>
                            <td>{{($todo->status == 1 ? 'Done' : 'In Progress')}}</td>
                            <td>
                                <a href="{{ route('update',$todo->id) }}" class="btn btn-info {{($todo->status == 1 ? 'd-none' : '')}}">Change Status</a>
                                <a href="{{ route('destroy',$todo->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
