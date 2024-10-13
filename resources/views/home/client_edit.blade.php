@extends('layout.dashboard')
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Update Client</h6>
                    </div>
                </div>
                <form action="{{ route('client.update',[$client->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body px-0 pb-2">
                        <div class="row p-2  align-items-center justify-content-center">
                            <div class="col-md">
                                <label for="name">name *</label>
                                <input type="text" name='name'class="form-control border p-1" id="name" value="{{$client->name}}" required>
                            </div>
                            <div class="col-md">
                                <label for="email">email *</label>
                                <input type="email" name="email" class="form-control  border p-1" id="email" value="{{$client->email}}"
                                    required>
                            </div>
                            <div class="col-md">
                                <label for="phone">phone *</label>
                                <input type="text" name='phone'class="form-control  border p-1" id="phone" value="{{$client->phone}}"
                                    required>
                            </div>
                            <div class="col-md pt-5">

                                <button class="btn bg-gradient-primary w-100" type="submit">Update Client</button>
                            </div>

                        </div>

                    </div>
                </form>
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
        $(document).ready(function() {
            $('#addRow').click(function() {
                // Create a new row
                var newRow = ` <tr>
                                    <td>

                                        <input type="text" name="name[]" class="form-control datepicker border p-1"
                                            id="name" placeholder="Name" required>

                                    </td>
                                    <td>
                                        <input type="number" name="price[]" class="form-control datepicker border p-1" id="price"
                                        value="0" step="0.1" required>                                    </td>
                                    <td>
                                        <input type="number" name="quantity[]" class="form-control datepicker border p-1" id="quantity"
                                        value="0" required>                                     </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <input type="number" name="total[]" class="form-control datepicker border p-1" id="total"
                                            value="0" readonly>
                                                                                </div>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-link text-secondary mb-0 removeRow">
                                            <i class="fa fa-remove text-xs"></i>
                                        </button>
                                    </td>
                                </tr>`;
                // Append the new row to the table body
                $('#item_table tbody').append(newRow);
            });
            $('#item_table').on('click', '.removeRow', function() {
                $(this).closest('tr').remove();
                updateInvoiceTotals()
            });
            $('#item_table').on('input', 'input[name="price[]"], input[name="quantity[]"]', function() {
                var $row = $(this).closest('tr');
                var price = parseFloat($row.find('input[name="price[]"]').val()) || 0;
                var quantity = parseFloat($row.find('input[name="quantity[]"]').val()) || 0;
                var total = price * quantity;
                $row.find('input[name="total[]"]').val(total.toFixed(
                    2)); // Format total to 2 decimal places
                updateInvoiceTotals();
            });

            function updateInvoiceTotals() {
                var grandTotal = 0;
                $('#item_table input[name="total[]"]').each(function() {
                    grandTotal += parseFloat($(this).val()) || 0;
                });

                var discount = parseFloat($('#discount').val()) || 0;
                var tax = parseFloat($('#tax').val()) || 0;

                var totalAfterDiscount = grandTotal - (grandTotal * (discount / 100));
                var totalWithTax = totalAfterDiscount + (totalAfterDiscount * (tax / 100));

                $('#total').val(grandTotal.toFixed(2));
                $('#grand_total').val(totalWithTax.toFixed(2));
            }

            $('#discount, #tax').on('input', function() {
                updateInvoiceTotals(); // Update totals when discount or tax changes
            });
        });
    </script>
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
