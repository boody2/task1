@extends('layout.dashboard')
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Client</h6>
                    </div>
                </div>

                <div class="card-body px-0 pb-2">
                    <div class="row p-2  align-items-center justify-content-center">
                        <div class="col-md">
                            <label for="name">name *</label>
                            <input disabled value="{{ $client->name }}" type="text"
                                name='name'class="form-control border p-1" id="name" required>
                        </div>
                        <div class="col-md">
                            <label for="email">email *</label>
                            <input disabled value="{{ $client->email }}" type="email" name="email"
                                class="form-control  border p-1" id="email" required>
                        </div>
                        <div class="col-md">
                            <label for="phone">phone *</label>
                            <input disabled value="{{ $client->phone }}" type="text"
                                name='phone'class="form-control  border p-1" id="phone" required>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Invoices table</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2  align-items-center justify-content-center">
                    <div class="table-responsive p-0 ">
                        <table class="table align-items-center justify-content-center mb-0" id="datatable">
                            <thead>
                                <tr>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Invoice
                                        id
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        total</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        discount</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        tax</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        grand total</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Paid</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        description</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Invoice date</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        created at</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($client->invoices as $invoice)
                                    <tr>
                                        <td
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ $invoice->id }}</td>
                                        <td
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ $invoice->total }}</td>
                                        <td
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ $invoice->discount }}</td>
                                        <td
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ $invoice->tax }}</td>
                                        <td
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ $invoice->grand_total }}</td>
                                        <td
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ $invoice->Paid }}</td>
                                        <td
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ $invoice->description }}</td>
                                        <td
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ $invoice->invoice_date }}</td>
                                        <td
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ $invoice->created_at }}</td>
                                        <td><a href="{{ route('invoice.show', [$invoice->id]) }}"><i
                                                    class="material-icons opacity-10 m-2">view_in_ar</i></a><a
                                                href="{{ route('invoice.edit', [$invoice->id]) }}"><i
                                                    class="material-icons opacity-10 m-2">edit</i></a>

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
    @error('name')
        <script>
            console.log("ss");
            toastr.error("{{ $message }}", 'Failed');
        </script>
    @enderror
    @error('email')
        <script>
            console.log("ss");
            toastr.error("{{ $message }}", 'Failed');
        </script>
    @enderror
    @error('phone')
        <script>
            console.log("ss");
            toastr.error("{{ $message }}", 'Failed');
        </script>
    @enderror

    <script>
        new AirDatepicker('.datepicker', {
            locale: {
                months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ],
                monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                weekdays: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                weekdaysShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                weekdaysMin: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
                firstDay: 0
            },
            dateFormat: 'dd/MM/yyyy',
            onShow: function() {
                setTimeout(() => {
                    // Modify day names
                    const dayNames = document.querySelectorAll('.air-datepicker-body--day-name');
                    const customDayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

                    dayNames.forEach((dayName, index) => {
                        dayName.textContent = customDayNames[index];
                    });
                }, 100);
            }
        });
    </script>
@endsection
