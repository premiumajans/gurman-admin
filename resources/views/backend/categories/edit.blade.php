@extends('master.backend')
@section('title',__('backend.categories'))
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="card">
                            <form action="{{ route('backend.categories.update',$category->id) }}"
                                  class="needs-validation" novalidate method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="col-12">
                                        <div
                                            class="page-title-box d-sm-flex align-items-center justify-content-between">
                                            <h4 class="mb-sm-0">@lang('backend.categories'): #{{ $category->id }}</h4>
                                        </div>
                                    </div>
                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                        @foreach(active_langs() as $lan)
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link @if($loop->first) active @endif" data-bs-toggle="tab"
                                                   href="#{{ $lan->code }}" role="tab" aria-selected="true">
                                                    <span class="d-block d-sm-none"><i
                                                            class="fas fa-flag">&nbsp; {{ $lan->code }}</i></span>
                                                    <span class="d-none d-sm-block">{{ $lan->name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content p-3 text-muted">
                                        @foreach(active_langs() as $lan)
                                            <div class="tab-pane @if($loop->first) active show @endif"
                                                 id="{{ $lan->code }}" role="tabpanel">
                                                <div class="form-group row">
                                                    <div class="mb-3">
                                                        <label>@lang('backend.name') <span class="text-danger">*</span></label>
                                                        <input name="name[{{ $lan->code }}]" type="text"
                                                               id="name{{$lan->code}}"
                                                               class="form-control" required=""
                                                               value="{{ $category->translate($lan->code)->name }}">
                                                        {!! validation_response('backend.name') !!}
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>@lang('backend.description')</label>
                                                        <textarea name="description[{{ $lan->code }}]"
                                                                  id="elm{{$lan->code}}1"
                                                                  class="form-control">{!! $category->translate(app()->getLocale())->description ?? '' !!}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>@lang('backend.title')(Meta)</label>
                                                        <textarea name="meta_title[{{ $lan->code }}]"
                                                                  rows="2"
                                                                  class="form-control">{{ $category->translate(app()->getLocale())->meta_title ?? '' }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>@lang('backend.description')(Meta)</label>
                                                        <textarea name="meta_description[{{ $lan->code }}]"
                                                                  rows="6"
                                                                  class="form-control">{{ $category->translate(app()->getLocale())->meta_description ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="mb-3">
                                            <label>@lang('backend.slug')</label>
                                            <input name="slug" id="slug" type="text" class="form-control" required=""
                                                   value="{{ $category->slug }}">
                                        </div>
                                        <div class="mb-3">
                                            <label>@lang('backend.parent')</label>
                                            <select name="parent" type="text" class="form-control">
                                                <option value="" @if($category->parent_id == null) selected @endif>-
                                                </option>
                                                @foreach($categories as $cat)
                                                    <option
                                                        value="{{ $cat->id }}"
                                                        @if($category->parent_id == $cat->id) selected @endif>{{ $cat->translate(app()->getLocale())->name ?? __('backend.translation-not-found') }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-5 text-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                       @if($category->is_home == 1) checked @endif
                                                       id="invalidCheck" name="is_home">
                                                <label class="form-check-label" for="invalidCheck">
                                                    @lang('backend.home-page')
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-5 text-center">
                                            <div>
                                                <button type="submit"
                                                        class="btn btn-primary waves-effect waves-light me-1">
                                                    @lang('backend.submit')
                                                </button>
                                                <a href="{{ url()->previous() }}" type="button"
                                                   class="btn btn-secondary waves-effect">
                                                    @lang('backend.cancel')
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            function generateSlugFromName() {
                const nameInputValue = $('#nameen').val();
                const slugInput = $('#slug');
                const slug = nameInputValue.trim().toLowerCase().replace(/[^a-z0-9]+/g, '-');
                slugInput.val(slug);
            }

            $('#nameen').on('input', generateSlugFromName);
        });
    </script>
    @include('backend.templates.components.tiny')
@endsection
