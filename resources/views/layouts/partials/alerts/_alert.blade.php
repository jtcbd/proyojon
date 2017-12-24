@if(session()->has('success'))
	@component('layouts.partials.alerts._alert', ['type' => 'success'])
		{{ session('success') }}
	@endcomponent
@endif

@if(session()->has('error'))
	@component('layouts.partials.alerts._alert', ['type' => 'danger'])
		{{ session('error') }}
	@endcomponent
@endif