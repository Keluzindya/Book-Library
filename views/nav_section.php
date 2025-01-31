<body>
    <!--Nav Section-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="color: blue; font-weight: bold; font-size: 34px;">BookHaven</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <!-- users will see random books showing up once they click the link, they don't have to log in-->
                        <a class="nav-link active" aria-current="page"  href="index.php?action=exploreBooks">Explore Books</a>
                    </li>
                    
                    <?php
                    // add books, all books and users  will show once the user log in
                    
                        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] !== "user_not_logged") {
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="index.php?action=displayAddBook">Add Books</a>';
                            echo '</li>';
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="index.php?action=allBooks">All Books</a>';
                            echo '</li>';
                        }
                         // Users page only for admin users to see
                         if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'Admin') {
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="index.php?action=allUsers">Users</a>';
                            echo '</li>';
                        }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"  href="index.php?action=aboutUs">About Us</a>
                    </li>
        
                </ul>
                <!-- Log in, sign up, and log out will be on the right side-->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
                    <?php
                        if(!isset($_SESSION['user_logged']) || ($_SESSION['user_logged'] == "user_not_logged")){
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="index.php?action=signIn">Log In</a>';
                            echo '</li>';
                            echo '<b>|</b>';
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="index.php?action=signUp">Register</a>';
                            echo '</li>';
                        } else {
                            // once user log in or register then they will see log out
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="index.php?action=signOut">Log Out</a>';
                            echo '</li>';
                            
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</body>
