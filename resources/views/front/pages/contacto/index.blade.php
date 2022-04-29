@extends('front.layout.master')

@section("content")
    @if($agent->isDesktop())
        <div class="page-section">
            @include("front.pages.contacto.desktop.contacto")
        </div>
    @endif

    @if($agent->isMobile())
        <div class="page-section">
            @include("front.pages.contacto.mobile.contacto")
        </div>
    @endif
@endsection