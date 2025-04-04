@extends('layouts.admin')

@section('content')
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h3 class="card-title">Записи</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 30%;">Chat</th>
                                    <th style="width: 50%;">Booked Equipments & Services</th>
                                    <th style="width: 20%;">Booking date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bookings as $booking)
                                    <tr class="align-middle">
                                        <td>{{$booking['chat']['name']}}</td>
                                        <td>
                                            @foreach($booking['equipmentsServices'] as $equipmentsService)
                                                <div>{{$equipmentsService['type_id']}}|{{$equipmentsService['title']}}</div>
                                            @endforeach
                                        </td>
                                        <td>{{$booking['booking_date']}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-end">
                                {{-- Кнопка "Назад" --}}
                                <li class="page-item {{ $bookings->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $bookings->previousPageUrl() ?? '#' }}">&laquo;</a>
                                </li>

                                {{-- Генерация номеров страниц --}}
                                @for ($i = 1; $i <= $bookings->lastPage(); $i++)
                                    <li class="page-item {{ $i == $bookings->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $bookings->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                {{-- Кнопка "Вперед" --}}
                                <li class="page-item {{ $bookings->currentPage() == $bookings->lastPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $bookings->nextPageUrl() ?? '#' }}">&raquo;</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <!-- /.col -->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection
