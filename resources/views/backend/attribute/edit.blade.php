@extends('backend.layouts.master')
@section('title','ROYALE TOUCHE || Attribute Edit')
@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Attribute</h5>
    <div class="card-body">
      <form method="post" action="{{route('attribute.update',$attribute->id)}}">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
        <input id="name" type="text" name="name" placeholder="Enter Name"  value="{{$attribute->name}}" class="form-control">
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="1" {{(($attribute->status=='active') ? 'selected' : '')}}>Active</option>
            <option value="0" {{(($attribute->status=='inactive') ? 'selected' : '')}}>Inactive</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush
