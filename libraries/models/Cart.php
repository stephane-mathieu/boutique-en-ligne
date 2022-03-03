$CreateCart = $this->model->CreateCart();
      $TotalPrice = $this->model->TotalPrice();
        
      $erreur = false;

      $action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;

      if($action !== null) {

         if(!in_array($action,array('ajout', 'suppression', 'refresh'))) {
            $erreur=true;
         }
        
         //récuperation des variables en POST ou GET
         $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
         $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
         $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;
        
         //Suppression des espaces verticaux
         $l = preg_replace('#\v#', '',$l);
         //On vérifie que $p soit un float
         $p = floatval($p);
        
         //On traite $q qui peut être un entier simple ou un tableau d'entiers
            
         if (is_array($q)) {
            $QteArticle = array();
            $i=0;
            
            foreach ($q as $contenu){
               $QteArticle[$i++] = intval($contenu);
            }

         }

         else

         $q = intval($q);
            
      }
        
      if (!$erreur){

         switch($action){
            Case "ajout":
               $AddArticle = $this->model->AddArticle("5","a","popo");
               break;
      
            Case "suppression":
               $DeleteArticle = $this->model->DeleteArticle($l);
               break;
      
            Case "refresh" :
               for ($i = 0 ; $i < count($QteArticle) ; $i++)
               {
                  $UpdateQTeArticle = $this->model->UpdateQTeArticle($_SESSION['cart']['titleArticle'][$i],round($QteArticle[$i]));
               }
               break;
      
            Default:
               break;
         }
      }