<header class="masthead" style="background-image: url('/public/materials/<?php echo $data['id']; ?>.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1>Имя: <?php echo htmlspecialchars($data['name'], ENT_QUOTES); ?></h1>
                    <span class="subheading">Email: <?php echo htmlspecialchars($data['description'], ENT_QUOTES); ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <h2>Текст задачи:</h2>
            <p><?php echo htmlspecialchars($data['text'], ENT_QUOTES); ?></p>
        </div>
    </div>
</div>