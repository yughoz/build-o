{{-- Vendor Scripts --}}
<script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/ui/prism.min.js') }}"></script>
@yield('vendor-script')

{{-- Theme Scripts --}}
<script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('app-assets/js/core/app.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/components.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/customizer.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/footer.js') }}"></script>
{{-- page script --}}
@yield('page-script')
{{-- page script --}}
