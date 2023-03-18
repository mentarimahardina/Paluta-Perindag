<?php

namespace App\Controllers;

use App\Models\ModelProduk;
use CodeIgniter\CLI\Console;
use CodeIgniter\Controller;
use App\Models\ModelEmploye;
use App\Models\ModelLogs;
use App\Models\ModelModuls;
use App\Models\ModelOrganization;
use App\Models\ModelPosts;
use App\Models\ModelQuestion;
use App\Models\ModelSetting;
use App\Models\ModelUsers;

function del($type, $model, $id = 'id')
{
        $session = session();
        $model->delete($_POST[$id]);
        $session->setFlashdata('true', $type . ' berhasil dihapus');
        logs($type . ' berhasil dihapus', 1);
}
function UploadGambar($img_name, $vdir_upload, $file, $orientation = 'L')
{
        $vfile_upload = $vdir_upload . $img_name;
        move_uploaded_file($file["tmp_name"], $vfile_upload);

        //identitas file asli
        // if ($file['type'] == 'image/png') {
        //         $im_src = imagecreatefrompng($vfile_upload);
        // } elseif ($file['type'] == 'image/jpeg') {
        //         $im_src = imagecreatefromjpeg($vfile_upload);
        // }



        // $src_width = imageSX($im_src);
        // $src_height = imageSY($im_src);

        // if ($orientation == 'L') {
        //         $dst_width = 720;
        //         $dst_height = 360;
        //         $im = imagecreatetruecolor($dst_width, $dst_height);
        //         imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
        //         imagejpeg($im, $vdir_upload . $img_name);
        // } else {
        //         $dst_width = 360;
        //         $dst_height = 720;
        //         $im = imagecreatetruecolor($dst_width, $dst_height);
        //         imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
        //         imagejpeg($im, $vdir_upload . $img_name);
        // }
}
function UploadeditGambar($img_name, $vdir_upload, $file, $orientation = 'L')
{
        $vfile_upload = $vdir_upload . $img_name;
        move_uploaded_file($file["tmp_name"], $vfile_upload);

        //identitas file asli
        // if ($file['type'] == 'image/png') {
        //         $im_src = imagecreatefrompng($vfile_upload);
        // } elseif ($file['type'] == 'image/jpeg') {
        //         $im_src = imagecreatefromjpeg($vfile_upload);
        // }



        // $src_width = imageSX($im_src);
        // $src_height = imageSY($im_src);

        // if ($orientation == 'L') {
        //         $dst_width = 720;
        //         $dst_height = 360;
        //         $im = imagecreatetruecolor($dst_width, $dst_height);
        //         imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
        //         imagejpeg($im, $vdir_upload . $img_name);
        // } else {
        //         $dst_width = 360;
        //         $dst_height = 720;
        //         $im = imagecreatetruecolor($dst_width, $dst_height);
        //         imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
        //         imagejpeg($im, $vdir_upload . $img_name);
        // }
}

