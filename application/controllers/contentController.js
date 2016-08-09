myApp.controller("ContentController", function ($scope, $state, $location, $http, AuthenticationService, ExchangeService) {
	    
	    $scope.$parent.init('Applicant');
	    var x = localStorage['x']; //Ducttape
		$scope.x = x;

		$scope.i = 0; //loop for future use

		var token = localStorage['token'];
		token = token.slice(1, (token.length-1));

		var location = $location.path();
		$scope.location = location; //display specifc items only on Content page 

		if ($scope.location != "/") {
			var email = ExchangeService.getData();
			$scope.email = email[0];
			// $scope.j = email[0]
			// if ($scope.j){
			// 	if ($scope.j.Title != "") {
			// 		var title = $scope.j.Title;
			// 		$scope.title = title;
			// 	}
			// }
		}

		if ($scope.data == undefined) { 
			var data = {
			 	token:token,
			 	location:location,
			 	StudentEmailAddress:$scope.email
			}

		    $http.post("../application/endpoints/content.php", data)
		    .success(function(data) {
		        $scope.data = data;
		    });
		}

		// DETERMINING MESSAGE
		if ($scope.email) {
			$scope.subject = "Portfolio: " + $scope.email;
		} else if ($scope.x > 3) {
			$scope.subject = "All Portfolio's";
		} else if ($scope.x == 3) {
			$scope.subject = "My Portfolio";
		} else if ($scope.x == 2) {
			$scope.subject = "Your Students Portfolio";
		}
		// END DETERMINING MESSAGE

		$scope.viewPortfolio = function(email) {
			$scope.selected === email;
	        ExchangeService.addData(email);
	        if ($scope.location != "/") {
	        	$state.reload();
	        } else {
	        	$state.go("content");
	        }
		}

	    $scope.expand = function(index, data, action) { //grow specific $index
	    	$scope.y = data.PortfolioID; 
	    	var student = data.StudentEmailAddress;
	    	var temp = 0;

	    	if ($scope.selected != index && action == null) {
	    		$scope.selected = index;
	    		$scope.temp = undefined;
	    	} else if (action == 'grow' || $scope.temp != undefined && $scope.i<=2) {
	    		$scope.selected = index;
	    		$scope.temp = index;
	    		$scope.i++;
	    	} 
	    	else {
	    		$scope.temp = undefined;
	    		$scope.selected = undefined;
	    		$scope.i = 0;
	    	}

	    	//CHECK FOR LIKE
	    	if (action == null) {
	    		action = "";
	    	}

	    	var token = localStorage['token'];
			token = token.slice(1, (token.length-1));
			var data = {
			 	token:token,
			 	PortfolioID:$scope.y,
			 	StudentEmailAddress: student,
			 	Action:action
			}

			$http.post("../application/endpoints/likes.php", data)
	    	.success(function(data) {
	        	$scope.likes = data;
	        	if ($scope.likes.length == 0) {
	        		data = {
	        			Liked:0
	        		}
	        		$scope.likes = data;
	        	}
	    	});
	    }
	});