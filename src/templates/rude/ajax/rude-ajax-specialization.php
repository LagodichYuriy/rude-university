<?

namespace rude;

class ajax_specialization
{
    public static function add()
    {
        $name      = get(RUDE_FIELD_NAME);
        $code      = get(RUDE_FIELD_CODE);

        if ($name === false or $code === false)
        {
            return false;
        }


        $specialization_id = specializations::add($name, $code);
        return $specialization_id;
    }

    public static function delete()
    {
        $name = get(RUDE_FIELD_NAME);
        specializations::delete($name);
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
            <h1>Добавление специализации</h1>
            <p>Форма для добавления специализаций</p>
            <form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_SPECIALIZATION_ADD_FORM ?>">
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
                    <label>Код специализации</label>
                    <div class="ui left labeled icon input">
                        <input id="<?=RUDE_FIELD_CODE?>" name="<?=RUDE_FIELD_CODE?>" type="text" placeholder="Код специализации">
                        <i class="user icon"></i>
                        <div class="ui corner label">
                            <i class="icon asterisk"></i>
                        </div>
                    </div>
                </div>

                <div id="submit" class="ui blue submit button">Добавить</div>
            </form>
        </div>
        <script>
            $('.ui.form').form(
                {
                    name:
                    {
                        identifier: 'name',

                        rules:
                            [{
                                type: 'empty',
                                prompt: 'Пожалуйста, введите наименование специлазиации'
                            }]
                    },

                    code:
                    {
                        identifier: 'code',

                        rules:
                            [{
                                type: 'empty',
                                prompt: 'Пожалуйста, введите код специализации'
                            }]
                    }


                });

            $(".form").submit(function (event) {

                event.preventDefault();

                var specialization_name = $('#name').val();
                var specialization_code = $('#code').val();

                if (!specialization_name || !specialization_code)
                {
                    return true; // allow default semantic-UI validation
                }

                $.ajax({
                    type: 'POST',
                    url: 'index.php',
                    data: {
                        task:     '<?= RUDE_TASK_AJAX ?>',
                        target:   '<?= RUDE_TASK_AJAX_SPECIALIZATION_ADD ?>',

                        name: specialization_name,
                        code: specialization_code
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

        $id     = get(RUDE_FIELD_ID);
        $name   = get(RUDE_FIELD_NAME);
        $code   = get(RUDE_FIELD_CODE);


        $q = new uquery(RUDE_TABLE_SPECIALIZATIONS);

        if ($name) { $q->update(RUDE_FIELD_NAME,       $name); }
        if ($code) { $q->update(RUDE_FIELD_CODE,       $code); }




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
        <? require_once(RUDE_TEMPLATE_DIR . '/rude-header.php') ?>
        <? $name = get(RUDE_FIELD_NAME);
        $specializations = specializations::get($name)?>
        <body class="ajax_bg">
        <div>
            <h1>Редактирование специализации</h1>
            <p>Форма для изменения специализации</p>
            <form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_SPECIALIZATION_EDIT_FORM ?>">
                <div class="field" hidden>
                    <label>ID</label>
                    <div class="ui left labeled icon input">
                        <input id="<?=RUDE_FIELD_ID?>" name="<?=RUDE_FIELD_ID?>" value="<?=$specializations->id?>" type="text" placeholder="ID">
                        <i class="user icon"></i>
                        <div class="ui corner label">
                            <i class="icon asterisk"></i>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>Наименование</label>
                    <div class="ui left labeled icon input">
                        <input id="<?=RUDE_FIELD_NAME?>" name="<?=RUDE_FIELD_NAME?>" value="<?=$specializations->name?>" type="text" placeholder="Наименование">
                        <i class="user icon"></i>
                        <div class="ui corner label">
                            <i class="icon asterisk"></i>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>Код</label>
                    <div class="ui left labeled icon input">
                        <input id="<?=RUDE_FIELD_CODE?>" name="<?=RUDE_FIELD_CODE?>" value="<?=$specializations->code?>" type="text" placeholder="Код">
                        <i class="user icon"></i>
                        <div class="ui corner label">
                            <i class="icon asterisk"></i>
                        </div>
                    </div>
                </div>

                <div id="submit" class="ui blue submit button">Изменить</div>
            </form>
        </div>
        <script>
            $('.ui.form').form(
                {
                    name:
                    {
                        identifier: 'name',

                        rules:
                            [{
                                type: 'empty',
                                prompt: 'Пожалуйста, введите наименование специализации'
                            }]
                    },

                    code:
                    {
                        identifier: 'code',

                        rules:
                            [{
                                type: 'empty',
                                prompt: 'Пожалуйста, введите код специализации'
                            }]
                    }


                });

            $(".form").submit(function (event) {

                event.preventDefault();
                var specialization_id   = $('#id').val();
                var specialization_name = $('#name').val();
                var specialization_code = $('#code').val();

                if (!specialization_name || !specialization_code || !specialization_id)
                {
                    return true; // allow default semantic-UI validation
                }

                $.ajax({
                    type: 'POST',
                    url: 'index.php',
                    data: {
                        task:     '<?= RUDE_TASK_AJAX ?>',
                        target:   '<?= RUDE_TASK_AJAX_SPECIALIZATION_EDIT ?>',

                        name:   specialization_name,
                        code:   specialization_code,
                        id:     specialization_id
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
            <h1>Удаление специализации</h1>
            <p class="red">Внимание! Данная операция необратима!</p>
            <form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_SPECIALIZATION_DELETE ?>">
                Вы точно уверены, что хотите удалить специализацию? <b>"<?= $name ?></b>"?
                <div class="button-box">
                    <button class="ui blue submit button"  type="submit" onclick="delete_specialization('<?= $name ?>'); parent.$.fancybox.close();">Да</button>
                    <button style="float: right !important;" class="ui blue submit button"  type="submit" onclick="parent.$.fancybox.close();">Нет</button>
                </div>
            </form>
        </div>
        <script>
            function delete_specialization(name)
            {
                $.ajax({
                    type: 'POST',
                    url: 'index.php',
                    data: {
                        task:     '<?= RUDE_TASK_AJAX ?>',
                        target:   '<?= RUDE_TASK_AJAX_SPECIALIZATION_DELETE ?>',
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
        <table id="info_specializations" class="ui collapsing table segment full-width">
            <thead class="small-font">
            <th>#</th>
            <th>Наименование</th>
            <th>Код</th>
            <th></th>
            <th></th>
            </thead>

            <?

            $specialization_list = specializations::get();

            foreach ($specialization_list as $specialization)
            {
                ?>
                <tr>
                    <td><?= $specialization->{RUDE_FIELD_ID} ?></td>
                    <td><?= $specialization->{RUDE_FIELD_NAME} ?></td>
                    <td><?= $specialization->{RUDE_FIELD_CODE} ?></td>
                    <td class="no-padding width-20px">
                        <a href="<?= url::ajax(RUDE_TASK_AJAX_SPECIALIZATION_EDIT_FORM) . url::param(RUDE_FIELD_NAME, $specialization->name) ?>" class="fancybox-faculties-edit"><img src="src/icons/edit.png" class="small-padding" title="<?= RUDE_TEXT_EDIT ?>" /></a>
                    </td>
                    <td class="no-padding no-border width-20px">
                        <a href="<?= url::ajax(RUDE_TASK_AJAX_SPECIALIZATION_DELETE_FORM) . url::param(RUDE_FIELD_NAME, $specialization->name) ?>" class="fancybox-faculties-delete"><img src="src/icons/remove.png" class="small-padding" title="<?= RUDE_TEXT_DELETE_SELECTED ?>" /></a>
                    </td>
                </tr>
            <?
            }
            ?>
        </table>
    <?
    }
}