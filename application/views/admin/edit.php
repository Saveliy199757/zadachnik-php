<?php
use application\core\View;

if (isset($_SESSION['admin'])): ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/edit/<?php echo $data['id']; ?>"  class="form_block" method="post"  >
                            <div class="form-group">
                                <label>Имя</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['name'], ENT_QUOTES); ?>" name="name">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['description'], ENT_QUOTES); ?>"  name="description">
                            </div>
                            <div class="form-group">
                                <label>Текст</label>
                                <textarea class="form-control" rows="3" name="text"><?php echo htmlspecialchars($data['text'], ENT_QUOTES); ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block"  >Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else:
    View::errorCode(403);
    ?>

<?php endif; ?>