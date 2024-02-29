<?php 
session_start();

	// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
	header("location:../index.php?pesan=gagal");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Petugas</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<style>
		/* Style untuk card */
		body {
			background-color: #F7B787;
		}
.card {
    margin-top: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
    padding: 20px;
}

/* Style untuk tombol */
.btn {
    margin-right: 5px;
}

/* Style untuk tabel */
.table {
    width: 100%;
    border-collapse: collapse;
}

.table th,
.table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #dee2e6;
}

.table th {
    background-color: #FFA447;
    color: #fff;
}

/* Style untuk modal */
.modal-content {
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
}

.modal-header {
    border-bottom: none;
    background-color: #FFA447;
    color: #fff;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}

.modal-title {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 0;
}

.modal-body,
.modal-footer {
    padding: 20px;
}

.modal-footer {
    border-top: none;
    background-color: #ffffff;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
}

/* Style untuk alert */
.alert {
    margin-bottom: 20px;
    border-radius: 15px;
    padding: 15px;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
    border-color: #c3e6cb;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border-color: #f5c6cb;
}

	</style>
</head>
<body>
	<div class="container">
		<div class="content">