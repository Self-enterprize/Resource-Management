@extends('layouts.app')

@section('content')

    <div class="header bg-gradient-blue pb-8 pt-5 pt-8 m-auto">

        <div class="container-fluid">

            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12 d-flex no-block align-items-center">
                            <div class="ml-auto text-right">
                                <a href="#">
                                    <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#createProspectModal">Ajouter Prospect</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive bg-translucent-secondary">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Numero de telephone</th>
                                <th>Status</th>
{{--                                <th>Nom de l'Agent</th>--}}
{{--                                <th>Addresse email</th>--}}
                                <th>Etablissement</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tdody>
                                @forelse($prospects as $prospect)
                                    <tr>
                                        <td> {{ $prospect->id }} </td>
                                        <td>{{ $prospect->name }}</td>
                                        <td>{{ $prospect->surname }}</td>
                                        <td>{{ $prospect->phoneNumber }}</td>
                                        <td>
                                            @if($prospect->status === 'pending')
                                                <h6><i class="fas fa-arrow-down text-primary"></i> En attente</h6>
                                            @elseif($prospect->status === 'accepted')
                                                <h6><i class="fas fa-arrow-up text-primary"></i> Validez</h6>
                                            @endif
                                        </td>
{{--                                        <td>{{ $prospect->agent->fullName() }}</td>--}}
{{--                                        <td>{{ $prospect->email }}</td>--}}
                                        <td>{{ $prospect->school->name }}</td>
                                        <td>
                                            <h6 class="mb-0">{{ $prospect->created_at }}</h6>
                                            {{ $prospect->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('prospects.show', ['prospect_id'=>$prospect->id]) }}">
                                                <span class="fa fa-angle-double-right"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="7">Aucun prospect trouve</td>
                                    </tr>
                                @endforelse
                            </tdody>
                        </table>
{{--                        {{ $transactions->links() }}--}}
                    </div>

                    <!-- Create New Prospect -->
                    <div id="createProspectModal" class="modal fade">
                        <div class="modal-dialog">
                            <form action="{{ route('prospects.store') }}"
                                  method="POST">
                                @csrf

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Creez un nouveau prospect </h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" name="name"
                                                   value="{{ old('name') }}"
                                                   placeholder="Nom"
                                                   class="form-control @error('name') is-invalid @enderror">
                                            @error('object')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="surname"
                                                   value="{{ old('surname') }}"
                                                   placeholder="Prenom"
                                                   class="form-control @error('surname') is-invalid @enderror">
                                            @error('surname')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="email"
                                                   value="{{ old('email') }}"
                                                   placeholder="Addresse email"
                                                   class="form-control @error('email') is-invalid @enderror">
                                            @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <select name="school_id"
                                                    class="form-control @error('school_id') is-invalid @enderror">
                                                <option value="">Selectionnez l'ecole</option>

                                                    @foreach($schools as $school)
                                                        <option value="{{ $school->id }}"
                                                            {{ old('school_id') == $school->id ? 'selected' : '' }}>
                                                            {{ \Illuminate\Support\Str::upper($school->name) }}</option>
                                                    @endforeach

                                            </select>
                                            @error('school_id')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="phoneNumber"
                                                   value="{{ old('phoneNumber') }}"
                                                   placeholder="Numero de telephone"
                                                   class="form-control @error('phoneNumber') is-invalid @enderror">
                                            @error('phoneNumber')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Ajoutez</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>

{{--        @include('layouts.footers.auth')--}}
    </div>
@endsection

@push('js')
    <script>
        $(function () {
            @if(count($errors) > 0)
            $('#createProspectModal').modal('show');
            @endif
        });
    </script>
@endpush
