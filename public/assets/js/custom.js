// Définition de la fonction noteLiteraire en JavaScript

// pour afficher la date
function afficherDate() {
    let date = new Date();
    let jour = date.getDate();
    let mois = date.getMonth() + 1;
    let annee = date.getFullYear();

    jour = jour < 10 ? '0' + jour : jour;

    let moisArray = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];

    return jour + ' ' + moisArray[mois - 1] + ' ' + annee;
}

// les semestres 
function afficherSemestre(niveau) {
    switch (niveau) {
        case 'Licence 1':
            return 'Semestres S1 et S2 (1ère année)';
        case 'Licence 2':
            return 'Semestres S3 et S4 (2ème année)';
        case 'Licence 3':
            return 'Semestres S5 et S6 (3ème année)';
        case 'Licence 4':
            return 'Semestres S7 et S8 (4ème année)';
        case 'Master 1':
            return 'Semestres S9 et S10 (1ère année master)';
        case 'Master 2':
            return 'Semestres S11 et S12 (2ème année master)';
        default:
            return '';
    }
}

// code pour la recherche
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("searchInput");
    searchInput.addEventListener("input", function() {
        const searchTerm = searchInput.value.toLowerCase();
        const tableBody = document.getElementById("tableBody");
        const rows = tableBody.getElementsByTagName("tr");
        for (let i = 0; i < rows.length; i++) {
            const currentRow = rows[i];
            let found = false;
            for (let j = 0; j < currentRow.getElementsByTagName("td").length; j++) {
                const cell = currentRow.getElementsByTagName("td")[j];
                if (cell) {
                    const cellText = cell.textContent || cell.innerText;
                    if (cellText.toLowerCase().indexOf(searchTerm) > -1) {
                        found = true;
                        break;
                    }
                }
            }
            if (found) {
                currentRow.style.display = "";
            } else {
                currentRow.style.display = "none";
            }
        }

        const noResultsRow = document.getElementById("noResultsRow");
        if (foundAtLeastOne) {
            noResultsRow.style.display = "none";
        } else {
            noResultsRow.style.display = "";
        }
    });
});
