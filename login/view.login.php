<!DOCTYPE html> 
<html lang="pt">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF=8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SG manager</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </head>

  <body>
    <div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSignin">
      <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
          <div class="modal-header p-5 pb-4 border-bottom-0">
            <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
            <h1 class="fw-bold mb-0 fs-2">Login</h1>
          </div>
    
          <div class="modal-body p-5 pt-0">
            <form class="">
              <div class="form-floating mb-3">
                <input type="email" class="form-control rounded-3" id="floatingInput" placeholder="nome@exemplo.com">
                <label for="floatingInput">Email </label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-3" id="Senha" placeholder="senha">
                <label for="floatingPassword">Senha</label>
              </div>
              <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Entrar</button>
              <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">© 2023 SG manager</p>
              </footer>
            </form>
          </div>
        </div>
      </div>
    </div>

</body>
</html>