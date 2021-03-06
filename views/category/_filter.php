<?php
/** @var array $category app\models\Category */
/* @var boolean $isEndBranch */
/* @var integer $id */
?>
<div class="filter">

    <?=$this->render('_search') ?>
    <!-- FILTER -->
    <div class="well">

        <!-- Tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <?php if($isEndBranch) : ?>
                <li role="presentation" class="active">
                    <a href="#children" aria-controls="children" role="tab" data-toggle="tab">Подразделы</a>
                </li>
            <?php else: ?>
                <li role="presentation" class="active">
                    <a href="#ads" aria-controls="ads" role="tab" data-toggle="tab">Добавить объявление</a>
                </li>
            <?php endif; ?>
            <li role="presentation">
                <a href="#price" aria-controls="price" role="tab" data-toggle="tab">Цена</a>
            </li>
            <li role="presentation">
                <a href="#options" aria-controls="options" role="tab" data-toggle="tab">Операции</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <?php if($isEndBranch) : ?>
                <div role="tabpanel" class="tab-pane active" id="children">
                    <div class="row">
                        <?php
                        foreach ($category as $item) {
                            echo "<div class='col-sm-6'><a href='index.php?r=category&id=$item->id'>$item->name</a></div>";
                        }
                        ?>
                    </div>
                </div>
            <?php else: ?>
                <!-- NEW ADS -->
                <div role="tabpanel" class="tab-pane active" id="ads">
                    <div class="row">
                        <div class='col-sm-12'>
                            <h4>Добавить объявление в раздел "<?=$this->title?>"</h4>
                            <form action="?r=category/view" class="form-inline" method="post">
                                <input type="hidden" name="category_id" value="<?=$id?>">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Название" name="name">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Описание" name="description">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Цена" name="price">
                                </div>
                                <button type="submit" class="btn btn-default">Добавить</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /NEW ADS -->
            <?php endif; ?>
            <div role="tabpanel" class="tab-pane" id="price">
                <!-- PRICE CONTENT -->
                <div class="row">
                    <div class='col-sm-12'>
                        <form action="index.php" class="form-inline" method="get">
                            <input type="hidden" name="id" value="<?=$id?>">
                            <input type="hidden" name="r" value="category/index">
                            <div class="form-group">
                                <input class="form-control"
                                       type="text"
                                       placeholder="от"
                                       name="price_min"
                                       value="<?=isset($_GET['price_min']) ? $_GET['price_min'] : ''?>"
                                >
                            </div>
                            <div class="form-group">
                                <input class="form-control"
                                       type="text"
                                       placeholder="до"
                                       name="price_max"
                                       value="<?=isset($_GET['price_max']) ? $_GET['price_max'] : ''?>"
                                >
                            </div>
                            <button type="submit" class="btn btn-default">Применить фильтр</button>
                        </form>
                    </div>
                </div>
                <!-- /PRICE CONTENT -->
            </div>
            <div role="tabpanel" class="tab-pane" id="options">

                <!-- NEW CATEGORY -->
                <div class="row">
                    <div class='col-sm-12'>
                        <h4>Добавить подраздел</h4>
                        <form action="index.php?r=category&id=<?=$id?>" method="post" class="form-inline">
                            <input type="hidden" name="parent_id" value="<?=$id?>">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="end_branch" value="on">
                                    Конец ветки (Дочерние подразделы не будут видны)
                                </label>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Имя подраздела" name="name">
                            </div>
                            <button type="submit" class="btn btn-default">Добавить</button>
                        </form>
                    </div>

                </div>
                <!-- /NEW CATEGORY -->
            </div>
        </div>
        <!-- /Tab panes -->
    </div>
    <!-- /FILTER -->
</div>