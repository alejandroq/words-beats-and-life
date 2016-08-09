myApp.controller("MyContentController", function ($scope, $state, $http, $location, AuthenticationService, ExchangeService) {
	    
	    $scope.$parent.init('Parent');
	    var x = localStorage['x']; //Ducttape
		$scope.x = x;

		// SUBJECT (who this is for)
		if ($scope.x == 5) {
			$scope.subject = "Student & Staff";
		} else if ($scope.x == 3 || $scope.x == 4) {
			$scope.subject = "Your";
		} else if ($scope.x == 2) {
			$scope.subject = "Your Students";
		}
		// END SUBJECT 

	    var token = localStorage['token'];
		token = token.slice(1, (token.length-1));
		var data = {
		 	token:token
		}

	    $http.post("../application/endpoints/readEvals.php", data)
	    .success(function(response) {
	        $scope.data = response;
	    });

	    $scope.setMaster = function(data) {
	        $scope.selected === data;
	        ExchangeService.addData(data);
	        $state.go(".detail");
	    }
	});