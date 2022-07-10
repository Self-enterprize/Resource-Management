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
                                    <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#createComplaintModal">Nouvelle Plainte</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive bg-translucent-secondary">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
{{--                                <th>Nom du RH</th>--}}
                                <th>Object</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tdody>
                                @forelse($complaints as $complaint)
                                    <tr>
                                        <td> {{ $complaint->id }} </td>
{{--                                        <td> {{ $complaint->manager->fullName() }} </td>--}}
                                        <td class="text-body"><strong> {{ $complaint->title }} </strong> </td>
                                        <td>
                                            @if($complaint->status === 'pending')
                                                <h5><i class="fas fa-arrow-down text-primary"></i> En attente </h5>
                                            @elseif($complaint->status === 'validate')
                                                <h5><i class="fas fa-arrow-up text-success"></i> Pris en consideration </h5>
                                            @elseif($complaint->status === 'non_validate')
                                                <h5><i class="fas fa-arrow-down text-danger"></i> Non Lieu </h5>
                                            @endif
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{ $complaint->created_at }}</h6>
                                            {{ $complaint->created_at->diffForHumans() }}</td>
                                        <td>
                                        <td>
                                            {{--                                            <a href="{{ route('admin.transactions.show', ['transaction_id'=>$transaction->id]) }}">--}}
                                            <a href="{{ route('complaints.show', ['complaint_id'=>$complaint->id]) }}">
                                                <span class="fa fa-angle-double-right"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="7">Aucune plainte trouvee</td>
                                    </tr>
                                @endforelse
                            </tdody>
                        </table>
                        {{--                        {{ $transactions->links() }}--}}
                    </div>

                    <!-- Create New Complaint -->
                    <div id="createComplaintModal" class="modal fade">
                        <div class="modal-dialog">
                            <form action="{{ route('complaints.store') }}"
                                  method="POST">
                                @csrf

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Creez une plainte</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" name="object"
                                                   value="{{ old('object') }}"
                                                   placeholder="Object"
                                                   class="form-control @error('object') is-invalid @enderror">
                                            @error('object')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <textarea type="text" name="message" placeholder="Message" rows="7" class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                                            @error('message')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Envoyez</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection

@push('js')
    <script>
        $(function () {
            @if(count($errors) > 0)
            $('#createComplaintModal').modal('show');
            @endif
        });
    </script>
@endpush
