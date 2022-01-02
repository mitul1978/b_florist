@extends('backend.layouts.master')
@section('title','ROYALE TOUCHE || Feature Create')
@section('main-content')

<div class="card">
    <h5 class="card-header">Add Feature</h5>
    <div class="card-body">
      <form method="post" action="{{route('feature.store')}}" enctype="multipart/form-data">
        {{csrf_field()}}


        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Name <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="name" placeholder="Enter Name"  value="{{old('name')}}" class="form-control">
          @error('name')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>



            <div class="form-group">
                <label for="content" class="col-form-label">Content</label>
                <textarea class="form-control" id="summary" name="content">{{old('content')}}</textarea>
                @error('summary')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Sort Number <span class="text-danger">*</span></label>
          <input id="inputTitle" type="number" name="sort_order" placeholder="Enter Name"  value="{{old('sort_order')}}" class="form-control">
          @error('sort_order')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>



        <div class="form-group">
            <label for="inputPhoto" class="col-form-label">Icon</label>
            <div class="input-group">
                {{-- <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span> --}}
            <input id="icon" class="form-control" type="file" name="icon" value="{{old('icon')}}">
            </div>
        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-success" type="submit">Submit</button>
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
    $('#summary').summernote({
      placeholder: "Write short content.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush
