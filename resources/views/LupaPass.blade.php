{{-- @extends('dashboard') --}}
{{-- @section('content') --}}
<div class="card">
    <div class="card-body overflow-hidden p-lg-6" style="text-align: center;">
        <div class="mb-3" style="width: 400px;margin:0 auto;">
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
                    <label class="form-label" for="split-login-password">Kata Laluan Lama</label>
                </div>
                <input class="form-control" id="split-login-password" type="password" name="current_password" autocomplete="current-password" required/>
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="split-login-password">Kata Laluan Baru</label>
                </div>
                <input class="form-control" id="split-login-password" type="password" name="new_password" autocomplete="current-password" required/>
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="split-login-password">Sahkan Kata Laluan Baru</label>
                </div>
                <input class="form-control" id="split-login-password" type="password" name="new_confirm_password" autocomplete="current-password" required/>
                <div style="padding-top: 20px;">
                    <button class="btn btn-primary" type="submit" >Tukar Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- @endsection --}}
@section('script')
<script type="text/javascript">

    $( document ).ready(function() {
        $('.loader').hide();
    })

</script>
@endsection