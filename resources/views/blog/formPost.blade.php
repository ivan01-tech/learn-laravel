<form method="POST" accept="" class="container my-4">
    @csrf

    @method($post->id ? 'PATCH' : 'POST')
    <div class="form-group my-4">
        <label for="title">Title : </label>
        <input name="title" value="{{ old('title', $post->title) }}" class="form-control" id="title">
        @error('title')
            <div class="" style="color: red">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group my-4">
        <label for="title">Slug : </label>
        <input name="slug" value="{{ old('slug', $post->slug) }}" class="form-control" id="slug">
        @error('slug')
            <div class="" style="color: red">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group my-4">
        <label for="content">Description</label>
        <textarea class="form-control" name="content">
                {{ old('content', $post->content) }}
            </textarea>
        @error('content')
            <div class="" style="color: red">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">
        @if ($post->id)
            Modifier
        @else
            Créer
        @endif
    </button>
</form>
