<dialog id="deleteDialog" class="delete-dialog">
    <div class="delete-dialog__box">
        <h5 class="delete-dialog__title">Подтверждение удаления</h5>
        <p class="delete-dialog__text">
            А вы точно хотите удалить <strong id="deleteDialogTitle"></strong>?
        </p>
        <div class="delete-dialog__actions">
            <button type="button" class="btn btn-secondary" id="deleteDialogCancel">НЕТ</button>
            <a href="#" class="btn btn-danger" id="deleteDialogConfirm">ДА</a>
        </div>
    </div>
</dialog>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const dialog = document.getElementById('deleteDialog');
        const confirmBtn = document.getElementById('deleteDialogConfirm');
        const cancelBtn = document.getElementById('deleteDialogCancel');
        const titleEl = document.getElementById('deleteDialogTitle');

        // Клик по кнопке удаления
        document.querySelectorAll('.js-delete-btn').forEach(function (button) {

            button.addEventListener('click', function () {

                // Получаем данные из data-атрибутов
                const deleteUrl = button.getAttribute('data-delete-url');
                const deleteTitle = button.getAttribute('data-delete-title');

                // Подставляем название документа в модалку
                titleEl.textContent = deleteTitle;

                // Устанавливаем нужный URL для кнопки "ДА"
                confirmBtn.setAttribute('href', deleteUrl);

                // Открываем модальное окно
                dialog.showModal();
            });

        });

        // Кнопка "НЕТ"
        cancelBtn.addEventListener('click', function () {
            dialog.close();
        });

    });
</script>
