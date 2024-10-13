@extends('layout.dashboard')
@section('main')
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Invoice</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="row p-2">
                            <div class="col-md">

                                <label for="Client">Client</label>
                                <select disabled class="form-select p-1" name="Client" id="Client" aria-label="Client *"
                                    required>
                                    <option value="">{{$invoice->client->name}}</option>

                                </select>
                            </div>
                            <div class="col-md">
                                <label for="date">Invoice date *</label>
                                <input disabled type="text" name='date' class="form-control datepicker border p-1"
                                    id="date" value="{{$invoice->invoice_date}}" required>
                            </div>
                            <div class="col-md">
                                <label for="total_invoice">total</label>
                                <input disabled type="number" name='total_invoice'class="form-control datepicker border p-1"
                                    id="total" value="{{$invoice->total}}" readonly>
                            </div>
                            <div class="col-md">
                                <label for="discount">discount %</label>
                                <input disabled type="number" name="discount" class="form-control datepicker border p-1"
                                    id="discount" value="{{$invoice->discount}}" required>
                            </div>
                            <div class="col-md">
                                <label for="tax">tax %</label>
                                <input disabled type="number" name='tax'class="form-control datepicker border p-1"
                                    id="tax"  value="{{$invoice->tax}}" required>
                            </div>
                            <div class="col-md">
                                <label for="grand_total">Grand total</label>
                                <input disabled type="number" name="grand_total" class="form-control datepicker border p-1"
                                    id="grand_total" value="{{$invoice->grand_total}}"
                                    readonly>
                            </div>
                            <div class="col-md">

                                <label for="Paid">Paid</label>
                                <select disabled class="form-select p-1" name="Paid" id="Paid" aria-label="Paid *"
                                    required>
                                    <option value="{{$invoice->Paid}}" selected>{{$invoice->Paid}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md">
                                <label for="description">description</label>
                                <textarea disabled type="text" name="description" class="form-control  border p-1" id="description" placeholder="description" >{{$invoice->description}}</textarea>
                            </div>

                        </div>
                        <div class="row p-2">
                            <div class="col-md">
                                    <form action="{{route('invoice.destroy',[$invoice->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn bg-gradient-primary w-20">Delete Invoice</button>
                                    </form>
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
                            <h6 class="text-white text-capitalize ps-3">Item table</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2  align-items-center justify-content-center">
                        <div class="table-responsive p-0 ">
                            <table class="table align-items-center justify-content-center mb-0" id="item_table">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            price</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            quantity</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                            total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($invoice->items as $item)

                                    <tr>
                                        <td>

                                            <input disabled type="text" name="name[]" class="form-control datepicker border p-1"
                                                id="name" placeholder="Name" value="{{$item->name}}" required>

                                        </td>
                                        <td>
                                            <input disabled type="number" name="price[]" class="form-control datepicker border p-1"
                                                id="price"  step="0.1" value="{{$item->price}}" required>
                                        </td>
                                        <td>
                                            <input disabled type="number" name="quantity[]"
                                                class="form-control datepicker border p-1" id="quantity" value="{{$item->quantity}}"
                                                required>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <input disabled type="number" name="total[]"
                                                    class="form-control datepicker border p-1" id="total"
                                                    value="{{$item->price*$item->quantity}}" readonly>
                                            </div>
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
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">History table</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2  align-items-center justify-content-center">
                        <div class="table-responsive p-0 ">
                            <table class="table align-items-center justify-content-center mb-0" id="item_table">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">role
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            description</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            created_at</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($invoice->history as $history)
                                    <tr>
                                        <td>

                                            <input disabled type="text" name="name[]" class="form-control datepicker border p-1"
                                                id="name" placeholder="Name" value="{{$history->user->name}}" required>

                                        </td>
                                        <td>

                                            <input disabled type="text" name="name[]" class="form-control datepicker border p-1"
                                                id="name" placeholder="Name" value="{{$history->user->type}}" required>

                                        </td>
                                        <td>
                                            <input disabled type="text" name="price[]" class="form-control datepicker border p-1"
                                                id="price"  value="{{$history->description}}" required>
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
