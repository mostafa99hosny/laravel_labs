<!-- <html>
<head>
    <link href="{{ asset('css/custom-styles.css') }}" rel="stylesheet">
</head>
<body> -->
<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Posts
        </h2>
    </x-slot>
    <div class="container mt-4">
         <!-- @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif -->
        <button class="btn btn-primary mb-3">
            <a href="/posts/create" class="text-white text-decoration-none">Add New Post</a>
        </button>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Photo</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        @if ($post->photo)
                           <img src="{{ asset('storage/' . $post->photo) }}" alt="Post Photo" style="max-width: 100px;">
                        @else
                           <span>No photo</span>
                        @endif
                    </td>
                    <td>{{ $post->user->name ?? 'Unknown' }}</td>
                    <td>
                        <button class="btn btn-info btn-sm">
                            <a href="/posts/{{ $post->id }}" class="text-white text-decoration-none">View</a>
                        </button>
                        <button class="btn btn-warning btn-sm">
                            <a href="/posts/{{ $post->id }}/edit" class="text-white text-decoration-none">Edit</a>
                        </button>
                        <form action="/posts/{{ $post->id }}" method="POST" style="display:inline;"> 
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
    </x-app-layout>
<!-- </body>
</html> -->