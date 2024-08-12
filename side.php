<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        .sidebar {
            width: 270px;
            background-color: #281623;
        }

        .menu-item {
            margin-bottom: 20px;
            padding: 10px 0;
        }

        .menu-item a {
            color: #fff;
            text-decoration: none;
        }

        .menu-title {
            padding: 10px ;
            cursor: pointer;
            display: flex;
            align-items: center;
            font-size: 16px;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .menu-title i {
            margin-right: 10px;
        }

        .menu-title:hover, .menu-title.active {
            background-color: #525453;
        }

        .submenu {
            display: none;
            margin-left: 20px;
            border-radius: 13px;
        }

        .submenu-item {
            padding: 10px;
            margin-top: 20px;
            cursor: pointer;
            color: #fff;
            font-size: 14px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .submenu-item i {
            margin-right: 10px;
        }

        .submenu-item:hover, .submenu-item.active {
            background-color: #3c3c3c;
        }

        /* CSS for rotating the icon */
        .rotate-up {
            transform: rotate(180deg);
            transition: transform 0.3s;
        }
    </style>
</head>
<body>
   
    <div class="sidebar">
        <!-- Dashboard Menu Item -->
        <div class="menu-item">
            <a href="maindashboard.php">
                <div class="menu-title" data-page="maindashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</div>
            </a>
        </div>
        <!-- Thanksgiving Menu Item with Submenu -->
        <div class="menu-item">
            <div class="menu-title" onclick="toggleSubMenu(this)" data-submenu="submenu-thanksgiving" style="display: flex; justify-content: space-between; align-items: center;">
                <a href="birthday.php"><i class="fas fa-calendar-alt"></i> Thanksgiving</a>
                <i class="fas fa-chevron-down menu-toggle-icon"></i>
            </div>
            <div class="submenu" id="submenu-thanksgiving">
                <a href="dashboard.php"><div class="submenu-item" data-page="dashboard.php"><i class="fas fa-birthday-cake"></i> Thanksgiving Pictures</div></a>
                <a href="thankgiven.php"><div class="submenu-item" data-page="thankgiven.php"><i class="fas fa-images"></i> Thanksgiving Slide</div></a>
                <a href="video.php"><div class="submenu-item" data-page="video.php"><i class="fas fa-video"></i> Thanksgiving Video</div></a>
            </div>
        </div>
        <!-- Breakfast Menu Item with Submenu -->
        <div class="menu-item">
            <div class="menu-title" onclick="toggleSubMenu(this)" data-submenu="submenu-breakfast" style="display: flex; justify-content: space-between; align-items: center;">
                <a href="breakfast_pictures.php"><i class="fas fa-calendar-alt"></i> Breakfast</a>
                <i class="fas fa-chevron-down menu-toggle-icon"></i>
            </div>
            <div class="submenu" id="submenu-breakfast">
                <a href="Brakefast.php"><div class="submenu-item" data-page="Brakefast.php"><i class="fas fa-birthday-cake"></i> Breakfast Pictures</div></a>
                <a href="#"><div class="submenu-item" data-page="#"><i class="fas fa-images"></i> Breakfast Slide</div></a>
                <a href="breakfast_videos.php"><div class="submenu-item" data-page="breakfast_videos.php"><i class="fas fa-video"></i> Breakfast Videos</div></a>
            </div>
        </div>
        <!-- Birthday Party Menu Item with Submenu -->
        <div class="menu-item">
            <div class="menu-title" onclick="toggleSubMenu(this)" data-submenu="submenu-party" style="display: flex; justify-content: space-between; align-items: center;">
                <a href="Party.php"><i class="fas fa-calendar-alt"></i> Birthday Party</a>
                <i class="fas fa-chevron-down menu-toggle-icon"></i>
            </div>
            <div class="submenu" id="submenu-party">
                <a href="Partyimage.php"><div class="submenu-item" data-page="Partyimage.php"><i class="fas fa-birthday-cake"></i> Party Pictures</div></a>
                <a href="party_videos.php"><div class="submenu-item" data-page="party_videos.php"><i class="fas fa-video"></i> Party Videos</div></a>
            </div>
        </div>
        <!-- Log Out Menu Item -->
        <div class="menu-item">
            <a href="logout.php">
                <div class="menu-title" data-page="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</div>
            </a>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var currentPage = window.location.pathname.split('/').pop(); // Get the current page name

        // Restore the open menu and submenu state
        var openMenu = localStorage.getItem('openMenu');
        var activeSubmenuItem = localStorage.getItem('activeSubmenuItem');

        // Set active state for menu items and submenu items
        var menuTitles = document.querySelectorAll('.menu-title');
        var submenuItems = document.querySelectorAll('.submenu-item');

        menuTitles.forEach(function(title) {
            var submenu = document.getElementById(title.dataset.submenu);
            var icon = title.querySelector('.menu-toggle-icon');

            if (title.dataset.page === currentPage) {
                title.classList.add('active');
                if (submenu) {
                    submenu.style.display = 'block'; // Open the submenu
                    if (icon) {
                        icon.classList.add('rotate-up'); // Rotate the icon
                    }
                }
            } else if (title.dataset.submenu === openMenu) {
                if (submenu) {
                    submenu.style.display = 'block'; // Ensure the submenu stays open
                    if (icon) {
                        icon.classList.add('rotate-up'); // Rotate the icon
                    }
                }
            } else {
                if (submenu) {
                    submenu.style.display = 'none'; // Close the submenu if it's not the active menu
                    if (icon) {
                        icon.classList.remove('rotate-up'); // Remove rotation class
                    }
                }
            }
        });

        submenuItems.forEach(function(item) {
            if (item.dataset.page === currentPage) {
                item.classList.add('active');
                var parentMenuTitle = item.closest('.submenu').previousElementSibling;
                if (parentMenuTitle) {
                    parentMenuTitle.classList.add('active');
                    var icon = parentMenuTitle.querySelector('.menu-toggle-icon');
                    if (icon) {
                        icon.classList.add('rotate-up'); // Rotate the icon for the open submenu
                    }
                }
            } else {
                item.classList.remove('active');
            }
        });
    });

    function toggleSubMenu(menuTitle) {
        var submenuId = menuTitle.dataset.submenu;
        var submenu = document.getElementById(submenuId);
        var allSubmenus = document.querySelectorAll('.submenu');
        var allMenuTitles = document.querySelectorAll('.menu-title');

        // Remove active class from all menu titles
        allMenuTitles.forEach(function(title) {
            title.classList.remove('active');
            var icon = title.querySelector('.menu-toggle-icon');
            if (icon) {
                icon.classList.remove('rotate-up'); // Remove rotation class from all icons
            }
        });

        // Hide all submenus
        allSubmenus.forEach(function(sub) {
            if (sub !== submenu) {
                sub.style.display = 'none';
            }
        });

        // Toggle submenu visibility
        if (submenu) {
            var icon = menuTitle.querySelector('.menu-toggle-icon');
            if (submenu.style.display === 'block') {
                submenu.style.display = 'none';
                localStorage.removeItem('openMenu'); // Remove the stored open menu
                if (icon) {
                    icon.classList.remove('rotate-up'); // Remove rotation class when submenu is hidden
                }
            } else {
                submenu.style.display = 'block';
                localStorage.setItem('openMenu', submenuId); // Store the open menu
                if (icon) {
                    icon.classList.add('rotate-up'); // Add rotation class when submenu is visible
                }
            }
            menuTitle.classList.add('active');
        }
    }

    // Set active submenu item in localStorage
    document.querySelectorAll('.submenu-item').forEach(function(item) {
        item.addEventListener('click', function() {
            localStorage.setItem('activeSubmenuItem', this.dataset.page);
        });
    });

    // Close submenu when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.menu-item')) {
            var allSubmenus = document.querySelectorAll('.submenu');
            var allMenuTitles = document.querySelectorAll('.menu-title');

            allSubmenus.forEach(function(submenu) {
                submenu.style.display = 'none';
            });

            allMenuTitles.forEach(function(title) {
                title.classList.remove('active');
                var icon = title.querySelector('.menu-toggle-icon');
                if (icon) {
                    icon.classList.remove('rotate-up'); // Remove rotation class when clicking outside
                }
            });

            localStorage.removeItem('openMenu'); // Remove the stored open menu when clicking outside
            localStorage.removeItem('activeSubmenuItem'); // Remove the stored active submenu item when clicking outside
        }
    });
    </script>
</body>
</html>
