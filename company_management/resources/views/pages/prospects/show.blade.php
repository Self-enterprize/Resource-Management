@extends('layouts.app')

@section('content')

    <div class="header bg-gradient-blue pb-8 pt-5 pt-8 m-auto">

        <div class="container-fluid">

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th><strong> Nom du Prospect</strong></th>
                                <td>{{ $prospect->name }}</td>
                            </tr>
                            <tr>
                                <th><strong>Prenom du Prospect</strong></th>
                                <td>{{ $prospect->surname }}</td>
                            </tr>
                            <tr>
                                <th><strong>Status du Prospect</strong></th>
                                <td>
                                    @if($prospect->status === 'pending')
                                        <h6><i class="fas fa-arrow-down text-primary"></i> En attente</h6>
                                    @elseif($prospect->status === 'accepted')
                                        <h6><i class="fas fa-arrow-up text-primary"></i> Validez</h6>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th><strong>Numero de telephone du Prospect</strong></th>
                                <td>{{ $prospect->phoneNumber }}</td>
                            </tr>
{{--                            <tr>--}}

{{--                                <th><strong>Enregistre par</strong></th>--}}
{{--                                <td>{{ $prospect->agent->fullName() }}</td>--}}
{{--                            </tr>--}}
                            <tr>
                                <th><strong>Addresse mail</strong></th>
                                <td>{{ $prospect->email }}</td>
                            </tr>

                            <tr>
                                <th><strong>Etablissement</strong></th>
                                <td>{{ $prospect->school->name }}</td>
                            </tr>

                            <tr>
                                <th><strong>Date D'enregistrement</strong></th>
                                <td>
                                    <h6>{{ $prospect->created_at }}</h6>
                                    {{ $prospect->created_at->diffForHumans() }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row p-3 m-auto">
                <div class="col-6">
                    <button class="btn btn-success btn-block">Validez le Prospect</button>
                </div>
                <div class="col-6">
                    <button class="btn btn-danger btn-block">Supprimez le Prospect</button>
                </div>
            </div>

        </div>

        {{--        @include('layouts.footers.auth')--}}
    </div>
@endsection

@push('js')
    <script>
    </script>
@endpush
