<div id="form-background"></div>
<div id="form-window" class="container">
  	<div class="row">
		<div class="column"><a href="#/events"><i class="fa fa-times-circle-o"></i></a></div>
		<h4 class="offset-by-two four columns">Events Management  |  {{method}} Event</h4>
		<h4 class="four columns" ng-class="data.Result == 'Error' ? 'error' : 'success'">{{data.Result}}</h4>
   	</div>	
   	<form name="form" ng-submit="submitForm(form.$valid)" class="row" novalidate>

	   	<div class="row">

	   		<input type="text" placeholder="Event Name"  ng-model="data.EventName" class="offset-by-two four columns" ng-minlength="3" maxlength="200" value="{{data.EventName}}" required>

	   		<select ng-model="data.EventType" selected="{{data.EventType}}"class="four columns" required>
	   			<option disabled selected value>Select an Element</option>
	   			<option value="BBoying">BBoying</option>
				<option value="DJing">DJing</option>
				<option value="Graffiti">Graffiti</option>
				<option value="Knowledge of Self">Knowledge of Self</option>
	   			<option value="MCcing">MCcing</option>
	   		</select>

	   	</div>
	   	<div class="row">

	   		<textarea ng-model="data.EventDescription" class="eight columns offset-by-two" placeholder="Event Description" required>{{data.EventDescription}}</textarea>

	   	</div>
	   	<div class="row">

	   		<input type="text" ng-model="data.EventLocation" class="eight columns offset-by-two" placeholder="Event Location" value="{{data.EventLocation}}">

	   	</div>

	   	 <div class="row"><h5 class="offset-by-two three columns" style="line-height: 0; margin-top:1em;">Event Date</h5></div>

	   	<div class="row">

	   		<select ng-model="data.Day" selected="{{data.Day}}"class="offset-by-two two columns">
	   			<option disabled selected value>Day</option>
	   			<option ng-repeat="x in days track by $index" value="{{x}}">{{x}}</option>
	   		</select>

	   		<select ng-model="data.Month" selected="{{data.Month}}"class="two columns">
	   			<option disabled selected value>Month</option>
	   			<option ng-repeat="x in months track by $index" value="{{x}}">{{x}}</option>
	   		</select>

	   		<select ng-model="data.Year" selected="{{data.Year}}"class="two columns">
	   			<option disabled selected value>Year</option>
	   			<option ng-repeat="x in years track by $index" value="{{x}}">{{x}}</option>
	   		</select>

	   		<select ng-model="data.Hour" selected="{{data.Hours}}"class="two columns">
	   			<option disabled selected value>Time</option>
	   			<option ng-repeat="x in hours track by $index" value="{{x}}">{{x}}</option>
	   		</select>

	   	</div>

	   	<div class="row">
	   		<input type="text" ng-model="data.PrimaryContact" class="four columns offset-by-two" placeholder="Primary Contact Full Name" value="{{data.PrimaryContact}}" />
	   		<input type="email" ng-model="data.PCEmail" class="four columns" placeholder="Primary Contact Email" value="{{data.PCEmail}}" />
	   	</div>

	   	<div class="row">
	   		<input type="text" ng-model="data.PCPhone" class="eight columns offset-by-two" placeholder="Primary Contact Phone Number" value="{{data.PCPhone}}">
	   	</div>

	   	<div class="row">

	   		<input type="submit" value="Submit" class="two columns offset-by-five" ng-disabled="form.$invalid">

	   	</div>
	</form>
</div>