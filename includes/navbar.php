<!-- navbar.php -->
<nav>
    <ul>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <li><a href="dashboard_admin.php">Dashboard Admin</a></li>
            <li><a href="input_data.php">Input Data PKL</a></li>
        <?php else: ?>
            <li><a href="dashboard_user.php">Dashboard User</a></li>
            <li><a href="view_database.php">Lihat Data PKL</a></li>
        <?php endif; ?>
        <li><a href="logout.php" id="logoutButton">Logout</a></li>
    </ul>
</nav>
