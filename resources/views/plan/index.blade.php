@extends('layouts.app')

@section('content')
@endsection

@push('scripts')
    @foreach ($plans as $plan)
        <h3>{{ $plan->name }}</h3>
    @endforeach

    <a href="{{ route('plan.feature.index') }}">Features</a>
@endpush
