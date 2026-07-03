<script src="/assets/js/bootstrap.bundle.min.js"></script>

<script src="/assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>


    <?php if (flash_has('toast')): ?>

    <?php $toast = flash('toast'); ?>

    <script>

    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: '<?= $toast['type'] ?>',
        title: <?= json_encode($toast['message']) ?>,
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });

    </script>

    <?php endif; ?>


</body>
</html>