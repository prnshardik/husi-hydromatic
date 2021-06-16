@extends('admin.layout.app')

@section('meta')
@endsection

@section('title')
    View Category
@endsection

@section('styles')
@endsection

@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">View Category</div>
                    </div>
                    <div class="ibox-body">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Plese enter name" value="{{ @old('name', $data->name) }}" readonly />
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="description">Description <span class="text-danger">*</span></label>
                                <textarea name="description" id="description" class="form-control" placeholder="Plese enter description" cols="3" rows="5" readonly>{{ @old('description', $data->description) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('admin.categories') }}" class="btn btn-default">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

