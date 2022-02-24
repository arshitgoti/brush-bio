<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<form method="post" action="<?php echo e(route('user.portfolio.url.update', $user->id)); ?>" id="frmStoreUserPortfolioUrls" class="frmStore">
    <?php echo csrf_field(); ?>
    <div class="modal-header">
        <h5 class="modal-title" id="mainModalLabel">Links</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <p class="text-muted" style="color:#6cb2eb!important">Add links to your portfolio, interviews, news articles or press releases, etc. Be creative. What do you want your potential buyers to see?
            </p>
        <label for="user-website" class="col-form-label">Your Links:</label>
        <div class="url_container">
 <ul id="sortable" class="url_container1" style="list-style-type:none;">           
            <?php $__currentLoopData = $user_portfolio_urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p_url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
            <input type="hidden" name="portfolio_url[position][]" id="position" value="<?php echo e($p_url->position); ?>">             
                <div class="card mb-3">
                    <div class="card-body">

                  <div class="row">
                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text my-handle"><i class="fas fa-align-justify"></i></span>                                   
                                </div>
                                 <input type="text" class="form-control" placeholder="Enter Title" aria-label="Enter Url" aria-describedby="basic-addon2" name="portfolio_url[title][]" value="<?php echo e($p_url->title); ?>" maxlength="35" required>
                                 <input type="text" class="form-control" placeholder="yourwebsite.com" aria-label="Enter Url" aria-describedby="basic-addon2" name="portfolio_url[url][]" value="<?php echo e($p_url->url); ?>" required>
                                <div class="input-group-append">
                                <button class="btn btn-danger removePortfolioUrl" type="button"><i class="fas fa-trash"></i></button>
                                
                            </div>
                            </div>
                             
                        </div>
                        
                    </div>

                       
                    </div>
                </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="float-right">
                    <a href="javascript:void(0)" class="addPortfolioUrl"><i class="fas fa-plus"></i> Add Link</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="submitModalForm" class="btn btn-primary">Update</button>
    </div>
</form>
<?php /**PATH D:\xampp\htdocs\brush_bio\resources\views/user_portfolio_url/ajax/edit.blade.php ENDPATH**/ ?>