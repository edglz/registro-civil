<x-auth-layout>

    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="/" action="login">
        @csrf
        <!--begin::Heading-->
        <a href="/" class="mb-12">
        <img src="https://scontent.fcuz1-1.fna.fbcdn.net/v/t39.30808-6/320738538_1217829212489305_4608080251686942768_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=730e14&_nc_eui2=AeF-MeqPtbHwOAmBtapei1JcPh0uxh1dk04-HS7GHV2TTtDrySDQ-g9GvVxsyw0tnlzQj-VNoWx0JAejTfwe-ADn&_nc_ohc=nBaGJVKfT4kAX9WzKue&_nc_ht=scontent.fcuz1-1.fna&oh=00_AfCxId5htC7WIqXTE4rTSgRVDrCj69tzR0aOA0EPSvTyCw&oe=63A548C1" class="max-h-75px" alt="" />

                    </a>
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">
                Registro Civil
            </h1>
            <!--end::Title-->

            <!--begin::Subtitle-->

            <!--end::Subtitle--->
        </div>
        <!--begin::Heading-->

        <!--begin::Login options-->

        <!--end::Login options-->

        <!--begin::Separator-->
        <div class="separator separator-content my-14">
            <span class="w-125px text-gray-500 fw-semibold fs-7">Ingresa tu cuenta</span>
        </div>
        <!--end::Separator-->

        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" value="demo@demo.com"/>
            <!--end::Email-->
        </div>

        <!--end::Input group--->
        <div class="fv-row mb-3">
            <!--begin::Password-->
            <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" value="demo"/>
            <!--end::Password-->
        </div>
        <!--end::Input group--->

        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>

            <!--begin::Link-->
            <a href="/forgot-password" class="link-primary">
                Olvidaste tu contraseña?
            </a>
            <!--end::Link-->
        </div>
        <!--end::Wrapper-->

        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                @include('partials/general/_button-indicator', ['label' => 'Sign In'])
            </button>
        </div>
        <!--end::Submit button-->

        <!--begin::Sign up-->

        <!--end::Sign up-->
    </form>
    <!--end::Form-->

</x-auth-layout>
