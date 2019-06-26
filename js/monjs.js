///////////////-----------pagination-------------////
$(document).ready(function() {
    $('#example').DataTable({
        "scrollX": true
    });
});
///////////////-----------Fin pagination-------------////

////////////----Début Page étudidant----////////
var nom_page = window.location.pathname;
if (nom_page.includes("etudiants.php")) {

    var typeBourse = document.getElementById('typeBourse');
    var batiment = document.getElementById('Batiment');
    var chambre;

    var adresse = document.getElementById('adresse');
    typeBourse.style.display = 'none';
    batiment.style.display = 'none';
    adresse.style.display = 'none';
    if (chambre = document.getElementById('Chambre')) {
        typeBourse.style.display = '';
        batiment.style.display = '';
    };

    function afficherPourBoursier() {
        typeBourse.style.display = '';
        batiment.style.display = 'none';
        adresse.style.display = 'none';
        if (chambre) chambre.style.display = 'none';
    }

    function afficherPourNonBoursier() {
        typeBourse.style.display = 'none';
        batiment.style.display = 'none';
        if (chambre) chambre.style.display = 'none';
        adresse.style.display = '';

    }

    function afficherPourLoge() {
        typeBourse.style.display = '';
        batiment.style.display = '';
        if (chambre) chambre.style.display = '';
        adresse.style.display = 'none';
    }


    var choix;

    if (choix = document.getElementById('Statut Non Boursier')) {
        afficherPourNonBoursier();
    } else if (choix = document.getElementById('Statut Boursier')) {
        afficherPourBoursier();
    } else if (choix = document.getElementById('Statut Loger')) {
        afficherPourLoge();
    }


    //okk();

    function okk() {
        for (var i = 0; i < 11; i++) {
            setTimeout(popUp(), 5000);
            clearTimeout(500);
        }
    }

    function popUp() {
        var monPopUp = document.getElementById('popUp');
        //if (document.getElementById('popUp')) {
        var valeur = window.getComputedStyle(monPopUp).top;
        valeur = valeur.replace('px', '');
        var valeur2 = parseInt(valeur) + 70;
        monPopUp.style.top = valeur2 + 'px';
        //}
    }
    if (document.getElementById('popUp')) window.onload = okk();

}
////////////----Fin Page étudidant----////////

////////////----Début ----////////
var nom_page = window.location.pathname;
if (nom_page.includes("accueil.php") == false) {
    function traduction() {
        document.getElementById('example_filter').innerHTML = '<label>  <input type="search" class="form-control" placeholder="Rechercher" aria-controls="example"></label>';
        document.getElementById('example_length').innerHTML = '<label class="form-control">Montrer <select name="example_length" aria-controls="example" data-dpmaxz-eid="8"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> </label>';
        document.getElementById('example_info').innerHTML = '<div class="dataTables_info" id="example_info" role="status" aria-live="polite"></div>';
        document.getElementById('example_previous').innerHTML = 'Précédant';
        document.getElementById('example_next').innerHTML = 'Suivant';
    }
    window.onload = traduction;
}
////////////----Fin ----////////