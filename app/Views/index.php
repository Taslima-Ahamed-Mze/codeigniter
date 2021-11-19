<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
<div class="container">
   <?php 
      if(session()->has('message')){
   ?>
   <div class="alert <?= session()->getFlashdata('alert-class') ?>">
      <?= session()->getFlashdata('message') ?>
   </div>
   <?php
      }
   ?>
   <div class="row">
      <h3>Liste des utilisateurs</h3>
   </div>
   
   <div class="row my-4">
      
      <form method="post" >
         <div class="form-group row">

            <div class="col-md-2">
               <select class="form-control " name="service" id="service" >
                  <option value="">Services</option>
                  <?php 
                     foreach($services as $service):  
                  ?>
                  <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
                  <?php endforeach; ?>                     
               </select>
            </div>
            <div class="col-md-2">
               <button type="submit" class="btn btn-primary">Filtrer</button>
            </div>
         </div>
      </form>   
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
         <a href="<?php echo base_url('new/');?>" type="button" role="button" class="btn btn-primary ">Ajouter un utilisateur</a>
      </div>
   </div>
    <div class="row">

      <table class="table table-bordered" >
         <thead >
            <tr> 
               <th scope="col" >Nom Prénom</th>
               <th scope="col">Âge</th>
               <th scope="col">Adresse</th>
               <th scope="col">Téléphone</th>
               <th scope="col">Service</th>
               <th scope="col">Action</th>  
            </tr>
         </thead>
         <tbody>
            <?php if($users): ?>
            <?php 
               foreach($users as $user): 
                  $birthDate = $user->birthdate;
                  $currentDate = date("Y-m-d");
                  $age = date_diff(date_create($birthDate), date_create($currentDate));  
            ?>
            <tr>
               <td><?php echo $user->lastname." ".$user->firstname; ?></td>
               <td><?php echo $age->format("%y"); ?></td>
               <td><?php echo $user->address." ".$user->zip_code; ?></td>
               <td><?php echo $user->phone ?></td>
               <td><?php echo $user->name; ?></td>
               <td>
                  <a href="<?php echo base_url('delete/'.$user->id);?>" class="btn btn-danger ">Supprimer</a>
                  <a href="<?php echo base_url('edit/'.$user->id);?>" class="btn btn-info ">Editer</a>

               </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
         </tbody>
      </table>
    </div>
</div>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

     <script type="text/javascript">
        $(document).ready(function(){
 
            $('#service').change(function(){ 
               var id=$(this).val();

               console.log(id,"iciiiiii");
            }); 
             
        });
    </script>
</body>
</html>