document.getElementById("cpButton").onclick = setCp;
function getCp(city) {
    document.getElementById("cpButton").style.backgroundColor = "#A9A9A9"; 
    let val;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "https://vicopo.selfbuild.fr/cherche/"+city, true); xhr.onload = function () {
        if (xhr.status == 200) {
            if(JSON.parse(xhr.response).cities[0] == null){document.getElementById('tbxCp').value = "Ville inexistante"; return;}
            val = JSON.parse(xhr.response).cities[0].code
            document.getElementById('tbxCp').value = val
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
    document.getElementById("cpButton").style.backgroundColor = "#0d6efd";
    return val;
};

function setCp(){
    getCp(document.getElementById('tbxVille').value)
}