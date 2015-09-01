/**
 * Created by carlosocarvalho on 30/08/2015.
 */
angular.module('app.controllers').controller('ClientController.index', [
    '$scope',
    'ClientService',
    function ($scope, ClientService) {
        $scope.clients = ClientService.query();
    }
])

    .controller('ClientController.add', [
        '$scope',
        'ClientService',
        '$location',
        function ($scope, ClientService, $location) {
            $scope.client = new ClientService();

            $scope.save = function(){
                if( ! $scope.clientForm.$valid )return false;
                $scope.client.$save().then(
                    function(){

                        $location.path('/clients');

                }, function(){

                });
            }
        }
    ])

    //edit
    .controller('ClientController.edit', [
        '$scope',
        'ClientService',
        '$routeParams',
        '$location',
        function ($scope, ClientService, $routeParams, $location) {
            $scope.client  = ClientService.get({id:$routeParams.id});

            $scope.save = function(){
                if( ! $scope.clientForm.$valid )return false;
                ClientService.update({id:$routeParams.id}, $scope.client, function(){
                    $location.path('clients');
                });
            }
        }
    ])

    .controller('ClientController.remove', [
        '$scope',
        'ClientService',
        '$routeParams',
        '$location',
        function ($scope, ClientService, $routeParams, $location) {
            $scope.client  = ClientService.get({id:$routeParams.id});

            $scope.save = function(id){
                $scope.client.$delete({id: id}, function(){
                    $location.path('clients');
                });
            }
        }
    ])

;
