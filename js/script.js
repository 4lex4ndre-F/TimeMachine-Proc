/* La fonction console.log() chère à Hugo */
function l(e) {
    console.log(e);
};


/* GLOBAL 
    page d'accueil
    formulaire connexion et inscription (des modals serait bien)
    page photos + résultats de recherche
    page stories + résultats de recherche
    Pour les recherches, ce serait bien de mettre un peu de technologie Ajax afin que des résultats s'affichent pendant la frappe par exemple    
*/


/* ADMINISTRATION */

// gestion membres
// affichage du tableau à la demande
var afficherMembres = document.getElementById('afficher_membres');

if (typeof afficherMembres != 'undefined' && afficherMembres != null) {
    document.getElementById('afficher_membres').addEventListener('click', function() {
        l('click afficher');
        document.getElementById('table_users').style.display = "block";
        document.getElementById('masquer_membres').style.display = "block";
        document.getElementById('afficher_membres').style.display = "none";
    });
}

// masquage du tableau à la demande
var masquerMembres = document.getElementById('masquer_membres');

if (typeof masquerMembres != 'undefined' && masquerMembres != null) {
    document.getElementById('masquer_membres').addEventListener('click', function() {
        l('click masquer');
        document.getElementById('table_users').style.display = "none";
        document.getElementById('afficher_membres').style.display = "block";
        document.getElementById('masquer_membres').style.display = "none";
    });
}

// gestion photos

// gestion commentaires