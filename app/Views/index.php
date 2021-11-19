<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
   <?php 
      if(session()->has('message')){
   ?>
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
    <?= $this->endSection() ?>