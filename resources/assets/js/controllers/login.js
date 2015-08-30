angular.module('app.controllers').controller('loginController.index',[
    '$scope','OAuth','$location',
    function($scope, OAuth, $location){

        $scope.user = {
                  username:'',
                  password:''
        }

        $scope.error = {
            error:false,
            message:''
        }
        $scope.login = function(){

            if( ! $scope.loginUser.$valid ) return false;
            OAuth.getAccessToken($scope.user).then(
                function(){
                  $location.path('home');
                },
                function(obj){
                     var error = obj.data;
                      $scope.error.error = true;
                      $scope.error.message = error.error_description;
                });
        }
    }
]);
