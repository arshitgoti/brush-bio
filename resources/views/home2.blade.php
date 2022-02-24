@extends('layouts.frontend')

@section('content')
<div class="mobile-wrapper">
    <div class="head">
        <a href="#" class="logo">
            <img src="{{ asset('images/logo.png') }}" />
        </a>
    </div>
    <div class="user-detail">
        @if ($user->profile_picture()->exists())
            <img class="avatar" src="{{ Storage::url($user->profile_picture->profile_picture); }}" />
        @endif
        <h4>{{$user->name}}</h4>
        @if ($user->user_bio()->exists())
            <p>Age: {{$user->user_bio->age}} <br>{{$user->user_bio->country}}</p>
        @endif

        <div class="icon-group">
            @if ($user->user_call()->exists())
                <a class="phone_call" href="tel:{{$user->user_call->call}}">Call</a>
            @endif

            @if ($user->user_vcard()->exists())
                <a class="add_contact" href="{{route('user.vcard.download.guest', $user->user_vcard->id)}}">Save Contact</a>
            @endif
        </div>
        <div class="about-bio">
            @if ($user->user_bio()->exists())
                <h5 class="title">About me</h5>
                <div class="about-bio-description">
                    {{$user->user_bio->bio_content}}
                </div>
            @endif
            @if ($user->user_bio()->exists())
                <div class="represented">
                    <h5 class="represented_title">Represented by</h5>
                    <a href="{{$user->user_bio->gallery_url}}" target="_blank">{{$user->user_bio->gallery_name}}</a>
                </div>
            @endif
        </div>
        <div class="overview-listing">
            <h5 class="title">Contact Details</h5>
            @if ($user->user_email()->exists())
                <div class="overview-item">
                    <div class="overview-detail">
                        <span>Email</span>
                        <a href="mailto:{{$user->user_email->email}}"><small>{{$user->user_email->email}}</small></a>
                    </div>
                    <a class="overview-icon" href="mailto:{{$user->user_email->email}}">
                        <i class="icon bg_orange">
                            <img src="{{ asset('images/envelope.svg') }}">
                        </i>
                    </a>
                </div>
            @endif
            @if ($user->user_website()->exists())
                <div class="overview-item">
                    <div class="overview-detail">
                        <span>Website</span>
                        <small>{{$user->user_website->website}}</small>
                    </div>
                    <a class="overview-icon" target="_blank" href="{{$user->user_website->website}}">
                        <i class="icon bg_purple">
                            <img src="{{ asset('images/globe.svg') }}">
                        </i>
                    </a>
                </div>
            @endif
            @if ($user->user_whatsapp()->exists())
            <div class="overview-item">
                <div class="overview-detail">
                    <span>Whatsapp</span>
                    <small>{{$user->user_whatsapp->whatsapp}}</small>
                </div>
                <a class="overview-icon" href="https://api.whatsapp.com/send?phone={{$user->user_whatsapp->whatsapp}}&text=Hi%20There!">
                    <i class="icon bg_green">
                        <img src="{{ asset('images/whatsapp.svg') }}">
                    </i>
                </a>
            </div>
            @endif
            @if ($user->user_sms()->exists())
                <div class="overview-item">
                    <div class="overview-detail">
                        <span>SMS</span>
                        <small>{{$user->user_sms->sms}}</small>
                    </div>
                    <a class="overview-icon" href="sms:9924769236">
                        <i class="icon bg_sms">
                            <img src="{{ asset('images/sms.svg') }}">
                        </i>
                    </a>
                </div>
            @endif
        </div>
        @if ($user->portfolio_urls()->exists())
            <div class="my-work">
                <h5 class="title">My work</h5>
                <div class="overview-item" onclick="togglePortfolio()">
                    <div class="overview-detail">
                        <span>Portfolio</span>
                        <!--<small>www.johndoe.com</small>-->
                    </div>
                    <span class="overview-icon">
                        <i class="icon bg_portfolio">
                            <img src="{{ asset('images/globe.svg') }}">
                        </i>
                    </span>
                </div>
            </div>
        @endif
        @if ($user->user_social_url()->exists())
        <div class="social">
            <h5 class="title">social</h5>
            <div class="icon-group">

                    @if ($user->user_social_url->facebook)
                    <a class="overview-icon" target="_blank" href="{{$user->user_social_url->facebook}}">
                        <i class="icon bg_facebook">
                            <img src="{{ asset('images/facebook.svg') }}">
                        </i>
                    </a>
                    @endif
                    @if ($user->user_social_url->twitter)
                    <a class="overview-icon" target="_blank" href="{{$user->user_social_url->twitter}}">
                        <i class="icon bg_twitter">
                            <img src="{{ asset('images/twitter.svg') }}">
                        </i>
                    </a>
                    @endif
                    @if ($user->user_social_url->linkedin)
                        <a class="overview-icon" target="_blank" href="{{$user->user_social_url->linkedin}}">
                            <i class="icon bg_linkedin">
                                <img src="{{ asset('images/linkedin.svg') }}">
                            </i>
                        </a>
                    @endif
                    @if ($user->user_social_url->instagram)
                        <a class="overview-icon" target="_blank" href="{{$user->user_social_url->instagram}}">
                            <i class="icon bg_insta">
                                <img src="{{ asset('images/instagram.svg') }}">
                            </i>
                        </a>
                    @endif
                    @if ($user->user_social_url->snapchat)
                        <a class="overview-icon" target="_blank" href="{{$user->user_social_url->snapchat}}">
                            <i class="icon bg_snapchat">
                                <img src="{{ asset('images/snapchat.svg') }}">
                            </i>
                        </a>
                    @endif
                    @if ($user->user_social_url->youtube)
                        <a class="overview-icon" target="_blank" href="{{$user->user_social_url->youtube}}">
                            <i class="icon bg_youtube">
                                <img src="{{ asset('images/youtube.svg') }}">
                            </i>
                        </a>
                    @endif
                    @if ($user->user_social_url->behance)
                        <a class="overview-icon" target="_blank" href="{{$user->user_social_url->behance}}">
                            <i class="icon bg_behance">
                                <img src="{{ asset('images/benace.svg') }}">
                            </i>
                        </a>
                    @endif

            </div>
        </div>
        @endif
    </div>
</div>
<div class="modal-m" id="portfolio">
    <div class="overlay" onclick="togglePortfolio()"></div>
    <div class="modal-content">
        <button class="close-modal" onclick="togglePortfolio()">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
              </svg>
        </button>
        <h3>Portfolio</h3>
        <ul class="portfolio_item">
            @if ($user->portfolio_urls()->exists())
                @foreach ($user->portfolio_urls as $p_url)
                    <li><a href="{{$p_url->url}}">{{$p_url->title}}</a></li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
@endsection
