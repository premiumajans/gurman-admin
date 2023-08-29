<div class="vertical-menu">
    <div data-simplebar class="h-100" style="overflow-y: auto;">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                {{--                {{ creation('Gallery','Gallery',true,false) }}--}}
                <li>
                    <a href="{{ route('backend.dashboard') }}" class="waves-effect">
                        <i class="ri-home-4-fill"></i>
                        <span>@lang('backend.dashboard')</span>
                    </a>
                </li>
                <li class="menu-title">@lang('backend.site-setting')</li>
                @can('slider index')
                    <li>
                        <a href="{{ route('backend.slider.index') }}" class="waves-effect">
                            <i class="fas fa-sliders-h"></i>
                            <span>@lang('backend.slider')</span>
                        </a>
                    </li>
                @endcan
                @can('categories index')
                    <li>
                        <a href="{{ route('backend.categories.index') }}" class="waves-effect">
                            <i class="fas fa-bars"></i>
                            <span>@lang('backend.categories')</span>
                        </a>
                    </li>
                @endcan
                @can('product index')
                    <li>
                        <a href="{{ route('backend.product.index') }}" class="waves-effect">
                            <i class="fas fa-file"></i>
                            <span>@lang('backend.product')</span>
                        </a>
                    </li>
                @endcan
                @can('gallery index')
                    <li>
                        <a href="{{ route('backend.gallery.index') }}" class="waves-effect">
                            <i class="fas fa-images"></i>
                            <span>@lang('backend.gallery')</span>
                        </a>
                    </li>
                @endcan
                @can('partner index')
                    <li>
                        <a href="{{ route('backend.partner.index') }}" class="waves-effect">
                            <i class="fas fa-link"></i>
                            <span>@lang('backend.partner')</span>
                        </a>
                    </li>
                @endcan
                {{--                @can('blog index')--}}
                {{--                    <li>--}}
                {{--                        <a href="{{ route('backend.blog.index') }}" class="waves-effect">--}}
                {{--                            <i class="fas fa-blog"></i>--}}
                {{--                            <span>@lang('backend.blog')</span>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}
                {{--                @endcan--}}
{{--                @can('about index')--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('backend.about.index') }}" class="waves-effect">--}}
{{--                            <i class="fas fa-info"></i>--}}
{{--                            <span>@lang('backend.about')</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endcan--}}
                @can('meta index')
                    <li>
                        <a href="{{ route('backend.meta.index') }}" class="waves-effect">
                            <i class="fas fa-tags"></i>
                            <span>@lang('backend.meta')</span>
                        </a>
                    </li>
                @endcan
                @can('languages index')
                    <li>
                        <a href="{{ route('backend.site-languages.index') }}" class="waves-effect">
                            <i class="fas fa-language"></i>
                            <span>@lang('backend.languages')</span>
                        </a>
                    </li>
                @endcan
                @can('contact index')
                    <li>
                        <a href="{{ route('backend.contact-us.index') }}" class="waves-effect">
                            <i class="ri-contacts-fill"></i>
                            <span>@lang('backend.contact-us')</span>
                        </a>
                    </li>
                @endcan
                @can('settings index')
                    <li>
                        <a href="{{ route('backend.settings.index') }}" class="waves-effect">
                            <i class="ri-settings-2-fill"></i>
                            <span>@lang('backend.settings')</span>
                        </a>
                    </li>
                @endcan
                <li class="menu-title">@lang('backend.ap-setting')</li>
                @can('users index')
                    <li>
                        <a href="{{ route('backend.users.index') }}" class=" waves-effect">
                            <i class="ri-account-circle-fill"></i>
                            <span>@lang('backend.users')</span>
                        </a>
                    </li>
                @endcan
                @can('permissions index')
                    <li>
                        <a href="{{ route('backend.permissions.index') }}" class=" waves-effect">
                            <i class="ri-lock-2-fill"></i>
                            <span>@lang('backend.permissions')</span>
                        </a>
                    </li>
                @endcan
                @can('report index')
                    <li>
                        <a href="{{ route('backend.report') }}" class="waves-effect">
                            <i class="fas fa-file"></i>
                            <span>@lang('backend.report')</span>
                        </a>
                    </li>
                @endcan
                @can('dodenv index')
                    <li>
                        <a target="_blank" href="{{ url('admin/env') }}" class="waves-effect">
                            <i class="fab fa-envira"></i>
                            <span>@lang('backend.dod-env')</span>
                        </a>
                    </li>
                @endcan
                @can('dodenv index')
                    <li>
                        <a target="_blank" href="{{ url('admin/generate-sitemap') }}" class="waves-effect">
                            <i class="fas fa-sitemap"></i>
                            <span>@lang('backend.generate-sitemap')</span>
                        </a>
                    </li>
                @endcan
                @can('languages index')
                    <li>
                        <a target="_blank" href="{{ url('admin/manage-languages') }}" class="waves-effect">
                            <i class="fas fa-flag"></i>
                            <span>@lang('backend.language-panel')</span>
                        </a>
                    </li>
                @endcan
                <li class="menu-title">@lang('backend.user-setting')</li>
                <li>
                    <a href="{{ route('backend.informations.index') }}" class=" waves-effect">
                        <i class="ri-information-fill"></i>
                        <span>@lang('backend.informations')</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
