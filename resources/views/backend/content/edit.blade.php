@extends('master.backend')
@section('title',__('backend.content'))
@section('styles')
    @livewireStyles
@endsection
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="card">
                            <form action="{{ route('backend.content.update',$id) }}" class="needs-validation" novalidate
                                  method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    @include('backend.templates.components.card-col-12',['variable' => 'content'])
                                    @include('backend.templates.components.multi-lan-tab')
                                    <div class="tab-content p-3 text-muted">
                                        @foreach(active_langs() as $lan)
                                            <div class="tab-pane @if($loop->first) active show @endif"
                                                 id="{{ $lan->code }}"
                                                 role="tabpanel">
                                                <div class="form-group row">
                                                    <div class="mb-3">
                                                        <label>@lang('backend.name') <span class="text-danger">*</span></label>
                                                        <input name="name[{{ $lan->code }}]" type="text"
                                                               class="form-control" id="name{{ $lan->code}}"
                                                               required=""
                                                               value="{{ $content->translate($lan->code)->name ?? __('backend.translation-not-found') }}">
                                                        {!! validation_response('backend.name') !!}
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>@lang('backend.content') <span
                                                                class="text-danger">*</span></label>
                                                        <textarea name="content1[{{ $lan->code }}]"
                                                                  id="elm{{$lan->code}}1"
                                                                  class="form-control"
                                                                  required="">{!! $content->translate($lan->code)->content ?? __('backend.translation-not-found') !!}</textarea>
                                                        {!! validation_response('backend.content') !!}
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>@lang('backend.short-description') <span
                                                                class="text-danger">*</span></label>
                                                        <textarea name="short_description[{{ $lan->code }}]"
                                                                  id="elm{{$lan->code}}2"
                                                                  class="form-control"
                                                                  required="">{!! $content->translate($lan->code)->short_description ?? __('backend.translation-not-found') !!}</textarea>
                                                        {!! validation_response('backend.short-description') !!}
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>@lang('backend.title')(Meta)</label>
                                                        <input name="meta_title[{{ $lan->code }}]" type="text"
                                                               class="form-control"
                                                               value="{{$content->translate($lan->code)->meta_title ?? '' }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>@lang('backend.description')(Meta)</label>
                                                        <textarea name="meta_description[{{ $lan->code }}]" type="text"
                                                                  class="form-control" id="elm{{$lan->code}}2"
                                                                  rows="5">{!! $content->translate($lan->code)->meta_description ?? '' !!}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>@lang('backend.alt')</label>
                                                        <textarea name="alt[{{ $lan->code }}]" type="text"
                                                                  class="form-control"
                                                                  rows="5">{{ $content->translate($lan->code)->alt ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="mb-3">
                                            <label>@lang('backend.slug')</label>
                                            <input name="slug" id="slug" type="text" class="form-control" required=""
                                                   value="{{ $content->slug }}">
                                        </div>
                                        <div class="mb-3">
                                            <label>@lang('backend.categories')</label>
                                            <select class="form-control" name="category">
                                                @foreach($mainCategories as $ctgry)
                                                    <optgroup
                                                        label="{{ $ctgry->translate(app()->getLocale())->name ?? __('backend.translation-not-found') }}">
                                                        @foreach($ctgry->subcategories as $subCat)
                                                            <option
                                                                value="{{ $subCat->id }}"
                                                                @if($content->category_id == $subCat->id) selected @endif>{{ $subCat->translate(app()->getLocale())->name ?? __('backend.translation-not-found') }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>PDF</label>
                                            <div class="d-flex align-items-center">
                                                <input name="pdf" type="file" class="form-control "
                                                       accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf">
                                                @if(file_exists($content->pdf))
                                                    <a style="margin-left: 20px" href="{{ asset($content->pdf) }}"
                                                       class="btn btn-primary col-2"><i
                                                            class="fas fa-download"></i> PDF @lang('backend.download')
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label>@lang('backend.photo') <span
                                                    class="text-danger">*</span></label>
                                            <input name="photo" type="file" class="form-control mb-2">
                                            @if(file_exists($content->photo))
                                                <img src="{{ asset($content->photo) }}" class="form-control w-100">
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label>@lang('backend.photos')</label>
                                            <input type="file" class="form-control mb-2" id="photos" name="photos[]"
                                                   multiple>
                                            <div id="image-preview-container" class="d-flex flex-wrap"></div>
                                            @if($content->photos()->exists())
                                                <div class="d-flex"
                                                     style="min-height: 150px; overflow: hidden; margin-bottom: 10px;border: 1px solid black; flex-wrap:wrap">
                                                    @foreach($content->photos()->get() as $photo)
                                                        <div style="position:relative;" class="wraper col-2 m-3">
                                                            <img src="{{ asset($photo->photo) }}"
                                                                 style="height: 200px; width: 200px; object-fit: cover;">
                                                            <a style="position: absolute; right:5px; top:5px"
                                                               type="button" class="btn btn-danger"
                                                               href="{{ route('backend.contentPhotoDelete',$photo->id) }}">X</a>
                                                        </div>
                                                    @endforeach
                                                </div>
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
    @livewireScripts
    @include('backend.templates.components.tiny')
    @include('backend.templates.components.preview-images')
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
@endsection
