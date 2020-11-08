@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <main class="tm-main">
        <h1>Update Article</h1>
@can('update', $post)
<form method="POST" action="/Articles/{{ $post->id }}">
@csrf
@method('PUT')
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="Text" class="form-control" id="title" name="title" placeholder="Title" value="{{ $post->title }}" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Summary</label>
<div>
    <textarea class="form-control" name="summary" id="summary" rows="3" >{{ $post->summary }}</textarea>
</div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">body</label>
<div>
    <textarea class="form-control" name="body" id="body" rows="5" >{{ $post->body }}</textarea>
</div>
  </div>
  <div class="form-group" >
    <label for="exampleFormControlSelect2">Categories</label>
    <select multiple name="categories[]" class="form-control" id="exampleFormControlSelect2" >
        @forelse ($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @error('categories')
                <p class="is_invalid">{{ $message }}</p>
            @enderror
        @empty
            <p>No categories</p>
        @endforelse
    </select>
  </div>
  <div>
  <button class="btn btn-primary" type="submit">Submit</button>
  </div>
</form>
<form>
  <div class="form-group">
    <label for="exampleFormControlFile1">Article Image</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
</form>

@endcan
@cannot('update',$post)
  <h1>You are not authorized to update this articles</h1>
@endcannot
</main>
</div>

@endsection
