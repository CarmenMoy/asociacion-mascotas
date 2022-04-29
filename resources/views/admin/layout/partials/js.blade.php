@if($agent->isDesktop())
    <script src="{{mix('admin/desktop/js/app.js')}}"></script>
@endif

@if($agent->isMobile())
    <script src="{{mix('admin/mobile/js/app-mobile.js')}}"></script>
@endif

<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
<script>
    WebFont.load({
        google: {
            families: ['Dancing+Script:700,700i', 'Ubuntu+Condensed:400']
        }
    });        
</script>