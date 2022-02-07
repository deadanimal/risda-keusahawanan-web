<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('basehead')
    <body>
    <main class="main" id="top">
      <div class="container-fluid">
        
        <div class="row min-vh-100 " >
          <div class="col-6 d-none d-lg-block position-relative">
            <div class="bg-holder" style="background-image:url(../../../assets/img/main.jpg);background-position: 50% 20%;">
            </div>
            <!--/.bg-holder-->

          </div>
          <div class="col-sm-10 col-md-6 px-sm-0 align-self-center mx-auto py-5">
            <div class="row justify-content-center g-0">
              <div class="col-lg-9 col-xl-8 col-xxl-6">
                <div class="card" style="background-color: #1C4020">
                  <div class="card-header bg-circle-shape bg-shape text-center p-2" style="background-color:rgb(2, 95, 47);" ><span class="font-sans-serif fw-bolder fs-4 z-index-1 position-relative link-light light">RISDA KEUSAHAWANAN</span></div>
                  <div class="card-body p-4">
                    <div style="align-content:left;">
                        <a class="btn btn-primary" href="/login">Back Login</a>
                    </div>
                    <div class="card-body overflow-hidden p-lg-4" style="text-align: center;">
                        <div class="mb-3">
                        
                            @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            <form method="POST" action="/LupaPass" enctype="multipart/form-data">
                                @csrf
                                @method("POST")
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="split-login-password">Alamat Emel</label>
                                </div>
                                <input class="form-control" type="text" name="email" required/>
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="split-login-password">Kata Laluan Baru</label>
                                </div>
                                <input class="form-control" id="split-login-password" type="password" name="new_password" autocomplete="current-password" required/>
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="split-login-password">Sahkan Kata Laluan Baru</label>
                                </div>
                                <input class="form-control" id="split-login-password" type="password" name="new_confirm_password" autocomplete="current-password" required/>
                                <div style="padding-top: 30px;">
                                    <button class="btn btn-primary" type="submit" >Tukar Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    </body>
</html>


{{-- @endsection --}}
@section('script')
<script type="text/javascript">

    $( document ).ready(function() {
        $('.loader').hide();
    })

</script>
@endsection