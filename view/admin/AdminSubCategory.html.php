<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="home" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline"></span> Home
                        </a>
                    </li>
                    <li>
                        <a href="admin" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline"></span> Dashboard </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                            <a href="adminuser" class="nav-link px-0"> <span class="d-none d-sm-inline"></span> User</a>
                            </li>
                            <li>
                                <a href="adminArticle" class="nav-link px-0"> <span class="d-none d-sm-inline"></span> Article </a>
                            </li>
                        </ul>
                    </li>
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
                        <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Creator</span></a>
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
                        <h2> <b> Article Management</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <a href="adminCreateSubCategory" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New  Sub Category</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Sous categories</th>
                        <th>Categories parentes</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($category as $st) {  ?>
                    <tr>
                        <td> <?= $st['id']; ;?> </td>
                        <td> <?= $st['sub_category']; ?> </td>
                        <td> <?= $st['category']; ?> </td>
                        <td>
                            <?php echo  '<a href="adminUpdateCategories?id='.$st['id'] . '" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>';?>
                            <?php echo '<a href="adminDeleteCategories?id='.$st['id'] . '" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>';?>
                        </td>
                    </tr>
                <?php }; ?>
                </tbody>
            </table>
                </tbody>
            </table>
        </div>
    </div>
</div>
        </div>
    </div>
</div>