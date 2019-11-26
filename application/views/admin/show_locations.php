<h1 class="h3 mb-2 text-gray-800"><?php echo $page_title; ?></h1><ul class="list-group">    <?php if (empty($locations)): ?>        <p>Список местоположений пуст</p>    <?php else: ?>        <div class="card shadow mb-4">            <div class="card-header py-3">                <h6 class="m-0 font-weight-bold text-primary">Список местоположений</h6>            </div>            <div class="card-body">                <div class="table-responsive">                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">                        <tr>                            <th>ID</th>                            <th>Наименование</th>                            <th>Адрес</th>                            <th>Тип</th>                            <th>Редактировать</th>                            <th>Удалить</th>                        </tr>                        <?php foreach ($locations as $location): ?>                            <tr>                                <td>                                    <?php echo $location['location_id']; ?>                                </td>                                <td>                                    <?php echo $location['location']; ?>                                </td>                                <td>                                    <?php echo $location['address']; ?>                                </td>                                <td>                                    <?php echo $location['type']; ?>                                </td>                                <td>                                    <a class="btn btn-warning btn-circle btn-sm"                                       href="/admin/edit/location/<?php echo $location['location_id']; ?>">                                        <i class="fas fa-edit"></i>                                    </a>                                </td>                                <td>                                    <a class="btn btn-danger btn-circle btn-sm" href="#"                                       onclick="delete_commentary_confirm('/admin/delete/location/<?php echo $location['location_id']; ?>');">                                        <i class="fas fa-trash"></i>                                    </a>                                </td>                            </tr>                        <?php endforeach; ?>                    </table>                </div>            </div>        </div>    <?php endif; ?></ul>