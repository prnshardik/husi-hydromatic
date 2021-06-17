@extends('admin.layout.app')

@section('meta')
@endsection

@section('title')
    Dashboard
@endsection

@section('styles')
@endsection

@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $categories }}</h2>
                        <div class="m-b-5">Categories</div><i class="fa fa-bars widget-stat-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $products }}</h2>
                        <div class="m-b-5">Products</div><i class="fa fa-tasks widget-stat-icon"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Latest Contact US</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($contactus) && $contactus->isNotEmpty())
                                    @php $i=1; @endphp
                                    @foreach($contactus as $row)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->phone }}</td>
                                            <td><a href="{{ route('admin.contactus.view', ['id' => base64_encode($row->id)]) }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a></td>
                                        </tr>
                                        @php $i++; @endphp
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('backend/assets/js/scripts/dashboard_1_demo.js') }}" type="text/javascript"></script>
@endsection