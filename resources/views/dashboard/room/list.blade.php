@extends('dashboard.dashboard')

@section('title', 'Room List')

@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Rooms</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div id="success-notification-content" class="toastify-content hidden flex"> <i class="text-success"
            data-feather="check-circle"></i>
        <div class="ml-4 mr-4">
            <div class="text-slate-500 mt-1">{{ Session::get('success') }}</div>
        </div>
    </div>

    <div class="col-span-12 mt-8">
        <h2 class="intro-y text-lg font-medium mt-10">
            Room List Data
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                <a href="{{ route('rooms.create') }}">
                    <button class="btn btn-primary shadow-md mr-2"><i class="w-4 h-4"
                            data-feather="plus"></i>&nbsp;&nbsp;Add
                        Room</button>
                </a>
                <div class="hidden md:block mx-auto text-slate-500">Showing {{ $rooms->currentPage() }} to
                    {{ $rooms->lastPage() }} of {{ $rooms->total() }} entries</div>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <div class="w-56 relative text-slate-500">
                    </div>
                </div>
            </div>
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="text-center whitespace-nowrap">Name</th>
                            <th class="text-center whitespace-nowrap w-2/5">Description</th>
                            <th class="text-center whitespace-nowrap">Capatity</th>
                            <th class="text-center whitespace-nowrap">Status</th>
                            <th class="text-center whitespace-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                            <tr class="intro-x">
                                <td class="text-center">{{ $room->name }}</td>
                                <td class="text-center">{{ $room->description }}</td>
                                <td class="text-center">{{ $room->capacity }}</td>
                                <td class="w-40">
                                    <div class="flex items-center justify-center text-success"> <i
                                            data-feather="check-square" class="w-4 h-4 mr-2"></i> Available </div>
                                </td>
                                <td class="table-report__action w-81">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3" href="{{ route('rate-allotment', $room->id) }}"> <i
                                            data-feather="folder" class="w-4 h-4 mr-1"></i> Rate & Allotment </a>
                                        <a class="flex items-center mr-3" href="{{ route('rooms.edit', $room->id) }}"> <i
                                                data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                        <button onclick="confirmDelete('{{ $room->id }}')" class="flex items-center text-danger" data-tw-toggle="modal"
                                            data-tw-target="#delete-confirmation-modal"> <i data-feather="trash-2"
                                                class="w-4 h-4 mr-1"></i> Delete </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                <nav class="w-full sm:w-auto sm:mr-auto">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="{{ $rooms->url(1) }}"> <i class="w-4 h-4"
                                    data-feather="chevrons-left"></i> </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="{{ $rooms->previousPageUrl() }}"> <i class="w-4 h-4"
                                    data-feather="chevron-left"></i> </a>
                        </li>
                        @foreach ($rooms->getUrlRange(1, $rooms->lastPage()) as $link)
                            @if ($rooms->currentPage() == $loop->index + 1)
                                <li class="page-item active"> <a class="page-link"
                                        href="{{ $link }}">{{ $loop->index + 1 }}</a> </li>
                            @else
                                <li class="page-item"> <a class="page-link"
                                        href="{{ $link }}">{{ $loop->index + 1 }}</a> </li>
                            @endif
                        @endforeach
                        <li class="page-item">
                            <a class="page-link" href="{{ $rooms->nextPageUrl() }}"> <i class="w-4 h-4"
                                    data-feather="chevron-right"></i> </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="{{ $rooms->url($rooms->lastPage()) }}"> <i class="w-4 h-4"
                                    data-feather="chevrons-right"></i> </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Hold Up!',
                text: "Are you sure you want to delete this?",
                type: 'warning',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#435EBE',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.value) {
                    fetch("{{ route('rooms.destroy', '') }}" + '/' + id, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then(response => {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Room has been deleted.',
                            type: 'success',
                            icon: 'success'
                        }).then(() => {
                            location.reload();
                        });
                    });
                }
            });
        }
    </script>
    @if ($message = Session::get('success'))
        <script>
            (function() {
                Toastify({
                    node: $("#success-notification-content").clone().removeClass("hidden")[0],
                    duration: 5000,
                    newWindow: true,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "transparent",
                    },
                }).showToast();
            })();
        </script>
    @endif
@endsection
