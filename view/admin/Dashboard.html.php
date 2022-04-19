
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="home" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Accueil</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline"></span> Tableau de bord </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                            <a href="adminuser" class="nav-link px-0"> <span class="d-none d-sm-inline"></span> Utilisateur</a>
                            </li>
                            <li>
                                <a href="adminArticle" class="nav-link px-0"> <span class="d-none d-sm-inline"></span> Article </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="adminCommande" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Commande</span></a>
                    </li>
                    </li>
                        <a href="admincommentaire" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Commentaire</span></a>
                    </li>
                    </li>
                        <a href="adminCategory" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Categories</span></a>
                    </li>
                    </li>
                        <a href="adminSubCategory" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline"> Sous Categories</span></a>
                    </li>

                    <li>
                        <a href="admincreatorsteph" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Createurs</span></a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>
        <div class="col py-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-blue order-card">
                            <div class="card-block">
                                <h4 class="m-b-20">Votre compte administrateur</h4>
                                <p class="m-b-0">Prénom : <span class="f-right"><?php echo $user[0]['firstname']?></span></p>
                                <p class="m-b-0">Nom : <span class="f-right"><?php echo $user[0]['lastname']?></span></p>
                                <p class="m-b-0">Email : <span class="f-right"><?php echo $user[0]['email']?></span></p>
                                <p class="m-b-0">Date de Creation : <span class="f-right"><?php echo $user[0]['date']?></span></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-green order-card">
                            <div class="card-block">
                                <h4 class="m-b-20">Articles</h4>
                                <p class="m-b-0">Nombre d’articles : <span class="f-right"><?php echo $count[0]["COUNT(*)"]?></span></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-yellow order-card">
                            <div class="card-block">
                                <h4 class="m-b-20">Commandes</h4>
                                <p class="m-b-0">Nombre de commande total : <span class="f-right">351</span></p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>