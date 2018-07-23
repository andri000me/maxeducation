<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'pages';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['about']['GET'] = 'program/about';

$route['login']['GET'] = 'user';
$route['logout']['GET'] = 'user/logout';

$route['siswa/register']['POST'] = 'api/siswa/form_pendaftaran_siswa';

$route['siswa/register_belajar_gratis']['POST'] = 'api/siswa/belajar_gratis';

/**
 * Route for Admin Panel
 */
// For Admin Panel Dashboard
$route['admin']['GET']  = 'admin/dashboard';
$route['admin/siswasd']['GET']  = 'admin/sd';
$route['admin/siswasmp']['GET']  = 'admin/smp';
$route['admin/siswasma']['GET']  = 'admin/sma';
$route['admin/siswasbmptn']['GET']  = 'admin/sbmptn';
$route['admin/siswainggris']['GET']  = 'admin/inggris';
$route['admin/siswamusic']['GET']  = 'admin/music';

// For Admin Profile
$route['admin/profile']['GET'] = 'admin/profile';
$route['admin/profile/informasi/update/(:num)']['POST'] = 'admin/profile/update_informasi/$1';
$route['admin/profile/password/update/(:num)']['POST'] = 'admin/profile/update_password/$1';


// For Data Siswa Belajar Gratis
$route['admin/belajargratis']['GET'] = 'admin/belajar_gratis';

// For Program 
$route['admin/program']['GET'] = 'admin/program';
$route['admin/program/add']['POST'] = 'admin/program/create_program';
$route['admin/program/edit/(:num)']['GET'] = 'admin/program/program_edit/$1';
$route['admin/program/update/(:num)']['POST'] = 'admin/program/update_program/$1';
$route['admin/program/delete/(:num)']['POST'] = 'admin/program/program_delete/$1';

// Mata Pelajaran each Program
$route['admin/program/mata_pelajaran/add']['POST'] = 'admin/program/create_mata_pelajaran';
$route['admin/program/mata_pelajaran/edit/(:num)']['GET'] = 'admin/program/mata_pelajaran_edit/$1';
$route['admin/program/mata_pelajaran/(:num)']['GET'] = 'admin/program/get_mata_pelajaran_by_program/$1';
$route['admin/program/mata_pelajaran/update/(:num)']['POST'] = 'admin/program/update_mata_pelajaran/$1';
$route['admin/program/mata_pelajaran/delete/(:num)']['POST'] = 'admin/program/mata_pelajaran_delete/$1';

// For Slideshow
$route['admin/slideshow']['GET'] = 'admin/slideshow';
$route['admin/slideshow/add']['GET'] = 'admin/slideshow/add_slideshow';
$route['admin/slideshow/create']['POST'] = 'admin/slideshow/store_slideshow';
$route['admin/slideshow/delete/(:num)']['POST'] = 'admin/slideshow/slideshow_delete/$1';

// For Guru
$route['admin/dataguru']['GET'] = 'admin/guru';
$route['admin/guru/add']['GET'] = 'admin/guru/tambah_guru';
$route['admin/guru/create']['POST'] = 'admin/guru/store_guru';
$route['admin/guru/edit/(:num)']['GET'] = 'admin/guru/edit_guru/$1';
$route['admin/guru/update/(:num)']['POST'] = 'admin/guru/guru_update/$1';
$route['admin/guru/delete/(:num)']['POST'] = 'admin/guru/guru_delete/$1';

$route['admin/guru/mata_pelajaran/(:num)']['GET'] = 'admin/guru/mata_pelajaran/$1';
$route['admin/guru/mata_pelajaran/create']['POST'] = 'admin/guru/store_mata_pelajaran_guru';
$route['admin/guru/mata_pelajaran/delete/(:num)']['POST'] = 'admin/guru/delete_mata_pelajaran_guru/$1';


