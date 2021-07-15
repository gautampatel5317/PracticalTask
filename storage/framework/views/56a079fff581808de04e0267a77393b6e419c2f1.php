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
                <div class="container-fluid">
                    <h2 class="font-weight-bold">Weather Report</h2>
                    <?php if(!empty($weatherData)): ?>
                    <div class="form-row align-items-center">
                        <label for="filter_by:" class="col-12 col-md-auto mb-2 text-normal">Filter by:</label>
                        <div class="col-auto mb-0 d-flex p-2">
                            <input placeholder="Selected time" type="datetime-local" id="input_starttime" class="form-control datepicker" value="" step="1"/>
                            &nbsp;<button class="btn btn-primary" id="submit-btn">Submit</button>
                            &nbsp;<a href="<?php echo e(route('dashboard')); ?>" class="btn btn-danger">Reset</a>
                        </div>
                    </div>
                    <?php endif; ?>
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
                                </div>
                            </div>
                        </div>
                    </div>
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
    </script><?php /**PATH /var/www/html/PracticalTask/resources/views/dashboard.blade.php ENDPATH**/ ?>