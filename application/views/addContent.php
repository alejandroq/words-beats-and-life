<script type="text/javascript">
	document.getElementById("token").value=localStorage['token'];
	document.getElementById("action").value="portfolio";

	function updateText() {
		document.getElementById("submit").value = 'Awaiting Administrator Approval!';
		document.getElementById("submit").className = 'offset-by-four four columns warning'
	}
</script>
<div id="form-background"></div>
<div id="form-window" class="container" ng-controller="ProfileController">
	<div class="row">
		<div class="column"><a href="#/content"><i class="fa fa-times-circle-o"></i></a></div>
	</div>
	<form action="../application/endpoints/upload.php" onsubmit="updateText()" target="_blank" method="post" enctype="multipart/form-data">
	    <div class="row">
			<h3 class="offset-by-one eight columns">Share to your Portfolio</h3>
		</div>
		<div class="row">
			<input class="offset-by-two four columns" min-length="3" max-length="15" type="text" name="Title" placeholder="Title" required>

			<select name="Element" class="four columns" required>
	   			<option disabled selected value>Select an Element</option>
	   			<option value="BBoying">BBoying</option>
				<option value="DJing">DJing</option>
				<option value="Graffiti">Graffiti</option>
				<option value="Knowledge of Self">Knowledge of Self</option>
	   			<option value="MCcing">MCcing</option>
	   		</select>

			<input class="offset-by-four four columns" type="file" name="fileToUpload" id="fileToUpload" required>
			<!-- HIDDEN -->
			<input type="text" name="token" value="" id="token" style="display: none;">
			<input type="text" name="action" value="" id="action" style="display: none;">
			<!-- END HIDDEN -->
		</div>
		<div class="row">
	    	<input id="submit" type="submit" class="offset-by-four four columns" value="Share" name="submit"></a>
	</form>
</div>