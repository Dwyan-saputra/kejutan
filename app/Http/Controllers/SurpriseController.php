<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SurpriseController
{
    public function index(): View
    {
        // ====== UBAH DATA DI BAWAH INI SESUAI CERITAMU ======
        $herName = 'Putri Keyla Azzahra Sofyan';   // nama/panggilan pacarmu
        $hisName = 'ka im';     // namamu

        // Nomor WhatsApp-mu, format internasional tanpa "+" dan tanpa 0 di depan (62 = Indonesia)
        $waNumber = '6281328384490';
        $waText   = 'iyaa ayo kaa,lanjutin foto fotonya aku ga keberatan ko';

        // Lagu: taruh di public/audio/lagu.mp3
        $music = asset('audio/lagu.mp3');

        // Foto: sementara pakai placeholder Unsplash.
        // Nanti ganti dengan foto sendiri, contoh: asset('images/surprise/foto-1.jpg')
        $photos = [
             asset('images/surprise/foto-1.jpeg'),
            asset('images/surprise/foto-2.jpeg'),
        ];

        $polaroids = [
            ['src' =>asset('images/surprise/foto-3.png'), 'caption' => 'Pas kamu bilang "rasanya kaya kelapa" terus aku tumpahin minuman'],
            ['src' => asset('images/surprise/foto-4.jpeg'), 'caption' => 'kamu setelah dapet bunga'],
            ['src' => asset('images/surprise/foto-5.png'), 'caption' => 'tebak yang cowo yang mana'],
            ['src' => asset('images/surprise/foto-6.jpeg'), 'caption' => 'bisa foto setelah uhuk uhuk khem trus di pukul kmu'],
            ['src' =>asset('images/surprise/foto-7.jpeg'), 'caption' => 'makan sama sama,main timezone,main meng,liat airterjun malem malem'],
            ['src' => asset('images/surprise/foto-8.jpeg'), 'caption' => 'ya aku jatuh cinta lagi disini waktu kmu tepuk tangan'],
            ['src' =>asset('images/surprise/foto-.jpeg'), 'caption' => 'couple sepatu sama kamu'],
            ['src' =>asset('images/surprise/foto-9.jpeg'), 'caption' => 'ke tempat awal kita ketemu,main ludo sebelum akhirnya kita kejeglong'],
            ['src' =>asset('images/surprise/foto-.jpeg'), 'caption' => 'kita beli kacamata'],
            ['src' =>asset('images/surprise/foto-.jpeg'), 'caption' => 'liat kembang api taun baru 2027'],
        ];

        $reasons = [
            'Because it has always been you, in every condition. Mau dalam keadaan apa pun, prasasaan ini selalu milih kamu apa yng udah kita laluin prasaan ini ga berubah sedikit pun jutru makin kuat.' ,
            'You are the answer I was looking for. Pertanyaan kmu malam itu bikin aku sadar kalau jawabannya selalu ada di kamu selalu kamu,semuanya ngarah ke kamu,ga ada alaesan lain buat aku ngga sayang sama kamu.' ,
            'No hesitation, no other option. gada ada sedikit pun rasa ragu atau alasan untuk aku tidak jatuh cinta sama kamu aku terima dengan segala resiko yg ada' ,
            
        ];

        $reasons2 = ['My commitment is fully yours. selama kamu ngizinin aku ada di hidup kamu,aku ga akan kemana mana dan kamu tetep 1 1 nya.' ,
            'I see my future in your eyes. jadi suami yg baik jadi ayah yang baik itu mimpi yg buat mimpiin aja ga brani,tapi sekarang aku berusaha buat itu dan kmu berhasil buat aku ngrasa kalau aku harus bisa itu' ,
            'There’s no other reason for me not to love you.',
        ];

        return view('surprise', [
            'coverBg' => asset('images/surprise/cover.png'),
            'backBg'  => asset('images/surprise/back.png'),
            'herName'    => $herName,
            'hisName'    => $hisName,
            'music'      => $music,
            'photos'     => $photos,
            'polaroids'  => $polaroids,
            'reasons'    => $reasons,
            'reasons2' => $reasons2,
            'quote'      => 'mou si hiu ajaib',
            'storyTitle' => 'frist chapter',
            'story1'      => 'mainan ini  se Ajaib itu ternyata..,sebenernya Waktu itu aku memang dateng ke tasik buat nemuin kamu aku disana di hotel 2 malem karna kamu ga bisa Waktu itu aku pun hampir pulang ,tpi karna mainanini kita pun ktmu di hari esoknya disitulah cerita dimulai',
            'story'      => 'pertama kalinya dalam hidupku aku beli bunga, milih bunga, nganterin bunga ratusan kilometer,pertamakalinya juga ada perempuan duduk di kursi itu selain ibuku, pertamakali jalan2 malem sama perempuan liat bintang, grimis,nembus awan,dan pertamakalinya juga aku liat senyum semanis itu walaupun ngantuk wkwk but i love that so much.',
            'letter'     => 'makasih buat kesempatan yang kamu kasih, aku bikin ini biar kamu happy lagii sebenernya mana bisa aku ngebiarin kamu sendirian. dah yaa cup yaa, kamu ngga sendirian keylaa ada akuu ini loh dari dulu ga kemana manaaa yang sayaaangg terus ma kamuu💗💗💗',
            'closing'    => 'Bukunya masi belum selesai. Masih banyak halaman foto foto yang kosong.mau yaa bantuin yaa isi foto foto yang kosong ituu ya yaaaaaaa keberatan tidaaaa?',
            'waUrl'      => 'https://wa.me/' . $waNumber . '?text=' . rawurlencode($waText),
        ]);
    }
}