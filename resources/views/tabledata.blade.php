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
  <script type="text/javascript">
    $('#weatherdata').DataTable({
          dom: 'lBfrtip',
          searchDelay: 500,
          buttons: [
          'csvHtml5'
          ]
    });
  </script>