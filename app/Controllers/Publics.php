<?php

namespace App\Controllers;

use App\Models\ModelEmploye;
use App\Models\ModelMenus;
use App\Models\ModelModuls;
use App\Models\ModelOrganization;
use App\Models\ModelPosts;
use App\Models\ModelProduk;
use App\Models\ModelSetting;
use App\Models\ModelStaff;
use App\Models\ModelUsers;
use CodeIgniter\Controller;

include("Page.php");
// function settingValues($cari)
// {
//     $model = new ModelSetting();
//     return $model->where('setting_variable', $cari)->findall()[0]['setting_value'];
// }
function main($page)
{
    $model1 = new ModelMenus();
    $model2 = new ModelPosts();

    $data['page'] = $page;
    $data['menus'] = $model1->findAll();

    $data['info'] = $model2->where('post_type', 'info')->where('post_status', 'publish')->orderBy('created_at', 'DESC')->findAll();
    $data['infonews'] = $model2->where('post_type', 'info')->where('post_status', 'publish')->orderBy('created_at', 'ASC')->findAll();
    $data['news'] = $model2->where('post_type', 'post')->where('post_status', 'publish')->orderBy('created_at', 'DESC')->findAll();
    $data['newsnews'] = $model2->where('post_type', 'post')->where('post_status', 'publish')->orderBy('created_at', 'DESC')->findAll();
    $data['slider'] = $model2->where('post_type', 'slider')->orderBy('created_at', 'DESC')->findAll();
    $data['pojokit'] = $model2->where('post_type', 'it')->where('post_status', 'publish')->orderBy('created_at', 'DESC')->findAll();

    $data['setting_title'] = settingValues('title');
    $data['setting_subtitle'] = settingValues('sub_title');
    $data['setting_logo'] = settingValues('logo');
    $data['setting_sublogo'] = settingValues('sub_logo');
    $data['setting_fotokantor'] = settingValues('kantor_foto');
    $data['setting_alamat'] = settingValues('address');
    $data['setting_telp'] = settingValues('telp');
    $data['setting_email'] = settingValues('email');
    $data['setting_instagram'] = settingValues('instagram');
    $data['setting_twitter'] = settingValues('twitter');
    $data['setting_facebook'] = settingValues('facebook');
    $data['setting_linkmap'] = settingValues('linkmap');

    return $data;
}

class Publics extends Controller
{
    public function index()
    {
        $data = main('Beranda');
        $model2 = new ModelModuls();

        $model4 = new ModelProduk();
        $model5 = new ModelStaff();
        $data['unit'] = $model2->findAll();
        $data['produk'] = $model4->orderBy('created_at', 'DESC')->findAll();
        $data['staff'] = $model5->orderBy('id_org', 'ASC')->findAll();
        return view('Public/HomePage', $data);
    }

    public function profil()
    {
        $data = main('Profil');
        $data['tentang_instansi'] = settingValues('tentang_instansi');
        $data['pimpinan_name'] = settingValues('pimpinan_name');
        $data['pimpinan_foto'] = settingValues('pimpinan_foto');
        $data['pimpinan_nip'] = settingValues('pimpinan_nip');
        $data['pimpinan_jabatan'] = settingValues('pimpinan_jabatan');
        $data['kantor_foto'] = settingValues('kantor_foto');
        $data['tugas_pokok'] = settingValues('tugas_pokok');
        $data['tugas_fungsi'] = settingValues('tugas_fungsi');
        $data['n_width'] = settingValues('nodewidth');
        $data['c_width'] = settingValues('chartwidth');
        $data['c_height'] = settingValues('chartheight');
        $data['system'] = settingValues('type');
        $modal = new ModelEmploye();
        $modalOrganization = new ModelOrganization();
        $data['employe'] = $modal->findAll();
        $data['data'] = $modalOrganization->join('employees', 'organization.person = employees.id')->findAll();
        $data['ada'] = count($modalOrganization->where('name', 'kabid')->findAll());
        return view('Public/Profil', $data);
    }
    public function program()
    {
        $data = main('Program');
        return view('Public/Program', $data);
    }


