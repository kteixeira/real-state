@extends('layouts.home')
@push('scripts')
    <script type="application/javascript">
        var getFormatedRealStates = '{{ action('RealStatesController@getFormatted') }}';
        var createProperty = '{{ action('PropertiesController@store') }}';
    </script>
@endpush
@section('content')
    <div class="card">
        <div class="card-body row">
            <h4 class="card-title col-11">Imóveis</h4>
            <button class="btn btn-primary col-1 float-right" id="createProperty">Adicionar</button>
        </div>
    </div><br>
    <table id="properties" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Descrição</th>
            <th>Endereço</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Descrição</th>
            <th>Endereço</th>
        </tr>
        </tfoot>
    </table>
@endsection
@push('scripts')
    <script type="text/javascript" charset="utf8" src="{{ asset('js/property.js') }}"></script>
@endpush