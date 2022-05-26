<?php

namespace App\Helpers;

use Faker;

class Utilities
{
    public static function generateMaleName()
    {
        $maleNames = ['Ko', 'Aung', 'Min', 'Maw', 'Htoo', 'Khant', 'Linn', 'Zaw', 'Bo', 'Myat', 'Kaung', 'Han', 'Nay', 'Nyan', 'Htet', 'Hlaing', 'Hein', 'Nyi', 'Win', 'Thein', 'Maung'];
        $faker = Faker\Factory::create();
        return  $faker->randomElement($maleNames) . ' ' . $faker->randomElement($maleNames) . ' ' . $faker->randomElement($maleNames);
    }

    public static function generateFemaleName()
    {
        $femaleNames = ['Aye', 'Sin', 'Hla', 'Nyein', 'Latt', 'Khin', 'Thinn', 'Soe', 'Lai', 'Hsaung', 'Nang', 'Nay', 'Chi', 'San', 'Ngwe',  'Linn', 'Hnin', 'Oo', 'Wai', 'Nadi'];
        $faker = Faker\Factory::create();
        return  $faker->randomElement($femaleNames) . ' ' . $faker->randomElement($femaleNames) . ' ' . $faker->randomElement($femaleNames);
    }

    public static function generateNRC()
    {
        $faker = Faker\Factory::create();
        $number = ['1/', '2/', '3/', '4/', '5/', '6/', '7/', '8/', '9/', '10/', '11/', '12/', '13/', '14/'];
        $code1 = [
            "AhGaYa",
            "BaMaNa",
            "KhaPhaNa",
            "DaPhaYa",
            "HaPaNa",
            "KaMaNa",
            "KhaLaPha",
            "LaGaNa",
            "MaKhaBa",
            "MaSaNa",
            "MaNyaNa",
            "MaKaTa",
            "MaMaNa",
            "MaKaNa",
            "NaMaNa",
            "PhaKaNa",
            "PaTaAh",
            "YaKaNa",
            "SaBaNa",
            "SaLaNa",
            "SaPaBa",
            "TaNaNa",
            "WaMaNa"
        ];
        $code2 = [
            "BaLaKha",
            "DaMaSa",
            "LaKaNa",
            "MaSaNa",
            "PhaSaNa",
            "PhaYaSa",
            "YaTaNa",
        ];
        $code3 = [
            "LaBaNa",
            "KaKaYa",
            "KaSaKa",
            "KaDaNa",
            "MaWaTa",
            "PhaAhNa",
            "BaAhNa",
            "PhaPaNa",
            "ThaTaNa",
        ];
        $code4 = [
            "HaKhaNa",
            "HtaTaLa",
            "KaPaLa",
            "MaTaPa",
            "MaTaNa",
            "PhaLaNa",
            "PaLaWa",
            "TaTaNa",
            "TaZaNa"
        ];
        $code5 = [
            "AhYaTa",
            "BaMaNa",
            "BaTaLa",
            "KhaOuNa",
            "DaPaYa",
            "HaMaLa",
            "HtaKhaNa",
            "AhTaNa",
            "KaNaNa",
            "KaThaNa",
            "KaLaHta",
            "KaLaWa",
            "KaBaLa",
            "KaLaTa",
            "KhaTaNa",
            "KhaOuTa",
            "KaLaNa",
            "MaLaNa",
            "MaKaNa",
            "MaYaNa",
            "MaMaNa",
            "NaYaNa",
            "NgaZaNa",
            "PaLaNa",
            "PhaPaNa",
            "PaLanBa",
            "SaKaNa",
            "SaLaKa",
            "YaBaNa",
            "TaMaNa",
            "TaSaNa",
            "WaLaNa",
            "WaThaNa",
            "YaOuNa",
            "YaMaPa",
            "YaThaKa",
        ];
        $code6 = [
            "BaPaNa",
            "HtaWaNa",
            "KaThaNa",
            "KaSaNa",
            "LaLaNa",
            "MaMaNa",
            "MaAhYa",
            "NgaYaKa",
            "PaLaNa",
            "TaNaTha",
            "TaThaYa",
            "ThaYaKha",
            "YaPhaNa"
        ];
        $code7 = [
            "AhPhaNa",
            "AhPhaNa",
            "AhTaNa",
            "DaOuNa",
            "HtaTaPa",
            "KaTaTa",
            "KaPaKa",
            "KaKaNa",
            "KaTaKha",
            "KaKaNa",
            "MaDaNa",
            "MaLaNa",
            "MaNyaNa",
            "NaTaLa",
            "NyaLaPa",
            "PaNaKa",
            "PaKhaNa",
            "PaTaNa",
            "PaKhaTa",
            "PaTaTa",
            "PhaMaNa",
            "PaMaNa",
            "PaTaSa",
            "YaKaNa",
            "YaTaNa",
            "TaNgaNa",
            "ThaNaPa",
            "ThaKaNa",
            "ThaWaTa",
            "ThaSaNa",
            "WaMaNa",
            "YaTaYa",
            "ZaKaNa",
        ];
        $code8 = [
            "AhLaNa",
            "KhaMaNa",
            "GaGaNa",
            "SaPhaNa",
            "SaPaWa",
            "HtaLaNa",
            "KaMaNa",
            "MaKaNa",
            "MaBaNa",
            "MaLaNa",
            "MaTaNa",
            "MaMaNa",
            "MaHtaNa",
            "MaThaNa",
            "NaMaNa",
            "NgaPhaNa",
            "PaKhaKa",
            "PaMaNa",
            "PaPhaNa",
            "SaLaNa",
            "SaTaYa",
            "SaKaNa",
            "TaTaKa",
            "ThaYaNa",
            "SaMaNa",
            "YaNaKha",
            "YaSaKa",
        ];
        $code9 = [
            "DaKhaTha",
            "LaWaNa",
            "OuTaTha",
            "PaBaTha",
            "PaMaNa",
            "TaKaNa",
            "ZaBaTha",
            "ZaYaTha",
            "AhMaYa",
            "AhMaZa",
            "KhaAhZa",
            "KhaMaSa",
            "KaPaTa",
            "KaSaNa",
            "MaLaNa",
            "MaHaMa",
            "MaNaMa",
            "MaNaTa",
            "MaYaMa",
            "MaYaTa",
            "MaTaYa",
            "MaMaNa",
            "MaHtaLa",
            "MaKaNa",
            "MaKhaNa",
            "MaThaNa",
            "NaHtaKa",
            "NgaTaYa",
            "NyaOuNa",
            "PaLaNa",
            "PaThaKa",
            "PaBaNa",
            "PaKaKha",
            "PaOuLa",
            "PaMaNa",
            "SaKaTa",
            "SaKaNa",
            "TaKaNa",
            "TaTaOu",
            "TaThaNa",
            "ThaPaKa",
            "ThaSaNa",
            "WaTaNa",
            "YaMaTha",
        ];
        $code10 = [
            "BaLaNa",
            "KhaSaNa",
            "KaMaYa",
            "KaHtaNa",
            "MaLaMa",
            "MaDaNa",
            "PaMaNa",
            "ThaPhaYa",
            "ThaHtaNa",
            "KhaZaNa",
            "LaMaNa",
            "YaMaNa",
        ];
        $code11 = [
            "AaMaNa",
            "BaThaTa",
            "GaMaNa",
            "KaPhaNa",
            "KaTaNa",
            "MaAhNa",
            "MaTaNa",
            "MaPaNa",
            "MaOuNa",
            "MaPaTa",
            "PaTaNa",
            "PaNaKa",
            "SaTaNa",
            "TaKaNa",
            "ThaTaNa",
            "YaBaNa",
            "YaThaTa",
        ];
        $code12 = [
            "AaLaNa",
            "BaHaNa",
            "BaTaHta",
            "KaKaKa",
            "DaGaNa",
            "DaGaYa",
            "DaGaMa",
            "DaSaKa",
            "DaGaTa",
            "DaLaNa",
            "DaPaNa",
            "LaMaNa",
            "LaThaYa",
            "LaKaNa",
            "MaBaNa",
            "HtaTaPa",
            "AhSaNa",
            "KaMaYa",
            "KaMaNa",
            "KhaYaNa",
            "KaKhaKa",
            "KaTaTa",
            "KaTaNa",
            "KaMaTa",
            "LaMata",
            "LaThaNa",
            "MaYaKa",
            "MaGaTa",
            "MaGaDa",
            "OuKaMa",
            "PaBaTa",
            "PaZaDa",
            "SaKhaNa",
            "SaKakha",
            "SaKaNa",
            "YaPaKa",
            "YaPaTha",
            "OuKaTa",
            "TaKaNa",
            "TaMaNa",
            "ThaKaTa",
            "ThaLaNa",
            "ThaGaKa",
            "ThaKhaNa",
            "TaTaNa",
            "YaKaNa",
        ];
        $code13 = [
            "KhaYaHa",
            "HaPaTa",
            "HaPaNa",
            "KaLaNa",
            "KaLaTa",
            "KaHaNa",
            "KaThaNa",
            "KaTaTa",
            "KaTaNa",
            "KaMaNa",
            "KaKhaNa",
            "LaYaNa",
            "LaKaNa",
            "LaKhaTa",
            "LaKhaNa",
            "LaLaNa",
            "MaBaNa",
            "MaKaNa",
            "MaKhaNa",
            "MaPHaNa",
            "MaPaTa",
            "MaSaNa",
            "MaYaNa",
            "MaYaTa",
            "MaTaTa",
            "MaMaTa",
            "MaNaNa",
            "MaKaNa",
            "MaSaTa",
            "NaMaTa",
            "NaKhaNa",
            "NaSaNa",
            "NaPaNa",
            "NaKhaTa",
            "NyaYaNa",
            "PhaKhaNa",
            "PaLaNa",
            "PaTaYa",
            "SaSaNa",
            "YaNyaNa",
            "TaYaNa",
            "TaMaNya",
            "TaKhaLa",
            "TaLaNa",
            "TaKaNa",
            "ThaNaNa",
            "ThaPaNa",
            "YaNgaNa",
            "YaSaNa",
        ];
        $code14 = [
            "BaKaLa",
            "DaNaPha",
            "DaDaYa",
            "PaThaYa",
            "AhMaNa",
            "HaKaKa",
            "HaThaTa",
            "AhGaPa",
            "KaNaNa",
            "KaLaNa",
            "KaKhaNa",
            "KaKaNa",
            "KaPaNa",
            "LaPaTa",
            "LaMaNa",
            "MaAhPa",
            "MaMaKa",
            "MaAhaNa",
            "MaMaNa",
            "NgaPaTa",
            "NgaThaKha",
            "NyaTaNa",
            "PaTaNa",
            "PhaPaNa",
            "ThaPaNa",
            "WaKhaMa",
            "PaThaNa",
            "YaKaNa",
            "ZaLaNa",
            "KaKaHta",
            "KhaMaKa",
            "KaMaTa",
            "KaPaTa",
            "MaLaNa",
            "PaNaDa",
            "PaWaNa",
            "SaDaNa",
            "YaBaYa",
            "MaSaNa",
            "YaThaNa",
            "BaGaLa",
            "BaThaSa",
            "KaMaMa",
            "LaThaNa",
            "SaKaLa",
            "ThaTaKa",
            "WaLaMa",
            "YaYaTha",
            "KaKhaNa",
            "SaMaNa",
            "YaKhaDa",
            "YaZaNa",
            "DaHaNa",
            "SaMaYa",
            "HtaPaKha",
            "KaMaNa",
            "KhaPaNa",
            "LaHaNa",
            "LaYaNa",
            "MaMaNa",
            "MaPaLa",
            "MaThaNa",
            "PaSaNa",
            "KaLaAh",
            "KaYaYa",
            "MaAhNa",
            "PaKaMa",
            "PaLaTa",
            "KaWaNa",
            "LaPATa",
            "PaTaLa",
            "KaHtaNa",
            "NgaZaNa",
            "PaBaNa",
            "OoTaYa",
            "KaKhaMa",
            "KaTaLa",
            "MaAhTa",
            "TaPaWa",
            "AhPaNa",
            "AhTaNa",
            "AhTaYa",
            "HaHaNa",
            "HaMaNa",
            "KaLaHta",
            "KaLaNa",
            "MaHtaNa",
            "MaKhaTa",
            "MaNgaNa",
            "MaPhaHta",
            "NaTaYa",
            "PaPaKa",
            "PaWaNa",
            "TaTaNa",
            "AhMaTa",
            "NgaYaKa",
            "PaSaLa",
            "YaThaYa",
            "KhAaHsa",
            "TaTaHta"
        ];
        $district = $faker->randomElement($number);
        switch ($district) {
            case '1/':
                return $district . '' . $faker->randomElement($code1) . '(N)' . random_int(100000, 999999);
                break;
            case '2/':
                return $district . '' . $faker->randomElement($code2) . '(N)' . random_int(100000, 999999);
                break;
            case '3/':
                return $district . '' . $faker->randomElement($code3) . '(N)' . random_int(100000, 999999);
                break;
            case '4/':
                return $district . '' . $faker->randomElement($code4) . '(N)' . random_int(100000, 999999);
                break;
            case '5/':
                return $district . '' . $faker->randomElement($code5) . '(N)' . random_int(100000, 999999);
                break;
            case '6/':
                return $district . '' . $faker->randomElement($code6) . '(N)' . random_int(100000, 999999);
                break;
            case '7/':
                return $district . '' . $faker->randomElement($code7) . '(N)' . random_int(100000, 999999);
                break;
            case '8/':
                return $district . '' . $faker->randomElement($code8) . '(N)' . random_int(100000, 999999);
                break;
            case '9/':
                return $district . '' . $faker->randomElement($code9) . '(N)' . random_int(100000, 999999);
                break;
            case '10/':
                return $district . '' . $faker->randomElement($code10) . '(N)' . random_int(100000, 999999);
                break;
            case '11/':
                return $district . '' . $faker->randomElement($code11) . '(N)' . random_int(100000, 999999);
                break;
            case '12/':
                return $district . '' . $faker->randomElement($code12) . '(N)' . random_int(100000, 999999);
                break;
            case '13/':
                return $district . '' . $faker->randomElement($code13) . '(N)' . random_int(100000, 999999);
                break;
            case '14/':
                return $district . '' . $faker->randomElement($code14) . '(N)' . random_int(100000, 999999);
                break;
            default:
                return $faker->randomElement($number);
                break;
        }
    }
}
