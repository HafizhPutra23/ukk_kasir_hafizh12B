<!DOCTYPE html>
<html>

<head>
    <title>UKK KASIR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">


    <style>
        /* Background gradient */
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
			background-color:  #9BCF53;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Montserrat', sans-serif; /* Menggunakan font Montserrat */
        }

		.title{
			font-weight: bold;
		}

        /* Card styling */
        .card {
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white */
            padding: 30px;
        }

        /* Input field styling */
        .form-control {
            border-radius: 25px;
            border: none;
            padding: 15px;
        }

        /* Button styling */
        .btn-primary {
            border-radius: 25px;
            padding: 15px;
            transition: all 0.3s ease;
        }

        /* Button hover effect */
        .btn-primary:hover {
            transform: scale(1.05);
        }

        /* Text styling */
        p {
            font-size: 18px;
            color: #333;
        }

        /* Alert styling */
        .alert {
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 20px;
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid transparent;
        }

        /* Set max-width for the image */
        img {
            max-width: 100%; /* Menjadikan lebar gambar maksimum sebesar parentnya */
            height: auto;
        }

        /* Reduce padding for card body containing image */
        .card-body-image {
            padding: 10px; /* You can adjust the value to your preference */
        }
    </style>

    <!-- Menambahkan link font Montserrat dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="card">
                <div class="row">
                    <div class="col-6">
                        <div class="card-body">
                            <p class="title text-center mt-5">Silahkan Masukan Username dan Password</p>
                            <?php 
                            if(isset($_GET['pesan'])){
                                if($_GET['pesan']=="gagal"){
                                    echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
                                }
                            }
                            ?>
                            <form method="post" action="cek_login.php">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="form-group mt-3">
                                    <button class="btn btn-primary form-control" type="submit" cla>Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-6">
                    <div class="ms-5">
                        <div class="card-body card-body-image">
                            <img src="assets/login2.png" alt="Login Image" style="max-width: 350px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>