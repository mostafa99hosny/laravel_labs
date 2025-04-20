<!-- <html>
<head>
    <link href="{{ asset('css/custom-styles.css') }}" rel="stylesheet">
</head>
<body> -->
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create a New Post
            </h2>
        </x-slot>
    <div class="container mt-4">
        <form action="/posts" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input type="text" class="form-control" id="body" name="body" placeholder="Body">
            </div>
            <div class="mb-3">
                <label for="user_id" class="form-label">Created By</label>
                <select class="form-control" id="user_id" name="user_id">
                    <option value="" disabled selected>Select a user</option>
                    @foreach (\App\Models\User::all() as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} (ID: {{ $user->id }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
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