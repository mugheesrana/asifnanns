@extends('admin.layouts.app')
@section('title', 'Application Information')
@section('content')
    <div class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Application Information</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">App Info</li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline-info">
                        <div class="card-header bg-info">
                            <h4 class="m-b-0 text-white">Application Info & Maintenance</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-body">
                                {{-- System Information --}}
                                <h3 class="box-title">System Information</h3>
                                <hr class="m-t-0 m-b-20">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-4">App Name:</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">{{ config('app.name') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-4">Laravel Version:</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">{{ app()->version() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-b-10">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-4">PHP Version:</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">{{ phpversion() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-4">Server:</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">{{ $_SERVER['SERVER_SOFTWARE'] ?? 'N/A' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Maintenance Actions --}}
                                <div class="row text-center">
                                    <div class="col-md-3 m-b-10">
                                        <a href="{{ route('admin.backup.db') }}" class="btn btn-sm btn-success">
                                            <i class="fa fa-database"></i> Backup Database
                                        </a>
                                    </div>
                                    <div class="col-md-3 m-b-10">
                                        <a href="{{ route('admin.logs.clear') }}" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i> Clear Logs
                                        </a>
                                    </div>
                                    <div class="col-md-3 m-b-10">
                                        <a href="{{ route('admin.cache') }}" class="btn btn-sm btn-warning">
                                            <i class="fa fa-refresh"></i> Clear Cache
                                        </a>
                                    </div>
                                    <div class="col-md-3 m-b-10">
                                        <a href="{{ route('admin.optimize') }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-cogs"></i> Optimize Clear
                                        </a>
                                    </div>
                                </div>

                                <hr class="m-t-20 m-b-20">

                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <a href="{{ route('admin.clear.all') }}" class="btn btn-lg btn-dark">
                                            <i class="fa fa-bolt"></i> Clear All (Cache + Config + Route + View + Optimize +
                                            Logs)
                                        </a>
                                    </div>
                                </div>

                            </div> {{-- form-body --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
