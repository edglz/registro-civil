<!--begin::Header-->
<div id="kt_app_header" class="app-header">
    <!--begin::Header container-->
    <div class="app-container container-xxl d-flex align-items-stretch justify-content-between">
        <!--begin::Logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
            <a href="/">
                @php $bodyAttribute = getHtmlAttribute('body', 'data-kt-app-layout') @endphp
                @if ($bodyAttribute === 'dark-header')
                    <img alt="Logo" src="{{ image('logos/default-dark.svg') }}" class="h-20px h-lg-30px theme-light-show"/>
                @elseif($bodyAttribute === 'light-header')
                    <img alt="Logo" src="{{ image('logos/default.svg') }}" class="theme-light-show h-20px h-lg-30px theme-light-show"/>
                    <img alt="Logo" src="{{ image('logos/default-dark.svg') }}" class="theme-dark-show h-20px h-lg-30px theme-light-show"/>
                @endif
            </a>
        </div>
        <!--end::Logo-->
        <!--begin::Header wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">

            @include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/header-layout/header._menu._menu')

            @include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/header-layout/header/_navbar')

        </div>
        <!--end::Header wrapper-->
    </div>
    <!--end::Header container-->
</div>
<!--end::Header-->
