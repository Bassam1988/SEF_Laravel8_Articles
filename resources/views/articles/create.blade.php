@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <main class="tm-main">
<form method="POST" action="/Articles">
@csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="Text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title" value="{{ old('title') }}">
    @error('title')
        <p class="invalid-feedback">{{ $errors->first('title') }}</p>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Summary</label>
<div>
    <textarea class="form-control @error('summary') is-invalid @enderror" name="summary" id="summary" rows="3"></textarea>
    @error('title')
        <p class="invalid-feedback">{{ $errors->first('summary') }}</p>
    @enderror
</div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">body</label>
<div>
    <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="5"></textarea>
    @error('title')
        <p class="invalid-feedback">{{ $errors->first('body') }}</p>
    @enderror
</div>
  </div>
  <div class="form-group" >
    <label for="exampleFormControlSelect2">Example multiple select</label>
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
</main>
</div>

@endsection
