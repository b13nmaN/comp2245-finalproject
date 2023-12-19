<aside>
    <nav>
        <ul>
            <li>
                <i class="icon" data-feather="home"></i>
                <a class="home" href="/comp2245-finalproject/index.php/home" >Home</a>
            </li>
            <li>
                <i class="icon" data-feather="user-plus"></i>
                <a class="new-contact" href="/comp2245-finalproject/index.php/new-contact"  >New Contact</a>
            </li>

            <?php if (isset($_SESSION['user']) && isset($_SESSION['user']['role'])): 
                // Check if the user is an admin to display the "Users" link
                $userRole = $_SESSION['user']['role'];
            ?>
                <?php if ($userRole === 'Admin'): ?>
                    <li>
                        <i class="icon" data-feather="users"></i>
                        <a class="users" href="/comp2245-finalproject/index.php/users">Users</a>
                    </li>
                <?php endif; ?>
            <?php endif;?>
            <li>
                <i class="icon" data-feather="log-out"></i>
                <a class="logout" href="logout.php">Logout</a>
            </li>
        </ul>
    </nav>
</aside>
