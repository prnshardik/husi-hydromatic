@extends('admin.layout.app')

@section('meta')
@endsection

@section('title')
    View Contact Us
@endsection

@section('styles')
@endsection

@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">View Contact Us</div>
                    </div>
                    <div class="ibox-body">
                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Name :</label>
                                <div class="col-sm-10 col-form-label">
                                    {{ $data->name ?? '' }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Email :</label>
                                <div class="col-sm-10 col-form-label">
                                    {{ $data->email ?? '' }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Phone :</label>
                                <div class="col-sm-10 col-form-label">
                                    {{ $data->phone ?? '' }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Subject :</label>
                                <div class="col-sm-10 col-form-label">
                                    {{ $data->subject ?? '' }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Message :</label>
                                <div class="col-sm-10 col-form-label">
                                    {{ $data->message ?? '' }}
                                </div>
                            </div>
                        </form>
                        <div class="form-group">
                            <a href="{{ route('admin.contactus') }}" class="btn btn-default">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

