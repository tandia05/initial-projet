
// Variables globales


var players = null; //source de données variable globale
var ageAsc = false; //booleen permettant de savoir si les joueurs sont triés par age ascendant
var nomAsc = true;
var filterAge = null;
//***************************************************

// FUNCTION

function getPlayers()
{
	var url = 'http://localhost/PROJECTS/php/ajax2.php';

	// requete ajax ASYNHRONE
	// Javascript n'attends pas la reponse du serveur  pour continuer l'éxecution du script
	$.get(url, function(data)

	{
		//data contiendra les donnée envoyées pas le serveur
		players = JSON.parse(data);
		displayTable(players); //onction responsable de l'affichage d'un tableau de joueurs
		//console.log(_.max(getAges()));
	});
}

function displayTable(players)
{
	var table = '<table class="table table-triped">';
	table += '<tr><th id="nomHeader">Nom</th><th>Prenom</th><th id="ageHeader">Age</th><th>Numero</th>' +
	'<th>Equipe</th><th>Equipe_nom</th></tr>';

	var oldest = _.max(getAges(players));
	//console.log(oldest);
	//Boucle
	players.forEach(function(player)
	{
		table += '<tr>';
		table += '<td>' + player.nom + '</td>';
		table += '<td>' + player.prenom + '</td>';

		if(player.age == oldest)
		{
			table += '<td class="oldest">' + player.age + '</td>';
		}
		else
		{
			table += '<td>' + player.age + '</td>';
		}
		table += '<td>' + player.numero_maillot + '</td>';
		table += '<td>' + player.equipe + '</td>';
		//table += '<td>' + player.equipe_nom + '</td>';
		

		if(player.equipe_nom == null)
		{
			table +='<td>Sans equipe</td>';
		}
		else
		{
				 table +='<td>' + player.equipe_nom +'</td>';
		}

	table += '</tr>';
	});
	table += '</table>';
	$('#listPlayers').html(table);
}

function hidePlayers(ageLimit)
{
	var nbResults = 0;
	var rows = $('table tr'); //on recupere les lines du tableau
	$.each(rows, function(index,row)
	{

		//row.hide(); //error row.hide is not a function

		// on cible la ligne par zepto enfin d'enveloppr l'elment des 
		// nouvelles capacités (proprietés et methodes)
		var r = $(row); // r est plus riche en onctionalité qur row
		var age = r.children().eq(2).text(); //
		if (age > ageLimit &&  index != 0)
			{
				r.hide();
			}
		else
			{
				r.show();
				nbResults++;
			}

	});
	$('#nbResults').html(nbResults -1);
}

function getAges()
{
	var ages = [];
	players.forEach(function(players)
	{
		ages.push(players.age);
	});

	return ages;
}

function getFormValues(form)
{

	// Recupee tous les input dans le 
	//formulaire fournit en entré de la fonction
	var inputs			= form.children('input');
	//Recupee la valeur du premier input
	var nom 			= inputs.eq(0).val();
	var prenom 			= inputs.eq(1).val();
	var age 			= inputs.eq(2).val();

	var selects 		= form.children('select');
	var maillot 		= selects.eq(0).val();
	var equipe 			= selects.eq(1).val();
	//console.log(nom + ' ' + prenom);
	 //declaration d'un objet
	values = {
				nom: nom,
				prenom: prenom,
				age: age,
				maillot: maillot,
				equipe: equipe
			};
	return values;
	
}

function checkValues(player)
{
	// player est un objet
	var condition =
	player.nom.length > 1 &&
	player.prenom.length > 1 &&
	player.age.length > 1;
	return condition;
}

function clearMessage(timer)
{
	var message = $('#message');
	setTimeout(function()
	{
		// efface le texte situé dans l'element meddage
		message.text(' ').removeClass(); 
	}, timer);
}

//*************************************************************

// *** Ecouteur d'evenemen

$('#selectAge').on('change',function()
{
	filterAge = $(this).val(); // VALrecupere la valeur du formulaire(balises)
	//console.log('age selectionné:' + ' ' + age);
	hidePlayers(filterAge);
});


// l'orsque l'element #ageHeader existera dans le SOM JS placera
//un ecouteur d'evenement click dessus
$(document).on('click','#ageHeader', function()
{
	if(ageAsc)
	{
		var sortedPlayers = _.reverse(_.sortBy(players,['age']));
	}
	else
	{
		var sortedPlayers = _.sortBy(players,['age']);
	}
	ageAsc = !ageAsc; //true devien false ou false devient true
	displayTable(sortedPlayers);
	if(filterAge)
	{
		hidePlayers(filterAge); //on masque les joueurs dont l'age est superieur
		// a la valeur stocké dans filterAge
	}

});

$(document).on('click','#nomHeader', function()
{
	if(nomAsc)
	{
		var sortedPlayers = _.reverse(_.sortBy(players,['nom']));
	}
	else
	{
		var sortedPlayers = _.sortBy(players,['nom']);
	}
	nomAsc = !nomAsc; //true devien false ou false devient true
	displayTable(sortedPlayers);

});
$('#displayFormPlayer').on('click',function()
{
	var text = 'le formulaire pour ajouter un joueur';
	//$('#formPlayer').toggle();
	var form = $(this).next();//ciblage relatif
	form.toggle();

	//changer le texte du lien en fonction de la 
	//visibilité du formulaire
	var status = form.css('display');
	if(status == 'none')
	{
		$(this).text('Afficher' + text);
	}
	else
	{
		$(this).text('Masquer' + text);
	}

});

$('#formPlayer button').on('click',function()
{
	var form = $('#formPlayer ');

	// Recuperation d'un objet player a partir des 
	// valeurs recuperées dans le formulaire
	var player = getFormValues(form);

	var check = checkValues(player);
	if(check)
	{
		// Requete ajax par poste
		var url = 'http://localhost/PROJECTS/php/ajaxAddPlayer.php';
		$.post(url,player,function(data)
		{
			if (data == 1)
			{
				getPlayers();
				$('#message')
					.text('L\' enregistrement a reussi ')
					.removeClass()
					.addClass('bg-success, text-success');
			}
			else
			{
				$('#message')
					.text('L\'enreistrement a echoué')
					.removeClass()
					.addClass('bg-danger, text-danger');

			}

		});

	}
	else
	{
		//Afficher un message d'eurreur si les conditions ne sont pas reunies
		$('#message')
			.text('Formulaire non valide')
			.removeClass()
			.addClass('bg-danger, text-danger');

		
	}
	clearMessage(5000);
	

});

//*******************************************************

// Chargemen de la liste des joueurs

getPlayers(); //appel de la fonction dés le chargement de la page



//var p = $('p');
//p.hide();

/*//lodash exemple
var notes = [7, 56, 12, 74, 58];
var max = _.max(notes);
var min = _.min(notes);
console.log(max);
console.log(min);*/