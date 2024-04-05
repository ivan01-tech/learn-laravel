@extends('base')


@section('title', 'Creation dun nouvea article !')

@section('content')
    <form method="POST" accept="" class="container my-4">
        @csrf
        <div class="form-group my-4">
            <label for="title">Title : </label>
            <input name="title" value="Article de demonstration" class="form-control" id="title">

        </div>
        <div class="form-group my-4">
            <label for="content">Description</label>
            <textarea class="form-control" name="content">
                Contenu de demonstration
            </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
