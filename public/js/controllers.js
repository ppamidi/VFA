'use strict';

/* Controllers */

var vfaApp = angular.module('vfaApp', []);

vfaApp.controller('TestPartialCtrl', function ($scope) {
	  $scope.phones = [
	                   {'name': 'Nexus S',
	                    'snippet': 'Fast just got faster with Nexus S.'},
	                   {'name': 'Motorola XOOMª with Wi-Fi',
	                    'snippet': 'The Next, Next Generation tablet.'},
	                   {'name': 'MOTOROLA XOOMª',
	                    'snippet': 'The Next, Next Generation tablet.'}
	                 ];}
);

vfaApp.controller('TeamListController', function ($scope, $http) {
	$http.get('phones/phones.json').success(function(data) {
		  $scope.teams = data;			
	  });
	}
);