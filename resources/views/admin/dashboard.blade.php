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
                        <h2 class="m-b-5 font-strong">1250</h2>
                        <div class="m-b-5">Categories</div><i class="fa fa-bars widget-stat-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">201</h2>
                        <div class="m-b-5">Products</div><i class="fa fa-tasks widget-stat-icon"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Latest Orders</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th width="91px">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="invoice.html">AT2584</a>
                                    </td>
                                    <td>@Jack</td>
                                    <td>$564.00</td>
                                    <td>
                                        <span class="badge badge-success">Shipped</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="invoice.html">AT2575</a>
                                    </td>
                                    <td>@Amalia</td>
                                    <td>$220.60</td>
                                    <td>
                                        <span class="badge badge-success">Shipped</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="invoice.html">AT1204</a>
                                    </td>
                                    <td>@Emma</td>
                                    <td>$760.00</td>
                                    <td>
                                        <span class="badge badge-default">Pending</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="invoice.html">AT7578</a>
                                    </td>
                                    <td>@James</td>
                                    <td>$87.60</td>
                                    <td>
                                        <span class="badge badge-warning">Expired</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="invoice.html">AT0158</a>
                                    </td>
                                    <td>@Ava</td>
                                    <td>$430.50</td>
                                    <td>
                                        <span class="badge badge-default">Pending</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="invoice.html">AT0127</a>
                                    </td>
                                    <td>@Noah</td>
                                    <td>$64.00</td>
                                    <td>
                                        <span class="badge badge-success">Shipped</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
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