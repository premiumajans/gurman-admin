@extends('master.backend')
@section('title',__('backend.product'))
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="card">
                            <form action="{{ route('backend.product.update',$id) }}" class="needs-validation" novalidate
                                  method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    @include('backend.templates.components.card-col-12',['variable' => 'product'])
                                    @include('backend.templates.components.multi-lan-tab')
                                    <div class="tab-content p-3 text-muted">
                                        @foreach(active_langs() as $lan)
                                            <div class="tab-pane @if($loop->first) active show @endif"
                                                 id="{{ $lan->code }}"
                                                 role="tabpanel">
                                                <div class="form-group row">
                                                    <div class="mb-3">
                                                        <label>@lang('backend.name')</label>
                                                        <input name="name[{{ $lan->code }}]" type="text"
                                                               class="form-control"
                                                               value="{{ $product->translate($lan->code)->name ?? '' }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>@lang('backend.description')</label>
                                                        <textarea name="description[{{ $lan->code }}]" type="text"
                                                                  class="form-control"
                                                                  id="elm{{$lan->code}}1">{!! $product->translate($lan->code)->description ?? '' !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="mb-3">
                                            <label>@lang('backend.photo') <span class="text-danger">*</span></label>
                                            <input name="photo" type="file"
                                                   class="form-control">
                                            @if(file_exists($product->photo))
                                                <img src="{{ asset($product->photo) }}" class="mt-3 w-100">
                                            @endif
                                            {!! validation_response('backend.photo') !!}
                                        </div>
                                        <div class="mb-3">
                                            <label>@lang('backend.category')</label>
                                            <select name="category_id" class="form-control">
                                                @foreach($categories as $category)
                                                    <option
                                                        value="{{ $category->id }}"
                                                        @if($product->category_id == $category->id) selected @endif>{{ $category->translate(app()->getLocale())->name ?? '' }}</option>
                                                @endforeach
                                            </select>
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
@section('scripts')
    @include('backend.templates.components.tiny')
    @include('backend.templates.components.preview-images')
@endsection
