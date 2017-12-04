@extends('layouts.home')
@push('scripts')
    <script type="application/javascript">
        var create = '{{ action('RealStatesController@store') }}';
    </script>
@endpush
@section('content')
    <div class="card">
        <div class="card-body row">
            <h4 class="card-title col-11">Imobiliárias</h4>
            <button class="btn btn-primary col-1 float-right" id="createRealState">Adicionar</button>
        </div>
    </div><br>
    <table id="realStates" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
        </tr>
        </tfoot>
    </table>
@endsection
@push('scripts')
    <script type="text/javascript" charset="utf8" src="{{ asset('js/realState.js') }}"></script>
@endpush