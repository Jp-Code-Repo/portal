document.addEventListener('DOMContentLoaded', () => {

    const userType = document.getElementById('user_type');
    const role = document.getElementById('role');

    if (!userType || !role) {
        return;
    }

    const roleOptions = Array.from(role.querySelectorAll('option'))
        .filter(option => option.dataset.userType);

    userType.addEventListener('change', function () {

        const selectedType = this.value;

        role.innerHTML = '';

        const placeholder = document.createElement('option');
        placeholder.value = '';
        placeholder.textContent = 'Select Role';
        placeholder.selected = true;

        role.appendChild(placeholder);

        roleOptions.forEach(option => {

            if (option.dataset.userType === selectedType) {
                role.appendChild(option.cloneNode(true));
            }

        });

        role.disabled = false;

    });

});