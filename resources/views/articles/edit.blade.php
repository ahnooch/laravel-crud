<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Article Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Edit Article</h2>
                    <a href="{{ route('articles.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('articles.update',$article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="designation">Article Designation:</label>
                        <select class="form-control" name="Designation" id="designation">
                            @foreach ($designations as $designation)
                            <option value="{{ $designation }}" @if($designation == $article->Designation) selected @endif>{{ $designation }}</option>
                            @endforeach
                        </select>
                        @error('Designation')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="stock">Quantité :</label>
                        <input type="text" class="form-control" name="stock" value="{{ $article->stock }}" id="stock">
                        @error('stock')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="remove_from_stock" value="1" id="remove_from_stock" @if($article->remove_from_stock) checked @endif>
                        <label class="form-check-label" for="remove_from_stock">Sortie de Stock</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="add_to_stock" value="1" id="add_to_stock" @if($article->add_to_stock) checked @endif>
                        <label class="form-check-label" for="add_to_stock">Entrée de Stock</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3
