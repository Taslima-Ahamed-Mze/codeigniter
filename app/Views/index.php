<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP1</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
    
<div class="container">
    <div class="row ">
        <a href="<?php echo base_url('new/');?>" class="btn btn-primary btn-sm">Ajouter un utilisateur</a>
    </div><br>
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
</body>
</html>