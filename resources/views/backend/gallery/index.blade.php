@extends('master.backend')
@section('title',__('backend.gallery'))
@section('styles')
    @include('backend.templates.components.dt-styles')
@endsection
@section('content')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">@lang('backend.gallery'):</h4>
                                <a href="{{ route('backend.gallery.create') }}"
                                   class="btn btn-primary mb-3"><i
                                        class="fas fa-plus"></i> &nbsp;@lang('backend.add-new')
                                </a>
                            </div>
                        </div>
                        <table id="datatable-buttons"
                               class="table table-striped table-bordered dt-responsive nowrap"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>@lang('backend.photo'):</th>
                                <th>@lang('backend.time'):</th>
                                <th>@lang('backend.actions'):</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($gallerys as $gallery)
                                <tr>
                                    <td>{{ $gallery->id }}</td>
                                    <td><img src="{{ asset($gallery->photo) }}" style="width: 60px;height: 90px;"></td>
                                    <td>{{ date('d.m.Y H:i:s',strtotime($gallery->created_at)) }}</td>
                                    @include('backend.templates.components.dt-settings',['variable' => 'gallery','value' => $gallery])
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('backend.templates.components.dt-scripts')
@endsection
