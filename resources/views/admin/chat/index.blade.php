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
                        <h3 class="card-title">Чаты</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 50%;">Name</th>
                                <th style="width: 50%;">Last message at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($chats as $chat)
                                <tr class="align-middle">
                                    <td>
                                        <a href="{{route('admin.chat.messages', ['chat_id' => $chat['id']])}}" class="brand-link">
                                            {{$chat['name']}}
                                        </a>
                                    </td>
                                    <td>{{$chat['last_message_at']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-end">
                            {{-- Кнопка "Назад" --}}
                            <li class="page-item {{ $chats->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $chats->previousPageUrl() ?? '#' }}">&laquo;</a>
                            </li>

                            {{-- Генерация номеров страниц --}}
                            @for ($i = 1; $i <= $chats->lastPage(); $i++)
                                <li class="page-item {{ $i == $chats->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $chats->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            {{-- Кнопка "Вперед" --}}
                            <li class="page-item {{ $chats->currentPage() == $chats->lastPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $chats->nextPageUrl() ?? '#' }}">&raquo;</a>
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
