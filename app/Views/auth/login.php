<form action="login" method="post" accept-charset="utf-8">
  <img class="mb-4" src="/image/logo1.png" alt="" height="100">
  <h1 class="h3 mb-3 text-light fw-normal">Please sign in</h1>
  <div class="form-floating">
    <input type="email" class="form-control text-light" id="identity" name="identity" placeholder="name@example.com" autocomplete="off" value="admin@admin.com">
    <label class="text-light bordered" for="identity" name="identity">Email address</label>
  </div>
  <div class="form-floating">
    <input type="password" class="form-control text-light" id="password" name="password" placeholder="Password" autocomplete="off" value="password">
    <label class="text-light" for="password">Password</label>
  </div>

  <div class="checkbox mb-3">
    <label class="text-light">
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn w-100 btn-primary" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-light">&copy; 2017–2022</p>
</form>

<script>
  $(document).ready(function() {

  })
</script>