@extends('template.template')

@section('content')



    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Update User Form</h5>

                            <!-- Horizontal Form -->
                            <form method="post" action="{{ route('updateDataUser') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input name="username" value="{{ $data->username }}" type="text"
                                            class="form-control" id="inputText">
                                        <input name="id_user" value="{{ $data->id_user }}" type="hidden"
                                            class="form-control" id="inputText">
                                        @if ($errors->get('username'))
                                            @foreach ($errors->get('username') as $error)
                                                <p class="alert alert-danger mt-1">{{ $error }}</p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input name="nama" value="{{ $data->nama }}" type="text"
                                            class="form-control" id="inputEmail">
                                        @if ($errors->get('nama'))
                                            @foreach ($errors->get('nama') as $error)
                                                <p class="alert alert-danger mt-1">{{ $error }}</p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input name="email" value="{{ $data->email }}" type="text"
                                            class="form-control" id="inputText">
                                        @if ($errors->get('email'))
                                            @foreach ($errors->get('email') as $error)
                                                <p class="alert alert-danger mt-1">{{ $error }}</p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input name="alamat" value="{{ $data->alamat }}" type="text"
                                            class="form-control" id="inputText">
                                        @if ($errors->get('alamat'))
                                            @foreach ($errors->get('alamat') as $error)
                                                <p class="alert alert-danger mt-1">{{ $error }}</p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input name="password" value="{{ $data->password }}" type="text"
                                            class="form-control" id="inputText">
                                        @if ($errors->get('password'))
                                            @foreach ($errors->get('password') as $error)
                                                <p class="alert alert-danger mt-1">{{ $error }}</p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <input name="status" value="{{ $data->status }}" type="text"
                                            class="form-control" id="inputText">
                                        @if ($errors->get('status'))
                                            @foreach ($errors->get('status') as $error)
                                                <p class="alert alert-danger mt-1">{{ $error }}</p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="/viewAllUser" class="btn btn-dark">Back</a>
                                </div>
                            </form><!-- End Horizontal Form -->

                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main><!-- End #main -->

    <script>
        // @if (Session::has('berhasil'))
        //     toastr.options = {
        //         "closeButton": true,
        //         "progressBar": true
        //     }
        //     toastr.succes("{{ session('berhasil') }}")
        // @endif
    </script>
@endsection