function logPublic($status, $error)
{
        $logs = new ModelLogs();

        $data = [
                'ip_address' => $_SERVER['REMOTE_ADDR'],
                'uri' => $_SERVER['REQUEST_URI'],
                'user' => 'public',
                'method' => $_SERVER['REQUEST_METHOD'],
                'code' => $error,
                // 0 error system,1 Success 2 failed
                'status' => $status
        ];
        $logs->insert($data);
        if ($error == 0) {
                return view('errors/html/error_exception');
        }
}
function logs($status, int $error)
{
        $logs = new ModelLogs();
        $session = session();
        if ($session->get('name') != null) {

                $data = [
                        'ip_address' => $_SERVER['REMOTE_ADDR'],
                        'user' => $session->get('name'),
                        'uri' => $_SERVER['REQUEST_URI'],
                        'method' => $_SERVER['REQUEST_METHOD'],
                        'code' => $error,
                        // 0 error system,1 Success 2 failed
                        'status' => $status
                ];
                $logs->insert($data);
                if ($error == 0) {
                        return view('errors/html/error_exception');
                }
        } else {
                return redirect()->to(base_url('/login'));
        }
}
class Fungsi extends Controller
{
        public function auth()
        {
                try {
                        $session = session();
                        $model = new ModelUsers();
                        $lihat = $model->where('user_name', $_POST['username'])->first();
                        if ($lihat != null) {

                                if ($lihat['has_login'] == 'true') {
                                        $dataoff = [
                                                'has_login' => 'false',
                                                'last_logged_out' => date("Y-m-d H:i:s"),
                                        ];
                                        $model->update($session->get('id'), $dataoff);
                                        logPublic($lihat['ip_address'] . ' logout', 1);
                                        $session->destroy();
                                }
                                $ses_data = [
                                        'name' => $lihat['user_full_name'],
                                        'id' => $lihat['id'],
                                        'username' => $lihat['user_name'],
                                        'password' => md5($_POST['password']),
                                        'ip_address' => $_SERVER['REMOTE_ADDR'],
                                        'type' => $lihat['user_type'],
                                        'logged_in' => TRUE
                                ];
                                $dataaktif = [
                                        'has_login' => true,
                                        'ip_address' => $ses_data['ip_address'],
                                        'last_logged_in' => date("Y-m-d H:i:s")
                                ];
                                $model->update($lihat['id'], $dataaktif);
                                $session->set($ses_data);
                                logPublic($ses_data['ip_address'] . ' Login Success', 1);
                                return redirect()->to(base_url('/dashboard'));

                        } else {

                                logPublic('Login gagal, nama pengguna dan sadi tidak ditemukan', 2);
                                $session->setFlashdata('msg', 'Nama Pengguna / Kata Sandi Salah');
                                return redirect()->to(base_url('/login'));
                        }
                        // if ($cekname != null) {
                        //         if ($cekname['user_password'] == md5($password)) {
                        //                 if ($cekname['has_login'] == 'true') {
                        //                         $dataoff = [
                        //                                 'has_login' => 'false',
                        //                                 'last_logged_out' => date("Y-m-d H:i:s"),
                        //                         ];
                        //                         $model->update($session->get('id'), $dataoff);
                        //                         logPublic($cekname['ip_address'] . ' logout', 1);
                        //                         $session->destroy();
                        //                 }
                        //                 $ses_data = [
                        //                         'name' => $cekname['user_full_name'],
                        //                         'id' => $cekname['id'],
                        //                         'username' => $cekname['user_name'],
                        //                         'password' => md5($password),
                        //                         'ip_address' => $_SERVER['REMOTE_ADDR'],
                        //                         'type' => $cekname['user_type'],
                        //                         'logged_in' => TRUE
                        //                 ];
                        //                 $dataaktif = [
                        //                         'has_login' => true,
                        //                         'ip_address' => $ses_data['ip_address'],
                        //                         'last_logged_in' => date("Y-m-d H:i:s")
                        //                 ];
                        //                 $model->update($cekname['id'], $dataaktif);
                        //                 $session->set($ses_data);
                        //                 logPublic($ses_data['ip_address'] . ' Login Success', 1);
                        //                 return redirect()->to(base_url('/dashboard'));
                        //         } else {
                        //                 $session->setFlashdata('msg', 'Kata Sandi salah' . $cekname['user_password'] . '->' . md5($password) . ' = ' . $password);

                        //                 logPublic('Login gagal, Password yang dimasukkan salah', 2);

                        //                 return redirect()->to(base_url('/login'));
                        //         }
                        // } else {
                        //         logPublic('Login gagal, Username yang dimasukkan tidak terdaftar', 2);

                        //         $session->setFlashdata('msg', 'Nama Pengguna');

                        //         return redirect()->to(base_url('/login'));
                        // }
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }
        public function changepass()
        {
                try {
                        $model = new ModelUsers();
                        $session = session();
                        $id = $session->get('id');

                        $now = $_POST['now'];
                        $new = $_POST['new'];
                        $knew = $_POST['knew'];

                        if (md5($now) == $session->get('password')) {
                                if ($new == $knew) {
                                        $data = [
                                                'user_password' => md5($new),
                                                'updated_by' => $session->get('id'),
                                        ];
                                        $model->update($id, $data);
                                        $dataoff = [
                                                'has_login' => 'false',
                                                'last_logged_out' => date("Y-m-d H:i:s"),
                                        ];
                                        $model->update($session->get('id'), $dataoff);

                                        $session->destroy();
                                        logs('Sukses Ubah Kata Sandi', 1);

                                        return redirect()->to(base_url('/login'));
                                } else {
                                        logs('Gagal ubah kata sandi, kata sandi baru dan konfirmasinya tidak cocok', 2);
                                        $session->setFlashdata('false', 'Gagal ubah kata sandi');

                                        return redirect()->to(base_url('/dashboard'));
                                }
                        } else {
                                logs('Gagal kata sandi sekarang salah', 2);
                                $session->setFlashdata('false', 'Gagal kata sandi sekarang salah');

                                return redirect()->to(base_url('/dashboard'));
                        }
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }
        public function logout()
        {
                try {
                        $session = session();
                        $model = new ModelUsers();
                        $dataoff = [
                                'has_login' => 'false',
                                'last_logged_out' => date("Y-m-d H:i:s"),
                        ];
                        $model->update($session->get('id'), $dataoff);
                        logs($session->get('ip_address') . ' logout', 1);
                        $session->destroy();

                        return redirect()->to(base_url());
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }
        public function createUser()
        {
                try {
                        $model = new ModelUsers();
                        $session = session();
                        $id = $session->get('id');
                        $data = [
                                'user_name' => $_POST['username'],
                                'user_password' => md5($_POST['pass']),
                                'user_full_name' => $_POST['nama'],
                                'user_email' => $_POST['email'],
                                'user_type' => 'administrator',
                                'created_at' => date("Y-m-d H:i:s"),
                                'created_by' => $id
                        ];
                        $model->insert($data);
                        $session->setFlashdata('msg', 'Berhasil menambahkan pengguna');
                        logs('Berhasil menambahkan pengguna', 1);

                        return redirect()->to(base_url('/pengguna'));
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }
        public function usernonaktif()
        {
                try {
                        $model = new ModelUsers();
                        $session = session();
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $status = $_POST['del'] == 'true' ? 'Mengaktifkan' : 'Menonaktifkan';
                        $data = [
                                'is_deleted' => $_POST['del'] == 'true' ? false : true,
                                'deleted_at' => date("Y-m-d H:i:s"),
                                'deleted_by' => $session->get('id'),
                        ];
                        $model->update($id, $data);
                        $session->setFlashdata('msg', 'Berhasil ' . $status . ' ' . $name);

                        logs('Berhasil ' . $status . ' ' . $name, 1);

                        return redirect()->to(base_url('/pengguna'));
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }
        public function resetpass()
        {
                try {
                        $model = new ModelUsers();
                        $session = session();
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $data = [
                                'user_password' => md5('123456789'),
                                'updated_by' => $session->get('id'),
                        ];
                        $model->update($id, $data);
                        $session->setFlashdata('msg', 'Berhasil mereset kata sandi pada pengguna ' . $name);

                        logs('Berhasil mereset kata sandi pada pengguna ' . $name, 1);

                        return redirect()->to(base_url('/pengguna'));
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }

        public function createNews()
        {
                try {
                        $model = new ModelPosts();
                        $session = session();
                        if (count($model->where('post_title', $_POST['title'])->findAll()) < 1) {
                                $ext = '';
                                $category = '';
                                $tags = '';
                                $isCategory = $_POST['category'];
                                $isTags = $_POST['tag'];
                                foreach ($isCategory as $check) {
                                        if ($category != '') {
                                                $category = $category . ', ' . $check;
                                        } else {
                                                $category = $check;
                                        }
                                }
                                foreach ($isTags as $check) {
                                        if ($tags != '') {
                                                $tags = $tags . ', ' . $check;
                                        } else {
                                                $tags = $check;
                                        }
                                }
                                $ext = pathinfo($_FILES['gambarnews']['name'], PATHINFO_EXTENSION);
                                $namaFile = md5('post-' . date('Ymd H:i:s') . preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title'])) . '.' . $ext;
                                $path = 'Assets/post/';
                                list($width, $height) = getimagesize($_FILES['gambarnews']['tmp_name']);
                                if ($width > $height) {
                                        UploadGambar($namaFile, $path, $_FILES['gambarnews']);
                                } else {
                                        UploadGambar($namaFile, $path, $_FILES['gambarnews'], 'P');
                                }
                                $data = [
                                        'post_title' => $_POST['title'],
                                        'post_content' => $_POST['konten'],
                                        'post_image' => $namaFile,
                                        'post_author' => $session->get('id'),
                                        'post_categories' => $category,
                                        'post_type' => 'post',
                                        'post_status' => $_POST['status'],
                                        'post_visibility' => $_POST['akses'],
                                        'post_comment_status' => $_POST['comment'],
                                        'post_tags' => $tags,
                                        'post_slug' => preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title']),
                                        'created_at' => date("Y-m-d H:i:s"),
                                        'created_by' => $session->get('id')
                                ];

                                $model->insert($data);
                                $session->setFlashdata('true', 'Berita berhasil disimpan');
                                logs('Berita berhasil disimpan', 1);

                                return redirect()->to(base_url('/news'));
                        } else {
                                $session->setFlashdata('false', 'Judul sudah ada');

                                logs('Judul sudah ada', 2);

                                return redirect()->to(base_url('/news'));
                        }
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }

        public function editNews()
        {
                try {
                        $model = new ModelPosts();
                        $session = session();

                        if (count($model->where('post_title', $_POST['title'])->findAll()) < 2) {
                                $ext = '';
                                $category = '';
                                $tags = '';
                                $isCategory = $_POST['category'];
                                $isTags = $_POST['tag'];
                                foreach ($isCategory as $check) {
                                        if ($category != '') {
                                                $category = $category . ', ' . $check;
                                        } else {
                                                $category = $check;
                                        }
                                }
                                foreach ($isTags as $check) {
                                        if ($tags != '') {
                                                $tags = $tags . ', ' . $check;
                                        } else {
                                                $tags = $check;
                                        }
                                }
                                $data = [
                                        'post_title' => $_POST['title'],
                                        'post_content' => $_POST['konten'],
                                        'post_author' => $session->get('id'),
                                        'post_categories' => $category,
                                        'post_tags' => $tags,
                                        'post_status' => $_POST['status'],
                                        'post_visibility' => $_POST['akses'],
                                        'post_comment_status' => $_POST['comment'],

                                        'post_slug' => preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title']),
                                        'updated_by' => $session->get('id'),
                                ];
                                if ($_FILES['gambarnews']['name'] != '') {
                                        $ext = pathinfo($_FILES['gambarnews']['name'], PATHINFO_EXTENSION);
                                        $namaFile = md5('post-' . date('Ymd H:i:s') . preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title'])) . '.' . $ext;
                                        $path = 'Assets/post/';
                                        if (file_exists($path . $_POST['gambartextnews'])) {
                                                unlink($path . $_POST['gambartextnews']);
                                        }
                                        list($width, $height) = getimagesize($_FILES['gambarnews']['tmp_name']);
                                        if ($width > $height) {
                                                UploadGambar($namaFile, $path, $_FILES['gambarnews']);
                                        } else {
                                                UploadGambar($namaFile, $path, $_FILES['gambarnews'], 'P');
                                        }


                                        $data['post_image'] = $namaFile;
                                }
                                $model->update($_POST['id'], $data);
                                $session->setFlashdata('true', 'Berita berhasil di ubah');
                                logs('Berita berhasil di ubah', 1);


                                return redirect()->to(base_url('/news'));
                        } else {
                                $session->setFlashdata('false', 'Judul sudah ada');

                                logs('Judul sudah ada', 2);

                                return redirect()->to(base_url('/news'));
                        }
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }
        public function delNews()
        {
                try {
                        del('Berita', new ModelPosts());

                        return redirect()->to(base_url('/news'));
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }

        
        public function createEvents()
        {
                
                try {
                        $model = new ModelPosts();
                        $session = session();
                        if (count($model->where('post_title', $_POST['title'])->findAll()) < 1) {
                                $ext = '';
                                $category = '';
                                $tags = '';
                                $isCategory = $_POST['category'];
                                $isTags = $_POST['tag'];
                                foreach ($isCategory as $check) {
                                        if ($category != '') {
                                                $category = $category . ', ' . $check;
                                        } else {
                                                $category = $check;
                                        }
                                }
                                foreach ($isTags as $check) {
                                        if ($tags != '') {
                                                $tags = $tags . ', ' . $check;
                                        } else {
                                                $tags = $check;
                                        }
                                }
                                $ext = pathinfo($_FILES['gambarnews']['name'], PATHINFO_EXTENSION);
                                $namaFile = md5('post-' . date('Ymd H:i:s') . preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title'])) . '.' . $ext;
                                $path = 'Assets/post/';
                                list($width, $height) = getimagesize($_FILES['gambarnews']['tmp_name']);
                                if ($width > $height) {
                                        UploadGambar($namaFile, $path, $_FILES['gambarnews']);
                                } else {
                                        UploadGambar($namaFile, $path, $_FILES['gambarnews'], 'P');
                                }
                                $data = [
                                        'post_title' => $_POST['title'],
                                        'post_content' => $_POST['konten'],
                                        'post_image' => $namaFile,
                                        'post_author' => $session->get('id'),
                                        'post_categories' => $category,
                                        'post_type' => 'event',
                                        'post_status' => $_POST['status'],
                                        'post_visibility' => $_POST['akses'],
                                        'post_comment_status' => $_POST['comment'],
                                        'post_tags' => $tags,
                                        'post_slug' => preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title']),
                                        'created_at' => date("Y-m-d H:i:s"),
                                        'created_by' => $session->get('id')
                                ];

                                $model->insert($data);
                                $session->setFlashdata('true', 'Berita berhasil disimpan');
                                logs('Berita berhasil disimpan', 1);

                                return redirect()->to(base_url('/events'));
                        } else {
                                $session->setFlashdata('false', 'Judul sudah ada');

                                logs('Judul sudah ada', 2);

                                return redirect()->to(base_url('/events'));
                        }
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }

        public function editEvents()
        {
                try {
                        $model = new ModelPosts();
                        $session = session();

                        if (count($model->where('post_title', $_POST['title'])->findAll()) < 2) {
                                $ext = '';
                                $category = '';
                                $tags = '';
                                $isCategory = $_POST['category'];
                                $isTags = $_POST['tag'];
                                foreach ($isCategory as $check) {
                                        if ($category != '') {
                                                $category = $category . ', ' . $check;
                                        } else {
                                                $category = $check;
                                        }
                                }
                                foreach ($isTags as $check) {
                                        if ($tags != '') {
                                                $tags = $tags . ', ' . $check;
                                        } else {
                                                $tags = $check;
                                        }
                                }
                                $data = [
                                        'post_title' => $_POST['title'],
                                        'post_content' => $_POST['konten'],
                                        'post_author' => $session->get('id'),
                                        'post_categories' => $category,
                                        'post_tags' => $tags,
                                        'post_status' => $_POST['status'],
                                        'post_visibility' => $_POST['akses'],
                                        'post_comment_status' => $_POST['comment'],

                                        'post_slug' => preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title']),
                                        'updated_by' => $session->get('id'),
                                ];
                                if ($_FILES['gambarnews']['name'] != '') {
                                        $ext = pathinfo($_FILES['gambarnews']['name'], PATHINFO_EXTENSION);
                                        $namaFile = md5('post-' . date('Ymd H:i:s') . preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title'])) . '.' . $ext;
                                        $path = 'Assets/post/';
                                        if (file_exists($path . $_POST['gambartextnews'])) {
                                                unlink($path . $_POST['gambartextnews']);
                                        }
                                        list($width, $height) = getimagesize($_FILES['gambarnews']['tmp_name']);
                                        if ($width > $height) {
                                                UploadGambar($namaFile, $path, $_FILES['gambarnews']);
                                        } else {
                                                UploadGambar($namaFile, $path, $_FILES['gambarnews'], 'P');
                                        }


                                        $data['post_image'] = $namaFile;
                                }
                                $model->update($_POST['id'], $data);
                                $session->setFlashdata('true', 'Event berhasil di ubah');
                                logs('Event berhasil di ubah', 1);


                                return redirect()->to(base_url('/events'));
                        } else {
                                $session->setFlashdata('false', 'Judul sudah ada');

                                logs('Judul sudah ada', 2);

                                return redirect()->to(base_url('/events'));
                        }
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }
        public function delEvents()
        {
                try {
                        del('Events', new ModelPosts());
                        return redirect()->to(base_url('/events'));
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }
        public function createProduk()
        {
                try {
                        $model = new ModelProduk();
                        $session = session();

                        if (count($model->where('name', $_POST['namaproduk'])->findAll()) < 1) {
                                // foreach ($_POST as $key => $item) {
                                //         if (is_array($item)) {
                                //                 foreach ($item as $key2 => $item2) {
                                //                         echo $key . '-' . $key2 . ' :  ' . $item2 . '<br>';
                                //                 }
                                //         } else {
                                //                 echo $key . ' :  ' . $item . '<br>';
                                //         }
                                // }
                                // foreach ($_FILES as $key => $item) {
                                //         if (is_array($item)) {
                                //                 foreach ($item as $key2 => $item2) {
                                //                         echo $key . '-' . $key2 . ' :  ' . $item2 . '<br>';
                                //                 }
                                //         } else {
                                //                 echo $key . ' :  ' . $item . '<br>';
                                //         }
                                // }\
                                $category = '';
                                $tags = '';
                                $isCategory = $_POST['category'];
                                foreach ($isCategory as $check) {
                                        if ($category != '') {
                                                $category = $category . ', ' . $check;
                                        } else {
                                                $category = $check;
                                        }
                                }
                                $ext = pathinfo($_FILES['produk_images']['name'], PATHINFO_EXTENSION);
                                $namaFile = md5('wisata-' . preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['namaproduk'])) . '.' . $ext;
                                $path = 'Assets/produk/';
                                list($width, $height) = getimagesize($_FILES['produk_images']['tmp_name']);
                                if ($width > $height) {
                                        UploadGambar($namaFile, $path, $_FILES['produk_images']);
                                } else {
                                        UploadGambar($namaFile, $path, $_FILES['produk_images'], 'P');
                                }

                                $data = [
                                        'name' => $_POST['namaproduk'],
                                        'deskripsi' => $_POST['deskripsi'],
                                        'type' => $category,
                                        'location' => $_POST['address'],
                                        'image' => $namaFile,
                                        'created_by' => $session->get('id'),
                                ];
                                $model->insert($data);
                                $session->setFlashdata('true', 'Wisata berhasil disimpan');
                                logs('Wisata berhasil disimpan', 1);

                                return redirect()->to(base_url('/produk'));
                        } else {
                                $session->setFlashdata('false', 'Nama Wisata sudah ada');

                                logs('Nama Wisata sudah ada', 2);

                                return redirect()->to(base_url('/produk'));
                        }
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }

        public function editProduk()
        {
                try {

                        $model = new ModelProduk();
                        $session = session();

                        if (count($model->where('name', $_POST['namaproduk'])->findAll()) < 2) {
                                if ($_FILES['editproduk_images']['name'] == '') {
                                        $data = [
                                                'name' => $_POST['namaproduk'],
                                                'deskripsi' => $_POST['deskripsi'],
                                                'type' => $_POST['price'],
                                                'location' => $_POST['price_sales'],
                                        ];
                                } else {
                                        $ext = pathinfo($_FILES['editproduk_images']['name'], PATHINFO_EXTENSION);
                                        $namaFile = md5('wisata-' . preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['namaproduk'])) . '.' . $ext;
                                        $path = 'Assets/produk/';
                                        list($width, $height) = getimagesize($_FILES['editproduk_images']['tmp_name']);
                                        if ($width > $height) {
                                                UploadeditGambar($namaFile, $path, $_FILES['editproduk_images']);
                                        } else {
                                                UploadeditGambar($namaFile, $path, $_FILES['editproduk_images'], 'P');
                                        }
                                        $data = [
                                                'name' => $_POST['namaproduk'],
                                                'deskripsi' => $_POST['deskripsi'],
                                                'type' => $_POST['price'],
                                                'location' => $_POST['price_sales'],
                                                'image' => $namaFile,
                                        ];
                                }
                                $model->update($_POST['id'], $data);
                                $session->setFlashdata('true', 'Wisata berhasil di ubah');
                                logs('Wisata berhasil di ubah', 1);

                                return redirect()->to(base_url('/produk'));
                        } else {
                                $session->setFlashdata('false', 'Nama Wisata sudah ada');
                                logs('Nama Wisata sudah ada', 2);
                                return redirect()->to(base_url('/produk'));
                        }
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }

        public function delProduk()
        {
                try {
                        $model = new ModelProduk();
                        $session = session();
                        del('Produk', $model);
                        if ($_POST['img'] != '') {
                                if (file_exists($_POST['img'])) {
                                        unlink($_POST['img']);
                                }
                        }
                        $session->setFlashdata('false', 'Wisata sudah dihapus');
                        logs('Wisata sudah dihapus', 2);
                        return redirect()->to(base_url('/product'));
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }


        public function createStaff()
        {
                try {


                        $model = new ModelEmploye();
                        $modelor = new ModelOrganization();
                        $session = session();
						$namaFile='';
					if($_FILES['staff_image']['name']!=''){
                        $ext = pathinfo($_FILES['staff_image']['name'], PATHINFO_EXTENSION);
                        $namaFile = md5('staff-' . preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['kabag'])) . '.' . $ext;
                        $path = 'Assets/staff/';
                        list($width, $height) = getimagesize($_FILES['staff_image']['tmp_name']);
                        if ($width > $height) {
                                UploadGambar($namaFile, $path, $_FILES['staff_image']);
                        } else {
                                UploadGambar($namaFile, $path, $_FILES['staff_image'], 'P');
                        }}
                        $data = [
                                'full_name' => $_POST['name'],
                                'nip' => $_POST['nip'],
                                'nik' => $_POST['nik'],
                                'created_at' => date("Y-m-d H:i:s"),
                                'created_by' => $session->get('id'),
                                'photo' => $namaFile,
                        ];
                        $lihat = $model->insert($data);
                        $dataor = [
                                'name' => $_POST['jabatan'],
                                'description' => $_POST['jabatan'] == 'kabid' ? $_POST['kabag'] : $_POST['kasi'],
                                'root' => $_POST['jabatan'] == 'kabid' ? 1 : $modelor->where('person', $_POST['atasan'])->findAll()[0]['id_org'],
                                'person' => $lihat
                        ];
                        $modelor->insert($dataor);
                        $session->setFlashdata('true', 'Staff telah disimpan');
                        logs('Staff telah disimpan', 1);
                        return redirect()->to(base_url('/staff'));
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }
        public function editStaff()
        {
                try {
                        $namaFile = '';
                        $path = 'Assets/staff/';

                        echo $_FILES['editstaff_images']['name'];
                        echo $_FILES['editstaff_images']['name'] != '';
                        if ($_FILES['editstaff_images']['name'] != '') {
                                $ext = pathinfo($_FILES['editstaff_images']['name'], PATHINFO_EXTENSION);
                                $namaFile = md5('staff-' . preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['id'])) . '.' . $ext;
                                list($width, $height) = getimagesize($_FILES['editstaff_images']['tmp_name']);
                                if ($width > $height) {
                                        UploadeditGambar($namaFile, $path, $_FILES['editstaff_images']);
                                } else {
                                        UploadeditGambar($namaFile, $path, $_FILES['editstaff_images'], 'P');
                                }
                        }

                        $model = new ModelEmploye();
                        $modelorg = new ModelOrganization();
                        $modelSetting = new ModelSetting();
                        $session = session();
                        if ($_POST['idorg'] == 1) {

                                $modelSetting->update('15', ['setting_value' => $_POST['name']]);
                                $modelSetting->update('16', ['setting_value' => $_POST['nip']]);
                                if ($_FILES['editstaff_images']['name'] != '') {

                                        $modelSetting->update('18', ['setting_value' => $path + $namaFile]);
                                }
                        }

                        $data = [
                                'full_name' => $_POST['name'],
                                'nip' => $_POST['nip'],
                                'nik' => $_POST['nik'],
                                'photo' => $namaFile,
                                'updated_by' => $session->get('id')
                        ];
                        $dataorg = [
                                'description' => $_POST['jabatan'],
                                'root' => $_POST['type'],
                        ];
                        $model->update($_POST['id'], $data);
                        $modelorg->update($_POST['idorg'], $dataorg);
                        $session->setFlashdata('true', 'Staff telah diubah');
                        logs('Staff telah diubah', 1);

                        return redirect()->to(base_url('/staff'));
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }

        public function staffdel()
        {
                try {
                        $model = new ModelOrganization();
                        del('staff', new ModelEmploye());
                        $model->delete($_POST['idorg']);
                        return redirect()->to(base_url('/staff'));
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }
        public function settingWeb()
        {
                try {
                        $model = new ModelSetting();

                        if ($_FILES['logo']['name'] != '') {
                                $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
                                $namaFile = 'logo.' . $ext;
                                $path = 'Assets/settings/';
                                list($width, $height) = getimagesize($_FILES['logo']['tmp_name']);
                                if ($width > $height) {
                                        UploadGambar($namaFile, $path, $_FILES['logo']);
                                } else {
                                        UploadGambar($namaFile, $path, $_FILES['logo'], 'P');
                                }
                                $model->update('3', ['setting_value' => $namaFile]);
                        }


                        if ($_FILES['sublogo']['name'] != '') {
                                $ext = pathinfo($_FILES['sublogo']['name'], PATHINFO_EXTENSION);
                                $namaFile = 'sublogo.' . $ext;
                                $path = 'Assets/settings/';
                                list($width, $height) = getimagesize($_FILES['sublogo']['tmp_name']);
                                if ($width > $height) {
                                        UploadGambar($namaFile, $path, $_FILES['sublogo']);
                                } else {
                                        UploadGambar($namaFile, $path, $_FILES['sublogo'], 'P');
                                }
                                $model->update('4', ['setting_value' => $namaFile]);
                        }
                        logs('Berhasil di ubah pengaturan', 1);
                        return redirect()->to(base_url('/pengaturan'));
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }
        public function settingprofile()
        {
                try {
                        $model = new ModelSetting();
                        $model->update('1', ['setting_value' => $_POST['name']]);
                        $model->update('2', ['setting_value' => $_POST['subname']]);
                        $model->update('5', ['setting_value' => $_POST['alamat']]);
                        $model->update('6', ['setting_value' => $_POST['linkmap']]);
                        $model->update('8', ['setting_value' => $_POST['telp']]);
                        $model->update('9', ['setting_value' => $_POST['email']]);
                        $model->update('10', ['setting_value' => $_POST['instagram']]);
                        $model->update('11', ['setting_value' => $_POST['twitter']]);
                        $model->update('12', ['setting_value' => $_POST['facebook']]);
                        $model->update('13', ['setting_value' => $_POST['name']]);
                        $model->update('14', ['setting_value' => $_POST['tentang']]);
                        // $model->update('20', ['setting_value' => $_POST['tugaspokok']]);
                        // $model->update('21', ['setting_value' => $_POST['tugasfungsi']]);

                        foreach ($_POST as $key => $item) {
                                if (is_array($item)) {
                                        foreach ($item as $key2 => $item2) {
                                                echo $key . '-' . $key2 . ' :  ' . $item2 . '<br>';
                                        }
                                } else {
                                        echo $key . ' :  ' . $item . '<br>';
                                }
                        }
                        foreach ($_FILES as $key => $item) {
                                if (is_array($item)) {
                                        foreach ($item as $key2 => $item2) {
                                                echo $key . '-' . $key2 . ' :  ' . $item2 . '<br>';
                                        }
                                } else {
                                        echo $key . ' :  ' . $item . '<br>';
                                }
                        }
                        if ($_FILES['kantor_foto']['name'] != '') {
                                $ext = pathinfo($_FILES['kantor_foto']['name'], PATHINFO_EXTENSION);
                                $namaFile = 'file1.' . $ext;
                                $path = 'Assets/settings/';
                                list($width, $height) = getimagesize($_FILES['kantor_foto']['tmp_name']);
                                if ($width > $height) {
                                        UploadGambar($namaFile, $path, $_FILES['kantor_foto']);
                                } else {
                                        UploadGambar($namaFile, $path, $_FILES['kantor_foto'], 'P');
                                }
                                $model->update('19', ['setting_value' => $path . $namaFile]);
                        }
                        logs('Berhasil di ubah data BUMDES', 1);

                        return redirect()->to(base_url('/instansi'));
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }

        public function createApps()
        {
                try {
                        $model = new ModelModuls();
                        $session = session();
                        if (count($model->where('module_name', $_POST['name'])->findAll()) < 1) {
                                $ext = pathinfo($_FILES['gambarapp']['name'], PATHINFO_EXTENSION);
                                $namaFile = md5('unit-' . preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['name'])) . '.' . $ext;
                                $path = 'Assets/unit/';
                                list($width, $height) = getimagesize($_FILES['gambarapp']['tmp_name']);
                                if ($width > $height) {
                                        UploadGambar($namaFile, $path, $_FILES['gambarapp']);
                                } else {
                                        UploadGambar($namaFile, $path, $_FILES['gambarapp'], 'P');
                                }
                                $data = [
                                        'module_name' => $_POST['name'],
                                        'module_url' => $_POST['url'],
                                        'module_img' => $namaFile,
                                        'created_at' => date("Y-m-d H:i:s"),
                                        'created_by' => $session->get('id')
                                ];
                                $model->insert($data);

                                $session->setFlashdata('true', 'Aplikasi berhasil disimpan');
                                logs('Aplikasi berhasil disimpan', 1);

                                return redirect()->to(base_url('/aplikasi'));
                        } else {
                                $session->setFlashdata('false', 'Nama Aplikasi sudah ada');
                                logs('Nama Aplikasi sudah ada', 2);

                                return redirect()->to(base_url('/aplikasi'));
                        }
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }

        public function editApps()
        {
                try {
                        $model = new ModelModuls();
                        $session = session();

                        if (count($model->where('module_name', $_POST['name'])->findAll()) < 2) {
                                $ext = '';

                                $data = [
                                        'module_name' => $_POST['name'],
                                        'module_url' => $_POST['url'],
                                        'updated_by' => $session->get('id'),
                                ];



                                if ($_FILES['gambarnews']['name'] != '') {
                                        $ext = pathinfo($_FILES['gambarnews']['name'], PATHINFO_EXTENSION);
                                        $namaFile = md5('unit-' . preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['name'])) . '.' . $ext;
                                        $path = 'Assets/unit/';
                                        if (file_exists($path . $_POST['gambartextnews'])) {
                                                unlink($path . $_POST['gambartextnews']);
                                        }
                                        list($width, $height) = getimagesize($_FILES['gambarnews']['tmp_name']);
                                        if ($width > $height) {
                                                UploadGambar($namaFile, $path, $_FILES['gambarnews']);
                                        } else {
                                                UploadGambar($namaFile, $path, $_FILES['gambarnews'], 'P');
                                        }


                                        $data['module_img'] = $namaFile;
                                }


                                $model->update($_POST['id'], $data);
                                $session->setFlashdata('true', 'Aplikasi berhasil di ubah');
                                logs('Aplikasi berhasil di ubah', 1);

                                return redirect()->to(base_url('/aplikasi'));
                        } else {
                                $session->setFlashdata('false', 'Judul sudah ada');
                                logs('Judul sudah ada', 2);

                                return redirect()->to(base_url('/aplikasi'));
                        }
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }
        public function delApps()
        {
                try {
                        del('Applikasi', new ModelModuls());

                        return redirect()->to(base_url('/aplikasi'));
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }

        public function createSlider()
        {
                try {
                        $model = new ModelPosts();
                        $session = session();
                        if (count($model->where('post_title', $_POST['title'])->findAll()) < 1) {
                                $ext = pathinfo($_FILES['gambarapp']['name'], PATHINFO_EXTENSION);
                                $namaFile = md5('slider-' . preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title'])) . '.' . $ext;
                                $path = 'Assets/slider/';

                                $data = [
                                        'post_title' => $_POST['title'],
                                        'post_content' => $_POST['content'],
                                        'post_image' => $namaFile,
                                        'post_type' => 'slider',
                                        'post_author' => $session->get('id'),
                                        'created_at' => date("Y-m-d H:i:s"),
                                        'created_by' => $session->get('id')
                                ];
                                $model->insert($data);
                                list($width, $height) = getimagesize($_FILES['gambarapp']['tmp_name']);
                                if ($width > $height) {
                                        UploadGambar($namaFile, $path, $_FILES['gambarapp']);
                                } else {
                                        UploadGambar($namaFile, $path, $_FILES['gambarapp'], 'P');
                                }

                                $session->setFlashdata('true', 'Aplikasi berhasil disimpan');
                                logs('Aplikasi berhasil disimpan', 1);

                                return redirect()->to(base_url('/slider'));
                        } else {
                                $session->setFlashdata('false', 'Nama Aplikasi sudah ada');
                                logs('Nama Aplikasi sudah ada', 2);

                                return redirect()->to(base_url('/slider'));
                        }
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }

        public function editSlider()
        {
                try {
                        $model = new ModelPosts();
                        $session = session();
                        if (count($model->where('post_title', $_POST['name'])->findAll()) < 2) {

                                $data = [
                                        'post_title' => $_POST['name'],
                                        'post_content' => $_POST['content'],
                                        'updated_by' => $session->get('id'),
                                ];
                                // if ($_FILES['gambarnews']['name'] != '') {
                                //         $ext = pathinfo($_FILES['gambarnews']['name'], PATHINFO_EXTENSION);
                                //         $namaFile = md5('slider-' . preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['name'])) . '.' . $ext;
                                //         $path = 'Assets/slider/';
                                //         if (file_exists($path . $_POST['gambartextnews'])) {
                                //                 unlink($path . $_POST['gambartextnews']);
                                //         }
                                //         list($width, $height) = getimagesize($_FILES['gambarnews']['tmp_name']);
                                //         if ($width > $height) {
                                //                 UploadGambar($namaFile, $path, $_FILES['gambarnews']);
                                //         } else {
                                //                 UploadGambar($namaFile, $path, $_FILES['gambarnews'], 'P');
                                //         }

                                //         $data['post_image'] = $namaFile;
                                // }


                                $model->update($_POST['id'], $data);
                                $session->setFlashdata('true', 'Slider berhasil di ubah');
                                logs('Slider berhasil di ubah', 1);

                                return redirect()->to(base_url('/slider'));
                        } else {
                                $session->setFlashdata('false', 'Judul sudah ada');
                                logs('Judul sudah ada', 2);

                                return redirect()->to(base_url('/slider'));
                        }
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }
        public function delSlider()
        {
                try {
                        del('Slider', new ModelPosts());

                        return redirect()->to(base_url('/slider'));
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }

        public function kirimPesan()
        {
                try {
                        $model = new ModelQuestion();
                        $session = session();
                        $check = $model->where('ip_address', $_SERVER['REMOTE_ADDR'])->findAll();
                        $qty = 0;
                        // echo count($check) . ' <br>';
                        foreach ($check as $key => $item) {
                                foreach ($item as $key2 => $item2) {
                                        // echo $key . '-' . $key2 . ' :  ' . $item2 . '<br>';
                                        if ($key2 == 'created_at' && date("Y-m-d") == date_format(date_create($item2), "Y-m-d")) {
                                                echo $key . ' - ' . $item2 . ' - ' . date("Y-m-d") . ' - ' . date_format(date_create($item2), "Y-m-d") . '<br>';
                                                $qty++;
                                        }
                                }

                        }
                        echo $qty . ' qty <br>';
                        if ($qty < 4) {
                                $data = [
                                        'type' => 'pesan',
                                        'nik' => $_POST['nik'],
                                        'fullname' => $_POST['nama_pesan'],
                                        'email' => $_POST['email_pesan'],
                                        'message' => $_POST['pesan_pesan'],
                                        'ip_address' => $_SERVER['REMOTE_ADDR'],
                                        'created_at' => date("Y-m-d H:i:s")
                                ];
                                $model->insert($data);
                                $session->setFlashdata('msgtrue', 'Pesan berhasil terkirim');
                                logs($session->get('ip_address') . ' Pesan berhasil terkirim', 1);
                        } else {
                                echo 'tidak bisa komen <br>';
                                $session->setFlashdata('msgfalse', 'Maaf ya, pesan anda gagal terkirim karena sudah melampaui batas maksimal, silahkan kirim besok :) ');
                                logs($session->get('ip_address') . ' Maaf ya, pesan anda gagal terkirim karena sudah melampaui batas maksimal, silahkan kirim besok :) ', 1);
                        }
                        return redirect()->to(base_url('#tampilpesan'));



                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }
        public function poling()
        {
                try {
                        $model = new ModelQuestion();
                        $session = session();
                        $data = [
                                'type' => 'poling',
                                'nik' => $_POST['nik'],
                                'fullname' => $_POST['nama_pesan'],
                                'email' => $_POST['email_pesan'],
                                'message' => $_POST['poling'],
                                'ip_address' => $_SERVER['REMOTE_ADDR'],
                                'created_at' => date("Y-m-d H:i:s")
                        ];
                        $model->insert($data);
                        $session->setFlashdata('msg', 'Poling berhasil terkirim');
                        logs($session->get('ip_address') . ' Poling berhasil terkirim', 1);

                        return redirect()->to(base_url('#tampilpesan'));
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }
        public function createit()
        {
                try {
                        $model = new ModelPosts();
                        $session = session();
                        if (count($model->where('post_title', $_POST['title'])->findAll()) < 1) {
                                $ext = '';
                                $category = '';
                                $tags = '';
                                $isCategory = $_POST['category'];
                                $isTags = $_POST['tag'];
                                foreach ($isCategory as $check) {
                                        if ($category != '') {
                                                $category = $category . ', ' . $check;
                                        } else {
                                                $category = $check;
                                        }
                                }
                                foreach ($isTags as $check) {
                                        if ($tags != '') {
                                                $tags = $tags . ', ' . $check;
                                        } else {
                                                $tags = $check;
                                        }
                                }


                                $ext = pathinfo($_FILES['gambarpojok']['name'], PATHINFO_EXTENSION);
                                $namaFile = md5('it-' . date('Ymd H:i:s') . preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title'])) . '.' . $ext;
                                $path = 'Assets/post/';
                                //         list($width, $height) = getimagesize($_FILES['gambarpojok']['tmp_name']);
                                //         if ($width > $height) {
                                UploadGambar($namaFile, $path, $_FILES['gambarpojok']);
                                //         } else {
                                //                 UploadGambar($namaFile, $path, $_FILES['gambarpojok'], 'P');
                                //         }
                                // $data = [
                                //         'post_title' => $_POST['title'],
                                //         'post_content' => $_POST['konten'],
                                //         'post_author' => $session->get('id'),
                                //         'post_categories' => $category,
                                //         'post_type' => 'it',
                                //         'post_status' => $_POST['status'],
                                //         'post_visibility' => $_POST['akses'],
                                //         'post_comment_status' => $_POST['comment'],
                                //         'post_tags' => $tags,
                                //         'post_slug' => preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title']),
                                //         'created_at' => date("Y-m-d H:i:s"),
                                //         'created_by' => $session->get('id')
                                // ];
                                $data = [
                                        'post_title' => $_POST['title'],
                                        'post_content' => $_POST['konten'],
                                        'post_image' => $namaFile,
                                        'post_author' => $session->get('id'),
                                        'post_categories' => $category,
                                        'post_type' => 'it',
                                        'post_status' => $_POST['status'],
                                        'post_visibility' => $_POST['akses'],
                                        'post_comment_status' => $_POST['comment'],
                                        'post_tags' => $tags,
                                        'post_slug' => preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title']),
                                        'created_at' => date("Y-m-d H:i:s"),
                                        'created_by' => $session->get('id')
                                ];
                                foreach ($_FILES as $key => $item) {
                                        if (is_array($item)) {
                                                foreach ($item as $key2 => $item2) {
                                                        echo $key . '-' . $key2 . ' :  ' . $item2 . '<br>';
                                                }
                                        } else {
                                                echo $key . ' :  ' . $item . '<br>';
                                        }
                                }

                                echo '--------------------------------';
                                foreach ($_POST as $key => $item) {
                                        if (is_array($item)) {
                                                foreach ($item as $key2 => $item2) {
                                                        echo $key . '-' . $key2 . ' :  ' . $item2 . '<br>';
                                                }
                                        } else {
                                                echo $key . ' :  ' . $item . '<br>';
                                        }
                                }
                                echo '--------------------------------';
                                foreach ($data as $key => $item) {
                                        if (is_array($item)) {
                                                foreach ($item as $key2 => $item2) {
                                                        echo $key . '-' . $key2 . ' :  ' . $item2 . '<br>';
                                                }
                                        } else {
                                                echo $key . ' :  ' . $item . '<br>';
                                        }
                                }
                                $model->insert($data);
                                $session->setFlashdata('true', 'Ponjok IT berhasil disimpan');
                                logs('Ponjok IT berhasil disimpan', 1);

                                return redirect()->to(base_url('/infoit'));
                        } else {
                                $session->setFlashdata('false', 'Judul sudah ada');
                                logs('Judul sudah ada', 2);
                                echo 'dimana ya';
                                return redirect()->to(base_url('/infoit'));
                        }
                } catch (\Throwable $th) {
                        logs($th, 0);
                        echo 'dimana ya xxxxxxxx';
                        print($th);
                }
        }

        public function editit()
        {
                try {
                        $model = new ModelPosts();
                        $session = session();

                        if (count($model->where('post_title', $_POST['title'])->findAll()) < 2) {
                                $ext = '';
                                $category = '';
                                $tags = '';
                                $isCategory = $_POST['category'];
                                $isTags = $_POST['tag'];
                                foreach ($isCategory as $check) {
                                        if ($category != '') {
                                                $category = $category . ', ' . $check;
                                        } else {
                                                $category = $check;
                                        }
                                }
                                foreach ($isTags as $check) {
                                        if ($tags != '') {
                                                $tags = $tags . ', ' . $check;
                                        } else {
                                                $tags = $check;
                                        }
                                }
                                $data = [
                                        'post_title' => $_POST['title'],
                                        'post_content' => $_POST['konten'],
                                        'post_author' => $session->get('id'),
                                        'post_categories' => $category,
                                        'post_tags' => $tags,
                                        'post_status' => $_POST['status'],
                                        'post_visibility' => $_POST['akses'],
                                        'post_comment_status' => $_POST['comment'],

                                        'post_slug' => preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title']),
                                        'updated_by' => $session->get('id'),
                                ];
                                if ($_FILES['gambarnews']['name'] != '') {
                                        $ext = pathinfo($_FILES['gambarnews']['name'], PATHINFO_EXTENSION);
                                        $namaFile = md5('it-' . date('Ymd H:i:s') . preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title'])) . '.' . $ext;
                                        $path = 'Assets/post/';
                                        list($width, $height) = getimagesize($_FILES['gambarnews']['tmp_name']);
                                        if ($width > $height) {
                                                UploadGambar($namaFile, $path, $_FILES['gambarnews']);
                                        } else {
                                                UploadGambar($namaFile, $path, $_FILES['gambarnews'], 'P');
                                        }
                                        $data['post_image'] = $namaFile;
                                }

                                foreach ($data as $key => $item) {
                                        if (is_array($item)) {
                                                foreach ($item as $key2 => $item2) {
                                                        echo $key . '-' . $key2 . ' :  ' . $item2 . '<br>';
                                                }
                                        } else {
                                                echo $key . ' :  ' . $item . '<br>';
                                        }
                                }
                                $model->update($_POST['id'], $data);
                                $session->setFlashdata('true', 'Ponjok IT berhasil di ubah');
                                logs('Ponjok IT berhasil di ubah', 1);

                                return redirect()->to(base_url('/infoit'));
                        } else {
                                $session->setFlashdata('false', 'Judul sudah ada');
                                logs('Judul sudah ada', 2);

                                return redirect()->to(base_url('/infoit'));
                        }
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }
        public function delit()
        {
                try {
                        del('Pojok IT', new ModelPosts());

                        return redirect()->to(base_url('/infoit'));
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }

        public function delPesan()
        {
                try {
                        del('Detail Kritik/Pesan/Saran', new ModelQuestion(), 'pesan_id');

                        return redirect()->to(base_url('/pesan'));
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }


        public function filterpesan()
        {
                try {
                        $ipaddress = $_POST['ip'];
                        $model = new ModelQuestion();
                        $chats = $model->where('ip_address', $ipaddress)->findAll();
                        // print_r($chats);
                        return json_encode($chats);
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }

        public function readchat()
        {
                try {
                        $idpesan = $_POST['idpesan'];
                        $model = new ModelQuestion();
                        $session = session();
                        $data = [
                                'read' => 0,
                                'updated_by' => $session->get('id'),
                        ];
                        $model->update($idpesan, $data);
                } catch (\Throwable $th) {
                        logs($th, 0);
                }
        }



}