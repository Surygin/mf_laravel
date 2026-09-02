<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('content')) {
            CKEDITOR.replace('content', {
                // ОСНОВНЫЕ НАСТРОЙКИ
                filebrowserUploadUrl: "{{ route('ckeditor.image.upload') }}?_token={{ csrf_token() }}",
                filebrowserImageUploadUrl: "{{ route('ckeditor.image.upload') }}?_token={{ csrf_token() }}",
                filebrowserFlashUploadUrl: "{{ route('ckeditor.image.upload') }}?_token={{ csrf_token() }}",

                // ОБЯЗАТЕЛЬНО для появления вкладки "Загрузить"
                filebrowserUploadMethod: 'form',

                // ОСТАЛЬНЫЕ НАСТРОЙКИ
                height: 400,
                language: 'ru',
                removeButtons: 'Save,Print,ExportPdf,Flash,Smiley,PageBreak,Iframe',
            });
        }
    });
</script>

<script>
    console.log('CKEditor:', CKEDITOR.version);

    console.log(
        'filebrowser plugin:',
        CKEDITOR.plugins.registered.filebrowser
    );

    console.log(
        'image plugin:',
        CKEDITOR.plugins.registered.image
    );
</script>

{{--<!-- Подключаем CKEditor -->--}}
{{--<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>--}}

{{--<script type="text/javascript">--}}
{{--    document.addEventListener('DOMContentLoaded', function() {--}}
{{--        // Проверяем, что элемент существует--}}
{{--        if (document.getElementById('content')) {--}}
{{--            CKEDITOR.replace('content', {--}}
{{--                // URL для загрузки файлов--}}
{{--                filebrowserUploadUrl: "{{ route('ckeditor.image.upload') }}?_token={{ csrf_token() }}",--}}
{{--                filebrowserUploadMethod: 'form',--}}

{{--                // Настройки редактора--}}
{{--                height: 400,--}}
{{--                language: 'ru',--}}

{{--                // Убираем лишние кнопки--}}
{{--                removeButtons: 'Save,Print,ExportPdf,Flash,Smiley,PageBreak,Iframe',--}}

{{--                // Добавляем все нужные кнопки--}}
{{--                toolbar: [--}}
{{--                    { name: 'document', items: ['Source', '-', 'NewPage', 'Preview'] },--}}
{{--                    { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },--}}
{{--                    { name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll'] },--}}
{{--                    '/',--}}
{{--                    { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'] },--}}
{{--                    { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },--}}
{{--                    { name: 'links', items: ['Link', 'Unlink', 'Anchor'] },--}}
{{--                    { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar'] },--}}
{{--                    '/',--}}
{{--                    { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize'] },--}}
{{--                    { name: 'colors', items: ['TextColor', 'BGColor'] },--}}
{{--                    { name: 'tools', items: ['Maximize', 'ShowBlocks'] },--}}
{{--                    { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar'] }--}}
{{--                ]--}}
{{--            });--}}

{{--            console.log('CKEditor инициализирован');--}}
{{--        } else {--}}
{{--            console.error('Элемент #content не найден');--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
