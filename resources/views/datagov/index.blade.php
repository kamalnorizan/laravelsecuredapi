@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-group {{ $errors->has('date_start') ? ' has-error' : '' }}">
                    <label for="date_start">Tarikh Mula</label>
                    <input type="date" id="date_start" name="date_start" class="form-control" value="2024-01-01" required>
                    <small class="text-danger">{{ $errors->first('date_start') }}</small>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-group {{ $errors->has('date_end') ? ' has-error' : '' }}">
                    <label for="date_end">Tarikh Akhir</label>
                    <input type="date" id="date_end" name="date_end" class="form-control" required>
                    <small class="text-danger">{{ $errors->first('date_end') }}</small>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Title</div>

                    <div class="card-body">
                        <table class="table" id="tblrail">
                            <thead>
                                <tr>
                                    <td>date</td>
                                    <td>rail_lrt_kj</td>
                                    <td>rail_monorail</td>
                                    <td>rail_lrt_ampang</td>
                                    <td>rail_mrt_kajang</td>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>

        $('#date_start').change(function (e) {
            e.preventDefault();
            loadData();
        });

        $('#date_end').change(function (e) {
            e.preventDefault();
            loadData();
        });

        loadData();

        function loadData(){
            $.ajax({
                type: "post",
                url: "{{route('datagov.ajaxLoadDataRail')}}",
                data: {
                    _token: "{{csrf_token()}}",
                    date_start: $('#date_start').val(),
                    date_end: $('#date_end').val()
                },
                dataType: "json",
                success: function (response) {
                    $('#tblrail tbody').html('');

                    $.each(response, function (indexInArray, valueOfElement) {
                        $('#tblrail tbody').append(`
                            <tr>
                                <td>${valueOfElement.date}</td>
                                <td>${valueOfElement.rail_lrt_kj}</td>
                                <td>${valueOfElement.rail_monorail}</td>
                                <td>${valueOfElement.rail_lrt_ampang}</td>
                                <td>${valueOfElement.rail_mrt_kajang}</td>
                            </tr>
                        `);
                    });
                }
            });
        }

    </script>
@endsection
