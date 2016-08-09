<div class="container">
	<h5>Student Evaluation for '{{data.CourseName}}'</h5>
	<h6>Intructor: {{data.Name}}</h6>
	<form name="form" ng-submit="manage()" class="row">
		<div class="row" ng-repeat="x in xy">
			<h4 ng-show="$index==4" style="margin-top:2em;">In class I get to...</h4>
			<h4 ng-show="$index==8" style="margin-top:2em;">This class has helped me...</h4>
			<h4 ng-show="$index==15" style="margin-top:2em;">By participating in class...</h4>
			<h4 ng-show="$index==19" style="margin-top:2em;">I am sure that I will...</h4>
			<h4 ng-show="$index==22" style="margin-top:2em;">Teacher Evaluation</h4>
			<h4 ng-show="$index==36" style="margin-top:2em;">Self Evaluation</h4>
			<p>{{x.QuestionNumber}}: {{x.QuestionText}}</p>
			<select ng-model="item" value="Always" ng-show="$index!=0 && $index!=1 && $index!=2 && $index!=3 && $index!=32 && $index!=33 && $index!=34 && $index!=35 && $index!=36 && $index!=37" required>
				<option value="3 - Always">Always</option>
				<option value="2 - Sometimes">Sometimes</option>
				<option value="1 - Never">Never</option>
			</select>
			<select ng-model="item" value="Facebook" ng-show="$index==0" required>
				<option value="Facebook">Facebook</option>
				<option value="Twitter">Twitter</option>
				<option value="Human">Human</option>
				<option value="Other">Other</option>
			</select>
			<select ng-model="item" value="Yes" ng-show="$index==1" required>
				<option value="Yes">Yes</option>
				<option value="Sometimes">Sometimes</option>
				<option value="Never">Never</option>
			</select>
			<select ng-model="item" value="Yes" ng-show="$index==35" required>
				<option value="Yes">Yes</option>
				<option value="Never">No</option>
			</select>
			<input type="text" ng-model="item" ng-show="$index==2" required>
			<input type="text" ng-model="item" ng-show="$index==3" required>
			<input type="text" ng-model="item" ng-show="$index==32" required>
			<input type="text" ng-model="item" ng-show="$index==33" required>
			<input type="text" ng-model="item" ng-show="$index==34" required>
			<input type="text" ng-model="item" ng-show="$index==36" required>
			<input type="text" ng-model="item" ng-show="$index==37" required>
		</div>
		<input type="submit" value="Submit Evaluation" style="margin-top: 4em;">
	</form>
</div>