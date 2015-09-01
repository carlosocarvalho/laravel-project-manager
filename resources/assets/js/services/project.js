angular.module('app.services')
    .service('ClientService',[
        'appConfig',
        '$resource',
        function(appConfig, $resource){

            console.log(appConfig.config);

            return  $resource( '/client/:id', {id:'@id'},{
                'update' : {
                    method: 'PUT'
                }
            });
        }

    ]);