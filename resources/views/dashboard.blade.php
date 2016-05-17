@extends('common.base')
@section('content')
<div class="row">
    <canvas id="donations"></canvas>
    <canvas id="trophins-history"></canvas>
</div>
@endsection
@push('tail-scripts')
<script src="{{ asset('/components/Chart.js/dist/Chart.js') }}"></script>
<script src="{{ asset('/assets/js/dashboard.js') }}"></script>
@endpush
