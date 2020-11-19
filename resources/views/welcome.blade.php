<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Codobux Test</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    @include('style')
</head>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    @include('sidebar')

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Image</th>
                        <th scope="col">Password</th>
                        <th scope="col">Update</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <th scope="row">{{$d->id}}</th>
                        <td>{{$d->name}}</td>
                        <td>{{$d->phoneNo}}</td>
                        <td>{{$d->email}}</td>
                        <td>
                            <img class="img-fluid" src="{{ asset('uploads/').'/'.$d->image }}">

                        </td>
                        <td>{{$d->password}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </section><!-- End Hero -->

    <main id="main">

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">

            <div class="copyright">
                &copy; Copyright <strong><span>CodoBux</span></strong>. All Rights Reserved
            </div>
            <div class="credits">

                Designed by Mohmmad Arshad</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
    <div id="preloader"></div>
    @include('script')


    <!-- Modal -->
    <div class="modal fade" id="adduserModal" tabindex="-1" role="dialog" aria-labelledby="adduserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adduserModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('formSubmit') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @if($errors->any())
    <script>
        @foreach($errors->all() as $error)
        alert({{$error}});
        @endforeach
    </script>

    @endif
    @if($message = Session::get('error'))
    <script>
        alert({{$message}});
    </script>
    @endif
    @if($message = Session::get('success'))
    <script>
        alert({{$message}});
    </script>
    @endif
</body>

</html>
