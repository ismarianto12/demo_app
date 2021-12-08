<?php


// by ismarianto 
namespace App\Helpers;

use App\Models\User;
use App\Models\Setupsikd\Tmsikd_satker;
use App\Models\Setupsikd\Tmsikd_setup_tahun_anggaran;
use App\Models\Tmbangunan;
use App\Models\Tmcabang;
use App\Models\tmlayanan;
use App\Models\Tmproyek;
use App\Models\Tmrap;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
// use Illuminate\Support\Facades\Session;

class Properti_app
{

    public static function rupiah($pr)
    {
        return number_format($pr, 0, 0, '.');
    }

    public static function user_satker()
    {
        $user_id = Auth::user()->id;
        $query   = DB::table('user')
            ->select('user.id', 'user.username', 'tmuser_level.description', 'tmuser_level.mapping_sie', 'tmuser_level.id as level_id')
            ->join('tmuser_level', 'user.tmuser_level_id', '=', 'tmuser_level.id')
            ->where('user.id', $user_id);

        $levelid = $query->first()->level_id;
        if ($levelid == 3) {
            return Auth::user()->sikd_satker_id;
        } else {
            return 0;
        }
    }

    public static function load_js(array $url)
    {
        $data     = [];
        foreach ($url as $ls) {
            $js[]     =  '<script type="text/javascript" src="' . $ls . '"></script>';
            $data     = $js;
        }
        return $data;
    }


    public static function getlevel()
    {
        $ff = Auth::user();
        // dd($user_id);
        if ($ff != null) {
            $user_id = $ff->id;
            $query   = DB::table('users')
                ->select('users.id', 'users.username', 'tmuser_level.description', 'tmuser_level.mapping_sie', 'tmuser_level.id as level_id')
                ->join('tmuser_level', 'users.tmuser_level_id', '=', 'tmuser_level.id')
                ->where('users.id', $user_id)
                ->first();
            return $query->level_id;
        } else {
            return null;
        }
    }


    public static function tgl_indo($tgl)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split = explode('-', $tgl);
        return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
    }

    public static function servername()
    {
        return $_SERVER['HTTP_HOST'];
    }
    public static function UserSess()
    {
        $ff = Auth::user();
        if ($ff != null) {
            return $ff->username;
        } else {
            return null;
        }
    }

    public static function propuser($params)
    {
        $ff = Auth::user();
        if ($ff != null) {
            $data   = User::find($ff->id);
            // dd($data);
            if ($data != '') {
                return $data[$params];
            } else {
                return NULL;
            }
        } else {
            return NULL;
        }
    }
    public static function appname()
    {
        return 'FOTO HOKKIE';
    }




    // set change environment dinamically
    public static function parsing($url)
    {

        $val =  "?" . base64_decode($url);
        $query_str = parse_url($val, PHP_URL_QUERY);
        parse_str($query_str, $query_params);
        // dd($query_params);
        return $query_params;
    }
    public static function produk()
    {
        return
            [
                'HOME',
                'PHOTOBOX',
                'PHOTOBOOTH',
                'PHOTO STUDIO',
                'BUKU TAHUNAN',
                'PHOTO PRODUCT EXPRESS',
                'PRINT ',
                'PHOTO PRPODUT XPRESS',
                'PRINT ',
                'COLLABORATION',
            ];
    }

    public static function slidecategori()
    {
        return [
            'home',
            'detailpage'
        ];
    }

    public static function service()
    {
        return
            [

                'PHOTOBOX',
                'PHOTOBOOTH',
                'ROBOT PHOTO',
                'PHOTO STUDIO',
                'BOOK YEAR',
                'PHOTO PRPODUT XPRESS',
                'PRINT',
                'SERVICE CAMERA',
            ];
    }

    public static function alamat()
    {
        return
            [
                'Jl. Swadaya IV No4 Kel. Rawa Terate Cakung, Jakarta Timur',
                'Jl Laks L RE Martadinata Bl B/10 AG, Dki Jakarta',
                'Jl Ciledug Raya Psr Cipulir Bl BKS Lt 1/18,Cipulir Kebayoran Lama, Jakarta',
                'Jl Pemuda Kav 720,JatiPulo Gadung, Jakarta',
                'Jl Mayjen DI Panjaitan 32 RT 013/01 Cipinang Cempedak, Dki Jakarta',
                'Jl Kran 18 RT 006/05,Gunung Sahari Selatan Kemayoran, Jakarta'
            ];
    }

    public static function layanan()
    {
        $data = tmlayanan::get();
        return $data;
    }
    public static function table($table)
    {
        return DB::table($table)->get();
    }

    public function status($status)
    {
    }
    public static function cabang()
    {
        $data = Tmcabang::get();
        return $data;
    }
    // jensi foto 

    // public static function jenisSlide()
    // { 
    //     return [
    //         1 
    //     ]
    // }



    public static function jenislayanan()
    {
        $model = tmlayanan::get();
        return $model;
    }
}
