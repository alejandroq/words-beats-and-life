myApp.controller("MyContentDetailController", function($scope, $http, $state, AuthenticationService, ExchangeService) {
	
	$scope.$parent.init('Parent');
	var x = localStorage['x']; //Ducttape
	$scope.x = x;	

	var data = [];

	data = {
		token:undefined,
		CourseID:undefined
	}

	data = ExchangeService.getData();

	$scope.data = data[0];

	data = {
		RespondentEmail:$scope.data.RespondentEmail,
		CourseID:$scope.data.CourseID
	}

	$http.post("../application/endpoints/printCourseEvals.php", data)
    .success(function(response) {
        $scope.evals = response;
    });

})