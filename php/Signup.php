<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Portal</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body style="background:grey">
   <div class="container">
     <div class ="row">
         <div class="col-lg-4">
         </div>
         <div class="col-lg-4">
             <div class="panel panel-default" style="margin-top:90px">
                 <div class="panel-body" >
                     <div class="page-header" style="margin-top:20px">
                     
                        <h3>Member Login <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></h3>
                   
                     </div>
                    <br/>
                  <form>
                    <div class="form-group">
                           
                            <label for="exampleInputEmail1">Email address</label>
                    
                       <div class="input-group">
                            
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                       </div>
                        
                    </div>  
                       <br/>
                    <div class="form-group">
                          
                            <label for="exampleInputPassword1">Password</label>
                          
                       <div class="input-group">
                           
                           <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                           
                           <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                         
                       </div><br/>
                       <a href="#">Forgot your Password?.</a>      <br><br/>
                          <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
                          <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span>  Login</button>
                          <hr>
                        Not a user ? <a href="#">Register now</a> 
                  </form>
            </div>
        </div>
    </div>
         <div class="col-lg-4">
             
         </div>
     
     </div>  
   
   </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>