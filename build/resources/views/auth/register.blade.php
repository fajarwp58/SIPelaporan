@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="user/create">
                            @csrf

                            <div class="form-group row">
                                <label for="user_nrp" class="col-md-4 col-form-label text-md-right">{{ __('NRP') }}</label>

                                <div class="col-md-6">
                                    <input id="user_nrp" type="number" class="form-control @error('user_nrp') is-invalid @enderror" name="user_nrp" value="{{ old('user_nrp') }}" required autocomplete="name" autofocus>

                                    @error('user_nrp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="user_nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                                <div class="col-md-6">
                                    <input id="user_nama" type="text" style="text-transform:uppercase" class="form-control @error('user_nama') is-invalid @enderror" name="user_nama" value="{{ old('user_nama') }}" required autocomplete="name" autofocus>

                                    @error('user_nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="user_pangkat" class="col-md-4 col-form-label text-md-right">{{ __('Pangkat') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" required id="pangkat_id" name="pangkat_id">
                                        <option value="">Pilih Pangkat</option>
                                    </select>
                                </div>
                            </div>




                            <div class="form-group row">
                                <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Jabatan') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" required id="role_id" name="role_id">
                                        <option value="">Pilih Role</option>
                                        <option value="1">Super Admin</option>
                                        <option value="2">SPKT</option>
                                        <option value="3">SABARA</option>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ url('assets/js/jquery.min.js') }}"> </script>

    <script type="text/javascript">

        $.ajax({
            url: '{{ url('user/listpangkat') }}',
            dataType: "json",
            success: function(data) {
                var pangkat = jQuery.parseJSON(JSON.stringify(data));
                $.each(pangkat, function(k, v) {
                    $('#pangkat_id').append($('<option>', {value:v.pangkat_id}).text(v.pangkat_name))
                })
            }
        });
    </script>
@endsection
