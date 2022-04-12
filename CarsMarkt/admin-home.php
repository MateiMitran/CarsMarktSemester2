<?php
	$page = 'admin-home';
	$pageTitle = 'Admin-Home';

	$requiredCSS = ['admin-home.css','index.css'];
	$requiredJS = ['admin-home.js'];

    $functionalityRequirements = ['post-announcement-functionality'];

	require_once('includes/header.php');
    $announcements = AnnouncementManager::GetAnnouncements();
    if (count(UserManager::GetUsers())>0) {
        $users = UserManager::GetUsers();
    }
    else {
        errorMessage("No users. Please register some users");
    }
    $admins = UserManager::GetAllAdminsExceptCurrent($_SESSION['admin']->GetEmail());
    $listings = ListingManager::GetListings();
    ?>
    
    <!-- JUMBOTRON -->
    <div id="jumbotron">
        <div id="jumbotron-overlay">
			<nav id="top-nav" class="transparent absolute">
            
				<ul>
					<li>
						<a href="/admin-account-preferences" id="top-nav-account-preferences-button">Account</a>
						<span id="top-nav-button-divider">|</span>
					</li>
                    <li>
                        <form method="POST">
                            <input type="submit" name="logout" id="top-nav-admin-sign-out-button" value="Sign Out">
                        </form>
                    </li>
				</ul>
			</nav>
			<div class="row">
                <div id="jumbotron-moto-container">
                    <h1>Cars<span>Markt</span></h1>
                    <h3>Welcome</h3>
                </div>
            </div>
        </div>
    </div>
    
    <!-- DASHBOARD -->
    <div id="dashboard-wrapper">
        <h2 class="section-title">Announcements</h2>
        <div id="dashboard-container">
            <!-- ANNOUNCEMENTS -->
            <div class="dashboard-content visible" id="dashboard-announcements">
            <?php foreach($announcements as $announcement):?>
                <ul id="announcement-row">
                    <li>
                      <?php echo $announcement->GetAnnouncement() . ' , posted by ' . UserManager::GetUserFullNameById($announcement->GetAdminID()) ?>
                      <button class="button-announcement" formmethod="post" data='<?= $announcement->GetID();?>'>X</button>  
                    </li>
                </ul>
                <?php endforeach; ?>
            </div>
            <!-- LISTINGS -->
            <div class="dashboard-content" id="dashboard-listings">
            <?php foreach($listings as $listing):?>
                      <ul>
                          <li>
                              <?php  echo 'ID: ' .  $listing->GetId() . ' | User: ' . UserManager::GetUserFirstNameByID($listing->GetUserId()) . ' ' . UserManager::GetUserLastNameByID($listing->GetUserId()) . ' | Car: ' . CarManager::GetCarManufacturerByID($listing->GetCarId()) . ' ' . CarManager::GetCarModelByID($listing->GetCarId()) . ' ' . CarManager::GetCarBuildYearByID($listing->GetCarId()) . ' ,  listed on ' . $listing->GetDateListed() ?>
                          </li>
                      </ul>
                <?php endforeach; ?>
            </div>
            <!-- USERS -->
            <div class="dashboard-content" id="dashboard-users">
            <?php foreach($users as $user):?>
                <ul id="user-row">
                    <li>
                        <?php echo '[USER] Name: ' . $user->GetFullName() . ' | Email: ' . $user->GetEmail() . ' | Phone: ' . $user->GetPhone(); ?>
                        <button class="button-users" formmethod="post" data='<?= $user->GetID();?>'>X</button>
                    </li>
                </ul>
            <?php endforeach; ?>
            <?php foreach($admins as $admin):?>
                <ul id="user-row">
                    <li>
                        <?php echo '[ADMIN] Name: ' . $admin->GetFullName() . ' | Email: ' . $admin->GetEmail() . ' | Phone: ' . $admin->GetPhone(); ?>
                        <button class="button-users" formmethod="post" data='<?= $user->GetID();?>'>X</button>
                    </li>
                </ul>
            <?php endforeach; ?>
                <a href="/create-admin" class="button-create-admin">Create Admin</a>
            </div>
            <!-- POST ANNOUNCEMENTS -->
            <div class="dashboard-content" id="dashboard-post-announcements">
            <form method="POST">
	        <textarea cols="30" rows="2" class="textarea-style" name="announcement" placeholder="Enter announcement here"></textarea></br>
	        <input type="submit" name="submit" value="Submit" class="dashboard-post-announcements-button"></input>
            </form>
            </div>
        <a href="javascript:void(0)" class="dashboard-button" id="dashboard-button-announcements" page="dashboard-announcements">
            Announcements
        </a>
        <a href="javascript:void(0)" class="dashboard-button" id="dashboard-button-listings" page="dashboard-listings">
            Listings
        </a>
        <a href="javascript:void(0)" class="dashboard-button" id="dashboard-button-users" page="dashboard-users">
            Users
        </a>
        <a href="javascript:void(0)" class="dashboard-button" id="dashboard-button-post-announcements" page="dashboard-post-announcements">
            Post Announcement
        </a>
        </div>
    </div>
<?php require_once('includes/footer.php'); ?>