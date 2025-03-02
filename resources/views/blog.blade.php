<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog List</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body>
        {{-- <h1>ini adalah halaman blog {{ $data }}</h1> --}}
        <div class="container">
            <div class="mt-5">
                <h1 class="text-center">Blog list</h1>
                <div class="table-responsive mt-5">
                    <a href="{{ url('/blog/add') }}" class="btn btn-primary mb-3">Add New</a>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="title" value="{{ request('title') }}" class="form-control"
                                placeholder="Search Title" aria-label="Search Title" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </form>
                    <table class="table table-striped table-hover">
                        <thead>
                            <th>#</th>
                            <th>Title</th>
                            <th>Action</th>
                        </thead>
                        <tbody class="table-group-divider">
                            @if ($blogs->count() == 0)
                                <tr>
                                    <td class="text-center" colspan="3">
                                        No Data Found With
                                        <strong>{{ request('title') }}</strong>
                                        Title
                                    </td>
                                </tr>
                            @endif
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ ($blogs->currentpage() - 1) * $blogs->perpage() + $loop->index + 1 }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>
                                        <a href="{{ url('/blog/detail/' . $blog->id . '') }}">Detail</a> |
                                        <a href="{{ url('/blog/edit/' . $blog->id . '') }}">Edit</a> |
                                        <a href="{{ url('/blog/delete/' . $blog->id . '') }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    </body>

</html>
