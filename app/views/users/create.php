<?php
?>

<h2 class="mb-4">Create User</h2>

<form
    method="POST"
    action="/users/store"
>

    <!-- User Information -->

    <div class="card dashboard-card mb-4">

        <div class="card-header bg-white">

            <h5 class="fw-bold text-primary mb-0">
                <i class="bi bi-person-badge me-2"></i>
                User Information
            </h5>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Department
                    </label>

                    <select
                        name="dept_id"
                        class="form-select"
                    >

                        <option selected disabled>
                            Select Department
                        </option>

                        <?php foreach ($departments as $department): ?>

                            <option
                                value="<?= $department['id'] ?>"
                                <?= old('dept_id', 0) == $department['id'] ? 'selected' : '' ?>
                            >
                                <?= htmlspecialchars($department['name']) ?>
                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        User Type
                    </label>

                    <select
                        name="user_type"
                        id="user_type"
                        class="form-select"
                    >

                        <option selected disabled>
                            Select User Type
                        </option>

                        <option
                            value="employee"
                            <?= old('user_type') === 'employee' ? 'selected' : '' ?>
                        >
                            Employee
                        </option>

                        <option
                            value="student"
                            <?= old('user_type') === 'student' ? 'selected' : '' ?>
                        >
                            Student
                        </option>

                    </select>

                </div>

                <div class="col-md-6">

                    <label class="form-label">
                        Institutional Number
                    </label>

                    <input
                        type="text"
                        name="inst_no"
                        class="form-control"
                        value="<?= htmlspecialchars((string) old('inst_no')) ?>"
                    >

                </div>

                <div class="col-md-6">

                    <label class="form-label">
                        ID Number
                    </label>

                    <input
                        type="text"
                        name="id_no"
                        class="form-control"
                        value="<?= htmlspecialchars((string) old('id_no')) ?>"
                    >

                </div>

            </div>

        </div>

    </div>

    <!-- Personal Information -->

    <div class="card dashboard-card mb-4">

        <div class="card-header bg-white">

            <h5 class="fw-bold text-primary mb-0">
                <i class="bi bi-person-vcard me-2"></i>
                Personal Information
            </h5>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4">

                    <label class="form-label">
                        Last Name
                    </label>

                    <input
                        type="text"
                        name="last_name"
                        class="form-control"
                        value="<?= htmlspecialchars((string) old('last_name')) ?>"
                    >

                </div>

                <div class="col-md-4">

                    <label class="form-label">
                        First Name
                    </label>

                    <input
                        type="text"
                        name="first_name"
                        class="form-control"
                        value="<?= htmlspecialchars((string) old('first_name')) ?>"
                    >

                </div>

                <div class="col-md-3">

                    <label class="form-label">
                        Middle Name
                    </label>

                    <input
                        type="text"
                        name="middle_name"
                        class="form-control"
                        value="<?= htmlspecialchars((string) old('middle_name')) ?>"
                    >

                </div>

                <div class="col-md-1">

                    <label class="form-label">
                        Extension
                    </label>

                    <input
                        type="text"
                        name="extension_name"
                        class="form-control"
                        placeholder="Jr."
                        value="<?= htmlspecialchars((string) old('extension_name')) ?>"
                    >

                </div>

            </div>

        </div>

    </div>

    <!-- Account Information -->

    <div class="card dashboard-card mb-4">

        <div class="card-header bg-white">

            <h5 class="fw-bold text-primary mb-0">
                <i class="bi bi-shield-lock me-2"></i>
                Account Information
            </h5>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        value="<?= htmlspecialchars((string) old('username')) ?>"
                    >

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="<?= htmlspecialchars((string) old('email')) ?>"
                    >

                </div>

                <div class="col-12">

                    <label class="form-label">
                        Password
                    </label>

                    <div class="alert alert-info mb-0">

                        <i class="bi bi-info-circle me-2"></i>

                        <strong>Temporary Password</strong>
                        will be generated automatically when the
                        user account is created.

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Access Control -->

    <div class="card dashboard-card mb-4">

        <div class="card-header bg-white">

            <h5 class="fw-bold text-primary mb-0">
                <i class="bi bi-key me-2"></i>
                Access Control
            </h5>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6">

                    <label class="form-label">
                        Role
                    </label>

                    <select
                        name="role"
                        id="role"
                        class="form-select"
                        disabled
                    >

                        <option value="">
                            Select User Type First
                        </option>

                        <?php foreach ($roles as $role): ?>

                            <option
                                value="<?= htmlspecialchars($role['code']) ?>"
                                data-user-type="<?= htmlspecialchars($role['user_type']) ?>"
                                <?= old('role') === $role['code'] ? 'selected' : '' ?>
                            >
                                <?= htmlspecialchars($role['name']) ?>
                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="col-md-6">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select"
                    >

                        <option
                            value="1"
                            <?= old('status', 1) == 1 ? 'selected' : '' ?>
                        >
                            Active
                        </option>

                        <option
                            value="0"
                            <?= old('status', 1) == 0 ? 'selected' : '' ?>
                        >
                            Inactive
                        </option>

                    </select>

                </div>

            </div>

        </div>

    </div>

    <div class="d-flex justify-content-end gap-2">

        <a
            href="/users"
            class="btn btn-outline-secondary"
        >
            Cancel
        </a>

        <button
            type="submit"
            class="btn btn-primary"
        >
            Save User
        </button>

    </div>

    <script src="/assets/js/users/create.js"></script>

</form>