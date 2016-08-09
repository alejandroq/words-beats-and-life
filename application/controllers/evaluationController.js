myApp.controller("EvaluationController", function ($scope, $state, $http, $location, AuthenticationService, ExchangeService) {
	    
    $scope.$parent.init('Student');
    var x = localStorage['x']; //Ducttape
	$scope.x = x;

    var data = [];

	data = ExchangeService.getData();
	$scope.data = data[0];

	$('#todos').hide(200);

	$http.get("../application/endpoints/renderEvalForCourse.php")
			 .success(function(response) {
			 	$scope.xy = response; 
			});

	$scope.manage = function() {
		var results = [];
	    for (i = 0; i < 38; i++) {
	    	var response = $scope.form.$$success.parse[i].$$lastCommittedViewValue;
	    	temp = {QuestionNumber:(i+1), Response:response };
	    	results.push(temp);
		}

		data = {
			RespondentEmail:$scope.data.RespondentEmail,
			EvaluateeEmail:$scope.data.EvaluateeEmail,
			CourseID:$scope.data.CourseID,
			Results:results
		}

		$http.post("../application/endpoints/createClassEvaluation.php", data)
		.success(function(response) {
		 	$scope.data.Result = "Success!";
		});

		$state.go('home');
	};
});