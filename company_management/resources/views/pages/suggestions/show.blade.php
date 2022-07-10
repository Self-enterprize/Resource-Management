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
                                <th><strong> Object de la suggestion</strong></th>
                                <td>{{ $suggestion->title }}</td>
                            </tr>
                            <tr>
                                <th><strong>Corps de la suggestion</strong></th>
                                <td>{{ $suggestion->message }}</td>
                            </tr>

                            <tr>
                                <th><strong>Status de la suggestion</strong></th>
                                <td>
                                    @if($suggestion->status === 'pending')
                                        <h5><i class="fas fa-arrow-down text-primary"></i> En attente </h5>
                                    @elseif($suggestion->status === 'validate')
                                        <h5><i class="fas fa-arrow-up text-success"></i> Pris en consideration </h5>
                                    @elseif($suggestion->status === 'non_validate')
                                        <h5><i class="fas fa-arrow-down text-danger"></i> Non Lieu </h5>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th><strong>Date D'enregistrement</strong></th>
                                <td>
                                    <h6>{{ $suggestion->created_at }}</h6>
                                    {{ $suggestion->created_at->diffForHumans() }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row p-3 m-auto">
                <div class="col-6">
                    <button class="btn btn-success btn-block">Considerez</button>
                </div>
                <div class="col-6">
                    <button class="btn btn-danger btn-block">Non Lieu</button>
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
