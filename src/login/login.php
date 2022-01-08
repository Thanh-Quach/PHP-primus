    <div class="d-flex h-100 w-100 align-items-center justify-content-center">
        <div class="w-25 font-16pt mb-3">
            <h1 class="text-center bg-custom text-custom mb-5" style="font-size: 32pt">Primus</h1>
            <form id='login-form' class="secondary-font d-flex flex-column">
                <div class="form-floating secondary-font mb-3">
                  <input type="text" name='username' class="validationInput form-control border-0 border-bottom border-2" id="floatingUsername" placeholder="name@example.com">
                  <label for="floatingUsername" class="bg-custom text-custom ps-0">Username</label>
                </div>
                <div class="form-floating">
                  <input type="password" name='password' class="validationInput form-control border-0 border-bottom border-2" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword" class="bg-custom text-custom ps-0">Password</label>
                </div>
                <a class='text-warning mt-2 mb-5' href="#" style="font-size: 12pt;">Forgot password</a>
                <button type="button" class="validateButton btn prime-font w-25 mx-auto border-custom" onclick="login()">Login</button>
            </form>
        </div>
    </div>