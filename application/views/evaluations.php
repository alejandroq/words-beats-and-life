<script>
	document.title = "WBL - Evaluations";
</script>
<style type="text/css">
	@media only screen and (max-width: 700px), (min-device-width: 768px) and (max-device-width: 1024px)  {
	  td:nth-of-type(2):before { content: "Course Name"; }
	  td:nth-of-type(3):before { content: "Student Email"; }
      td:nth-of-type(4):before { content: "Instructor Email"; }
	}
</style>

<div ui-view></div>

<div class="container" ng-controller="MyContentController">
	<h3>{{subject}} Evaluations</h3>
	<div class="row block">
    	<div>
          <input type="text" ng-model="searchFilter" placeholder="Search" class="five columns">
            <table class="u-full-width scrollable">
                <thead>
                    <tr>
                        <td></td>
                        <td>
                        	<a ng-click="sortType = 'CourseName'; sortReverse=!sortReverse">Course Name
                        		<span ng-show="sortType == 'CourseName' && !sortReverse" class="fa fa-caret-down"></span>
                        		<span ng-show="sortType == 'CourseName' && sortReverse" class="fa fa-caret-up"></span>
                        		<span ng-hide="sortType !=null" class="fa fa-caret-down"></span>
                        	</a>
    					</td>
                        <td ng-show="x == 5 || x == 2">
                            <a ng-click="sortType = 'RespondentEmail'; sortReverse=!sortReverse">Student Email
                                <span ng-show="sortType == 'RespondentEmail' && !sortReverse" class="fa fa-caret-down"></span>
                                <span ng-show="sortType == 'RespondentEmail' && sortReverse" class="fa fa-caret-up"></span>
                            </a>
                        </td>
    					<td>
                        	<a ng-click="sortType = 'EvaluateeEmail'; sortReverse=!sortReverse">Instructor Email
                        		<span ng-show="sortType == 'EvaluateeEmail' && !sortReverse" class="fa fa-caret-down"></span>
                        		<span ng-show="sortType == 'EvaluateeEmail' && sortReverse" class="fa fa-caret-up"></span>
                        	</a>
    					</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="evals in data | orderBy:sortType:sortReverse | filter:searchFilter">
                        <td><i class="fa fa-microphone"></i></td>
                        <td>{{evals.CourseName}}</td>
                        <td ng-show="x == 5 || x == 2">{{evals.RespondentEmail}}</td>
                        <td>{{evals.EvaluateeEmail}}</td>
                        <td><a ng-click="setMaster(evals)">View Details</a></td>
                    </tr>
                </tbody>
    		</table>
        </div> 
    </div>
</div>