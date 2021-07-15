<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

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
                           <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                        
                            <?php 
                                $weatherData = json_decode($val['data'],true);                                  
                            ?>
                            <tr>
                                <td><?php echo e($weatherData['id']); ?></td>
                                <td><?php echo e($weatherData['name']); ?></td>
                                <td><?php echo e(\Arr::collapse($weatherData['weather'])['main']); ?></td>
                                <td><?php echo e($weatherData['main']['temp']); ?></td>
                                <td><?php echo e(date('Y-m-d H:i:s',$weatherData['dt'])); ?>

                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<script type="text/javascript">
    $(document).ready(function() {
    $('#weatherdata').DataTable({
        dom: 'Bfrtip',
        buttons: [
         'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
        ]
    });
} );
</script><?php /**PATH /home/GALAXYRADIXWEB/gautama.patel/web/weatherapp/public_html/resources/views/dashboard.blade.php ENDPATH**/ ?>