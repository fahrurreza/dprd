<form class="forms-sample" id="form-menu" action="createUser" method="post">
    @csrf
    <div class="form-group">
        <label for="menu">Menu</label>
        <input type="text" class="form-control" id="menu" placeholder="Menu" name="menu">
    </div>
    <div class="form-group">
        <label for="icon">Icon</label>
        <input type="email" class="form-control" id="icon" placeholder="Icon Code" name="icon">
    </div>
    <div class="form-group">
        <label for="route">Route</label>
        <input type="text" class="form-control" id="route" placeholder="Route" name="route">
    </div>
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
    <button class="btn btn-light" id="cancel-form-menu">Cancel</button>
</form>