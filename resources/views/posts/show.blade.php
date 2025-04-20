<!-- <html>
<head>
    <link href="{{ asset('css/custom-styles.css') }}" rel="stylesheet">
</head>
<body> -->
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Post Details
            </h2>
        </x-slot>
    <div class="container mt-4">
        <h1>Post Details</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                <th>Photo</th>
                <th>Created By</th>
            </tr>
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>
                    @if ($post->photo)
                        <img src="{{ asset('storage/' . $post->photo) }}" alt="Post Photo" style="max-width: 200px;">
                    @else
                        <span>No photo</span>
                    @endif
                </td>
                <td>{{ $post->user->name ?? 'Unknown' }}</td>
            </tr>
        </table>
        <h2>User Information</h2>
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Joined</th>
            </tr>
            <tr>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->user->email }}</td>
                <td>{{ $post->user->created_at->format('d M Y') }}</td>
            </tr>
        </table>
        <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>
    </div>
    </x-app-layout>
<!-- </body>
</html> -->