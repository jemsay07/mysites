<script src="{{ asset('js/app.js') }}" defer></script>
@if ( Auth::check() )

    <script src="{{ asset('js/bootstrap-datetimepicker.js') }}" defer></script>
    <script src="{{ asset('js/admin-general.js') }}" defer></script>

	@if ( request()->is('users*') )
		<script src="{{ asset('js/admin-user.js') }}" defer></script>
	@endif

	@if ( request()->is('settings*') )
		<script src="{{ asset('js/admin-settings.js') }}" defer></script>
	@endif

	@if ( request()->is('media*') )
		<script src="{{ asset('js/admin-media.js') }}" defer></script>
	@endif

@endif
