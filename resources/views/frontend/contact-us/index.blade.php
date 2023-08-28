@extends('master.frontend')
@section('title',__('title.contact'))
@section('front')
    <div
        class="contact-section section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
{{--                    <div class="section-title text-left">--}}
{{--                        <span>Start a new project?</span>--}}
{{--                        <h1>Get in touch with us</h1>--}}
{{--                    </div>--}}
                    <div class="single-address mb-30">
                        <h3>@lang('backend.zuhur')</h3>
                        <ul>
                            <li>
                                <i class="fa fa-map-marker"></i><span>{{ settings('address_'.app()->getLocale()) }}</span>
                            </li>
                            <li><i class="fa fa-envelope-o"></i><span>{{ settings('email') }}</span></li>
                            <li><i class="fa fa-phone-square"></i><span>{{ settings('phone') }}</span></li>
                        </ul>
                    </div>
                    <!--Single Address End-->
                    <div class="footer-social contact-social">
                        <a href="#" class="facebook" data-toggle="tooltip" title="" data-original-title="Facebook"><i
                                class="fa fa-facebook-square"></i></a>
                        <a href="#" class="twitter" data-toggle="tooltip" title="" data-original-title="Twitter"><i
                                class="fa fa-twitter"></i></a>
                        <a href="#" class="instagram" data-toggle="tooltip" title="" data-original-title="Instagram"><i
                                class="fa fa-instagram"></i></a>
                        <a href="#" class="dribbble" data-toggle="tooltip" title="" data-original-title="Dribbble"><i
                                class="fa fa-dribbble"></i></a>
                        <a href="#" class="pinterest" data-toggle="tooltip" title="" data-original-title="Pinterest"><i
                                class="fa fa-pinterest"></i></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact-form-wrap">
                        <h2 class="contact-title">@lang('backend.contact-us')</h2>
                        <form id="contact-form1"
                              action="{{ route('frontend.sendMessage') }}"
                              method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <input name="name" placeholder="@lang('backend.name')" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <input name="phone" placeholder="@lang('backend.phone')" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <input name="email" placeholder="@lang('backend.email')" type="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-style mb-20">
                                        <input name="subject" placeholder="@lang('backend.subject')" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-form-style">
                                        <textarea name="message" placeholder="@lang('backend.message')"></textarea>
                                        <button class="btn" type="submit">@lang('backend.send-message')</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="google-map-area section">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12155.933043634137!2d49.8464878!3d40.3870636!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307de0a9364ac1%3A0x3c582f3cbc30fee9!2sZ%C3%BChur%20Group!5e0!3m2!1sen!2saz!4v1690723411798!5m2!1sen!2saz"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection

