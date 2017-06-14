//alert("ciao");
//console.log('JS OK');
var list 		= document.getElementById('list');
var reset	    = document.getElementById('reset');
var ajax		= document.getElementById('ajax');
var message 	= "Bonjour à tous";
var nbClick 	= 0;
function test()
	{ console.log(message); }

function addLi()
	{
		if(nbClick < 5)
		{
				// generer une balise HTML
			var li = document.createElement('li');
			li.innerText = message;
			list.appendChild(li);
		}
		nbClick++;
	}

function addLi2(text)
	{
		if(nbClick < 5)
		{
				// generer une balise HTML
			var li = document.createElement('li');
			li.innerText = text;
			list.appendChild(li);
		}
		nbClick++;
	}

function emptyList()
	{
		//list.removeChild('li');
		//list.innerHTML = " ";
		while (list.firstChild)
		{
			list.removeChild(list.firstChild);
		}
		nbClick = 0;
	}

function getData()
	{
		console.log('Requete ajax');
		var req = new XMLHttpRequest();
		var url = 'http://localhost/php/ajax.php';
		req.open('GET',url,false);
		req.send(null); //aucunne données supplementaire a envoye
		if (req.status == 200)
		{
			//intruction si succes
			//console.log('Reponse de serveur:' + req.responseText);
			var res = req.responseText;
			console.log(typeof res); //Renvoi string
			console.log(res[0]); // Ne renvoie pas l'element du tableau

			var resArray = JSON.parse(res);
			

			console.log(typeof resArray); //Renvoi l'objet premier du tableau
			console.log(resArray[0]); //  renvoie le premier element du tableau


			addLi2(resArray[0]);

		}
		else
		{
			//instruction si echec
		}
	}

document.getElementById('btn').addEventListener('click',addLi);
//$('btn').click(test);
reset.addEventListener('click',emptyList);
ajax.addEventListener('click',getData);



