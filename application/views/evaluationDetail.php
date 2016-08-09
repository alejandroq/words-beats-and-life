<script>
	document.title = "WBL - Evaluations";
</script>
<style type="text/css">
	@media only screen and (max-width: 770px), (min-device-width: 768px) and (max-device-width: 1024px)  {
	  td:nth-of-type(1):before { content: "Question"; }
	  td:nth-of-type(2):before { content: "Answer"; }
	}
</style>
<div id="form-background"></div>
<div id="form-window" class="container" ng-controller="MyContentDetailController">
	<div class="row">
		<div class="column"><a href="#/evaluations"><i class="fa fa-times-circle-o"></i></a></div>
    </div>
    <div class="row">
		<h3 class="offset-by-one nine columns">Evaluation of {{data.CourseName}}</h3>
	</div>
	<div class="row">
    	<div>
            <table class="u-full-width scrollable">
                <thead>
                    <tr>
    					<td>
                        	<a>Question</a>
    					</td>
    					<td>
                        	<a>Answer</a>
    					</td>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="user in evals">
                        <td>{{user.QuestionText}}</td>
                        <td ng-show="user.ResponseText != ''">{{user.ResponseText}}</td>
                    </tr>
                </tbody>
    		</table>
        </div> 
    </div>
</div>