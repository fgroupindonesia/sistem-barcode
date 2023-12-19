----------------------------------------
Membuat akses Login & Register
pada CodeIgniter
----------------------------------------

1) Wajib punya dulu Login atau Register view (HTML/Php)

2) sertakan sebuah Controller 
yang memetakan URL Link

http://toko-fauzan.com/user/logout

USER -> Controller
Logout -> Function

http://toko-fauzan.com/user/register

USER -> Controller
Register -> function

3) Tambahkan pada element HTML (anchor)

<a href="user/login"> Login </a>
<a href="user/register"> Register </a>



----------------------------------------
Membuat Registrasi ke Database
----------------------------------------

1) Lihat di Controller \ User.php
menerima data kiriman formulir yg mau registrasi.

2) Buat Model \ DBUser.php
interaksi ke Database. INSERT INTO....

3) Php untuk view \ sukses_terdaftar.php