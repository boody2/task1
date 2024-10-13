@extends('layout.dashboard')
@section('main')

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">History</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2  align-items-center justify-content-center">
                    <div class="table-responsive p-0 ">
                        <table class="table align-items-center justify-content-center mb-0" id="datatable">
                            <thead>
                                <tr>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        id
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Invoice
                                        id
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        client</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        employee</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        action</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        created at</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($histories as $history)
                                    <tr>
                                        <td
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ $history->id }}</td>
                                        <td
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ $history->invoice->id }}</td>
                                        <td
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ $history->invoice->client->name }}</td>
                                        <td
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ $history->user->name }}</td>
                                        <td
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ $history->description }}</td>
                                        <td
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ $history->created_at }}</td>
                                        <td><a href="{{ route('invoice.show', [$history->invoice->id]) }}"><i
                                                    class="material-icons opacity-10 m-2">view_in_ar</i></a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}", 'Success');
        </script>
    @endif
@endsection
