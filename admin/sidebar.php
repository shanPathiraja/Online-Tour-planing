<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Ashoke Group</title>

	
     <link rel="stylesheet" href="./includes//bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./includes/fontawesome-free-5.12.0-web/css/all.css">
    <link rel="stylesheet" href="./includes/bootstrap-4.3.1-dist/css/jquery.mCustomScrollbar.min.css"> 

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sidebar-themes.css">
    <link rel="shortcut icon" type="image/png" href="includes/img/favicon.png" />
</head>

<body>
	
	
    <div class="page-wrapper default-theme sidebar-bg bg1 toggled">
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <!-- sidebar-brand  -->
                <div class="sidebar-item sidebar-brand">
                    <a href="#">Ashoke Group</a>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-item sidebar-header d-flex flex-nowrap">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="./img/logo.png" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            <strong>Ashoke group</strong>
                        </span>
                        <span class="user-role">Administrator</span>
                        
                    </div>
                </div>
                
                <!-- sidebar-menu  -->
                <div class=" sidebar-item sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li class="sidebar-dropdown " id="dashboard">
                            <a href="dashboard.php">
                                <i class="fa fa-tachometer-alt"></i>
                                <span class="menu-text">Dashboard</span>
                                
                            </a>
                           
                        </li>
                        <li class="sidebar-dropdown" id="mainSlideShow">
                            <a href="manageSlideShow.php">
                                <i class="far fa-images"></i>
                                <span class="menu-text">Main Slide Show</span>
                               <!-- <span class="badge badge-pill badge-danger">3</span> -->
                            </a>
                            
                        </li>
						<li class="sidebar-dropdown" id="managePlans">
                            <a href="managePlans.php">
                                <i class="far fa-images"></i>
                                <span class="menu-text">Manage Plans</span>
                               <!-- <span class="badge badge-pill badge-danger">3</span> -->
                            </a>
                            
                        </li>
						<li class="sidebar-dropdown" id="viewmessages">
                            <a href="viewMessages.php">
                                <i class="far fa-images"></i>
                                <span class="menu-text">View Messages</span>
                               <!-- <span class="badge badge-pill badge-danger">3</span> -->
                            </a>
                            
                        </li>
						<li class="sidebar-dropdown" id="viewOrders">
                            <a href="viewOrders.php">
                                <i class="far fa-images"></i>
                                <span class="menu-text">View Order</span>
                               <!-- <span class="badge badge-pill badge-danger">3</span> -->
                            </a>
                            
                        </li>
						<li class="sidebar-dropdown" id="managePlaces">
                            <a href="ManagePlacess.php">
                                <i class="far fa-images"></i>
                                <span class="menu-text">Manage placess</span>
                               <!-- <span class="badge badge-pill badge-danger">3</span> -->
                            </a>
                            
                        </li>
					
						<li class="sidebar-dropdown" id="mainSlideShow">
                            <a href="manageGallery.php">
                                <i class="far fa-images"></i>
                                <span class="menu-text">Manage gallery</span>
                               <!-- <span class="badge badge-pill badge-danger">3</span> -->
                            </a>
                            
                        </li>
                       
                        
                       
                        <li class="header-menu">
                            <span>Extra</span>
                        </li>
                      
                        
                            <a href="signOut.php">
                                <i class="fa fa-sign-out-alt"></i>
                                <span class="menu-text">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
            </div>
           
        </nav>
        
    </div>
    <!-- page-wrapper -->

    <!-- using online scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- using local scripts -->
    <!-- <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script> -->


    <script src="includes/js/main.js"></script>
	<script>
		
		// this script is used to get page current location
		var path = window.location.href;
		
		//this code used to split location by / and get pop output as page name
var page = path.split("/").pop();
	//alert(page);
		
		
		
		switch(page){
				case "dashboard.php":
				var element = document.getElementById("dashboard");
  element.classList.add("active");
				break ;
			case "manageSlideShow.php":
				var element = document.getElementById("mainSlideShow");
  element.classList.add("active");
				break ;
			case "viewMessages.php":
				var element = document.getElementById("viewmessages");
  element.classList.add("active");
				
				break;
			case "viewOrders.php":
				var element = document.getElementById("viewOrders");
			 
			 
  element.classList.add("active");
				break;
				
			case "ManagePlacess.php":
				var element = document.getElementById("managePlaces");
			 
			 
  element.classList.add("active");
				break;
				case "managePlans.php":
				var element = document.getElementById("managePlans");
			 
			 
  element.classList.add("active");
				break;
			default:
				
				
				
		}
		
		//this code use to identify page variable and change clases in side bar elements
	/*	if(page =="manageSlideShow.php"){
			 var element = document.getElementById("mainSlideShow");
  element.classList.add("active");
		} 
			
			if(page="viewMessages.php"){
			
			var element = document.getElementById("viewmessages");
  element.classList.add("active");
		}
		 if(page="viewOrders.php"){
			
			var element = document.getElementById("viewOrders");
			 
			 
  element.classList.add("active");
		}
		
		
		else {
			 var element = document.getElementById("dashboard");
  element.classList.add("active");
		}*/
	
	</script>
	
	<h1 id="demo"></h1>
</body>

</html>