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
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2> <b> Commentaire Management</b></h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Text</th>
                        <th>Note</th>
                        <th>Date</th>
                        <th>first Name</th>
                        <th>Product</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($Commentaire as $st) {  ?>
                    <tr>
                        <td> <?= $st['id']; ;?> </td>
                        <td> <img src="<?php echo $st['image1']; ?>" width="50px" height="50px"></td>
                        <td> <?php echo $st['text']; ?></td>
                        <td> <?= $st['note']; ?> </td>
                        <td> <?= $st['date']; ?> </td>
                        <td> <?= $st['firstname']; ?> </td>
                        <td> <?= $st['title']; ?> </td>
                        <td>
                            <?php echo '<a href="adminDeleteCommentaire?id='.$st['id'] . '" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>';?>
                        </td>
                    </tr>
                <?php }; ?>
                </tbody>
            </table>
        </div>
    </div>
</div> 
        </div>
    </div>
</div>