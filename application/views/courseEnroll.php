<div id="form-window" class="container">

		<div class="row">
			<div class="column"><a href="#/courses"><i class="fa fa-times-circle-o"></i></a></div>
			<h4 class="offset-by-two nine columns">Enroll in {{data.CourseName}}</h4>
			<h4 class="four columns" ng-class="data.Result == 'Error' ? 'error' : 'success'">{{data.Result}}</h4>
   		</div>	

	   	<div class="row">
	   		<p class="offset-by-two nine columns">{{result}}</p>
	   		<a class="offset-by-two nine columns" href="https://dl.dropboxusercontent.com/u/59744229/Academy%20Parent%20Forms.pdf" target="_blank">Parent Waiver Here</a>
	   	</div>

	   	<form name="form" ng-submit="manage()" class="row">
	   		<input type="submit" value="Enroll in {{data.CouseName}}" ng-hide="result == 'You are Already Enrolled in this Course!' || result == 'Please Fill Out an Evaluation Before Enrolling in a New Course'" class="two columns offset-by-five">
	   	</form>

</div>