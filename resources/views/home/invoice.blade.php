@extends('layout.dashboard')
@section('main')

        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Add Invoice</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="row p-2">
                            <div class="col-md">

                                <label for="Client">Client </label>
                                <select class="form-select p-1" name="search_Client" id="search_Client" aria-label="Client *">
                                    <option value="">all</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md">

                                <label for="Client">Paid </label>
                                <select class="form-select p-1" name="search_Paid" id="search_Paid" aria-label="Client *">
                                    <option value="">all</option>
                                    <option value="Unpaid">Unpaid</option>
                                    <option value="Paid">Paid</option>
                                </select>
                            </div>
                            <div class="col-md">
                                <label for="date">Invoice date</label>
                                <input type="text" name='search_date' class="form-control datepicker border p-1"
                                    id="search_date" placeholder="All" >
                            </div>
                            <div class="col-md">
                                <label for="search_id">search by id</label>
                                <input type="text" name='search_id'class="form-control datepicker border p-1"
                                    id="search_id"  >
                            </div>
                            <div class="col-md">

                                <button class="btn bg-gradient-primary w-50" id='Search'>Search</button>
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Invoice id
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">client`s name
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">client`s phone
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            total</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            discount</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            tax</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            grand total</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Paid</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            description</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Invoice date</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            created at</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

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
        $(document).ready(function() {
                var table = $('#datatable').DataTable({
                    dom: "<'top'f>rt<'row'<'col-2'i><'col-1'l><'col-9'p>>",
                    searching: false,
                    responsive: true,
                    autoWidth: false,
                    processing: true,
                    serverSide: true,
                    lengthMenu: [
                        [10,20, 100, 500, -1],
                        [10,20, 100, 500, "All"]
                    ],
                    language: {
                        paginate: {
                            previous: "<i class='material-icons opacity-10'>chevron_left</i>",
                            next: "<i class='material-icons opacity-10'>chevron_right</i>",
                        }
                    },
                    ajax: {
                        url: "{{ route('invoice.index') }}",
                        data: function(d) {
                            d.search_Client = $('#search_Client').val();
                            d.search_Paid = $('#search_Paid').val();
                            d.search_date = $('#search_date').val();
                            d.search_id = $('#search_id').val();
                            console.log( d.search_Client)
                            console.log( d.search_Paid)
                            console.log( d.search_date)
                            console.log( d.search_id)
                        },

                    },
                    success: function(d) {
        console.log("Response Data:", d);
    },
                    // success:function(d){
                    //     console.log("d")
                    //     console.log(d)
                    // },
                    columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                        {
                            data: 'id',
                            name: 'id',

                        },
                        {
                            data: 'client.name',
                            name: 'client.name',

                        },
                        {
                            data: 'client.phone',
                            name: 'client.phone',

                        },
                        {
                            data: 'total',
                            name: 'total',
                        },
                        {
                            data: 'discount',
                            name: 'discount',
                        },
                        {
                            data: 'tax',
                            name: 'tax',
                        },
                        {
                            data: 'grand_total',
                            name: 'grand_total',
                        },
                        {
                            data: 'Paid',
                            name: 'Paid',
                        },
                        {
                            data: 'description',
                            name: 'description',
                            render: function(data, type, full, meta) {
                            if (data) {
                                return data;
                            } else {
                                return "-";
                            }
                        }
                        },
                        {
                            data: 'date',
                            name: 'date',
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],
                });

                $('#Search').click(function() {
                    console.log("sd");
                    table.draw();

                });
            });

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
    <script>
    </script>
@endsection
