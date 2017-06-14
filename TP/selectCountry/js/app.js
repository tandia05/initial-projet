

var pays_infos = [];

$('select').on('change', function() 
{
        var option = $(this).val();

        // si pays sélectionné => requête ajax
        if (option > 0) 
        {
            $('#pays_infos').show();
            var index_pays = isCountryInArray(pays_infos, option);

            if(index_pays != -1)
            {
                //pays trouvé
                displayCountryData(pays_infos[index_pays]);
            }
            else
            {
                //pays non trouve
                var url = 'http://localhost/PROJECTS//PHP/TP//selectCountry/pays.php?id='+option;
                 $.get(url, function(data) 
                 {
                    // affichage des données dans la page
                    var pays = JSON.parse(data); // conversion de la chaîne JSON
                    // en tableau JS
                    displayCountryData(pays);
                    //mise en cache de données
                    pays_infos.push(pays);
                    console.log(pays_infos);
                });
            }
          
        }
        else
        {
             $('#pays_infos').hide();
        }

        function displayCountryData(country) 
        {
            var spans = $('#pays_infos span');
            spans.eq(0).text(country.capitale);
            spans.eq(1).text(country.nb_habitants);
            spans.eq(2).text(country.superficie);
            spans.eq(3).text(country.langues);

            $('img.flag').attr('src', country.drapeau);
        }

        function isCountryInArray(arr, id)
        {
            var found = -1; // -1 signifie auccun indice trouvé
            arr.forEach(function(item, index)
            {
                if(item.id == id)
                {
                    found = index; // pays recherché trouvé
                }
            });

            return found;
        }

});