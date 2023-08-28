@extends('master.backend')
@section('title',__('backend.tag'))
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="card">
                            <form action="{{ route('backend.meta.store') }}" class="needs-validation" novalidate
                                  method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    @include('backend.templates.components.card-col-12',['variable' => 'meta'])
                                    @include('backend.templates.components.multi-lan-tab')
                                    <div class="tab-content p-3 text-muted">
                                        @foreach(active_langs() as $lan)
                                            <div class="tab-pane @if($loop->first) active show @endif"
                                                 id="{{ $lan->code }}"
                                                 role="tabpanel">
                                                <div class="form-group row">
                                                    <div class="mb-3">
                                                        <label>@lang('backend.tag') <span
                                                                class="text-danger">*</span></label>
                                                        <textarea name="tag[{{ $lan->code }}]" type="text"
                                                                  class="form-control"
                                                                  required=""
                                                                  rows="7"
                                                                  placeholder='<meta name=robots" content="max-image-preview:large"/>'></textarea>
                                                        {!! validation_response('backend.tag') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="mb-3">
                                            <label>@lang('backend.page') <span class="text-danger">*</span></label>
                                            <select class="form-control" name="page">
                                                @foreach($pages as $pageKey => $page)
                                                    <option value="{{ $pageKey }}">{{ __('backend.'.$page) }}</option>
                                                @endforeach
                                            </select>
                                            {!! validation_response('backend.page') !!}
                                        </div>
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
