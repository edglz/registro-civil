<!--begin::Chart widget 24-->
<div class="card card-flush overflow-hidden h-xl-100">
	<!--begin::Header-->
	<div class="card-header py-5">
		<!--begin::Title-->
		<h3 class="card-title align-items-start flex-column">
			<span class="card-label fw-bold text-dark">Human Resources</span>
			<span class="text-gray-400 mt-1 fw-semibold fs-6">Reports by states and ganders</span>
		</h3>
		<!--end::Title-->
		<!--begin::Toolbar-->
		<div class="card-toolbar">
			<!--begin::Menu-->
			<button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
				<!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
				<span class="svg-icon svg-icon-1">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor" />
						<rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
						<rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
						<rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
					</svg>
				</span>
				<!--end::Svg Icon-->
			</button>
			@include('partials/menus/_menu-2')
			<!--end::Menu-->
		</div>
		<!--end::Toolbar-->
	</div>
	<!--end::Header-->
	<!--begin::Card body-->
	<div class="card-body pt-0">
		<!--begin::Chart-->
		<div id="kt_charts_widget_24" class="min-h-auto" style="height: 300px"></div>
		<!--end::Chart-->
	</div>
	<!--end::Card body-->
</div>
<!--end::Chart widget 24-->