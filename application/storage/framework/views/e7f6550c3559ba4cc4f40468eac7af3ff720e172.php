<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
        <form class="forms-sample" action="createMenu" method="post">
            <?php echo csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Menu</label>
                    <input type="text" class="form-control" placeholder="Name Menu" name="menu">
                </div>
                <div class="form-group">
                    <label>Icon</label>
                    <input type="text" class="form-control" placeholder="Icon code" name="icon">
                </div>
                <div class="form-group">
                    <label>Route</label>
                    <input type="email" class="form-control" placeholder="Route" name="route">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\dprd\application\resources\views/modal/formMenu.blade.php ENDPATH**/ ?>