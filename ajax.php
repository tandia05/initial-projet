<?php

$players = ['chiellini','Benatia','Riacos'];
/*print_r($players)*/; //retourne la chaine de caractere suivante

$bonoucci1 = ["path" => "img/joueurs/bonoucci1.jpg",
			   "caption" => "bonoucci celebrant un but",
			   "alt" => "celebration"
];

$bonoucci2 = ["path" => "img/joueurs/bonoucci2.jpg",
			   "caption" => "bonoucci en rajeur",
			   "alt" => "rage"
];

$bonoucci3 = ["path" => "img/joueurs/bonoucci3.jpg",
			   "caption" => "en conference",
			   "alt" => "conference"
];

$joueur = ["nom" => "bonoucci",
			 "prenom" => "leonaro",
			 "ahe" => "29 ans",
			 "numero" => "19",
			 "club" => "juventus",
			 "international" => true,
			 "photos" => ["bonoucci1","bonoucci2","bonoucci3"],
			 "photos2" => [$bonoucci1,$bonoucci2,$bonoucci3]
];


echo json_encode($players);// renvoi au client les données  de tableau au format json

?>