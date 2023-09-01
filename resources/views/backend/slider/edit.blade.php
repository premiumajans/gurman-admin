@extends('master.backend')
@section('title',__('backend.slider'))
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="card">
                            <form action="{{ route('backend.slider.update',$id) }}" class="needs-validation" novalidate
                                  method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    @include('backend.templates.components.card-col-12',['variable' => 'slider'])
                                    <div class="mb-3">
                                        <label>@lang('backend.photo') <span class="text-danger">*</span></label>
                                        <input type="file" name="photo" class="form-control mb-3"
                                               id="validationCustom" accept="image/*">
                                        @if(file_exists($slider->photo))
                                            <img width="100%" src="{{ asset($slider->photo) }}">
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
@section('scripts')
    @include('backend.templates.components.tiny')
@endsection
