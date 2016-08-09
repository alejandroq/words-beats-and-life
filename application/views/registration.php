<div id="form-background"></div>
<div id="form-window" class="container">
  	<div class="row">
		<div class="column"><a href="#/login"><i class="fa fa-times-circle-o"></i></a></div>
		<h4 class="offset-by-two four columns">Registration</h4>
		<h4 class="four columns" ng-class="data.Result == 'Error' ? 'error' : 'success'">{{data.Result}}</h4>
   	</div>	
   	<form name="form" ng-submit="submitForm(form.$valid)" class="row" novalidate>

	   	<div class="row">

	   		<input type="text" placeholder="First Name"  ng-model="data.FirstName" class="offset-by-three three columns" ng-minlength="3" maxlength="25" value="{{data.FirstName}}" required>

	   		<input type="text" placeholder="Last Name"  ng-model="data.LastName" class="three columns" ng-minlength="3" maxlength="25" value="{{data.LastName}}" required>

	   	</div>
	   	<div class="row">

	   		<input type="text" ng-model="data.EmailAddress" class="six columns offset-by-three" placeholder="Email Address" value="{{data.EmailAddress}}"required>

	   	</div>
	  	<div class="row">

	   		<input type="text" ng-model="data.confirmEmailAddress" class="six columns offset-by-three" placeholder="Confirm Email Address" value="{{data.confirmEmailAddress}}" ng-hide="method == 'Update'">

	   	</div>
	   	<div class="row">

	   		<input type="password" ng-model="data.Password" class="six columns offset-by-three" placeholder="Password" ng-hide="method == 'Update'" ng-required = "method=='Add'">

	   		<input type="password" ng-model="data.InputPassword" class="six columns offset-by-three" placeholder="Old Password" ng-show="method == 'Update'" >

	   	</div>
	   	<div class="row">

	   		<input type="password" ng-model="data.NewPassword" class="six columns offset-by-three" placeholder="New Password" ng-show="method == 'Update'" >

	   	</div>
	   	<div class="row"><h5 class="offset-by-three three columns" style="line-height: 0; margin-top:1em;">Birthday</h5></div>
	   	<div class="row">

	   		<select ng-model="data.Day" selected="{{data.Day}}"class="offset-by-three two columns">
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


	   	</div>
	   	<div class="row">

	   		<input type="text" ng-model="data.CellPhone" class="three columns offset-by-three" placeholder="Mobile Number" value="{{data.CellPhone}}">
	   		<select ng-model="data.UserType" selected="{{data.UserType}}" class="three columns" required>
	   			<option disabled selected value>Select a Role</option>
				<option value="Student">Student</option>
				<option value="Parent">Parent</option>
	   			<option value="Cipher">Cipher</option>
	   		</select>

	   	</div>
	   	<div class="row">

	   		<select ng-model="data.Gender" selected="{{data.Gender}}"class="offset-by-three three columns" required>
	   			<option disabled selected value>Gender</option>
	   			<option value="Male" selected value>Male</option>
	   			<option value="Female">Female</option>
	   			<option value="Not Applicable">Not Important</option>
	   		</select>

	   		<select ng-model="data.ShirtSize" selected="{{data.ShirtSize}}"class="three columns" required>
	   			<option disabled selected value>Shirt Size</option>
	   			<option value="Kids S">Kids S</option>
	   			<option value="Kids M">Kids M</option>
	   			<option value="Kids L">Kids L</option>
	   			<option value="Kids XL">Kids XL</option>
	   			<option value="Adult S">Adult S</option>
	   			<option value="Adult M">Adult M</option>
	   			<option value="Adult L">Adult L</option>
	   			<option value="Adult XL">Adult XL</option>
	   		</select>

		</div>
	   	<div class="row">

	   		<input type="submit" value="Submit" class="two columns offset-by-five" ng-disabled="form.$invalid">

	   	</div>
	</form>
</div>