myApp.controller("TableController", function ($scope, $state, $http, $location, AuthenticationService, ExchangeService) {
	    
	    $scope.$parent.init('Applicant');
	    var x = localStorage['x'];
		$scope.x = x;

	    $http.get("../application/endpoints" + $location.path() + ".php")
	    .success(function(data) {
	        $scope.data = data;
	    });

	    $scope.setMaster = function(data) {
	        $scope.selected === data;
	        ExchangeService.addData(data);
	        if ($scope.x == 3) {
	        	$state.go(".enroll");
	        } else {
	        	$state.go(".manage");
	    	}
	    }

	    $scope.viewPortfolio = function(data) {
	    	ExchangeService.addData(data.EmailAddress);
	    	$state.go("content")
	    }

	    $scope.approve = function(x) {
	    	var data = {
	    		EmailAddress:x.EmailAddress
	    	};

	    	$http.post("../application/endpoints/approveUser.php", data)
	    	.success(function(response) {
	    		$state.reload();
	   		});
	    }

	});