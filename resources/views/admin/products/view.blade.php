@extends('admin.layout.app')

@section('meta')
@endsection

@section('title')
    View Product
@endsection

@section('styles')
    <link href="{{ asset('backend/assets/css/dropify.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">View Product</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="category_id">Category <span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id" class="form-control" disabled>
                                    <option value="" hidden>Select category</option>
                                    @if($categories->isNotEmpty())
                                        @foreach($categories as $row)
                                            <option value="{{ $row->id }}" @if($data->category_id == $row->id) selected @endif>{{ $row->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <span class="kt-form__help error category_id"></span>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Plese enter name" value="{{ $data->name ?? '' }}" disabled />
                                <span class="kt-form__help error name"></span>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="description">Description <span class="text-danger"></span></label>
                                <textarea name="description" id="description" class="form-control" placeholder="Plese enter description" cols="3" rows="5" disabled>{{ $data->description ?? '' }}</textarea>
                                <span class="kt-form__help error description"></span>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="image">Image</label>
                                <input type="file" class=" dropify disabled" disabled id="image" name="image"  data-allowed-file-extensions="jpg png jpeg" data-default-file="{{ $data->image }}" data-max-file-size-preview="20M" data-show-remove="false">
                                <span class="kt-form__help error image"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('admin.products') }}" class="btn btn-default">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('backend/assets/js/dropify.min.js') }}"></script>
    
    <script>
        $(document).ready(function(){
            $('.dropify').dropify({
                messages: {
                    'default': 'Drag and drop profile image here or click',
                    'remove':  'Remove',
                    'error':   'Ooops, something wrong happended.'
                }
            });
        });
    </script>
@endsection

