<!-- <html>
<head>
    <link href="{{ asset('css/custom-styles.css') }}" rel="stylesheet">
</head>
<body> -->
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Post Edit
            </h2>
        </x-slot>
    <div class="container mt-4">
        <!-- @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif -->
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" placeholder="Title">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input type="text" name="body" id="body" class="form-control" value="{{ $post->body }}" placeholder="Body">
            </div>
            <div class="mb-3">
                <label for="user_id" class="form-label">Created By</label>
                <select class="form-control" id="user_id" name="user_id">
                    <option value="" disabled>Select a user</option>
                    @foreach (\App\Models\User::all() as $user)
                        <option value="{{ $user->id }}" {{ old('user_id', $post->user_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} (ID: {{ $user->id }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo">
                @if ($post->photo)
                    <div class="mt-2">
                        <p>Current Photo:</p>
                        <img src="{{ asset('storage/' . $post->photo) }}" alt="Post Photo" style="max-width: 200px;">
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    </x-app-layout>
<!-- </body>
</html> -->