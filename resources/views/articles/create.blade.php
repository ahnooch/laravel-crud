<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="card uper">
    <div class="card-header">
        <h4>Add Article</h4>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <form method='POST' action="{{ route('articles.index') }}">
            @csrf
           
            <div class="form-group">
                <label>Designation</label>
                <input type="text" class="form-control" name="Designation" />
            </div>
            <div class="form-group">
                <label>Stock</label>
                <input type="number" class="form-control" name="stock" />
            </div>
            <div>
                <input type="submit" class="btn btn-primary" value="Create" />
            </div>
        </form>
    </div>
</div>
