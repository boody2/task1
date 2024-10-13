@extends('layout.dashboard')
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">update employee</h6>
                    </div>
                </div>
                <form action="{{ route('employee.update',[$employee->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body px-0 pb-2">
                        <div class="row p-2  align-items-center justify-content-center">
                            <div class="col-md">
                                <label for="photo">photo</label>
                                <input type="file" name='photo'class="form-control border p-1" id="photo" accept="image/*" >
                            </div>
                            <div class="col-md">
                                <label for="name">name *</label>
                                <input type="text" name='name'class="form-control border p-1" id="name"  value="{{$employee->name}}" required>
                            </div>
                            <div class="col-md">
                                <label for="email">email *</label>
                                <input disabled type="email" name="email" class="form-control  border p-1" id="email"
                                   value="{{$employee->email}}" required>
                            </div>
                            <div class="col-md">
                                <label for="password">password *</label>
                                <input type="password" name='password'class="form-control  border p-1" id="password"
                                    minlength="8">
                            </div>
                            <div class="col-md">

                                <label for="Type">Type *</label>
                                <select class="form-select p-1" name="type" id="type" aria-label="Type *"
                                    required>
                                    <option value="Employee" @if ($employee->type=="Employee")
                                        selected
                                    @endif>Employee</option>
                                    <option value="Admin"@if ($employee->type=="Admin")
                                        selected
                                    @endif >Admin</option>
                                </select>
                            </div>
                            <div class="col-md pt-5">

                                <button class="btn bg-gradient-primary w-100" type="submit">update employee</button>
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
