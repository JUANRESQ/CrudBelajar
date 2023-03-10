<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif
                <p class="mt-3">
                  
                </p>
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        Hi <strong>{{ auth()->user()->name }}</strong>, 
                        Anda login sebagai 
                        @can('isAdmin')
                            <span class="btn btn-success">Admin</span>
                        @elsecan('isOperator')
                            <span class="btn btn-info">Operator</span>
                        @else
                            <span class="btn btn-warning">User</span>
                        @endcan
                        <a href="/logout" onsubmit="return confirm('apakah anda yakin ingin keluar ?');" class="btn btn-md btn-danger mb-3 float-right">Logout</a>
                        <a href="{{ route('post.create') }}" class="btn btn-md btn-success mb-3 float-right mr-3">New
                            Post</a>
                        <table class="table table-bordered mt-1 text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Create At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->status == 0 ? 'Draft':'Publish' }}</td>
                                    <td>{{ $post->created_at->format('d-m-Y') }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('post.destroy', $post->id) }}" method="POST">
                                        <a href="{{ route('post.edit', $post->id) }}"
                                            class="btn btn-sm btn-primary"><i class="bi bi-pencil-fill"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            @can('isAdmin')
                                            <button type="submit" class="btn btn-sm btn-danger d-inline"><i class="bi bi-trash"></i></button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data post tidak tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>