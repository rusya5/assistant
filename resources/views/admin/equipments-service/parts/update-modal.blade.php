<!-- Модальное окно редактирования-->
<div class="modal fade" id="editEquipmentsServiceModal" tabindex="-1" aria-labelledby="editEquipmentsServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEquipmentsServiceModalLabel">Редактировать оборудование или услугу</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="equipmentsServiceUpdateForm" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <select class="form-control mb-3" name="type_id">
                        @foreach($types as $type)
                            <option value="{{ $type['id'] }}">
                                {{ $type['name'] }}
                            </option>
                        @endforeach
                    </select>
                    <div class="mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Наименование">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="description" class="form-control" placeholder="Описание">
                    </div>
                    <div class="mb-3">
                        <input type="number" name="price" class="form-control" placeholder="Цена">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                    </button><div id="buttonArea" class="mb-3 mt-3">
                        <button id="equipmentsServiceCreateUpdateFormButton" type="submit" class="btn btn-primary">Редактировать</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
