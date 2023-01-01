@extends('layouts.app')

@section('title', 'Dashboard - FreeDay')

@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="col-span-12 mt-8">
        <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">
                General Report
            </h2>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i data-feather="dollar-sign" class="report-box__icon text-primary"></i>
                        </div>
                        <div class="text-3xl font-medium leading-8 mt-6">$8.848</div>
                        <div class="text-base text-slate-500 mt-1">Revenue</div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i data-feather="moon" class="report-box__icon text-pending"></i>
                        </div>
                        <div class="text-3xl font-medium leading-8 mt-6">69</div>
                        <div class="text-base text-slate-500 mt-1">Room Night</div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i data-feather="monitor" class="report-box__icon text-warning"></i>
                        </div>
                        <div class="text-3xl font-medium leading-8 mt-6">$1.200</div>
                        <div class="text-base text-slate-500 mt-1">Daily Rate</div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i data-feather="check-circle" class="report-box__icon text-success"></i>
                        </div>
                        <div class="text-3xl font-medium leading-8 mt-6">5.040</div>
                        <div class="text-base text-slate-500 mt-1">Orders</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6 mt-12">
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                    <h2 class="font-medium text-base mr-auto">
                        Today Reservation
                    </h2>
                </div>
                <div class="p-5" id="head-options-table">
                    <div class="preview">
                        <div class="overflow-x-auto">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="whitespace-nowrap">#</th>
                                        <th class="whitespace-nowrap">First Name</th>
                                        <th class="whitespace-nowrap">Last Name</th>
                                        <th class="whitespace-nowrap">Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Angelina</td>
                                        <td>Jolie</td>
                                        <td>@angelinajolie</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Brad</td>
                                        <td>Pitt</td>
                                        <td>@bradpitt</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Charlie</td>
                                        <td>Hunnam</td>
                                        <td>@charliehunnam</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Angelina</td>
                                        <td>Jolie</td>
                                        <td>@angelinajolie</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Brad</td>
                                        <td>Pitt</td>
                                        <td>@bradpitt</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Charlie</td>
                                        <td>Hunnam</td>
                                        <td>@charliehunnam</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Angelina</td>
                                        <td>Jolie</td>
                                        <td>@angelinajolie</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Brad</td>
                                        <td>Pitt</td>
                                        <td>@bradpitt</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Charlie</td>
                                        <td>Hunnam</td>
                                        <td>@charliehunnam</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                    <h2 class="font-medium text-base mr-auto">
                        Today CheckIn
                    </h2>
                </div>
                <div class="p-5" id="head-options-table">
                    <div class="preview">
                        <div class="overflow-x-auto">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="whitespace-nowrap">#</th>
                                        <th class="whitespace-nowrap">First Name</th>
                                        <th class="whitespace-nowrap">Last Name</th>
                                        <th class="whitespace-nowrap">Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Angelina</td>
                                        <td>Jolie</td>
                                        <td>@angelinajolie</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Brad</td>
                                        <td>Pitt</td>
                                        <td>@bradpitt</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Charlie</td>
                                        <td>Hunnam</td>
                                        <td>@charliehunnam</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Angelina</td>
                                        <td>Jolie</td>
                                        <td>@angelinajolie</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Brad</td>
                                        <td>Pitt</td>
                                        <td>@bradpitt</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Charlie</td>
                                        <td>Hunnam</td>
                                        <td>@charliehunnam</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Angelina</td>
                                        <td>Jolie</td>
                                        <td>@angelinajolie</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Brad</td>
                                        <td>Pitt</td>
                                        <td>@bradpitt</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Charlie</td>
                                        <td>Hunnam</td>
                                        <td>@charliehunnam</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
