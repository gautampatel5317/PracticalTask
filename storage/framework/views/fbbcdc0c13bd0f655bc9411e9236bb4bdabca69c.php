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
    <?php if(!empty($weatherData)): ?>
    <?php $__currentLoopData = $weatherData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $whatherKey => $weatherValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($weatherValue['id']); ?></td>
      <td><?php echo e($weatherValue['name']); ?></td>
      <td><?php echo e(\Arr::collapse($weatherValue['weather'])['main']); ?></td>
      <td><?php echo e($weatherValue['main']['temp']); ?></td>
      <td><?php echo e(date('Y-m-d H:i:s',$weatherValue['dt'])); ?>

      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
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
  </script><?php /**PATH /var/www/html/PracticalTask/resources/views/tabledata.blade.php ENDPATH**/ ?>