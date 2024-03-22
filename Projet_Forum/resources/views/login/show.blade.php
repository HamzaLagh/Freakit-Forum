<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<x-master>
    <section class="forms-section w-50 mx-auto">
      <div class="forms w-100 mx-auto">
        <div class="form-wrapper is-active">
          <button type="button" class="switcher switcher-login">
            Login
            <span class="underline"></span>
          </button>


          <form action="{{ route('login') }}" method="POST" class="form form-login">
            @csrf
            <fieldset>
              <div class="input-block">
                <label for="login-email">E-mail</label>
                <input id="login-email" type="email" name="login" value="{{old('login')}}" >
              </div>
              <div class="input-block">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" >
              </div>
              <input class="" type="checkbox" id="togglePassword"> Show Password

              <div class="row mt-2">
                @error('login')
                <span style="font-size: 14px;font-style: normal" class="text-danger">{{ $message }}</span>
              @enderror
              </div>


                


            </fieldset>

            <button type="submit" class="btn-login">Login</button>
            <div class="text-center mx-auto">
              <a  href="">Forgot Password ?</a>
              <br>
              <span>If you don't have an account yet, click on 'Sign Up'.</span>
            </div>
          </form>
        </div>

{{-- ---- Sign Up         --}}
        <div class="form-wrapper ">
          <button type="button" class="switcher switcher-signup">
            Sign Up
            <span class="underline"></span>
          </button>

          
          <form class="form form-signup w-100 " action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <fieldset>
              <div class="row">

                    <div class="input-block col-6" style="height: 55px">
                      <label for="signup-email">Pseudo</label>
                      <input type="text" name="name" value="{{old('name')}}" style="height: 40px">
                        @error('name')
                            <div class="message_err">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="input-block col-6" style="height: 55px">
                      <label for="signup-email">E-mail</label>
                      <input id="signup-email" name="email" type="email" value="{{old('email')}}" style="height: 40px">
                            @error('email')
                            <div class="message_err">
                                {{$message}}
                            </div>
                            @enderror
                    </div>

                </div>


                <div class="row">
                  
                    <div class="input-block col-6" style="height: 55px">
                        <label for="signup-password">Password</label>
                        <input id="signup-password" name="password" type="password" style="height: 40px">
                          @error('password')
                            <div class="message_err">
                                {{$message}}
                            </div>
                          @enderror
                    </div>

                    <div class="input-block col-6">
                        <label for="signup-password-confirm">Confirm password</label>
                        <input id="signup-password-confirm" type="password" name="password_confirmation" >
                          @error('password_confirmation')
                          <div class="message_err">
                              {{$message}}
                          </div>
                        @enderror
                    </div>
              </div>

              <div class="row">

                  <div class="input-block" style="height: 55px">
                      <label for="signup-password">Image</label>
                      <input type="file" name="image"  style="height: 40px">
                      @error('image')
                      <div class="message_err">
                          {{$message}}
                      </div>
                      @enderror
                  </div>

                  <div class="input-block" style="height: 55px">
                      <label for="">Birthday</label>
                      <input type="date" name="date_birthday" style="height: 40px">
                      @error('date_birthday')
                      <div class="message_err">
                          {{$message}}
                      </div>
                      @enderror
                  </div>

              </div>


              <div class="input-block" style="height: 55px">
                    <label for="signup-password">Banner</label>
                    <input type="text" name="banner" id="" placeholder="" style="height: 40px">
                    @error('banner')
                      <div class="message_err">
                          {{$message}}
                      </div>
                    @enderror
              </div>

              {{-- <div class="input-block" style="height: 55px"> --}}
                {{-- <label for="signup-password">Role</label> --}}
                <input type="text" name="role" value="User" style="height: 40px;display: none;">
               {{-- </div> --}}

              <button type="submit" class="btn-signup">Sign up</button>

              <div class="mx-auto text-center">
                <span>If you already have an account, click on 'Login'.</span>
              </div>
           </fieldset>

          </form>
        </div>
      </div>

    </section>


    {{-- javascript --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#togglePassword').change(function() {
                var passwordField = $('#password');
                var passwordFieldType = passwordField.attr('type');
                
                if ($(this).is(':checked')) {
                    passwordField.attr('type', 'text');
                } else {
                    passwordField.attr('type', 'password');
                }
            });
        });
    </script>

