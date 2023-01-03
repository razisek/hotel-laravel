@extends('layouts.app')

@section('title', 'Rate & Allotment')

@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Room</a></li>
            <li class="breadcrumb-item active" aria-current="page">Room Rate & Allotment</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="col-span-12 mt-8">
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5">
                <h2 class="font-medium text-base mr-auto">
                    Room Rate
                </h2>
            </div>
            <form id="rateForm" class="p-8">
                <h4>Date Range</h4>
                <input type="hidden" value="{{ $room->id }}" name="room_id">
                <div class="flex items-center pt-4">
                    <input type="date" name="date_start" id="dateStartRate" class="rounded-lg w-2/12"
                        onchange="dateRateFunction()">
                    <span class="mx-2">-</span>
                    <input type="date" name="date_end" id="dateEndRate" class="rounded-lg w-2/12">
                </div>
                <div class="mt-4"> <label>Day Of Week</label>
                    <div class="flex flex-col sm:flex-row mt-3">
                        <div class="form-check mr-2"> <input id="rate_sunday" class="form-check-input" type="checkbox"
                                name="days[]" value="sunday"> <label class="form-check-label" for="rate_sunday">Sun</label>
                        </div>
                        <div class="form-check mr-2"> <input id="rate_moday" class="form-check-input" type="checkbox"
                                name="days[]" value="monday"> <label class="form-check-label" for="rate_moday">Mon</label>
                        </div>
                        <div class="form-check mr-2"> <input id="rate_tuesday" class="form-check-input" type="checkbox"
                                name="days[]" value="tuesday"> <label class="form-check-label"
                                for="rate_tuesday">Tue</label> </div>
                        <div class="form-check mr-2"> <input id="rate_wednesday" class="form-check-input" type="checkbox"
                                name="days[]" value="wednesday"> <label class="form-check-label"
                                for="rate_wednesday">Wed</label> </div>
                        <div class="form-check mr-2"> <input id="rate_thusday" class="form-check-input" type="checkbox"
                                name="days[]" value="thursday"> <label class="form-check-label"
                                for="rate_thusday">Thu</label> </div>
                        <div class="form-check mr-2"> <input id="rate_friday" class="form-check-input" type="checkbox"
                                name="days[]" value="friday"> <label class="form-check-label" for="rate_friday">Fri</label>
                        </div>
                        <div class="form-check mr-2"> <input id="rate_saturday" class="form-check-input" type="checkbox"
                                name="days[]" value="saturday"> <label class="form-check-label"
                                for="rate_saturday">Sat</label> </div>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit">
                        <div class="btn btn-primary w-32 mr-2 mb-2">
                            <i data-feather="search" class="w-4 h-4 mr-2"></i>Search
                        </div>
                    </button>
                    <button type="reset">
                        <div class="btn btn-danger w-32 mr-2 mb-2">
                            <i data-feather="x" class="w-4 h-4 mr-2"></i>Reset
                        </div>
                    </button>
                </div>
            </form>
            <div class="p-5">
                <form id="saveRate" class="overflow-x-auto">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">Date</th>
                                <th class="whitespace-nowrap">Price</th>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <div id="input-group-price" class="input-group-text">$</div> <input
                                            type="number" id="prices" class="form-control" placeholder="price"
                                            aria-label="price" aria-describedby="input-group-price">
                                    </div>
                                </td>
                            </tr>
                        </thead>
                        <tbody id="rateBody">

                        </tbody>
                    </table>
                    <button class="btn btn-primary w-42 mr-2 mb-2 mt-3" id="saveRateButton"> <i data-feather="save"
                            class="w-4 h-4 mr-2"></i>
                        Save Changes </button>
                </form>
            </div>
        </div>
        <div class="intro-y box mt-4">
            <div class="flex flex-col sm:flex-row items-center p-5">
                <h2 class="font-medium text-base mr-auto">
                    Room Allotment
                </h2>
            </div>
            <form id="allotmentForm" class="p-8">
                <h4>Date Range</h4>
                <div class="flex items-center pt-4">
                    <input type="date" name="date_start" id="dateStartAllotment" class="rounded-lg w-2/12"
                        onchange="dateAllotmentFunction()">
                    <span class="mx-2">-</span>
                    <input type="date" name="date_end" id="dateEndAllotment" class="rounded-lg w-2/12">
                </div>
                <div class="mt-4"> <label>Day Of Week</label>
                    <div class="flex flex-col sm:flex-row mt-3">
                        <div class="form-check mr-2"> <input id="allotment_sunday" class="form-check-input"
                                type="checkbox" name="days[]" value="sunday"> <label class="form-check-label"
                                for="allotment_sunday">Sun</label> </div>
                        <div class="form-check mr-2"> <input id="allotment_moday" class="form-check-input"
                                type="checkbox" name="days[]" value="monday"> <label class="form-check-label"
                                for="allotment_moday">Mon</label> </div>
                        <div class="form-check mr-2"> <input id="allotment_tuesday" class="form-check-input"
                                type="checkbox" name="days[]" value="tuesday"> <label class="form-check-label"
                                for="allotment_tuesday">Tue</label> </div>
                        <div class="form-check mr-2"> <input id="allotment_wednesday" class="form-check-input"
                                type="checkbox" name="days[]" value="wednesday"> <label class="form-check-label"
                                for="allotment_wednesday">Wed</label> </div>
                        <div class="form-check mr-2"> <input id="allotment_thusday" class="form-check-input"
                                type="checkbox" name="days[]" value="thursday"> <label class="form-check-label"
                                for="allotment_thusday">Thu</label> </div>
                        <div class="form-check mr-2"> <input id="allotment_friday" class="form-check-input"
                                type="checkbox" name="days[]" value="friday"> <label class="form-check-label"
                                for="allotment_friday">Fri</label> </div>
                        <div class="form-check mr-2"> <input id="allotment_saturday" class="form-check-input"
                                type="checkbox" name="days[]" value="saturday"> <label class="form-check-label"
                                for="allotment_saturday">Sat</label> </div>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit">
                        <div class="btn btn-primary w-32 mr-2 mb-2">
                            <i data-feather="search" class="w-4 h-4 mr-2"></i>Search
                        </div>
                    </button>
                    <button class="btn btn-danger w-32 mr-2 mb-2">
                        <i data-feather="x" class="w-4 h-4 mr-2"></i> Reset
                    </button>
                </div>
            </form>
            <div class="p-5">
                <form id="saveAllotment" class="overflow-x-auto">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">Date</th>
                                <th class="whitespace-nowrap">Availabe</th>
                                <th class="whitespace-nowrap">Used</th>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <input type="number" class="form-control" id="available">
                                </td>
                                <td>
                                </td>
                            </tr>
                        </thead>
                        <tbody id="allotmentBody">

                        </tbody>
                    </table>
                    <button class="btn btn-primary w-42 mr-2 mb-2 mt-3"> <i data-feather="save" class="w-4 h-4 mr-2"></i>
                        Save Changes </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // function max date end
        function dateRateFunction() {
            var dateRateStart = document.getElementById('dateStartRate').value;
            document.getElementById("dateEndRate").setAttribute("min", dateRateStart);

            var d = maxRange(dateRateStart);

            document.getElementById("dateEndRate").setAttribute("max", d);
        }

        function dateAllotmentFunction() {
            var dateRateStart = document.getElementById('dateStartAllotment').value;
            document.getElementById("dateEndAllotment").setAttribute("min", dateRateStart);

            var d = maxRange(dateRateStart);

            document.getElementById("dateEndAllotment").setAttribute("max", d);
        }

        // update form value
        $('#prices').on('keyup', function(e) {
            const value = e.target.value;

            $('[id^=price-]').each(function(index, element) {
                if (element.getAttribute('disabled') == null) {
                    if (value != '') {
                        $(element).val(value);
                    } else if (value == '') {
                        $(element).val(0);
                    }
                }
            });
        });

        $('#available').on('keyup', function(e) {
            const value = e.target.value;

            $('[id^=available-]').each(function(index, element) {
                if (element.getAttribute('disabled') == null) {
                    if (value != '') {
                        $(element).val(value);
                    } else if (value == '') {
                        $(element).val(0);
                    }
                }
            });
        });

        // get all rate
        $('#rateForm').on('submit', function(e) {
            e.preventDefault();
            const [roomId, dateStart, dateEnd, ...dayOfWeekArr] = $(this).serializeArray();

            const dayOfWeek = dayOfWeekArr.map(day => day.value);

            if (dateStart.value == '' || dateEnd.value == '') {
                alert('Please fill the date');
                return false;
            }

            const dates = [];
            const start = new Date(dateStart.value);
            const end = new Date(dateEnd.value);

            while (start <= end) {
                const dateString = start.toLocaleDateString('en-GB', {
                    weekday: 'long',
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric',
                });

                const dayName = start.toLocaleDateString('en-GB', {
                    weekday: 'long',
                }).toLowerCase();

                if (dayOfWeek.length > 0 && !dayOfWeek.includes(dayName)) {
                    start.setDate(start.getDate() + 1);
                    continue;
                }

                var d = start.toLocaleString().substring(0, 10);
                d = d.replace('-', '/');
                dates.push({
                    rate_id: d,
                    date: dateString,
                    dateVal: start.toISOString().substring(0, 10),
                    price: 0,
                });

                start.setDate(start.getDate() + 1);
            }

            var id = '{{ $room->id }}';
            var url = "{{ route('get-rate', ':id') }}";
            url = url.replace(':id', id);

            fetch(url, {
                    method: 'POST',
                    body: new FormData(this),
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(response => response.json())
                .then(data => {
                    const rates = data;

                    const merged = [];
                    dates.forEach(date => {
                        const found = rates.find(rate => rate.dateVal == date.dateVal);

                        if (found) {
                            merged.push(found);
                        } else {
                            merged.push(date);
                        }
                    });

                    $('#rateBody').empty();

                    let tableContent = '';

                    merged.forEach(rates => {
                        var today = new Date();
                        var dd = today.getDate();
                        var mm = today.getMonth() + 1;
                        var yyyy = today.getFullYear();
                        if (dd < 10) {
                            dd = '0' + dd
                        }
                        if (mm < 10) {
                            mm = '0' + mm
                        }
                        today = yyyy + '-' + mm + '-' + dd;

                        tableContent += `
            <tr>
                <td>${rates.date}<input ${rates.dateVal < today ? 'disabled' : ''} type="hidden" name="date-${rates.rate_id}" value="${rates.dateVal}"/></td>
                <td><div class="input-group"><div id="input-group-price" class="input-group-text">$</div> <input ${rates.dateVal < today ? 'disabled' : ''} min="0" name="price-${rates.rate_id}" id="price-${rates.rate_id}" class="form-control" type="number" value="${rates.price}" aria-label="price" aria-describedby="input-group-price"></div></td>
            </tr>
                    `;
                    });

                    $('#rateBody').append(tableContent);
                });

        })

        $('#allotmentForm').on('submit', function(e) {
            e.preventDefault();
            const [roomId, dateStart, dateEnd, ...dayOfWeekArr] = $(this).serializeArray();

            const dayOfWeek = dayOfWeekArr.map(day => day.value);

            if (dateStart.value == '' || $('#dateEndAllotment').val == '') {
                alert('Please fill the date');
                return false;
            }

            const dates = [];
            const start = new Date(dateStart.value);
            const end = new Date($('#dateEndAllotment').val());

            while (start <= end) {
                const dateString = start.toLocaleDateString('en-GB', {
                    weekday: 'long',
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric',
                });

                const dayName = start.toLocaleDateString('en-GB', {
                    weekday: 'long',
                }).toLowerCase();

                if (dayOfWeek.length > 0 && !dayOfWeek.includes(dayName)) {
                    start.setDate(start.getDate() + 1);
                    continue;
                }

                var d = start.toLocaleString().substring(0, 10);
                d = d.replace('-', '/');
                dates.push({
                    allotment_id: d,
                    date: dateString,
                    dateVal: start.toISOString().substring(0, 10),
                    available: 0,
                    used: 0,
                });

                start.setDate(start.getDate() + 1);
            }

            console.log(dates);

            var id = '{{ $room->id }}';
            var url = "{{ route('get-allotment', ':id') }}";
            url = url.replace(':id', id);

            fetch(url, {
                    method: 'POST',
                    body: new FormData(this),
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(response => response.json())
                .then(data => {
                    const allotments = data;

                    const merged = [];
                    dates.forEach(date => {
                        const found = allotments.find(allotment => allotment.dateVal == date.dateVal);

                        if (found) {
                            merged.push(found);
                        } else {
                            merged.push(date);
                        }
                    });

                    // console.log(merged);

                    $('#allotmentBody').empty();

                    let tableContent = '';

                    merged.forEach(allotment => {
                        var today = new Date();
                        var dd = today.getDate();
                        var mm = today.getMonth() + 1;
                        var yyyy = today.getFullYear();
                        if (dd < 10) {
                            dd = '0' + dd
                        }
                        if (mm < 10) {
                            mm = '0' + mm
                        }
                        today = yyyy + '-' + mm + '-' + dd;

                        tableContent += `
            <tr>
                <td>${allotment.date}<input ${allotment.dateVal < today ? 'disabled' : ''} type="hidden" name="date-${allotment.allotment_id}" value="${allotment.dateVal}"/></td>
                <td><input ${allotment.dateVal < today ? 'disabled' : ''} min="0" name="available-${allotment.allotment_id}" id="available-${allotment.allotment_id}" class="form-control" type="number" value="${allotment.available}"></td>
                <td class="text-center">${allotment.used}</td>
            </tr>
                    `;
                    });

                    $('#allotmentBody').append(tableContent);
                });

        })

        $('#saveRate').on('submit', function(e) {
            e.preventDefault();

            const button = $('#saveRateButton');

            button.attr('disabled', true);
            button.text('Saving...');

            const formData = new FormData(this);

            var id = '{{ $room->id }}';
            var url = "{{ route('save-rates', ':id') }}";
            url = url.replace(':id', id);

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(response => response.json())
                .then(data => {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Room Rate has been updated!',
                        type: 'success',
                        icon: 'success'
                    })
                    button.attr('disabled', false);
                    button.html('<i data-feather="save" class="w-4 h-4 mr-2"></i> Save Changes');
                    $('#prices').val('');
                    resetAll();
                });
        });
    </script>
@endsection
