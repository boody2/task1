@extends('layout.dashboard')
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Add employee</h6>
                    </div>
                </div>
                <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body px-0 pb-2">
                        <div class="row p-2  align-items-center justify-content-center">
                            <div class="col-md">
                                <label for="photo">photo</label>
                                <input type="file" name='photo'class="form-control border p-1" id="photo" accept="image/*" >
                            </div>
                            <div class="col-md">
                                <label for="name">name *</label>
                                <input type="text" name='name'class="form-control border p-1" id="name" required>
                            </div>
                            <div class="col-md">
                                <label for="email">email *</label>
                                <input type="email" name="email" class="form-control  border p-1" id="email"
                                    required>
                            </div>
                            <div class="col-md">
                                <label for="password">password *</label>
                                <input type="password" name='password'class="form-control  border p-1" id="password"
                                    minlength="8" required>
                            </div>
                            <div class="col-md">

                                <label for="Type">Type *</label>
                                <select class="form-select p-1" name="type" id="Type" aria-label="Type *"
                                    required>
                                    <option value="Employee" selected>Employee</option>
                                    <option value="Admin" >Admin</option>
                                </select>
                            </div>
                            <div class="col-md pt-5">

                                <button class="btn bg-gradient-primary w-100" type="submit">Add employee</button>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">employees table</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2  align-items-center justify-content-center">
                    <div class="table-responsive p-0 ">
                        <table class="table align-items-center justify-content-center mb-0" id="item_table">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        photo
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        email</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        Type</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>
                                            <div>
                                                <img src="{{$employee->photo?"/storage/app/".$employee->photo:"https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Fcdn.pixabay.com%2Fphoto%2F2015%2F10%2F05%2F22%2F37%2Fblank-profile-picture-973460_960_720.png&sp=1728642929Tae31c922f832ac4b634432bca996a9b9aeea4b7eb7f5bc5d5fe6dc58f06ebb05"}}"
                                                    class="avatar avatar-sm rounded-circle me-2" alt="invision">
                                            </div>
                                            {{-- <p class="text-sm font-weight-bold mb-0">{{ $employee->photo }}</p> --}}
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $employee->name }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $employee->email }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $employee->type }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $employee->status }}</p>
                                        </td>

                                        <td><a
                                                    href="{{route('employee.edit',[$employee->id])}}"><i
                                                    class="material-icons opacity-10 m-2">edit</i></a>
                                                    @if ($employee->status=="Active")
                                                     <form id="employee_destroy" action="{{ route('employee.destroy',[$employee->id]) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <a onclick="event.preventDefault(); document.getElementById('employee_destroy').submit();"><i
                                                    class="material-icons opacity-10 m-2">block</i></a>
                                                    @endif
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
