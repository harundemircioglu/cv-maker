@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="formStorePlanFeature" action="{{ route('plan.feature.store') }}" method="POST">
        @csrf
        <button id="btnStorePlanFeature">Store</button>
    </form>

    @foreach ($planFeatures as $planFeature)
        <form id="formUpdatePlanFeature" action="{{ route('plan.feature.update', ['id' => $planFeature->id]) }}"
            method="POST">
            @csrf
            <button id="btnUpdatePlanFeature">Update</button>
        </form>

        <form id="formDestroyPlanFeature" action="{{ route('plan.feature.destroy', ['id' => $planFeature->id]) }}"
            method="POST">
            @csrf
            <button id="btnDestroyPlanFeature">Destroy</button>
        </form>
    @endforeach
@endsection

@push('scripts')
    <script>
        $('#btnStorePlanFeature').click(function() {
            $(this).prop('disabled', true);
            $('#formStorePlanFeature').submit();
        });
    </script>

    <script>
        $('#btnUpdatePlanFeature').click(function() {
            $(this).prop('disabled', true);
            $('#formUpdatePlanFeature').submit();
        });
    </script>

    <script>
        $('#btnDestroyPlanFeature').click(function() {
            $(this).prop('disabled', true);
            $('#formDestroyPlanFeature').submit();
        });
    </script>
@endpush
