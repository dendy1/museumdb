<form method="post" action="/admin/edit/exhibit/<?php echo $exhibit['exhibit_id']; ?>">
    <div class="container mx-auto">
        <div class="form-group">
            <h4><?php echo $page_title; ?></h4>
        </div>

        <div class="form-group">
            <label for="name">Наименование</label>
            <input name="name" id="name" type="text" class="form-control" placeholder="Наименование" value="<?php echo $exhibit['name']; ?>">
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" id="description" rows="10" class="form-control" placeholder="Описание"><?php echo $exhibit['description']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="author">Автор</label>
            <input name="author" id="author" type="text" class="form-control" placeholder="Автор" value="<?php echo $exhibit['author']; ?>">
        </div>

        <div class="form-group">
            <label for="category_id">Тематический раздел</label>
            <select class="form-control" id="category_id" name="category_id">
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['category_id']; ?>" <?php if ($exhibit['category_id'] == $category['category_id']): echo 'selected'; endif; ?>><?php echo $category['category']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="location_id">Местоположение</label>
            <select class="form-control" id="location_id" name="location_id">
                <?php foreach ($locations as $location): ?>
                    <option value="<?php echo $location['location_id']; ?>" <?php if ($exhibit['location_id'] == $location['location_id']): echo 'selected'; endif; ?>><?php echo $location['location'] . ';' . $location['address'] . ';' . $location['type']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label class="control-label col-xs-3" for="create_date">Дата создания:</label>
            <div class="col-xs-9">
                <input type="date" min="1000-01-01" max="<?php echo date('Y-m-d'); ?>" class="form-control" id="create_date" name="create_date"
                       placeholder="Выберите дату создания" required value="<?php echo date('Y-m-d',strtotime($exhibit['create_date'])); ?>">
            </div>
        </div>

        <div class="form-group">
            <button type="submit" id="postButton" class="btn btn-success">Сохранить</button>
        </div>

    </div>
</form>