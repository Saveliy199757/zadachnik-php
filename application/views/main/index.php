<header class="masthead" style="background-image: url('/public/images/phpcode.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Задачник PHP</h1>
                    <span class="subheading">"Путешествие длиной в тысячу ли начинается с первого шага" - поставь задачу, сделай шаг !</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-md-5 col-lg-5">
            <h2>Добавить задачу</h2>
            <form action="/admin/add" class="form_block" method="post">
                <div class="form-group">
                    <label>Ваше имя</label>
                    <input class="form-control" type="text" name="name">
                </div>
                <div class="form-group">
                    <label>Ваш Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="description" >
                </div>
                <div class="form-group">
                    <label>Текст задачи</label>
                    <textarea class="form-control" rows="3" name="text"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Добавить</button>
            </form>

        </div>

        <div class="col-lg-7 col-md-7 mx-auto">
            <?php if (empty($list)): ?>
                <p>Упс, здесь пока нет задач</p>
            <?php else: ?>
                <div >
                    <form action="/choise"  method="post" >
                        <label for="choise">Сортировать по:</label>
                        <select id="choise" name="select">
                            <option value="no-filtr" >без фильтра</option>
                            <option value="names-down"  >имени (по возрастанию)</option>
                            <option value="names-up"  >имени (по убыванию)</option>
                            <option value="status-no">статусу (не выполненные)</option>
                            <option value="status-do">статусу (выполненные)</option>
                            <option value="email-down">email (по возрастанию)</option>
                            <option value="email-up">email (по убыванию)</option>
                        </select>
                        <button type="submit" class="btn">выбрать</button>
                    </form>
                </div>

                <?php foreach ($list as $val): ?>

                    <div class="post-preview">
                        <a href="/post/<?php echo $val['id']; ?>">
                            <h2 class="post-title"><?php echo htmlspecialchars($val['name'], ENT_QUOTES); ?></h2>
                            <h5 class="post-subtitle"><?php echo htmlspecialchars($val['description'], ENT_QUOTES); ?></h5>
                        </a>
                        <p class="post-meta">Статус: <? if ($val['isdo'] === "do"):?> <button type="button" class="btn btn-success">Выполнено</button> <? else: ?> <button type="button" class="btn btn-danger">Ждёт выполнения</button>   <? endif;?></p>
                        <p class="post-meta">Идентфикатор этой задачи <?php echo $val['id']; ?></p>

                        <? if ($val['changed'] === 'true'):?>
                            <p class="post-meta">ИЗМЕНЕНО АДМИНИСТРАТОРОМ</p>
                        <? endif; ?>
                    </div>
                    <hr>
                <?php endforeach; ?>
                <div class="clearfix">
                    <?php echo $pagination; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>