// For Hak Akses Guru
$route['admin/hakaksesguru']['GET'] = 'admin/hak_akses/tambah_hak_akses_guru';
$route['admin/hakakses/guru/create']['POST'] = 'admin/hak_akses/store_hak_akses_guru';
$route['admin/hakaksesguru/tambah/(:num)']['GET'] = 'admin/hak_akses/tambah_hak_akses_guru/$1';
$route['admin/hakaksesguru/delete/(:num)']['POST'] = 'admin/hak_akses/delete_hak_akses_guru/$1';
$route['admin/hakakses/guru/edit/(:num)']['POST'] = 'admin/hak_akses/edit_hak_akses/$1';

$route['admin/hakaksessiswa']['GET'] = 'admin/hak_akses/hak_akses_siswa';
$route['admin/hakakses/siswa/create']['POST'] = 'admin/hak_akses/store_hak_akses_siswa';
$route['admin/hakaksessiswa/tambah/(:num)']['GET'] = 'admin/hak_akses/tambah_hak_akses_siswa/$1';
$route['admin/hakaksessiswa/delete/(:num)']['POST'] = 'admin/hak_akses/delete_hak_akses_siswa/$1';
$route['admin/hakakses/siswa/edit/(:num)']['POST'] = 'admin/hak_akses/edit_hak_akses/$1';

// For Kelas
$route['admin/kelas']['GET'] = 'admin/kelas';
$route['admin/kelas/create']['POST'] = 'admin/kelas/store_kelas';
$route['admin/kelas/delete/(:num)']['POST'] = 'admin/kelas/delete_kelas/$1';

$route['admin/kelas/update/(:num)']['POST'] = 'admin/kelas/edit_kelas/$1';

$route['admin/kelas/get_kelas_by_id/(:num)']['GET'] = 'admin/kelas/get_kelas_by_id/$1';

// For Jadwal
$route['admin/jadwal']['GET'] = 'admin/jadwal';
$route['admin/jadwal/siswa']['GET'] = 'admin/jadwal/tambah_jadwal';
$route['admin/jadwal/siswa/tambah/(:num)']['GET'] = 'admin/jadwal/tambah_jadwal_siswa/$1';

$route['admin/jadwal/get/(:num)']['GET'] = 'admin/jadwal/get_jadwal_by_id/$1';
$route['admin/jadwal/delete/(:num)']['POST'] = 'admin/jadwal/delete_jadwal/$1';
$route['admin/jadwal/update/(:num)']['POST'] = 'admin/jadwal/edit_jadwal/$1';
$route['admin/jadwal/create']['POST'] = 'admin/jadwal/store_jadwal';

// For Absensi Siswa
$route['admin/absensisiswa']['GET'] = 'admin/absensi';
$route['admin/absensisiswa/lihat/(:num)']['GET'] = 'admin/absensi/view/$1';


// For Tambah Data Siswa
// $route['admin/tambahdatasiswa']['GET'] = 'admin/siswa/tambah_siswa';

/**
 * Route for Daftar Siswa
 */
$route['daftar']['GET'] = 'pages/register_siswa';
$route['daftarsdnasional']['GET'] = 'program/sd_nasional';
$route['daftarsdinternasional']['GET'] = 'program/sd_internasional';
$route['daftarsmp']['GET'] = 'program/smp';
$route['daftarsma']['GET'] = 'program/sma';
$route['daftarsma']['GET'] = 'program/sma';
$route['daftarsbmptn']['GET'] = 'program/sbmptn';
$route['daftarenglish']['GET'] = 'program/english';
$route['daftarmusic']['GET'] = 'program/music';

/**
 * Route For Belajar Gratis
 */
$route['belajargratis']['GET'] = 'program/belajar_gratis';


/**
 * Route For Getting Data Siswa
 */
// For Data Siswa SD
$route['get_siswa_sd']['POST'] = 'admin/sd/get_siswa_sd';

// For Data Siswa SMP
$route['get_siswa_smp']['POST'] = 'admin/smp/get_siswa_smp';

// For Data Siswa SMA
$route['get_siswa_sma']['POST'] = 'admin/sma/get_siswa_sma';

// For Data Siswa SBMPTN
$route['get_siswa_sbmptn']['POST'] = 'admin/sbmptn/get_siswa_sbmptn';

