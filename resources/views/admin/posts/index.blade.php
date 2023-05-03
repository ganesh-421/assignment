<x-layout>
    <x-forms.modal modalId="post-modal" title="Add/Update Post">
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="title" class="mb-3">Title</label>
                    <input type="text" name="title" class="form-control form-control-md"
                        placeholder="Enter Title Here" value="{{ old('title') }}" />
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="mb-3">Body</label>
                    <textarea name="body" class="form-control form-control-md" placeholder="Enter body of post here">
                        {{ old('body') }}
                    </textarea>
                    @error('body')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="mb-3">Image</label>
                    <input type="file" value="{{ old('image') }}" class="form-control form-control-md"
                        name="image">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>
        </form>
    </x-forms.modal>
    <div class="card">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <div class="card-header">
            <div class="d-flex gap-auto">
                <h3>All Posts</h3>
                <button class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#post-modal">Add
                    Post</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive mx-auto w-75" style="min-height: 75vh">
                <table class="table">
                    <thead>
                        <th>S.n.</th>
                        <th>Title</th>
                        <th>Body</th>
                        @can('update', $posts->first())
                            <th>Actions</th>
                        @endcan
                    </thead>
                    <tbody>
                        @if ($posts->count() == 0)
                            <tr>
                                <td colspan="4" class="text-center">No Posts Found</td>
                            </tr>
                        @else
                            {{-- @dd(auth()->user()->role) --}}
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td> {{ $post->body }}</td>
                                    <td>
                                        <form action="/admin/posts/{{ $post->id }}" method="POST">
                                            @csrf
                                            @method('patch')
                                            @can('update', $post)
                                                @if (!$post->approved)
                                                    <button type="submit" class="btn btn-secondary btn-sm">approve</button>
                                                @endif
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
