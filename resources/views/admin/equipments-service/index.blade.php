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
                            <h3 class="card-title">Оборудования и услуги</h3>
                            <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#addEquipmentsServiceModal">
                                Добавить оборудование или услугу
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10%;">#</th>
                                    <th style="width: 20%;">Type</th>
                                    <th style="width: 20%;">Title</th>
                                    <th style="width: 30%;">Description</th>
                                    <th style="width: 15%;">Price</th>
                                    <th style="width: 5%;">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($equipmentsServices as $equipmentsService)
                                    <tr class="align-middle">
                                        <td>{{$equipmentsService['id']}}</td>
                                        <td>{{$equipmentsService['type']['name']}}</td>
                                        <td>{{$equipmentsService['title']}}</td>
                                        <td>{{$equipmentsService['description']}}</td>
                                        <td>{{$equipmentsService['price']}}</td>
                                        <td class="d-flex align-items-center justify-content-between">
                                            <button type="button" class="btn btn-warning equipmentsServiceEditButton"
                                                    data-id="{{ $equipmentsService['id'] }}"
                                                    data-title="{{ $equipmentsService['title'] }}"
                                                    data-description="{{ $equipmentsService['description'] }}"
                                                    data-price="{{ $equipmentsService['price'] }}"
                                                    data-type-id="{{ $equipmentsService['type']['id'] }}">
                                                <i class="bi bi-pencil"></i>
                                            </button>

                                            <button type="button" class="btn btn-danger equipmentsServiceDeleteButton"
                                                    data-id="{{ $equipmentsService['id'] }}"
                                                    data-type="{{ $equipmentsService['type']['name'] }}"
                                                    data-title="{{ $equipmentsService['title'] }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-end">
                                {{-- Кнопка "Назад" --}}
                                <li class="page-item {{ $equipmentsServices->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $equipmentsServices->previousPageUrl() ?? '#' }}">&laquo;</a>
                                </li>

                                {{-- Генерация номеров страниц --}}
                                @for ($i = 1; $i <= $equipmentsServices->lastPage(); $i++)
                                    <li class="page-item {{ $i == $equipmentsServices->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $equipmentsServices->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                {{-- Кнопка "Вперед" --}}
                                <li class="page-item {{ $equipmentsServices->currentPage() == $equipmentsServices->lastPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $equipmentsServices->nextPageUrl() ?? '#' }}">&raquo;</a>
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
    @include('admin.equipments-service.parts.create-modal')
    @include('admin.equipments-service.parts.update-modal')

    <script>
        $(document).ready(function () {
            $("#equipmentsServiceCreateForm").on('submit', function (event) {
                event.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('admin.equipments-service.store') }}",
                    method: 'POST',
                    data: formData,
                    success: function (response) {
                        $("#addEquipmentsServiceModal").modal('hide');
                        location.reload();
                    },
                    error: function (error) {
                        alert('Произошла ошибка при отправке данных.');
                    }
                });
            });
            $("#equipmentsServiceUpdateForm").on('submit', function (event) {
                event.preventDefault();

                let formData = $(this).serialize();
                let actionUrl = $(this).attr('action');

                $.ajax({
                    url: actionUrl,
                    method: 'PUT',
                    data: formData,
                    success: function (response) {
                        $("#editEquipmentsServiceModal").modal('hide');
                        location.reload();
                    },
                    error: function (error) {
                        alert('Произошла ошибка при обновлении.');
                    }
                });
            });

            $(document).on("click", ".equipmentsServiceEditButton", function () {
                let id = $(this).data("id");
                let title = $(this).data("title");
                let description = $(this).data("description");
                let price = $(this).data("price");
                let typeId = $(this).data("type-id");

                // Устанавливаем значения в форму
                $("#equipmentsServiceUpdateForm input[name='id']").val(id);
                $("#equipmentsServiceUpdateForm input[name='title']").val(title);
                $("#equipmentsServiceUpdateForm input[name='description']").val(description);
                $("#equipmentsServiceUpdateForm input[name='price']").val(price);
                $("#equipmentsServiceUpdateForm select[name='type_id']").val(typeId);

                // Обновляем URL формы для правильного обновления
                let updateUrl = "{{ route('admin.equipments-service.update', ':id') }}".replace(':id', id);
                $("#equipmentsServiceUpdateForm").attr('action', updateUrl);

                // Открываем модальное окно
                $("#editEquipmentsServiceModal").modal("show");
            });

            $(document).on("click", ".equipmentsServiceDeleteButton", function () {
                let id = $(this).data("id");
                let type = $(this).data("type");
                let title = $(this).data("title");

                if (confirm(`Вы действительно хотите удалить ${type} "${title}"?`)) {
                    $.ajax({
                        url: `/admin/equipments-service/${id}`,
                        method: "DELETE",
                        data: {_token: "{{ csrf_token() }}"},
                        success: function () {
                            location.reload();
                        },
                        error: function () {
                            alert("Ошибка удаления.");
                        }
                    });
                }
            });
        });
    </script>
@endsection
