var fetch = angular.module('NHITM', []);

fetch.controller('DepartmentController', ['$scope', '$http', function ($scope, $http) {
	$http({
  method: 'post',
  url: '../showAjax/showDepartments.php'
 }).then(function successCallback(response) {
  // Store response data
  $scope.collection = response.data;
 });
 
 $scope.show = function () {
		  $http({
		  method: 'post',
		  url: '../showAjax/showDepartments.php'
		 }).then(function successCallback(response) {
		  // Store response data
		  $scope.collection = response.data;
		 });
    };
}]);