{include file="templates/onlyhomenav.tpl"}
  <div class="container-fluid ps-md-0">
  <div class="row g-0">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Hola!</h3>

              <form action="verifyUser" method="post">
                <div class="form-floating mb-3">
                  <input type="user" class="form-control" id="floatingInput" placeholder="name@example.com" name="user">
                  <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                  <label for="floatingPassword">Password</label>
                </div>

                <div class="d-grid">
                  <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Sign in</button>
                </div>
                <h2 class="fw-bold mb-2 text-uppercase">{$error}</h2>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


{include file="templates/footer.tpl"}