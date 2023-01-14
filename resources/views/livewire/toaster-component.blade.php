<div>
    <script>
        window.addEventListener('alert', e => {
             showToast(
                e.detail.status,
                e.detail.title, 
                e.detail.message,
                true)
        })
    </script>
</div>
