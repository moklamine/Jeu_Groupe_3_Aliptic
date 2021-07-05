//****************************** DEBUT PROGRAMME *****************************//
$(document).ready(function () {                                               //                                  
//****************************************************************************// 
alert("changement des hp");
personaHP(450,800);
personaMP(100,250);
personaSta(600,1050);
showText("Salut nieznizoendiozenodinzeoidnzeoidnzeoindzoienieonzioendionezo");
manageClickAttack(true);
manageClickBalm(true);
manageClickStoneThrowing(true);
manageClickFireball(true);

    //---------------------- Fonction : gestion clique attaque -------------------//
    function manageClickAttack(actived){
        if(actived===true){
            document.getElementById("attack").addEventListener("click", eventClickAttack = function() {
                alert( document.getElementById("blockAction"));
                //document.getElementById("blockAction").style.display = "none";
                ajaxCall("actionPlayerAttack");        
            });
        }
        else{
            document.getElementById("attack").removeEventListener("click",eventClickAttack);
        }
    }
    //----------------------------------------------------------------------------//

    //---------------------- Fonction : gestion clique beaume --------------------//
    function manageClickBalm(actived){
        if(actived===true){
            document.getElementById("balm").addEventListener("click", eventClicBalm = function() {
                ajaxCall("actionPlayerBalm");        
            });
        }
        else{
            document.getElementById("balm").removeEventListener("click",eventClickBalm);
        }
    }
    //----------------------------------------------------------------------------//

    //--------------- Fonction : gestion clique lancer de pierre -----------------//
    function manageClickStoneThrowing(actived){
        if(actived===true){
            document.getElementById("stoneThrowing").addEventListener("click", eventClicStoneThrowing = function() {
                ajaxCall("actionPlayerStoneThrowing");        
            });
        }
        else{
            document.getElementById("stoneThrowing").removeEventListener("click",eventClickStoneThrowing);
        }
    }
    //----------------------------------------------------------------------------//

    //---------------- Fonction : gestion clique boule de feu --------------------//
    function manageClickFireball(actived){
        if(actived===true){
            document.getElementById("fireball").addEventListener("click", eventClicFireball = function() {
                ajaxCall("actionPlayerFireball");        
            });
        }
        else{
            document.getElementById("fireball").removeEventListener("click",eventClickFireball);
        }
    }
    //----------------------------------------------------------------------------//

    //---------------------------- Fonction : HP personnage ----------------------//
    function personaHP(hpCurrent, hpMax){
        hpGreen = document.getElementById("hpGreen");
        hpRed   = document.getElementById("hpRed");

        hpGreenValue = (hpCurrent / hpMax) * 100;
        hpRedValue = 100 - hpGreenValue;

        hpGreen.style.width = hpGreenValue + "%";
        hpRed.style.width   = hpRedValue + "%";

        if (hpGreenValue > hpRedValue) {
            hpGreen.innerHTML = "HP : " + hpCurrent + "/" + hpMax;
            hpRed.innerHTML = "";
        }
        else{
            hpRed.innerHTML = "HP : " +  hpCurrent + "/" + hpMax;  
            hpGreen.innerHTML ="";  
        }
    }
    //----------------------------------------------------------------------------//

    //---------------------------- Fonction : MP personnage ----------------------//
    function personaMP(mpCurrent, mpMax){
        mpBlue = document.getElementById("mpBlue");
        mpRed   = document.getElementById("mpRed");

        mpBlueValue = (mpCurrent / mpMax) * 100;
        mpRedValue = 100 - mpBlueValue;

        mpBlue.style.width = mpBlueValue + "%";
        mpRed.style.width   = mpRedValue + "%";

        if (mpBlueValue > mpRedValue) {
            mpBlue.innerHTML = "MP : " + mpCurrent + "/" + mpMax;
            mpRed.innerHTML = "";
        }
        else{
            mpRed.innerHTML = "MP : " +  mpCurrent + "/" + mpMax;    
            mpBlue.innerHTML = "";
        }
    }
    //----------------------------------------------------------------------------//

    //---------------------------- Fonction : MP personnage ----------------------//
    function personaSta(staCurrent, staMax){
        staOrange  = document.getElementById("staOrange");
        staRed   = document.getElementById("staRed");

        staOrangeValue = (staCurrent / staMax) * 100;
        staRedValue = 100 - staOrangeValue;

        staOrange.style.width = staOrangeValue + "%";
        staRed.style.width   = staRedValue + "%";

        if (staOrangeValue > staOrangeValue) {
            staOrange.innerHTML = "EN : " + staCurrent + "/" + staMax;
            staRed.innerHTML = "";
        }
        else{
            staRed.innerHTML = "EN : " +  staCurrent + "/" + staMax;    
            staOrange.innerHTML = "";
        }
    }
    //----------------------------------------------------------------------------//

    //---------------------------- Fonction : Afficher text ----------------------//
    function showText(text){
        document.getElementById("frameText").innerHTML = text;
    } 
    //----------------------------------------------------------------------------//

    //---------------------------- Fonction : Appel Ajax -------------------------//
    function ajaxCall(actionPlayer) {
        //Création de la requête ajax
        $.ajax({
            //Définition de la route vers le serveur
            url: '/game/combat', //TODO : Modifier le nom de la route peut être
            //Protocole d'envoie des données vers le serveur
            type: 'POST',
            //Données envoyées au serveur
            data: 'actionPlayer' + actionPlayer, //TODO : Voir si c'est le bon format
            //Type de réponse : asynchrone ou synchrone
            async: true,
            //Permet d’indiquer s’il faut utiliser une réponse en cache si disponible
            cache: false,
            //Type de données retourné par le serveur
            dataType: 'json',

            //Retour avec succès
            success: function (dataJSON, status) {
                //data=JSON.parse(dataJSON);
                showText(dataJSON);

            },
            //Retour sans succès
            error: function (xhr, textStatus, errorThrown) {
                alert("L'appel ajax a failli. Retentez une commande");
                console.log(
                    "xhr:" + xhr
                    + " ; textStatus:" + textStatus
                    + " ; errorThrown:" + errorThrown
                );
            }
        });

    }
    //----------------------------------------------------------------------------//





//******************************* FIN PROGRAMME ******************************//
});                                                                           //
//****************************************************************************//
