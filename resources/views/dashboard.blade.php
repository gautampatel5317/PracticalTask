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
                    <table class="table table-bordered table-hover" id="weatherdata">
                        <thead>
                            <th>ID</th>
                            <th>CITY</th>
                            <th>WEATHER</th>
                            <th>TEMP</th>                            
                            <th>DATE</th>
                        </thead>
                        <tbody>
                           @foreach ($data as $key => $val)                                                        
                            @php 
                                $weatherData = json_decode($val['data'],true);                                  
                            @endphp
                            <tr>
                                <td>{{ $weatherData['id']  }}</td>
                                <td>{{ $weatherData['name']  }}</td>
                                <td>{{ \Arr::collapse($weatherData['weather'])['main'] }}</td>
                                <td>{{ $weatherData['main']['temp'] }}</td>
                                <td>{{ date('Y-m-d H:i:s',$weatherData['dt']) }}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script type="text/javascript">
    $(document).ready(function() {
    $('#weatherdata').DataTable({
        dom: 'Bfrtip',
        buttons: [
         'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
        ]
    });
} );
</script>