<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout-app','data' => ['title' => 'edit foto profile']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout-app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'edit foto profile']); ?>
  
    <div class="card mt-5 w-50" style="margin-left: 20px">
        <div class="card-body">

          <form action="<?php echo e(route('profile.store')); ?>" method="POST" enctype="multipart/form-data" >
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <div class="mb-3">
                <label for="image" class="form-label">Edit Photo Profile</label>
                <input  class="form-control" name="image_profile" type="file" id="image">
                <img id="showImage" src="<?php echo e(asset('assets/img/'.Auth::user()->image_profile)); ?>" width="100px" style="margin-top: 20px" alt="">
              </div>
              <button class="btn btn-primary" type="submit">Submit</button>
            </form>
            
        </div>
      </div>





      <script>
        $(document).ready(function(){
          $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
              $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
          });
        });
      </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH D:\Laravel Project\pklppdb\resources\views/dashboard/account/edit.blade.php ENDPATH**/ ?>