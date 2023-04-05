<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Article List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Article List</h2>
                    <a href="{{ route('articles.create') }}" class="btn btn-primary">Create Article</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Article Designation</th>
                    <th scope="col">Article stock</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr scope="row">
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->Designation }}</td>
                        <td>{{ $article->stock }}</td>
                        <td> 
                            <form action="{{ route('articles.destroy',$article->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form> 
                            <a class="btn btn-primary" href="{{ route('articles.edit',$article->id )}}" >Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
