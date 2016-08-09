<div id="form-background"></div>
<div id="form-window" class="container" ng-controller="ContentController">
  	<div class="row">
		<div class="column"><a href="#/content"><i class="fa fa-times-circle-o"></i></a></div>
		<h4 class="four columns" ng-class="data.Result == 'Error' ? 'error' : 'success'">{{data.Result}}</h4>
   	</div>	
   	<form name="form" ng-submit="submitForm(form.$valid)" class="row" novalidate>

	   	<div class="row">

	   		<input type="text" placeholder="Course Name"  ng-model="data.CourseName" class="offset-by-three three columns" ng-minlength="3" maxlength="200" value="{{data.CourseName}}" required>

	   		<select ng-model="data.CourseElement" selected="{{data.CourseElement}}"class="three columns" required>
	   			<option disabled selected value>Select an Element</option>
	   			<option value="BBoying">BBoying</option>
				<option value="DJing">DJing</option>
				<option value="Graffiti">Graffiti</option>
				<option value="Knowledge of Self">Knowledge of Self</option>
	   			<option value="MCcing">MCcing</option>
	   		</select>

	   	</div>
	   	<div class="row">

	   		<textarea ng-model="data.CourseDescription" class="six columns offset-by-three" placeholder="Course Description" required>{{data.CourseDescription}}</textarea>

	   	</div>
	   	<div class="row">

	   		<input type="text" min-length="3" ng-model="data.LessonPlan" class="six columns offset-by-three" placeholder="Include your Lesson Plans Dropbox Link here.">{{data.LessonPlan}}</textarea>

	   	</div>

	   	<div class="row">

	   		<select ng-model="data.Capacity" selected="{{data.Capacity}}"class="offset-by-three three columns">
	   			<option disabled selected value>Capacity</option>
	   			<option ng-repeat="x in capacity" value="{{x}}">{{x}}</option>
	   		</select>

	   		<select ng-model="data.Semester" selected="{{data.Semester}}"class="three columns">
	   			<option disabled selected value>Semester</option>
	   			<option ng-repeat="x in semester" value="{{x}}">{{x}}</option>
	   		</select>

	   	</div>

	   	<div class="row">

	   		<input type="text" placeholder="Location" ng-model="data.Location" class="offset-by-three six columns" ng-minlength="3" maxlength="200" value="{{data.Location}}">

	   	</div>

	   	<div class="row"><h5 class="offset-by-two three columns" style="line-height: 0; margin-top:1em;">Start Date?</h5></div>

	   	<div class="row">
	   		<select ng-model="data.Day" selected="{{data.Day}}"class="offset-by-two two columns">
	   			<option disabled selected value>Day</option>
	   			<option ng-repeat="x in days" value="{{x}}">{{x}}</option>
	   		</select>

	   		<select ng-model="data.Month" selected="{{data.Month}}"class="two columns">
	   			<option disabled selected value>Month</option>
	   			<option ng-repeat="x in months" value="{{x}}">{{x}}</option>
	   		</select>

	   		<select ng-model="data.Year" selected="{{data.Year}}"class="two columns">
	   			<option disabled selected value>Year</option>
	   			<option ng-repeat="x in years" value="{{x}}">{{x}}</option>
	   		</select>

	   		<select ng-model="data.Hour" selected="{{data.Hour}}"class="two columns">
	   			<option disabled selected value>Hour</option>
	   			<option ng-repeat="x in hours" value="{{x}}">{{x}}</option>
	   		</select>

	   	</div>

	   	<div class="row">
	   		<select ng-model="data.StaffEmail" selected="{{data.StaffEmail}}" class="offset-by-two eight columns">
	   			<option disabled selected value>Staff Member in Charge</option>
	   			<option ng-repeat="x in staff" value="{{x.EmailAddress}}">{{x.StaffName}}</option>
	   		</select>
	   	</div>

	   	<div class="row">

	   		<input type="submit" value="Submit" class="two columns offset-by-five" ng-disabled="form.$invalid">

	   	</div>
	</form>
</div>