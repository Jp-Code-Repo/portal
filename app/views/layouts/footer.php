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

    <?php if (flash_has('temporary_password')): ?>

    <?php $credentials = flash('temporary_password'); ?>

    <script>

    Swal.fire({
        icon: 'success',
        title: 'User Created Successfully',
        html: `
            <div class="text-start">

                <p>
                    <strong>Username</strong><br>
                    <?= htmlspecialchars($credentials['username']) ?>
                </p>

                <p>
                    <strong>Temporary Password</strong>
                </p>

                <div class="input-group">
                    <input
                        id="temporary-password"
                        class="form-control"
                        type="text"
                        readonly
                        value="<?= htmlspecialchars($credentials['password']) ?>">
                    <button
                        class="btn btn-primary"
                        type="button"
                        id="copy-password">
                        Copy
                    </button>
                </div>

                <small class="text-danger d-block mt-3">
                    Save this password now.
                    It will only be shown once.
                </small>

            </div>
        `,
        confirmButtonText: 'Done',
        allowOutsideClick: false,
        didOpen: () => {

            const copyButton = document.getElementById('copy-password');

            const passwordInput = document.getElementById('temporary-password');

            copyButton.addEventListener('click', async () => {

                try {

                    await navigator.clipboard.writeText(passwordInput.value);

                    copyButton.innerHTML = 'Copied ✓';

                    setTimeout(() => {
                        copyButton.innerHTML = 'Copy';
                    }, 1500);

                } catch (error) {

                    passwordInput.select();

                    document.execCommand('copy');

                    copyButton.innerHTML = 'Copied ✓';

                    setTimeout(() => {
                        copyButton.innerHTML = 'Copy';
                    }, 1500);

                }

            });

        }
    });

    </script>

    <?php endif; ?>


</body>
</html>