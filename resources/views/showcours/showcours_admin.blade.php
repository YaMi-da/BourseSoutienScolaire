@extends('admin.admin_master')
@section('admin')

<link href="{{ asset('template/css/custom3-css.css') }}" rel="stylesheet">

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('admin.body.header')

        <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="padding-left: 100px; padding-right: 100px;">
                        <div class="half-half-image-text">
                            <div class="row">
                                <div class="col-12">
                                <h1>{{ $showData->titre }}</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                <div class="content">
                                    <p>Formatteur : {{ $showData->user['name'] }}</p>
                                </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                <div class="img" style="background: url('')no-repeat center;background-size:cover;"></div>
                                </div>
                            </div>
                            </div>
                            </div>
                            <div class="card-body">
                                
                            </div>
                    </div>
                </div>
    </div>
    @include('admin.body.footer')
</div>


@endsection