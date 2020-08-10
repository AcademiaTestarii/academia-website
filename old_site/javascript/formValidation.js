angular.module('formValidation',[]).controller('validationController',['$scope'],function($scope){
   $scope.name={
       text: 'nume',
       word: /^\s*\w*\s*$/
   };
    
});