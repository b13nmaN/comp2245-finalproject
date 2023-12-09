<?php
$users = getAllUsers($conn);

?>


<main>
    <div class="dashboard-header">
        <h2>Users</h2>
        <button class="btn-primary add-user">Add user</button>
    </div>
    <div class="container-main">
        <div class="table">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created</th>
                </tr>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['firstname'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['role'] ?></td>
                        <td><?= $user['created_at'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</main>


