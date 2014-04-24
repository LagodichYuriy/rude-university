<? namespace rude; ?>

<?// require_once 'ajax/rude-ajax-education.php'; ?>

<div class="middle">
	<div class="ui message large">
		<div class="header">
			Навигация
		</div>
		<p>
			Все переходы между страницами осуществляются через тёмную боковую панель слева. Для удобства навигации боковая панель разделена на несколько смысловых разделов:
		</p>

		<p class="line-height-3px">• <?= RUDE_TEXT_INDEX_PAGE ?></p>
		<p class="line-height-3px">• <?= RUDE_TEXT_MANAGEMENT_COMPLEX ?></p>
		<p class="line-height-3px">• <?= RUDE_TEXT_SUMMARY_INFORMATION ?></p>
		<p class="line-height-3px">• <?= RUDE_TEXT_EDUCATIONAL_PROGRAM ?></p>
	</div>

	<div class="ui message large">
		<div class="header">
			<?= RUDE_TEXT_INDEX_PAGE ?>
		</div>
		<p>
			Страница ознакомления с комплексом (фактически, это то, что вы сейчас видите перед своими глазами)
		</p>
	</div>

	<div class="ui message large">
		<div class="header">
			<?= RUDE_TEXT_MANAGEMENT_COMPLEX ?>
		</div>
		<p>
			Страница управления пользователями комплекса (создание новых пользователей, присвоение им привелегий в системе)
		</p>
	</div>

	<div class="ui message large">
		<div class="header">
			<?= RUDE_TEXT_SUMMARY_INFORMATION ?>
		</div>
		<p>Обладает следующей структурой:</p>
		<p class="margin-bottom-17px-neg line-height-17px">• <?= RUDE_TEXT_MANAGEMENT_DEPARTMENTS ?>: добавление новых, редактирование, удаление.</p>
		<p class="margin-bottom-17px-neg line-height-17px">• <?= RUDE_TEXT_MANAGEMENT_FACULTIES ?>: добавление новых, редактирование, удаление.</p>
		<p class="margin-bottom-17px-neg line-height-17px">• <?= RUDE_TEXT_MANAGEMENT_QUALIFICATIONS ?>: добавление новых, редактирование, удаление.</p>
		<p class="margin-bottom-17px-neg line-height-17px padding-bottom-12px">• <?= RUDE_TEXT_MANAGEMENT_SPECIALTIES ?>: добавление новых, редактирование, удаление.</p>
	</div>

	<div class="ui message large">
		<div class="header">
			<?= RUDE_TEXT_EDUCATIONAL_PROGRAM ?>
		</div>
		<p class="line-height-3px margin-bottom-17px-neg line-height-17px">• <?= RUDE_TEXT_MANAGEMENT_REPORTS ?>. Отображает текущее состояние по имеющимся учебным планам в базе данных. Также возможно редактирование существующего плана.</p>
		<p class="line-height-3px margin-bottom-17px-neg line-height-17px padding-bottom-12px">• <?= RUDE_TEXT_MANAGEMENT_REPORTS_ADD ?>. Добавление нового учебного плана в базу данных.</p>
	</div>

	<div class="ui message large">
		<div class="header">
			Выход из системы
		</div>
		<p class="line-height-3px margin-bottom-17px-neg line-height-17px padding-bottom-12px">Данная опция актуальна только для тех, кто работает в текущий момент на компьютере, который доступен для использования другим пользователям (такими, как, например, студентам). Желанием выхода может является тот факт, что логин и пароль пользователя для работы в данном комплексе спрашивается один раз, после чего браузер (Chrome, Opera, FireFox и другие) не требуют повторной авторизации для своей работы. В том случае, если вы хотите прервать работу, достаточно нажать на кнопку <b>"<?= RUDE_TEXT_LOGOUT ?>"</b> на панели слева, после чего текущая работа с комплексом будет прекращена, а вы сами будете перенаправлены на форму повторной авторизации, считаясь неавторизированным пользователем комплекса.</p>
	</div>
</div>