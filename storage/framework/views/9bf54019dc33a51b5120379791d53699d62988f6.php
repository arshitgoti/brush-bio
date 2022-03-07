<?php $__env->startSection('content'); ?>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      Manage Mailing List
                        <div class="float-right">
                            <a class="btn btn-primary" href="<?php echo e(url()->previous()); ?>" title="Go back"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(Session::has('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(Session::get('success')); ?>

                        </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <form class="form-group" action="<?php echo e(route('save.setting')); ?>" method="get">
                                    <div class="row  align-items-center justify-content-around">
                                        
                                        <input type="hidden" name="is_cookies" class="form-control" value="3">
                                        <div class="col-md-5">
                                            <div class="form-check form-check-inline">

                                                <input type="checkbox" name="is_mail" class="form-check-input"  <?php if($setting->is_mail==1): ?> checked <?php endif; ?>>
                                                <label class="form-check-label">Show mailing list pop-up to people who visit my profile</label>

                                            </div>
                                            <div class="form-check form-check-inline">

                                                <input type="checkbox" name="is_subscribe_mail" class="form-check-input" <?php if($setting->is_subscribe_mail==1): ?> checked <?php endif; ?>>
                                                <label class="form-check-label">Notify me of new subscribers</label>

                                            </div>
                                            <div class="form-check form-check-inline">

                                                <input type="checkbox" name="is_weekly_mail" class="form-check-input"  <?php if($setting->is_weekly_mail==1): ?> checked <?php endif; ?>>
                                                <label class="form-check-label">Weekly summary of subscribers</label>

                                            </div>
                                        </div>
                                        <div class="col-md-2 text-right mt-1">

                                    <button type="submit" class="btn btn-info" href="<?php echo e(route('user.import.mailable')); ?>"  title="No data added">Save changes</button>


                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <!--<div class="card-header">
                        Manage Mailinglist
                        <div class="float-right">
                            <a class="btn btn-primary" href="<?php echo e(url()->previous()); ?>" title="Go back"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                    </div>-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <form action="<?php echo e(route('user.import.mailable')); ?>" method="get" id="importmailebel">
                                <div class="float-left">
                                    <select required class="form-control select2" name="exportType" onchange="mailebel()" id="selectExportType">
                                        <option>Select Export Type</option>
                                        <option value='xls'>XLS</option>
                                        <option value="csv">CSV</option>

                                    </select>
                                </div>
                            </form>
                                <div class="float-right">
                                    <button class="btn btn-info"   title="No data added" onclick="document.getElementById('importselected').submit();"><i class="fas fa-download"></i> Export Selected</button>

                                    <button class="btn btn-info" onclick="document.getElementById('importmailebel').submit();" title="No data added"><i class="fas fa-download"></i> Export All</button>
                                </div>

                            </div>
                        </div>
                        <div class="tblGalleryList table-responsive" >

                            <table id="grid-basic"  class="table table-hover table-bordered" >
                                <thead>
                                    <tr>
                                        <th scope="col"><input type="checkbox" id="select-all" onchange="checked1(this.checked)"></th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Date added</th>

                                    </tr>
                                </thead>
                                <tbody>
                                   <form action="<?php echo e(route('user.import.mailable')); ?>" method="get" id="importselected">
                                    <?php $__empty_1 = true; $__currentLoopData = $user->viewprofile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                                <td><input type="checkbox" name="rowid[]" value="<?php echo e($profile->id); ?>"></td>

                                            <td><?php echo e($key+1); ?></td>
                                            <td><?php echo e($profile->email); ?></td>
                                            <td><?php echo e(date('m-d-Y', strtotime($profile->created_at))); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="10" align="center">No Subscriber Found</td>
                                        </tr>
                                    <?php endif; ?>
                                    <input type="hidden" id="exportType" name="exportType" value="">
                                    </form>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function mailebel() {
          var a= document.getElementById("selectExportType");
          document.getElementById("exportType").value = a.options[a.selectedIndex].value;;
        }
        function checked1(vale){
            var checked = vale;
                $('.table input[type="checkbox"]').each(function() {
                this.checked = checked;
                });
        }
        </script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\brush-bio\resources\views/mailable.blade.php ENDPATH**/ ?>