<?php

if(!isset($_SESSION)){
    // Start Session it is not started yet
    session_start();
}
if(!isset($_SESSION['agentLogin']) || $_SESSION['agentLogin']!=true)
{
    header('location:../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/search.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/notification.css">
</head>
<body >
    <div class="navbar" style="padding-bottom: 100px;">
        <div class="logo"><span style="color: white;">Tech</span> <br><span style="color: skyblue;">HireHub</span></div>
        <div class="nav-links">
            <a href="dashboard.php"><button class="tab">Home</button></a>
            <a href="project.php"><button class="tab">Project</button></a>
            <a href="search.php"><button class="tab active">Search</button></a>
            <div class="skill-dropdown">
                <button class="dashboard-dropbtn tab" onclick="toggleSkillDropdown()">Skills</button>
                <div id="dropdown-content" class="dropdown-menu">
                    <a href="skill.php">Create Skills</a>
                    <a href="skill_dashboard.php">Dashboard</a>
                </div>
            </div>
            <div class="location-dropdown">
                <button class="dashboard-dropbtn tab" onclick="toggleLocationDropdown()">Location</button>
                <div id="location-dropdown-content" class="dropdown-menu">
                    <a href="skill.php">Create Location</a>
                    <a href="skill_dashboard.php">Dashboard</a>
                </div>
            </div>
            <div class="customer-dropdown">
                <button class="dashboard-dropbtn tab" onclick="toggleCustomerDropdown()">Customer</button>
                <div id="customer-dropdown-content" class="dropdown-menu">
                    <a href="skill.php">Create Customer</a>
                    <a href="skill_dashboard.php">Dashboard</a>
                </div>
            </div>
        </div>
        <div class="user-menu" onclick="toggleDropdown()">
            <img src="../images/hamburger_icon.png" alt="Icon" class="user-icon">
            <div class="dropdown-menu" id="userDropdown">
                <a href="agent_profile.php" id="edit-profile">Edit Profile</a>
                <a href="#" id="log-out">Log Out</a>
            </div>
        </div>
    </div>

    <div class="tab-content active" id="search-content">
        <div class="search-container" >
            <input type="text" id="search-bar" placeholder="Search..." onkeyup="filterResults()">
            <div class="filters">
                <select id="location-filter" onchange="filterResults()">
                    <option value="">Select Location</option>
                    <!-- Options will be dynamically populated -->
                </select>
                <select id="skill-filter" onchange="filterResults()">
                    <option value="">Select Skills</option>
                    <!-- Options will be dynamically populated -->
                </select>
                <select id="experience-filter" onchange="filterResults()">
                    <option value="">Select Experience</option>
                    <!-- Options will be dynamically populated -->
                </select>
            </div>
        </div>
        <div id="results"></div>
    </div>
    <div class="smallModal" id="project-softlock-modal">
        <div class="smallModal-content">
            <span class="close-btn" onclick="document.getElementById('project-softlock-modal').style.display='none'">&times;</span>
            <h2>Select Project</h2>
            <select class="smallModalDropdown" id="softlockprojectDropdown">

            </select>
            <button id="softlock-project-button">Softlock</button>
        </div>
    </div>
    <div class="smallModal" id="project-confirm-modal">
        <div class="smallModal-content">
            <span class="close-btn" onclick="document.getElementById('project-confirm-modal').style.display='none'">&times;</span>
            <h2>Select Project</h2>
            <select class="smallModalDropdown" id="confirmprojectDropdown">

            </select>
            <button id="confirm-project-button">Confirm</button>
        </div>
    </div>
    
    <script src="script/search.js"></script>
    <script src="script/script.js"></script>
    
</body>
</html>