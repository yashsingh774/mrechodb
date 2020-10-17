@extends('admin.layouts.master')

@section('main-content')

  <section class="section">
        <div class="section-header">
            <h1>{{ __('Banners') }}</h1>
            {{ Breadcrumbs::render('banners') }}
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.banner.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> {{ __('Add Banner') }}</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 offset-sm-3">
                                    <div class="input-group input-daterange" id="date-picker">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="refresh"> {{ __('Refresh') }}</button>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="date-search">{{ __('Search') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-striped" id="maintable" data-url="{{ route('admin.section.get-banner') }}"">
                                    <thead>
                                        <tr>
                                            <th>{{ __('ID') }}</th>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection



@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('assets/modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/banner/index.js') }}"></script>
@endsection
