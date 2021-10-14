{include file="templates/header.tpl"}
  
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
                <form action="verifyUser" method="post">
                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                    <div class="form-outline form-white mb-4">
                        <input type="text" id="username" class="form-control form-control-lg" name="user"/>
                        <label class="form-label" for="user">User</label>
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password"/>
                        <label class="form-label" for="typePasswordX">Password</label>
                    </div>

                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                </form>
                <h2 class="fw-bold mb-2 text-uppercase">{$error}</h2>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>


{include file="templates/footer.tpl"}