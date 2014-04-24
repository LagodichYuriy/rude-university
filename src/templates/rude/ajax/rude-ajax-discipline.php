<?

namespace rude;

class ajax_discipline
{
    public static function add()
    {
        $name       = get(RUDE_FIELD_NAME);
        $type       = get(RUDE_FIELD_NAME_TYPE_NAME);

        $q = new query(RUDE_TABLE_DISCIPLINES_TYPES);
        $q->where(RUDE_FIELD_NAME, $type);
        $q->start();

        $type = $q->get_object();
        if ($type === null)
        {
            die();
        }

        $type_id = $type->id;

        $discipline_id = disciplines::add($name, $type_id);
    }

    public static function delete()
    {
        $name = get(RUDE_FIELD_NAME);
        disciplines::delete($name);
    }

    public static function html_form_add()
    {
        if (!ajax_user::has_access())
        {
            die();
        }

        ?>
        <html>
        <? require_once(RUDE_TEMPLATE_DIR . '/rude-header.php') ?>

        <body class="ajax_bg">
        <div>
            <h1>Добавление Дисциплины</h1>
            <p>Форма для добавления новых дисциплин</p>
            <form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_DISCIPLINE_ADD_FORM ?>">

                <div class="field">
                    <label>Наименование</label>
                    <div class="ui left labeled icon input">
                        <input id="<?=RUDE_FIELD_NAME?>" name="<?=RUDE_FIELD_NAME?>" type="text" placeholder="Наименование">
                        <i class="user icon"></i>
                        <div class="ui corner label">
                            <i class="icon asterisk"></i>
                        </div>
                    </div>
                </div>



                <div class="field">
                    <label>Тип</label>
                    <div class="ui fluid selection dropdown">
                        <div class="text">выберите тип дисциплины</div>
                        <i class="dropdown icon"></i>
                        <input type="hidden" id="<?=RUDE_FIELD_NAME_TYPE_NAME?>">
                        <div class="menu">
                            <?	$types_list = disciplines::get_types();
                            foreach ($types_list as $type)
                            {
                                ?>
                                <div class="item" data-value="<?= $type->name  ?>"><?= $type->name ?></div>
                            <?
                            }?>
                        </div>
                    </div>
                </div>

                <div id="submit" class="ui blue submit button">Добавить</div>
            </form>
        </div>
        <script>
            $('.ui.selection.dropdown')
                .dropdown()
            ;
            $('.ui.form').form(
                {
                    name:
                    {
                        identifier: 'name',

                        rules:
                            [{
                                type: 'empty',
                                prompt: 'Пожалуйста, введите наименование дисциплины'
                            }]
                    }

                });

            $(".form").submit(function (event) {

                event.preventDefault();

                var name        = $('#<?= RUDE_FIELD_NAME ?>').val();

                var type        = $('#<?= RUDE_FIELD_NAME_TYPE_NAME ?>').val();

                if (!name )
                {
                    return true; // allow default semantic-UI validation
                }

                $.ajax({
                    type: 'POST',
                    url: 'index.php',
                    data: {
                        task:     '<?= RUDE_TASK_AJAX ?>',
                        target:   '<?= RUDE_TASK_AJAX_DISCIPLINE_ADD ?>',

                        name: name,
                        type: type
                    },

                    success: function(data)
                    {
                        parent.$.fancybox.close();
                    }
                });

                return true;
            });
        </script>


        </body>

        </html>
    <?
    }

    public static function edit()
    {
        if (!ajax_user::has_access())
        {
            die();
        }

        $id         = get(RUDE_FIELD_ID);
        $name       = get(RUDE_FIELD_NAME);
        $type       = get(RUDE_FIELD_NAME_TYPE_NAME);

        $type_id = disciplines::get_type_by_id($type);
        $q = new uquery(RUDE_TABLE_DISCIPLINES);

        if ($name)      { $q->update(RUDE_FIELD_NAME,                     $name); }
        if ($type_id)   { $q->update(RUDE_FIELD_NAME_TYPE_ID,        (int)$type_id); }




        $q->where(RUDE_FIELD_ID, (int) $id);
        $q->limit(1);
        $q->start();
    }

