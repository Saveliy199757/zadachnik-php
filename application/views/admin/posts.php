<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">Задачи</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <?php if (empty($list)): ?>
                            <p>Список постов пуст</p>
                        <?php else: ?>
                            <table class="table">
                                <tr>
                                    <th>Имя</th>
                                    <th>Email</th>
                                    <th>Редактировать</th>
                                    <th>Статус</th>
                                </tr>
                                <?php foreach ($list as $val): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($val['name'], ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['description'], ENT_QUOTES); ?></td>
                                        <td><a href="/admin/edit/<?php echo $val['id']; ?>" class="btn btn-primary">Редактировать</a></td>
                                        <td><a href="/admin/delete/<?php echo $val['id']; ?>" <? if($val['isdo'] === 'do'): ?> class="btn btn-success" <? else: ?> class="btn btn-danger"   <? endif; ?>>Сделано</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <?php echo $pagination; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>