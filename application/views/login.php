<style type="text/css">
	body {
		background-color: #2F4F5A;
	}
	#form-window {
		/*border-color: #FC8989;*/
		padding: 3em;
		/*background-color: rgba(205,92,92,0.98);*/
/*		background-color: rgba(195,195,195,0.75);
		color: #323232;*/
	}
	input[type="text"],
	input[type="password"] {
		/*background-color: rgba(205,92,92,0.98);*/
		/*background-color: #323232;*/
	} 
</style>

<div id="branding"><img style="position:fixed; margin: 2em;" id="branding-logo" src="img/logo.png" alt="Words Beats & Life Inc. Logo" style="margin:2em auto;"/></div>

<video autoplay loop><source src="https://dl.dropboxusercontent.com/u/59744229/wbl.mp4" type="video/mp4"></video>

<div id="form-window" class="container five columns" style="top: 8em;">
	<div class="row">
		<h2 class=" offset-by-one seven columns" style="display: inline;">Sign In</h2>
	</div>
	<div class="row">
		<input type="text" ng-model="loginInfo.username" min-length="3" max-length="25" class="offset-by-one ten columns" placeholder="Your Email" required>
	</div>
	<div class="row">
		<input type="password" ng-model="loginInfo.password" min-length="3" max-length="15"  class="offset-by-one ten columns" placeholder="Password" required>
	</div>
	<div class="row">
		<a ui-sref=".signup" class="offset-by-one ten columns"><!-- Don't have an account? Join the movement. --> New to the Community? Register Here!</a>
	</div>
	<div class="row">
		<input type="submit" ng-click="login()" class="offset-by-one ten columns" value="Sign-In">
	</div>
</div>
<div ui-view></div>