// For Data Siswa INGGRIS
$route['get_siswa_inggris']['POST'] = 'admin/inggris/get_siswa_inggris';

// For Data Siswa MUSIC
$route['get_siswa_music']['POST'] = 'admin/music/get_siswa_music';

// For Detail Siswa
$route['detail_siswa/(:num)']['GET'] = 'admin/siswa/detail_siswa/$1';


/**
 * Route for Guru
 */
$route['guru']['GET'] 						= 'guru/dashboard/index';
$route['guru/kelas/(:any)']['GET'] 			= 'guru/kelas/index/$1';
$route['guru/post/download/(:num)']['GET'] 	= 'guru/dashboard/download/$1';

$route['guru/post/edit/(:num)']['GET'] = 'guru/dashboard/edit_post/$1';
$route['guru/post/edit/store/(:num)']['POST'] = 'guru/dashboard/store_edit_post/$1';

// For Guru's Profile
$route['guru/profile']['GET'] = 'guru/profile/index';
$route['guru/profile/informasi/update/(:num)']['POST'] = 'guru/profile/update_informasi/$1';
$route['guru/profile/password/update/(:num)']['POST'] = 'guru/profile/update_password/$1';

// For Guru's Post
$route['guru/post/delete/(:num)']['POST'] = 'guru/post/delete_post/$1';
$route['guru/post/create']['POST'] = 'post/store_post_kelas';
$route['guru/post/comment/create/(:num)']['POST'] = 'guru/post/store_comment_post/$1';
$route['guru/post/comment/delete/(:num)']['POST'] = 'guru/post/delete_comment_post/$1';

// For Guru's Jadwal Mengajar
$route['guru/jadwalmengajar']['GET'] = 'guru/jadwal_mengajar/index';


// For Guru's Absensi
$route['guru/absensi']['GET'] = 'guru/absensi/index';
$route['guru/absensi/create']['POST'] = 'guru/absensi/store_absensi';

/**
 * Route For Siswa
 */
$route['siswa']['GET'] = 'siswa/dashboard';
$route['siswa/kelas/(:any)']['GET'] 			= 'siswa/kelas/index/$1';
$route['siswa/comment/create']['POST'] 			= 'siswa/dashboard/store_comment';
$route['siswa/post/download/(:num)']['GET'] 	= 'siswa/dashboard/download/$1';

$route['guru/post/edit/(:num)']['GET'] = 'guru/dashboard/edit_post/$1';
$route['guru/post/edit/store/(:num)']['POST'] = 'guru/dashboard/store_edit_post/$1';


// For Siswa's Profile
$route['siswa/profiles']['GET'] = 'siswa/profile/index';
$route['siswa/profile/informasi/update/(:num)']['POST'] = 'siswa/profile/update_informasi/$1';
$route['siswa/profile/password/update/(:num)']['POST'] = 'siswa/profile/update_password/$1';

$route['siswa/post/edit/(:num)']['GET'] = 'siswa/dashboard/edit_post/$1';
$route['siswa/post/edit/store/(:num)']['POST'] = 'siswa/dashboard/store_edit_post/$1';

// For Siswa's Post
$route['siswa/post/delete/(:num)']['POST'] = 'siswa/post/delete_post/$1';
$route['siswa/post/create']['POST'] = 'post/store_post_kelas';
$route['siswa/post/comment/create/(:num)']['POST'] = 'siswa/post/store_comment_post/$1';
$route['siswa/post/comment/delete/(:num)']['POST'] = 'siswa/post/delete_comment_post/$1';

/**
 *	Route For Post
 */
$route['post/delete/(:num)']['POST'] = 'post/delete_post/$1';
$route['post/create']['POST'] = 'post/store_post_kelas';
$route['post/comment/create/(:num)']['POST'] = 'post/store_comment_post/$1';
$route['post/comment/delete/(:num)']['POST'] = 'post/delete_comment_post/$1';


// For Guru
$route['guru/post/(:num)']['GET'] = 'guru/dashboard/view_post/$1';

// For Siswa
$route['siswa/post/(:num)']['GET'] = 'siswa/dashboard/view_post/$1';




