<!DOCTYPE html>
<html ng-app="introApp">
<head>
    <title>Angularjs Intro</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <style > th { 
                    cursor: pointer; 
                } 
     table img {
                    width:40px;
                }
     </style> 
 
</head>
<body>
<?php
include '../includes/menu.php';
include '../includes/equipe.inc.php';
?>
    <h1>Angularjs Intro</h1>

    <div ng-controller="mainCtrl">
        
           <!--  <h2>{{message}}</h2> -->

           <!-- checbox pour affichage du formulaire -->
           <input type="checkbox" ng-model="visibleForm">
           <span ng-if="!visibleForm">Afficher</span>
            <span ng-if="visibleForm">Masquer</span> le formulaire

            <ul style="display: none;">
                <li ng-repeat="joueur in joueurs">
                {{joueur.name}} ({{joueur.age}} ans)
                </li>
            </ul>

                <!-- Formulaie d'ajout ,mis a jour d'un joueur -->

            <div ng-show="visibleForm" class="well">
                <input ng-model="player.nom" type="text" placeholder="nom">
                <input ng-model="player.prenom" type="text" placeholder="prenom">
                <input ng-model="player.age" type="text" placeholder="age">

                <label>Numero</label>
                <select ng-model="player.numero_maillot">
                    <option  ng-repeat="n in maillot_range">{{n}}</option>
                </select>

                <label>Equipe :</label>     
                 <?php echo selectFormat(getTeams());?>

                <button ng-click="savePlayer()" class="btn btn-primary btn-xs">
                <span ng-if="!updateMode">Enregistre</span>
                <span ng-if="updateMode">Mettre à jour</span>
                </button>
                 <button ng-click="cleanForm()" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span>Annuler</button>
                <span id="message"></span>

            </div>

           <!--  FILTRES -->
        <div>  <!-- ng-model surveille la valeur d'un input et la range dans le scope -->
            <input ng-model="search"   type="text"  placeholder="recherche">
            <select ng-model="selectedTeam">
            <option value=""> Toutes les equipes</option>
              <option ng-repeat ='team in teams'>{{team.name}}</option>
            </select>
        </div>
        <p>{{filteredGiocatori.length}} / {{giocatori.length}}</p>

        <div ng-hide="true">
            <button ng-click="nb_click = nb_click + 1">click</button> {{nb_click}}
        </div>
        
        <table class="table table-striped">
            <tr>
                <th ng-click="changeOrder('nom')">Nom</th>
                <th ng-click="changeOrder('prenon')">Prenom</th>
                <th ng-click="changeOrder('age')">Age</th>
                <th ng-click="changeOrder('numero_maillot')">Numero</th>
                <th ng-click="changeOrder('equipe_nom')">Equipe</th>
                 <th ng-click="changeOrder('equipe_logo')">Logo de l'équipe</th>


                <th>Action</th>
                <th>Action</th>
            </tr>
            <tr ng-repeat="g in filteredGiocatori=(giocatori |
                            filter:search |
                        filter:selectedTeam |
                  orderBy:orderKey:reverse)" >
                <td>{{g.prenom}}</td>
                <td>{{g.nom}}</td>
                <td>{{g.age}}</td>
                <td>{{g.numero_maillot}}</td>
                <td>{{g.equipe_nom}}</td>

               <!--  <td>
                <span ng-if="g.equipe != 0">{{g.equipe_nom}}</span>
                <span ng-if="g.equipe != 0">{{g.equipe_nom}}</span>
                </td> -->

                <td><img ng-src="../{{g.equipe_logo}}"></td> 
                <td><button ng-click="editPlayer()" class="btn btn-default">
                <span class="glyphicon glyphicon-pencil"></span></button></td>
                <td><button ng-click="deletePlayer()" class="btn btn-danger">
                <span class="glyphicon glyphicon-trash"></span></button></td>
            </tr>
        </table>

    </div>

    <script src="js/angular.min.js"></script>
   <!--  <script src="js/app_v1.js"></script> -->
     <script src="js/app.js"></script>
</body>
</html>
