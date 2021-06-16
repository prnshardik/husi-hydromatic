@extends('admin.layout.app')

@section('meta')
@endsection

@section('title')
    Settings
@endsection

@section('styles')
@endsection

@section('content')
    @php
        $tab = 'general';

        if(\Session::has('tab'))
            $tab = \Session::get('tab');
    @endphp

    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Settings</div>
                    </div>
                    <ul class="nav nav-tabs nav-fill">
                        <li class="nav-item">
                            <a class="nav-link @if($tab == 'general') active @endif" href="#general" data-toggle="tab" aria-expanded="true">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($tab == 'smtp') active @endif" href="#smtp" data-toggle="tab" aria-expanded="false">SMTP</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane @if($tab == 'general') active show @else fade @endif" id="general" aria-expanded="true">
                            <div class="row m-2">
                                <div class="col-sm-12">
                                    <form action="{{ route('admin.settings.update') }}" method="post">
                                        @method('post')
                                        @csrf
                                        <input type="hidden" name="tab" value="general">

                                        @if(isset($general) && $general->isNotEmpty())
                                            @foreach($general as $row)
                                                <div class="form-group">
                                                    <label><b>{{ strtoupper(str_replace('_', ' ', $row->key)) }}</b></label>
                                                    <input type="text" name="{{ $row->id }}" class="form-control" value="{{ $row->value }}" placeholder="{{ strtoupper(str_replace('_', ' ', $row->key)) }}" />
                                                </div>
                                            @endforeach
                                        @endif
                                        <input type="submit" value="Save" class="btn btn-primary mb-3">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane @if($tab == 'smtp') active show @else fade @endif" id="smtp" aria-expanded="false">
                            <div class="row m-2">
                                <div class="col-sm-12">
                                    <form action="{{ route('admin.settings.update') }}" method="post">
                                        @method('post')
                                        @csrf
                                        <input type="hidden" name="tab" value="smtp">

                                        @if(isset($smtp) && $smtp->isNotEmpty())
                                            @foreach($smtp as $row)
                                                <div class="form-group">
                                                    <label><b>{{ strtoupper(str_replace('_', ' ', $row->key)) }}</b></label>
                                                    <input type="text" name="{{ $row->id }}" class="form-control" value="{{ $row->value }}" placeholder="{{ strtoupper(str_replace('_', ' ', $row->key)) }}" />
                                                </div>
                                            @endforeach
                                        @endif
                                        <input type="submit" value="Save" class="btn btn-primary mb-3">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
