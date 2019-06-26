<?php require("haut_de_page.php");?>
<?php if ($_SESSION['valider']==false) {header('Location: ../index.php'); exit();}?>      
<body>
    <?php include('nav.php');?>
    <section class="container sect">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 MonForm">
                <form action="traitement.php" method="POST"> <?php if(isset($_GET['existe'])) $form=new Form($_SESSION['donnees_bat']); else $form=new Form();?>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <?php $form->label('','Nom','col-md-2 espace pourLabel')?> 
                        <?php if(!isset($_GET['existe']) && !isset($_GET['id_Batiment_mod'])){ $form->input('text','batiment','form-control col-md-7 espace','Nom du batiment','','',false);?>
                        <?php }elseif(!isset($_GET['id_Batiment_mod'])){$form->input('text','batiment','form-control col-md-7 espace blcMoins',$_SESSION['donnees_bat']['batiment'].' existe déja','','',false);
                        }elseif(isset($_GET['id_Batiment_mod'])){
                            $_SESSION['id_Batiment_mod']=$_GET['id_Batiment_mod'];
                            $form->input('text','batiment','form-control col-md-7 espace','Nom du batiment',EtudiantService::find('Batiment','Nom_bat','id_Batiment',$_GET['id_Batiment_mod'])[0]->Nom_bat,'',false);;}?>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>                        
                        <?php if(!isset($_GET['id_Batiment_mod'])) $form->submit('valider_ajout_batiment','Ajouter','form-control col-md-5 espace mb');
                                else {
                                    $form->submit('valider_modif_batiment','Modifier','form-control col-md-5 espace mb');
                                    $_SESSION['id_Batiment_mod']=$_GET['id_Batiment_mod'];}?>
                    </div>
                </form>
            </div>
        </div>
         <!-- Debut tableau -->
        <div class="Mes_tableaux">
            <?php
            $titres=array('Numero','Nom','Nombres chambres','Nombres étudiants','Modification','Supprimer');
            
            $batiment=EtudiantService::find('Batiment');
            $id_bat=EtudiantService::find('Batiment','id_Batiment');
            $mod=Affichage::bouton($id_bat,$pages='batiments.php',$title='Batiments',$trite_Get='id_Batiment_mod',$class_but='btn btn-outline-primary btinf',$nom_But='Modifier');
            $sup=Affichage::bouton($id_bat,$pages='batiments.php',$title='Batiments',$trite_Get='id_Batiment_sup',$class_but='btn btn-outline-danger btinf',$nom_But='Supprimer');
            
            Affichage::tableau_bat($titres,$batiment,'display nowrap',$mod,$sup);
            ?>
        </div>
        <!-- Fin tableau -->
    </section>
</body>
<?php 
    if(isset($_GET["id_Batiment_sup"])){
        $sonId=$_GET["id_Batiment_sup"];
        $sup='id_Batiment_sup='.$sonId
        ?>
        <script>
            if(confirm("Confirmer la suppression ?"))
                document.location.href = "traitement.php?title=traitement&<?php echo "$sup"; ?>"
            else
                document.location.href = "batiments.php?title=batiment";
        </script>
        <?php } elseif(isset($_GET["dejaMigrer"])){?>
         <script>alert('Impossible de supprimer ce batiment car elle contient une ou plusieurs chambres !')</script>
    <?php }
    require("footer.php");
?>