    public static function html_form_edit()
    {
        if (!ajax_user::has_access())
        {
            die();
        }

        ?>
        <html>
        <? require_once(RUDE_TEMPLATE_DIR . '/rude-header.php');

        $name = get(RUDE_FIELD_NAME);

        $discipline = disciplines::get($name);?>

        <body class="ajax_bg">
        <div>
            <h1>Изменение дисциплины</h1>
            <p>Форма для изменения дисциплины</p>
            <form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_DISCIPLINE_EDIT_FORM ?>">

                <div class="field" hidden>
                    <label>id</label>
                    <div class="ui left labeled icon input">
                        <input id="<?=RUDE_FIELD_ID?>" name="<?=RUDE_FIELD_ID?>" type="text" value="<?= $name?>" placeholder="">
                        <i class="user icon"></i>
                        <div class="ui corner label">
                            <i class="icon asterisk"></i>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label>Наименование</label>
                    <div class="ui left labeled icon input">
                        <input id="<?=RUDE_FIELD_NAME?>" name="<?=RUDE_FIELD_NAME?>" type="text" value="<?= $discipline->name?>" placeholder="Наименование">
                        <i class="user icon"></i>
                        <div class="ui corner label">
                            <i class="icon asterisk"></i>
                        </div>
                    </div>
                </div>




                <div class="field">
                    <label>Тип</label>
                    <div class="ui fluid selection dropdown">
                        <div class="text">Выберите</div>
                        <i class="dropdown icon"></i>
                        <input type="hidden" id="<?=RUDE_FIELD_NAME_TYPE_NAME?>" value="<?= $discipline->name ?>">
                        <div class="menu">
                            <?	$types_list = disciplines::get_types();
                            foreach ($types_list as $type)
                            {
                                ?>
                                <div class="item" data-value="<?= $type->name  ?>"><?= $type->name  ?></div>
                            <?
                            }?>
                        </div>
                    </div>
                </div>



                <div id="submit" class="ui blue submit button">Изменить</div>
            </form>
        </div>
        <script>
            $('.ui.selection.dropdown')
                .dropdown()
            ;
            $('.ui.form').form(
                {
                    name:
                    {
                        identifier: 'username',

                        rules:
                            [{
                                type: 'empty',
                                prompt: 'Пожалуйста, введите наименование факультета'
                            }]
                    }
                });

            $(".form").submit(function (event) {

                event.preventDefault();

                var id              = $('#<?= RUDE_FIELD_ID ?>').val();
                var name            = $('#<?= RUDE_FIELD_NAME ?>').val();
                var type            = $('#<?= RUDE_FIELD_NAME_TYPE_NAME ?>').val();

                if (!name )
                {
                    return true; // allow default semantic-UI validation

                }

                $.ajax({
                    type: 'POST',
                    url: 'index.php',
                    data: {
                        task:     '<?= RUDE_TASK_AJAX ?>',
                        target:   '<?= RUDE_TASK_AJAX_DISCIPLINE_EDIT ?>',

                        id:     id,
                        name:   name,
                        type:   type
                    },

                    success: function(data)
                    {
                        parent.$.fancybox.close();
                    }
                });

                return true;
            });
        </script>


        </body>

        </html>
    <?
    }

    public static function html_form_delete()
    {
        if (!ajax_user::has_access())
        {
            die();
        }

        $name = get(RUDE_FIELD_NAME);


        ?>
        <html>
        <? require_once(RUDE_TEMPLATE_DIR . '/rude-header.php') ?>

        <body class="ajax_bg">
        <div>
            <h1>Удаление дисциплины</h1>
            <p class="red">Внимание! Данная операция необратима!</p>
            <form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_DISCIPLINE_DELETE ?>">
                Вы точно уверены, что хотите удалить дисциплину <b>"<?= $name ?></b>"?
                <div class="button-box">
                    <button class="ui blue submit button"  type="submit" onclick="delete_discipline('<?= $name ?>'); parent.$.fancybox.close();">Да</button>
                    <button style="float: right !important;" class="ui blue submit button"  type="submit" onclick="parent.$.fancybox.close();">Нет</button>
                </div>
            </form>
        </div>
        <script>
            function delete_discipline(name)
            {
                $.ajax({
                    type: 'POST',
                    url: 'index.php',
                    data: {
                        task:     '<?= RUDE_TASK_AJAX ?>',
                        target:   '<?= RUDE_TASK_AJAX_DISCIPLINE_DELETE ?>',
                        name: '<?= $name ?>'
                    },

                    success: function(data)
                    {
                        parent.$.fancybox.close();
                    }
                });
            }
        </script>


        </body>

        </html>
    <?
    }

    public static function html()
    {
        ?>
        <table id="info_disciplines" class="ui collapsing table segment full-width">
            <thead class="small-font">
            <th>#</th>
            <th>Наименование</th>
            <th>Тип</th>
            <th></th>
            <th></th>
            </thead>

            <?

            $disciplines_list = disciplines::get();

            foreach ($disciplines_list as $discipline)
            {
                ?>
                <tr>
                    <td><?= $discipline->{RUDE_FIELD_ID} ?></td>
                    <td><?= $discipline->{RUDE_FIELD_NAME} ?></td>
                    <td><?= $discipline->{RUDE_FIELD_NAME_TYPE_NAME} ?></td>
                    <td class="no-padding width-20px">
                        <a href="<?= url::ajax(RUDE_TASK_AJAX_DISCIPLINE_EDIT_FORM) . url::param(RUDE_FIELD_NAME, $discipline->name) ?>" class="fancybox-disciplines-edit"><img src="src/icons/edit.png" class="small-padding" title="<?= RUDE_TEXT_EDIT ?>" /></a>
                    </td>
                    <td class="no-padding no-border width-20px">
                        <a href="<?= url::ajax(RUDE_TASK_AJAX_DISCIPLINE_DELETE_FORM) . url::param(RUDE_FIELD_NAME, $discipline->name) ?>" class="fancybox-disciplines-delete"><img src="src/icons/remove.png" class="small-padding" title="<?= RUDE_TEXT_DELETE_SELECTED ?>" /></a>
                    </td>
                </tr>
            <?
            }
            ?>
        </table>
    <?
    }
}