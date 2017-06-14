// .module(arg1, arg2)
// arg1 : nom du module
// arg2 : tableau des dépendances (autres modules chargés)
var app = angular.module('introApp', []);

app.controller('mainCtrl', function($scope, $http) {
    $scope.nb_click = 0;
    $scope.orderKey = "age";
    $scope.reverse = false; //  par defaut tri croissant(pas d'inversion)
    $scope.message = "coucou"; // ajout d'une propriété "message"
    // à l'objet $scope (espace d'échange entre
    // la vue et le controller)

    // variable players non accessible à la vue
    var equipes = [
        {name: 'france'},
        {name: 'strasbourg'},
        {name: 'real'}
    ];

    function getPlayers()
    {
        var url = "http://localhost/PROJECTS/PHP/ajax2.php";
        $http.get(url).then(function(res)
        {
           $scope.giocatori = res.data;
          //---
             $scope.giocatori.forEach(function(joueur)
             {
                if(joueur.equipe == 0)
                {
                    joueur.equipe_nom ='Sans equipe';
                }
             });

        });
    }

   

    $scope.teams = equipes; // nous exposons les joueurs, ils sont
    // accessibles à la vue

    $scope.changeOrder = function(key)
    {
        $scope.orderKey = key;
        $scope.reverse = !$scope.reverse;
    };
    $scope.deletePlayer = function()
    {
        var player_id = this.g.id;
        var url = "http://localhost/PROJECTS/PHP/deletePlayer.php?ajax=true&id=" + player_id;
        $http.get(url).then(function(res)
        {
            console.log(res.data);
             //rechargement des données
           getPlayers();
        });    
    };

    // chargement des joueurs
    getPlayers();
});
