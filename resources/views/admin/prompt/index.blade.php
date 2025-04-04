@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4>Prompt</h4>
            </div>
            <div class="card-body">
                <form id="promptUpdateForm">
                    @csrf
                    <div class="mb-3">
                        <textarea id="prompt" name="prompt" class="form-control" rows="25">{{$prompt}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Обновить</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $("#promptUpdateForm").on('submit', function (event) {
            event.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                url: "{{ route('admin.prompt.update') }}",
                method: 'PUT',
                data: formData,
                success: function (response) {
                    location.reload();
                },
                error: function (error) {
                }
            });
        });
    </script>
@endsection
