<form method="post" action="/admin/edit/location/<?php echo $location['location_id']; ?>">
    <div class="container mx-auto">
        <div class="form-group">
            <h4><?php echo $page_title; ?></h4>
        </div>

        <div class="form-group">
            <label for="name">Наименование</label>
            <input name="name" id="name" type="text" class="form-control" placeholder="Наименование" value="<?php echo $location['location']; ?>">
        </div>

        <div class="form-group">
            <label for="address">Адрес</label>
            <input name="address" id="address" type="text" class="form-control" placeholder="Адрес" value="<?php echo $location['address']; ?>">
        </div>

        <div class="form-group">
            <label for="type">Тип</label>
            <input name="type" id="type" type="text" class="form-control" placeholder="Тип" value="<?php echo $location['type']; ?>">
        </div>

        <div class="form-group">
            <button type="submit" id="postButton" class="btn btn-success">Добавить</button>
        </div>

    </div>
</form>