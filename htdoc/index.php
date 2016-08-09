<!DOCTYPE HTML>
<html class="no-js" lang="en-us" ng-app="myApp">
    <head>
        <meta charset="utf-8">
	    <title>Words Beats &amp; Life Inc. | Teaching Convening Presenting Hip-Hop Since 2002</title>
	    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
	    <meta name="description" content="Connecting Hip-Hop since 2000."/>
	    <meta name="viewport" content="width=device-width, initial-scale=1"/>

	    <!-- FAVICON -->
	    <link rel="shortcut icon" type="/image/png" href="favicon.png"/>
	    <!-- END FAVICON -->

	    <!-- GOOGLE FONT -->
	    <link href='https://fonts.googleapis.com/css?family=Roboto:300,500' rel='stylesheet' type='text/css'>
	    <link href='' rel='stylesheet' type='text/css'>
	    <!-- END GOOGLE FONT -->

	   	<!-- STYLESHEETS -->
	   	<link rel="stylesheet" href="css/normalize.css">
	    <!-- <link rel="stylesheet/less" type="text/css" href="css/main.less" /> -->
	    <link rel="stylesheet" type="text/css" href="css/main.css" />
	    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
	    <!--[if lt IE 9]>
	    <link rel="stylesheet" href="css/jquery.galereya.ie.css">
	    <![endif]-->
	    <!-- END STYLESHEETS -->

	    <!-- JAVASCRIPT -->
	    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
	    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script> -->
	    <!-- END JAVASCRIPT -->

	</head>
	<body ng-controller="MainController">
		<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

		<header ng-show="x>0">
			<!-- BEGIN LOGO-BRANDING -->
			<div id="wrapper">
				<span ng-repeat="user in user">Welcome {{user.UserType}}, {{user.UserLevel}} {{user.FirstName}}</span>
				<a href="#/"><div id="branding"><img id="branding-logo" src="img/logo.png" alt="Words Beats & Life Inc. Logo" /></div></a>
			</div>
			<!-- END LOGO-BRANDING -->

			<!-- BEGIN ICONIC NAVIGATION CONTROLS -->
		    <ul class="navigation_controls">
				<li id="stack_menu" class="mobile-only">
					<i class="fa fa-bars icon"></i>
					<span class="usupur">Menu</span>
				</li>
		        <li class="todo" ng-class="TODO">
		        	<i class="fa fa-bell icon"></i>
		        	<span class="usupur">Notifications</span>
		        </li>
		       	<li id="account">
		        	<i class="fa fa-gear icon"></i>
		        	<span class="usupur">Account</span>
		        </li>
		        <!-- <li id="search">
		        	<span class="fa fa-search"></span>
		        	<input type="text" placeholder="Search"/>
		        </li> -->
		    </ul>

		    <!-- END ICONIC NAVIGATION CONTROLS -->

		    <!-- BEGIN NAVIGATION BAR -->
		    <nav>
		    	<ul class="mobile-only"><h5>Navigation</h5></ul>
		        <a href="#/"><li>Wall</li></a>
		       	<a href="#/directory"><li>Directory</li></a>
				<a ng-show="x>1" href="#/content"><li>Content</li></a>
		       	<a href="#/courses"><li>Courses</li></a>
                <a href="#/events"><li>Events</li></a>
                <a ng-show="x>1" href="#/evaluations"><li>Evaluations</li></a>
                <a href="#/buckshop"><li>Buck Shop</li></a>
		    </nav>
		    <!-- END NAVIGATION BAR -->

		   	<!-- TODO BAR fills with jQuery Click Function -->
		    <div id="todos">
		    	<li ng-repeat="x in todos" ng-click="setMaster(x)"><i class="fa fa-pencil-square-o"></i>Evaluate '{{x.CourseName}}' as Instructed by {{x.Name}}</li>

		    	<li ng-repeat="x in admin" ng-click="checkNotification(x)"><i class="fa fa-picture-o "></i>New Content '{{x.Title}}' to be Approved by {{x.StudentEmailAddress}}</li>

		    	<li ng-repeat="x in parents" ng-click="checkNotification(x)"><i class="fa fa-heart-o"></i>New Content '{{x.Title}}' by Your Student!</li>

		    	<li ng-repeat="x in student" ng-click="checkNotification(x)"><i class="fa fa-heart"></i>New Like on '{{x.Title}}'' by {{x.Likee}}</li>

		    </div>	
		    <!-- END TODO BAR -->

		    <!-- TOOL BAR fills with jQuery Click Function -->
		    <div id="tools">
		    	<a href="#/edit"><li><i class="fa fa-user"></i>Edit My Account</li></a>
		    	<li id="logout" ng-click="logout()"><i class="fa fa-sign-out"></i>Logout</li>
		    </div>	
		    <!-- END TOOL BAR -->

		</header> 
		<!-- END HEADER -->

		<!-- MAIN CONTENT && BEGIN SKELETON GRID -->
        <article ng-style="myObj">
        	<div ui-view></div>
		</article>
		<!-- END MAIN CONTENT && END SKELETON GRID -->

		<!-- FOOTER -->
	    <footer ng-show="x > 0">
	    	<div>
	    		<a href="https://www.facebook.com/WordsBeatsLife/"><i class="icon fa fa-facebook-official"></i></a>
	    		<a href="https://www.instagram.com/wordsbeatsandlife/?hl=en"><i class="icon fa fa-instagram"></i>
	    		<a href="https://twitter.com/wordsbeatslife"><i class="icon fa fa-twitter"></i>
	    		<a href="https://soundcloud.com/tags/words%20beats%20&%20life"><i class="icon fa fa-soundcloud"></i>
	    		<a href="https://vimeo.com/wordsbeatslife"><i class="icon fa fa-vimeo"></i>
	    	</div>
	    	<!-- <div>website & content &copy; 2016 top 484!</div> -->
	    </footer>
	    <!-- END FOOTER -->
	    <!-- END SKELETON GRID -->

		<!-- SCRIPTS -->
			<!-- JQUERY -->
        	<script src="js/vendor/jquery.min.js"></script>
        	<!-- ANGULARJS -->
        	<script src="js/vendor/angular.min.js"></script>
			<!-- PLUGINS.JS -->
			<script src="js/plugins.js"></script>
			<!-- UI-ROUTER CDN -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.18/angular-ui-router.min.js"></script>
			<!-- MAIN.JS -->
			<script src="js/main.js"></script>
			<!-- ANGULAR APPLICATION JS -->
			<script src="../application/app.js"></script>
    		<script src="../application/controllers/loginController.js"></script>
    		<script src="../application/controllers/mainController.js"></script>
    		<script src="../application/controllers/homeController.js"></script>
    		<script src="../application/controllers/tableController.js"></script>
    		<script src="../application/controllers/courseController.js"></script>
    		<script src="../application/controllers/directoryController.js"></script>
    		<script src="../application/controllers/eventsController.js"></script>
    		<script src="../application/controllers/registerController.js"></script>
    		<script src="../application/controllers/enrollController.js"></script>
    		<script src="../application/controllers/evaluationController.js"></script>
    		<script src="../application/controllers/myContentController.js"></script>
    		<script src="../application/controllers/myContentDetailController.js"></script>
    		<script src="../application/controllers/profileController.js"></script>
    		<script src="../application/controllers/contentController.js"></script>
    		<script src="../application/services/authenticate-services.js"></script> 
    		<script src="../application/services/exchangeService.js"></script>	
		<!-- END SCRIPTS -->
	</body>
</html>