{{-- ---STYLE css--}}
    <style>
      .message_err{
        font-size: 10px;
        color: red
      }

      span{
        text-decoration-line: none;
        font-family: Arial, Helvetica, sans-serif;
        font-style: oblique;
        color: #3b4465;
        font-size: 13px
      }
                  *,
            *::before,
            *::after {
              box-sizing: border-box;
            }

            body {
              /* overflow: hidden; */
              height: 200px;
              margin: 0;
              font-family: Roboto, -apple-system, 'Helvetica Neue', 'Segoe UI', Arial, sans-serif;
              /* background-image: url('https://i.pinimg.com/564x/22/31/a1/2231a12c66b176ce1ab4cedd0be6888e.jpg'); */
              /* background-color: rgb(118, 41, 120) */
            }

            .forms-section {
              display: flex;
              flex-direction: column;
              justify-content: center;
              align-items: center;
            }

            .section-title {
              font-size: 32px;
              letter-spacing: 1px;
              color: #fff;
            }

            .forms {
              height:650px;
              display: flex;
              align-items: flex-start;
              margin-top: 10px;
              padding: 30px 0px 20px 60px;
              border-radius: 15px;
              background-color: #dadada70;
              box-shadow: 1px 1px 10px 1px #3b4465;
              background-image: url('https://i.pinimg.com/564x/5c/3d/75/5c3d75b71be137cbf5203ee866c9add4.jpg')
            }

            .form-wrapper {
              animation: hideLayer .3s ease-out forwards;
            }

            .form-wrapper.is-active {
              animation: showLayer .3s ease-in forwards;
            }

            @keyframes showLayer {
              50% {
                z-index: 1;
              }
              100% {
                z-index: 1;
              }
            }

            @keyframes hideLayer {
              0% {
                z-index: 1;
              }
              49.999% {
                z-index: 1;
              }
            }

            .switcher {
              position: relative;
              cursor: pointer;
              display: block;
              margin-right: auto;
              margin-left: auto;
              padding: 3px 10px;
              text-transform: uppercase;
              font-family: inherit;
              font-size: 16px;
              letter-spacing: .5px;
              color: rgb(66, 50, 50);
              background-color: #9659c3;
              border: none;
              outline: none;
              transform: translateX(0);
              transition: all .3s ease-out;
            }

            .form-wrapper.is-active .switcher-login {
              color: #fff;
              transform: translateX(90px);
            }

            .form-wrapper.is-active .switcher-signup {
              color: #fff;
              transform: translateX(-90px);
            }

            .underline {
              position: absolute;
              bottom: -5px;
              left: 0;
              overflow: hidden;
              pointer-events: none;
              width: 100%;
              height: 2px;
            }

            .underline::before {
              content: '';
              position: absolute;
              top: 0;
              left: inherit;
              display: block;
              width: inherit;
              height: inherit;
              background-color: currentColor;
              transition: transform .2s ease-out;
            }

            .switcher-login .underline::before {
              transform: translateX(101%);
            }

            .switcher-signup .underline::before {
              transform: translateX(-101%);
            }

            .form-wrapper.is-active .underline::before {
              transform: translateX(0);
            }

            .form {
              overflow: hidden;
              min-width: 260px;
              margin-top: 50px;
              padding: 30px 25px;
              border-radius: 5px;
              transform-origin: top;
              
            }

            .form-login {
              animation: hideLogin .3s ease-out forwards;
              
            }

            .form-wrapper.is-active .form-login {
              animation: showLogin .3s ease-in forwards;
            }

            @keyframes showLogin {
              0% {
                /* background-image: url('https://www.pinterest.fr/pin/13440498881698828/'); */
                transform: translate(40%, 10px);
              }
              50% {
                transform: translate(0, 0);
              }
              100% {
                background-color: #fff;
                transform: translate(35%, -20px);
              }
            }

            @keyframes hideLogin {
              0% {
                background-color: #fff;
                transform: translate(35%, -20px);
              }
              50% {
                transform: translate(0, 0);
              }
              100% {
                background: #d7e7f1;
                transform: translate(40%, 10px);
              }
            }

            .form-signup {
              animation: hideSignup .3s ease-out forwards;
              
            }

            .form-wrapper.is-active .form-signup {
              animation: showSignup .3s ease-in forwards;
            }

            @keyframes showSignup {
              0% {
                background: #d7e7f1;
                transform: translate(-40%, 10px) scaleY(.8);
              }
              50% {
                transform: translate(0, 0) scaleY(.8);
              }
              100% {
                background-color: #fff;
                transform: translate(-35%, -20px) scaleY(1);
              }
            }

            @keyframes hideSignup {
              0% {
                background-color: #fff;
                transform: translate(-35%, -20px) scaleY(1);
              }
              50% {
                transform: translate(0, 0) scaleY(.8);
              }
              100% {
                background: #d7e7f1;
                transform: translate(-40%, 10px) scaleY(.8);
              }
            }

            .form fieldset {
              position: relative;
              opacity: 0;
              margin: 0;
              padding: 0;
              border: 0;
              transition: all .3s ease-out;
            }

            .form-login fieldset {
              transform: translateX(-50%);
            }

            .form-signup fieldset {
              transform: translateX(50%);
            }

            .form-wrapper.is-active fieldset {
              opacity: 1;
              transform: translateX(0);
              transition: opacity .4s ease-in, transform .35s ease-in;
            }

            .form legend {
              position: absolute;
              overflow: hidden;
              width: 1px;
              height: 1px;
              clip: rect(0 0 0 0);
            }

            .input-block {
              margin-bottom: 20px;
            }

            .input-block label {
              font-size: 14px;
              color: #a1b4b4;
            }

            .input-block input {
              display: block;
              width: 100%;
              margin-top: 8px;
              padding-right: 15px;
              padding-left: 15px;
              font-size: 16px;
              line-height: 40px;
              color: #3b4465;
              background: #eef9fe;
              border: 1px solid purple;
              border-radius: 2px;
            }

            .form [type='submit'] {
              opacity: 0;
              display: block;
              min-width: 120px;
              margin: 30px auto 10px;
              font-size: 18px;
              line-height: 40px;
              border-radius: 25px;
              border: none;
              transition: all .3s ease-out;
            }

            .form-wrapper.is-active .form [type='submit'] {
              opacity: 1;
              transform: translateX(0);
              transition: all .4s ease-in;
            }

            .btn-login {
              color: #fbfdff;
              background: purple;
              transform: translateX(-30%);
            }

            .btn-signup {
              color: #fff;
              background: purple;
              /* box-shadow: inset 0 0 0 2px ; */
              transform: translateX(30%);
            }

    </style>
</x-master>
<script>
        const switchers = [...document.querySelectorAll('.switcher')]

        switchers.forEach(item => {
          item.addEventListener('click', function() {
            switchers.forEach(item => item.parentElement.classList.remove('is-active'))
            this.parentElement.classList.add('is-active')
          })
        })

</script>