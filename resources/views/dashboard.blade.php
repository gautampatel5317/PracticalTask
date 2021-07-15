<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{ __('Dashboard') }}
</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="container-fluid">
                    <h2 class="font-weight-bold">Weather Report</h2>
                    @if (!empty($weatherData))
                    <div class="form-row align-items-center">
                        <label for="filter_by:" class="col-12 col-md-auto mb-2 text-normal">Filter by:</label>
                        <div class="col-auto mb-0 d-flex p-2">
                            <input placeholder="Selected time" type="datetime-local" id="input_starttime" class="form-control datepicker" value="" step="1"/>
                            &nbsp;<button class="btn btn-primary" id="submit-btn">Submit</button>
                            &nbsp;<a href="{{ route('dashboard') }}" class="btn btn-danger">Reset</a>
                        </div>
                    </div>
                    @endif
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="box-body">
                            <div class="table-responsive-lg data-table-wrapper dy-table">
                                <table id="weatherdata" class="table table-condensed table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>CITY</th>
                                            <th>WEATHER</th>
                                            <th>TEMP</th>
                                            <th>DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody class="transparent-bg">
                                        @if (!empty($weatherData))
                                        @foreach ($weatherData as $whatherKey => $weatherValue)
                                        <tr>
                                            <td>{{ $weatherValue['id']  }}</td>
                                            <td>{{ $weatherValue['name']  }}</td>
                                            <td>{{ \Arr::collapse($weatherValue['weather'])['main'] }}</td>
                                            <td>{{ $weatherValue['main']['temp'] }}</td>
                                            <td>{{ date('Y-m-d H:i:s',$weatherValue['dt']) }}
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#weatherdata').DataTable({
            dom: 'lBfrtip',
            searchDelay: 500,
            buttons: [
            'csvHtml5'
            ]
        });
        $('#submit-btn').on("click",function(){
            $.ajax({
                url:`${window.origin}/filter-by-time`,
                type:"JSON",
                method:"POST",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{time:$("#input_starttime").val()},
                success:function(response) {
                    $(".dy-table").html(response);
                }
            });
        });
    });
    </script>