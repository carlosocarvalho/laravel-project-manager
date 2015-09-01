angular.module('app.services')
    .service('ClientService',[
        'appConfig',
        '$resource',
        function(appConfig, $resource){
           return  $resource( '/client/:id', {id:'@id'},{
                'update' : {
                    method: 'PUT'
                }
            });
        }

    ]);