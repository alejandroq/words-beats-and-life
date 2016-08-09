myApp.controller("EnrollController", function($scope, $http, $state, AuthenticationService, ExchangeService) {
	
	$scope.$parent.init('Student');
	var x = localStorage['x']; //Ducttape
	$scope.x = x;	

	var data = [];

	data = ExchangeService.getData();
	$scope.data = data[0];

	$scope.check = function() {
		var token = localStorage['token'];
		token = token.slice(1, (token.length-1));
		var result = '';
		var data = {
			SectionID:$scope.data.SectionID,
			CourseID:$scope.data.CourseID,
		 	token:token
		}
		$http.post("../application/endpoints/enrollStatus.php", data)
			 .success(function(response) {
			 	result = response; 
			 	if (result==='notEnrolled') { //Success === Not Enrolled.
					$scope.result = 'Please fill out the included Parent Waiver and bring it to your first class!';
				} else if (result==='Enrolled') {
					$scope.result = 'You are Already Enrolled in this Course!';
				} else if (result==='Evaluation') {
					$scope.result = 'Please Fill Out an Evaluation Before Enrolling in a New Course';
				}
			});
	};

	// Check Enrollment Status
	$scope.check();

	$scope.manage = function() {
		var token = localStorage['token'];
		token = token.slice(1, (token.length-1));
		var data = {
			SectionID:$scope.data.SectionID,
			CourseID:$scope.data.CourseID,
		 	token:token
		}
		
		$http.post("../application/endpoints/enrollCourse.php", data)
			 .success(function(response) {
			 	$scope.data.Result = "Success!";
			});
		
		$scope.data.Result = "Thank you for your submission!";
		// $state.reload(); // Reload for new data.
	};
})