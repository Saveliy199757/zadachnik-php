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
                        <form action="/admin/add" class="form_block" method="post">
                            <div class="form-group">
                                <label>Имя</label>
                                <input class="form-control" type="text" name="name"  >
                            </div>
                            <div class="form-group">
                                <label>Еmail</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="description"  >
                            </div>
                            <div class="form-group">
                                <label>Текст задачи</label>
                                <textarea class="form-control" rows="3" name="text"  ></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Добавить</button>
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