    public function berita()
    {
        $data = main('Berita');
        return view('Public/Berita', $data);
    }
    public function detailberita($id)
    {
        if ((int) $id) {
            $data = main('Berita');
            $model = new ModelPosts();
            $modelUser = new ModelUsers();

            $new = ($model->where('id', $id)->findAll())[0];
            $author = $modelUser->where('id', $new['post_author'])->findAll();
            $data['created'] = date('d M Y H:i:s', strtotime($new['created_at']));
            $data['author'] = $author[0]['user_full_name'];
            $data['title'] = $new['post_title'];
            $data['img'] = $new['post_image'];
            $data['content'] = $new['post_content'];
            return view('Public/DetailBerita', $data);
        } else {

            return redirect()->to(base_url($id));
        }
    }

    public function event()
    {
        $data = main('Event');
        return view('Public/Event', $data);
    }
    public function detailevent($id)
    {
        if ((int) $id) {
            $data = main('Berita');
            $model = new ModelPosts();
            $modelUser = new ModelUsers();
            $new = ($model->where('id', $id)->findAll())[0];
            $author = $modelUser->where('id', $new['post_author'])->findAll();
            $data['created'] = date('d M Y H:i:s', strtotime($new['created_at']));
            $data['author'] = $author[0]['user_full_name'];
            $data['title'] = $new['post_title'];
            $data['img'] = $new['post_image'];
            $data['content'] = $new['post_content'];
            return view('Public/DetailBerita', $data);
        } else {
            return redirect()->to(base_url($id));
        }
    }

    public function wisata($type)
    {
        $data = main('Wisata');
        $model4 = new ModelProduk();
        $data['type']=$type;
        $data['produk'] = $model4->where('type', $type)->orderBy('created_at', 'DESC')->findAll();

        return view('Public/wisata', $data);
    }

    public function detailwisata($id)
    {
        $menu = new ModelMenus();
        $produk = new ModelProduk();
        if (count($produk->where('name', $id)->findAll()) != 0) {
            $data = main('Produk');
            $model = new ModelProduk();
            $modelUser = new ModelUsers();

            $new = ($model->where('name', $id)->findAll())[0];
            $data['harga'] = $new['type'];
            $author = $modelUser->where('id', $new['created_by'])->findAll();
            $data['created'] = date('d M Y H:i:s', strtotime($new['created_at']));
            $data['author'] = $author[0]['user_full_name'];
            $data['title'] = $new['name'];
            
            $data['image'] = $new['image'];
            $data['content'] = $new['deskripsi'];
            return view('Public/DetailProduk', $data);
        } elseif (count($menu->where('menu_title', $id)->findAll()) == 0) {
            return redirect()->to(base_url($id));
        } else {
            return redirect()->to(base_url());

        }
    }

    public function galeri()
    {
        $data = main('Galeri');
        return view('Public/Galeri', $data);
    }

    public function poling($id)
    {
        if ((int) $id) {
        } else {
            return redirect()->to(base_url());
        }
    }

    public function login()
    {
        $session = session();
        $data = main('Login');

        if ($session->get('name') == null) {
            return view('login', $data);
        } else {
            return redirect()->to(base_url('/dashboard'));
        }
    }
    public function pojokit()
    {
        $data = main('Pojok IT');
        return view('Public/PojokIT', $data);
    }
    public function detailpojokit($id)
    {
        if ((int) $id) {
            $data = main('Pojok IT');
            $model = new ModelPosts();
            $modelUser = new ModelUsers();

            $new = ($model->where('id', $id)->findAll())[0];
            $author = $modelUser->where('id', $new['post_author'])->findAll();
            $data['created'] = date('d M Y H:i:s', strtotime($new['created_at']));
            $data['author'] = $author[0]['user_full_name'];
            $data['title'] = $new['post_title'];
            $data['img'] = $new['post_image'];
            $data['content'] = $new['post_content'];
            return view('Public/Detailit', $data);
        } else {

            return redirect()->to(base_url($id));
        }
    }
}