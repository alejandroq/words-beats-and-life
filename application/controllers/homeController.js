myApp.controller("HomeController", function ($scope) {

		$scope.$parent.init('Applicant');
		var x = localStorage['x']; //Ducttape
		$scope.x = x;

		$scope.message = "Community Wall";
		})
