@extends('admin.layout.app')

@section('meta')
@endsection

@section('title')
    View Category
@endsection

@section('styles')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">View Category</h4>
                </div>
                <div class="card-body ">
                    <div class="row">
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
                    </div>
                    <div class="form-group">
                        <a href="{{ route('admin.categories') }}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

