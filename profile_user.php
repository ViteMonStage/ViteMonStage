<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link rel="stylesheet" href="stylesheets/profile_user.css">
    <link rel="stylesheet" href="stylesheets/global.css">
    <script src="script.js"></script>
</head>
<body>
    <div class="profile">
    <img id="avatar" src="/assets/pictures/default_avatar.png" alt="Profile Picture" >
    <p class="medium">SURNAME Name</p>
    <p class="small">Campus : Rouen</p>
    <p class="small">Sector : IT</p>
    <p class="small">name.surname@viacesi.fr</p>
    <p class="small">Male, 20 Years Old</p>
    <img id="editbutton" src="assets/icons/edit-regular.svg" alt="Edit" onclick="openImg()" > 
    </div>

    <div class="wishlist">
    <p class="medium">Wishlist</p>
        <div class="offerexample">
            <a href="" class="medium">Offer example</a>
            <a href="" class="small">Company</a>
            <p class="mini">Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Ex maxime, ipsam maiores itaque sint ab, corporis est, 
                commodi quaerat dignissimos laboriosam eaque perspiciatis architecto a nostrum esse autem ut optio!
            </p>
            <ul class="list mini">
                <li id="city">City</li>
                <li id="dot1"><img src="../assets/icons/circle-solid.svg" alt="-"></li>
                <li id="publishDate">Publish Date</li>
                <li id="dot2"><img src="../assets/icons/circle-solid.svg" alt="-"></li>
                <li id="sector">Sector</li>
            </ul>

        </div>

    </div>
</body>
</html>