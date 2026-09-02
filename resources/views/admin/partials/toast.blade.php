@if(session('success'))
    <style>
        .toast{
            position: fixed;
            top: 50px;
            right: 20px;
        }
    </style>

    <div class="toast align-items-center show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close me-2 m-auto" id="closeToast" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>

    <script>
        const closeBtn = document.getElementById('closeToast');
        const toast = document.querySelector('.toast');

        if (closeBtn && toast) {
            const close = () => toast.classList.remove('show');
            closeBtn.addEventListener('click', close);
            setTimeout(close, 5000);
        }
    </script>
@endif
