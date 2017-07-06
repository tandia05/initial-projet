
// .module(arg1, arg2)
// arg1 : nom du module
// arg2 : tableau des dépendances (autres modules chargés)
var app = angular.module('introApp', []);

app.controller('mainCtrl', function($scope, $http) 
{

    var url_server = "http://localhost/PROJECTS/PHP/poo/ajax.php";

    //$scope.updateMode est un indicateur permettant de savoir
    // si le formulaire doit être géré en mode insertion ou bien
    // en mode mise à jour

    $scope.updateMode = false; //mode d'insertion par defaut

    $scope.visibleForm = false; // formulaire masqué par défaut

    $scope.nb_click = 0;
    $scope.orderKey = "age"; // critère de tri initial
    $scope.reverse = false; //  par defaut tri croissant(pas d'inversion)
    $scope.message = "coucou"; // ajout d'une propriété "message"
    // à l'objet $scope (espace d'échange entre
    // la vue et le controller)
    $scope.maillot_range = [];// tableau vide pour alimenter le menu de select
    //  dans le ormulaire d'ajout       allant de 1 à 999

    // variable equipes non accessible à la vue
    var equipes = [
        {name: 'france'},
        {name: 'strasbourg'},
        {name: 'real'}
    ];

    function getPlayers()
    {
     // requête ajax via le service $http
        var url = url_server + "?action=list";
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

    // creation des numeros
   function buildNumeroListe()
   {
        for (var i = 1 ;i <  1000; i++)
        {
             $scope.maillot_range.push(i);
        }

   }

   function initPlayer()
   {
        // initialisaion facultatif
        $scope.player = {
        nom: '',
        prenom: '',
        age: '',
        numero_maillot: 1,
        equipe: "0"
        };
   }

    $scope.teams = equipes; // nous exposons les joueurs, ils sont
    // accessibles à la vue

    $scope.changeOrder = function(key)
    {
        $scope.orderKey = key;
        $scope.reverse = !$scope.reverse;
    };

    $scope.savePlayer = function()
    {
        var url = url_server;

        $http.post(url,{player:$scope.player}).then(function(res)
        {
            console.log(res.data);
             //rechargement des joueurs
           getPlayers();
           // effacer le champ du formulaire
           $scope.player = {};
        });    
    }

    $scope.editPlayer = function()
    {
       $scope.player = this.g;
       $scope.updateMode = true;
       $scope.visibleForm = true;
    }

    $scope.deletePlayer = function()
    {
        var player_id = this.g.id;
        var url = url_server + "?action=delete&id=" + player_id;
        $http.get(url).then(function(res)
        {
            console.log(res.data);
             //rechargement des données
           getPlayers();

        });    
    };

    $scope.cleanForm = function()
    {
        initPlayer();
        $scopr.updateMode = false;
    }

    // chargement des joueurs
    getPlayers();

    // construction  de la liste des numeros maillot
    buildNumeroListe();
   /* console.log( $scope.maillot_range);*/

   //initialisation du formulaire
   initPlayer();



   //$scope.player = {prenom:'Rober'  nom: 'PIRES'};


});
