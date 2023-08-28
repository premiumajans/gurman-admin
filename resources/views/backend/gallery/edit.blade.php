@extends('master.backend')
@section('title',__('backend.gallery'))
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="card">
                            <form action="{{ route('backend.gallery.update',$id) }}" class="needs-validation" novalidate
                                  method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    @include('backend.templates.components.card-col-12',['variable' => 'gallery'])
                                    <div class="mb-3">
                                        <label>@lang('backend.photo')</label>
                                        <input type="file" name="photo" class="form-control mb-2">
                                        @if(file_exists($gallery->photo))
                                            <img src="{{ asset($gallery->photo) }}" class="form-control"
                                                 width="100%">
                                        @endif
                                    </div>
                                </div>
                                @include('backend.templates.components.buttons')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
