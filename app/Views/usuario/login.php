<style>
  body{
    background: #ffe259;
    background: linear-gradient(to right, #001f3f, #6a9ab0);
  }
  .bg{
    background-image: url(img/BG.jpg);
    background-position: center center;
  }
</style>
<div class="container w-75 bg-primary mt-5 rounded shadow">
    <div class="row aling-items-stretch">
     <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
       </div> <!--imagen de fondo-->

        <div class="col bg-white p-5 rounded-end">
          <div class="text/end">
           <img src="img/logo.png" width="48" alt="">
    
          </div>
          <h2 class="fw-bold text-center py-5">Bienvenid@</h2>
        <!--login-->
         
        <form action="<?=base_url('usuario/acceder'); ?>" method="POST">
          <div class="mb-4">
            <label for="user" class="form-label">Usuario</label>
            <input type="text" name="user"  class="form-control" class=""placeholder="Usuario">
          </div>
          <div class="mb-4">
          <label for="pass" class="form-label">Password</label>
          <input type="password" name="pass" class="form-control"  class="" placeholder="Password">
          </div>
          <div class="mb-4" form-check>
            <input type="checkbox" name="conectar" class="form-check-input" >
            <label for="conectar" class="form-check-label">Recordarme</label>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary" value="acceder">Acceder</button>
          </div>
        </form>
        </div>

    </div>
</div