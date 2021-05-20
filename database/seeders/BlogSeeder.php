<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
 
class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog')->insert([
            'title'  => "Tips Rumah Ramah Lansia",
            'image_path' => "storage/Images/blog/LANSIA.jpg",
            'show' => 1,
            'content' => '<p>Seiring bertambahnya usia, tugas-tugas sederhana seperti mencapai rak tinggi, memanjat tangga atau bangun dari kursi dengan mudah, bisa menjadi tugas yang berat. Pemilik rumah yang sudah lanjut usia atau tinggal bersama orang tua lanjut usia atau kakek nenek mungkin memerlukan dekorasi rumah yang ramah lanjut usia. Karena kenyamanan, keamanan, dan aksesibilitas menjadi perhatian utama, menggabungkan perubahan desain yang tidak menghalangi estetika, tentunya dapat dilakukan.</p> <p>Banyak manula terus berkontribusi pada profesi mereka, sebagai penasehat atau konsultan, bahkan setelah pensiun. Dalam kasus seperti itu, kamar cadangan dapat berfungsi ganda sebagai kantor rumah, serta kamar tidur tamu untuk pengunjung atau keluarga besar.</p> <p><b>Keamanan rumah untuk perumahan lansia</b></p> <p>Saat ini, keselamatan dan keamanan adalah masalah utama. Pastikan dimanapun kamu memutuskan untuk tinggal dengan orang tua atau lansia lainnya, adanya sistem keamanan atau bahkan sekuriti yang akan selalu siap siaga membantu.</p> <p><b>Penerangan rumah untuk lansia</b></p> <p>Orang tua mungkin juga tidak memiliki visi yang sama dengan orang lain di rumah. Dengan teknologi, juga dimungkinkan untuk mengoperasikan lampu, kipas, dan pendingin udara menggunakan remote tunggal, yang dapat memudahkan para manula.</p> <p><b>Perabotan ramah lansia</b></p> <p>Perabotan di rumah, harus ditata sedemikian rupa sehingga ada ruang yang cukup bagi manula untuk bergerak bebas. Simpan barang-barang yang sering digunakan di kabinet bawah, mudah dijangkau. Perabotan harus memungkinkan lansia untuk menjalani kehidupan sehari-hari mereka dengan mudah. Misalnya, rak atau meja kecil di samping tempat tidur, dapat berguna untuk menyimpan kacamata, telepon, obat-obatan dan air.</p> <p><b>Opsi lantai untuk rumah lanjut usia</b></p> <p>Kriteria utama, ketika memilih lantai untuk rumah dengan manula, adalah untuk memastikan bahwa lantai tidak licin, mudah untuk dilewati dan mudah dirawat. Ubin kamar mandi marmer / keramik di rumah yang licin, mungkin tidak memberikan pegangan yang cukup. Di kamar mandi, seseorang dapat menggunakan ubin anti slip. Bangunan juga harus memenuhi kebutuhan mobilitas dan persyaratan keselamatan para lansia, dengan landai untuk kursi roda dan tangga dengan pegangan tangan atau palang pengaman.</p> <p><b>Tips dekorasi untuk rumah dengan lansia</b></p> <ol> <li>Hindari karpet dan karpet lantai yang longgar. Kau bisa mengamankan dengan karpet dan keset pintu menggunakan lapisan anti-slip.</li> <li>Jaga agar kamar mandi tetap kering mengurangi kemungkinan terpeleset. Pastikan area di dekat WC dan wastafel sudah kering dan area basah terbatas pada area shower.</li> <li>Pancuran dengan ketinggian yang bisa disesuaikan, lebih baik untuk manula.</li> <li>Memberikan distribusi pencahayaan sekitar yang baik dan merata di seluruh lantai, tanpa membuat silau dan mengurangi titik-titik gelap.</li> <li>Adanya area yang nyaman dan menarik, bagi orang lanjut usia untuk berolahraga, berdoa atau melakukan hobi seperti membaca, merajut, melukis, berkebun, dan lain-lain, Bisa menjadi sebuah bonus.</li> </ol> <p><span><span><span>Apakah artikel ini bermanfaat? Kami harap begitu, semoga para orang tua kami merasakan kenyamanan yang sama seperti yang telah mereka berikan kepada kami waktu kecil.</span></span></span></p>',
            'url'  => "tips-rumah-ramah-lansia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('blog')->insert([
            'title'  => "mengapa-bahan-bangunan-harus-berkualitas-",
            'image_path' => "storage/Images/blog/BahanBangunan.jpg",
            'show' => 1,
            'content' => '<p><span><span><span>Seringkali saat melakukan renovasi rumah atau membangun rumah banyak yang menghadapi sebuah dilema. Menggunakan bahan bangunan berkualitas yang membuat budget menjadi ketat? Atau mencari bahan bangunan dengan harga murah ramah budget tapi kualitas sedikit meragukan? Wajar memang, karena hukum ekonomi (dan naluri ingin irit) berkata bahwa kita menginginkan hasil yang paling baik dengan biaya semurah mungkin. Mungkin dalam hal ini kita harus kembali mengingat bahwa belum tentu semua yang mahal itu berkualitas, tapi yang pasti bahan bangunan berkualitas tidak murah. Namun, tidak murah bukan berarti mahal loh.</span></span></span></p> <p><span><span><span>Beberapa hal yang perlu diingat, rumah adalah struktur permanen. Yang dibangun untuk menjadi naungan hidup, bekerja, istirahat dan mungkin yang paling penting, membina keluarga. Dibuat untuk memberikan rasa aman dan tentram. Dan rumah pun dapat menjadi sebuah investasi jangka panjang yang memberikan jaminan penambahan nilai di masa depan. Tentunya bahan bangunan yang berkualitas cukup menentukan tingkat keamanan dan kenyamanan keluarga, dan <i>return of investment</i> di masa depan.</span></span></span></p> <p><span><span><span>Bahan bangunan dapat dibilang terbagi menjadi dua, yang terlihat dan yang tak terlihat. Contoh bahan bangunan yang terlihat adalah jenis lantai, kusen pintu dan jendela, bahan pintu, kaca jendela, plafon hingga cat dinding. Sedangkan contoh bahan bangunan yang tak terlihat seperti struktur, beton, besi, rangka atap, kabel dan elektrikal, pipa hingga batu bata dan semen. Seringkali calon pemilik rumah (atau bahkan kontraktor nakal) mencoba memangkas biaya dengan menggunakan bahan bangunan berkualitas untuk yang terlihat, namun murah dengan kualitas meragukan untuk bagian yang tak terlihat. Indah dipandang, namun agak mengecewakan ketika diteliti lebih lanjut.</span></span></span></p> <p><span><span><span>Membangun rumah dengan bahan berkualitas juga memberikan berbagai macam kelebihan. Selain jaminan rumah sebagai struktur hunian yang mumpuni, juga kecepatan dalam konstruksi. Salah satu yang cukup penting adalah jaminan dan layanan purna jual. Bahan bangunan berkualitas biasanya mendapatkan jaminan dan dukungan dari produsen yang ingin menjaga nama baik produknya. Yang lebih penting lagi, bahan bangunan berkualitas biasanya dibuat dan diperuntukkan untuk ramah kepada lingkungan. Bahan berkualitas dibuat agar renovasi atau pembangunan rumah yang kamu lakukan tahan lama dan tidak membutuhkan banyak perbaikan atau pergantian lagi di kemudian hari. Bahan bangunan berkualitas pun biasanya dibuat dengan mengikuti standar dan regulasi konstruksi yang mengedepankan keselamatan, penghematan bahan baku sehingga tidak menciptakan limbah yang berlebih, mengurangi jejak karbon dan yang cukup penting adalah, menghemat biaya di jangka panjang.</span></span></span></p> <p><span><span><span>Dengan mengganti pola pikir bahwa bahan bangunan berkualitas adalah sebuah investasi, hunian yang telah kamu renovasi atau yang telah selesai kamu Bangun bisa jadi lebih Panjang umur. Ketika sudah bulat ingin merenovasi atau membangun rumah dengan bahan berkualitas, tentunya harus pandai memilih kontraktor agar tidak tertipu dalam pembelian bahan. Tidak ingin kan sudah mengeluarkan budget besar dan ternyata kontraktor tidak amanah dalam mengalokasikan budgetnya?</span></span></span></p> <p><span><span><span>&nbsp;Nah, kini PT Sinergi Informatika Semen Indonesia yang mana anak perusahaan dari SIG telah mengeluarkan solusi untuk renovasi dan pembangunan yaitu Sobat Bangun dengan cara kerja serba praktis, transparan, dan pastinya kualitas terjamin. Tidak perlu lagi kuatir kontraktor nakal, karena semua mitra kontraktor Sobat Bangun telah diverifikasi dari mulai yang berbadan hukum hingga perorangan. Kamu juga bisa melihat budget yang kamu berikan untuk bahan bangunan berkualitas dialokasikan kemana saja melalui RAB yang sangat transparan dan terperinci. Pengerjaan pun dipastikan tepat waktu dan sesuai dengan ekspektasi desain dan kualitas yang kamu harapkan. Tunggu apalagi, kunjungi <a href="http://www.sobatbangun.com">www.sobatbangun.com</a> untuk mulai pembaharuan hunianmu jadi lebih baik.</span></span></span></p> <p>&nbsp;</p> ',
            'url'  => "tips-rumah-ramah-lansia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('blog')->insert([
            'title'  => "Panduan Pemula Untuk Izin Renovasi Rumah",
            'image_path' => "storage/Images/blog/617.jpg",
            'show' => 1,
            'content' => '<p>Semua pemilik rumah tentu ingin memiliki rumah yang nyaman, layak tinggal dan memiliki estetika yang sesuai dengan keinginan. Hal tersebut menjadi salah satu alasan mengapa membangun rumah sendiri menjadi pilihan. Tapi tidak semua orang&nbsp; memiliki kesempatan untuk membangun rumah sendiri, ada kalanya ketika rumah yang dimiliki adalah rumah lama yang membutuhkan peremajaan,&nbsp; perubahan fungsi, atau penambahan ruangan. Dalam hal ini renovasi menjadi pilihan untuk mendapatkan hasil yang diinginkan.</p> <p>Lalu bagaimana dengan Izin? Apakah renovasi rumah membutuhkan IMB? Jawabannya tergantung. Tergantung renovasi yang akan dilakukan. IMB wajib diperbaharui bila renovasi yang dikerjakan melibatkan perombakan denah rumah. Tujuan IMB adalah menciptakan tata letak bangunan yang teratur, nyaman, dan sesuai peruntukan tanah. Dengan memiliki IMB pada sebuah bangunan, diharapkan tercipta keserasian dan keseimbangan antara lingkungan dan bangunan. Seperti yang diatur pada Peraturan Menteri Dalam Negeri Nomor 32 Tahun 2010, mengurus IMB untuk renovasi rumah hanya meliputi proyek penambahan jumlah ruangan, pembongkaran dinding untuk memperluas ruangan, atau pembuatan bangunan baru di bagian atas maupun bagian samping bangunan rumah sebelumnya. Nah jika renovasi yang ingin dilakukan tidak mencakup hal-hal tersebut, seperti membuat saluran air, memperbaiki pagar, mengecat dinding, mengganti genteng, mengganti keramik kamar mandi, maka tidak perlu mengurus IMB untuk renovasi rumah.</p> <p>Bagaimana jika renovasi yang ingin dilakukan mencakup pembangunan yang diwajibkan untuk memperbaharui IMB? Ya musti diurus tentunya. Karena kesesuaian bangunan dengan IMB sangatlah penting. Bangunan yang tidak sesuai dengan IMB memiliki resiko dibongkar oleh pemerintah setempat.&nbsp; Lebih baik ribet diawal mengurus IMB daripada ribet bangunan dibongkar. Yuk mari kita kenali persyaratan dan tata cara mengurus IMB renovasi rumah.</p> <p>Dokumen yang harus dilengkapi adalah sebagai berikut:</p> <ul> <li>Fotokopi Kartu Tanda Penduduk (KTP).</li> <li>Surat kuasa apabila penandatangan bukan dilakukan oleh pemohon sendiri.</li> <li>Fotokopi pelunasan Pajak Bumi dan Bangunan (PBB) tahun terakhir.</li> <li>Fotokopi Bukti Kepemilikan Tanah yang disahkan oleh pejabat yang berwenang.</li> <li>Fotokopi Gambar Rencana Bangunan berikut penjelasannya, dengan skala 1:100</li> <li>Perhitungan Konstruksi bagi bangunan bertingkat.</li> <li>Izin tetangga diketahui RT/RW (dengan materai sebesar 6000).</li> <li>Denah bangunan dan foto tampak bangunan dalam ukuran Postcard (8,9 x 12,7 cm), khusus IMB pemutihan.</li> <li>Pengantar/ Rekomendasi Lurah dan Camat tentang berdirinya bangunan.</li> <li>Rekomendasi dinas/ instansi terkait.</li> <li>Fotokopi Akte Jual Beli</li> <li>Fotokopi IMB lama sebelum renovasi.Fotocopy izin pemanfaatan ruang.</li> </ul> <p>Setelah semua dokumen yang diperlukan telah lengkap, bisa langsung mendatangi kantor Badan Pelayanan Terpadu Satu Pintu (BTSP) di masing-masing wilayah. Beberapa hari kemudian, petugas akan datang untuk memeriksa dan memastikan kesesuaian dokumen dengan fakta di lapangan. Setelah itu, bila dokumen dinyatakan tidak bermasalah, lakukan pembayaran ke loket dan ambil papan IMB untuk dipasang di depan rumah yang sedang direnovasi. Biasanya, IMB renovasi akan selesai dalam waktu kurang lebih 14 hari setelah melakukan pembayaran.</p> <p>Bila ingin lebih nyaman merenovasi rumah, Sobat Bangun memberikan kemudahan untuk melakukan renovasi dengan kontraktor yang profesional dan terpercaya, yang juga dapat memberikan bantuan untuk mengurus proses pembaruan IMB.</p> <p>Dapatkan keterangan lebih lanjut tentang renovasi rumah bersama Sobat Bangun <u>disini</u>.</p> ',
            'url'  => "panduan-pemula-untuk-izin-renovasi-rumah",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('blog')->insert([
            'title'  => "Perkiraan Biaya Renovasi Dapur",
            'image_path' => "storage/Images/blog/Dapur.jpg",
            'show' => 1,
            'content' => '<p>Selain ruang keluarga, dapur biasanya menjadi ruang kesayangan. Bagi yang gemar memasak, dapur serupa ruang eksperimen, tempat mencurahkan berbagai kreativitas. Dapur yang diinginkan pastilah yang leluasa untuk berkarya, dengan fungsi-fungsi yang sempurna dari masing-masing perangkatnya. Ketika dirasa tak lagi memadai, kebutuhan renovasi dapur pun tak bisa ditunda.</p> <p>&nbsp;</p> <p>Belajar dari kesalahan sebelumnya, mari kita cek, bagian mana saja yang sebelumnya terjadi kesalahan atau ketidaktepatan dalam pembangunannya.</p> <p>&nbsp;</p> <p><b>Warna </b></p> <p>Warna apa yang digunakan selama ini? Apakah cenderung ke gelap? Saat akan melakukan renovasi dapur, warna yang lebih terang dapat menjadi pilihan. Warna pastel dapat menjadi pilihan yang tepat. Tidak gelap tapi juga tak terlalu terang. Warna pastel memuncul kan rasa nyaman, baik saat memasak maupun saat menikmati hasil masakan.</p> <p>&nbsp;</p> <p>Warna baru dapat pula diterapkan pada perabot, misalnya kabinet atau lemari penyimpanan. Tanpa perlu menganti dengan perabot baru, ada perubahan suasana dengan penggantian warna yang tepat.</p> <p>&nbsp;</p> <p><b>Ventilasi dan Pencahayaan</b></p> <p>Dengan segala ‘kesibukannya’ terkait asap, sudah sewajarnya dapur memiliki ventilasi yang baik. Selain untuk sirkulasi udara, juga memudahkan pencahayaan dengan sinar alami dari matahari. Dapur lebih terang dan hemat listrik.</p> <p>&nbsp;</p> <p>Kalau sebelumnya ventilasi hanya berupa celah-celah terbatas, pada agenda renovasi kali ini dapat disiapkan jendela sebagai pengganti.</p> <p>&nbsp;</p> <p><b>Pilih Perangkat yang Prima dan Tepat</b></p> <p>Aktivitas dapur tak jauh dari urusan kotor-kotor. Dari ceceran bahan masakan, minyak, air bekas cucian, dan lain-lain yang mensyaratkan perangkatnya tahan panas, tak cepat rusak, tak mudah lapuk atau berkarat. Pilihan perangkat yang memadai lebih disarankan agar tak sering dilakukan perbaikan.</p> <p>&nbsp;</p> <p>Perubahan atau penggantian perangkat tetap perlu dilakukan saat ada anggota keluarga baru yang membutuhkan perhatian ekstra. Misalnya lahirnya anak-anak, atau orang tua yang harus ekstra hati-hati terhadap perangkat tertentu. Hal-hal tersebut juga perlu dijadikan pertimbangan saat merencanakan renovasi dapur.</p> <p>&nbsp;</p> <p><b>Meniadakan Pembatas Ruang</b></p> <p>Dapur yang nyaman adalah yang kita bisa leluasa bergerak. Jika selama ini dapur memiliki sekat-sekat pembatas, sebaiknya ditiadakan. Dengan demikian dapur mungil terlihat lebih longgar dan nyaman. Jika masih membutuhkan pembatas demi kepentingan estetika, dapat dipilih sekat-sekat tak permanen yang bisa dipindahkan sesuai kebutuhan.</p> <p>&nbsp;</p> <p><b>Mengoptimalkan Pemanfaatan Dinding </b></p> <p>Kalau selama ini aneka perlengkapan masak tersimpan rapi dalam lemari, mari lirik bagian dinding mana yang masih bisa dimanfaatkan. Selain mengoptimalkan pemakaian dinding, juga dapat menjadi aksen pemanis. Misalnya dengan menambahkan keramik bermotif bunga atau buah sebagai latar rak gantung atau rak dinding.</p> <p>&nbsp;</p> <p><b>Mengacu </b><b>ke</b><b>pada Konsep Minimalis</b></p> <p>Mengapa minimalis? Selain masih jadi tren, juga karena konsep minimalis lebih efisien. Kalaupun rumah secara keseluruhan tak berkonsep minimalis, paling tidak aturannya bisa diberlakukan di dapur mungil Anda. Misalnya dengan mengeleminasi perabot berukuran besar dan menggantinya dengan yang lebih mini. Perabot berukuran besar hanya akan menjadikan dapur terlihat sesak. Dekorasi juga tak perlu berlebihan. Pertahankan yang sekiranya masih memberi jiwa pada dapur Anda.</p> <p>&nbsp;</p> <p>Dengan gambaran di atas, kira-kira berapa biaya yang untuk melakukan renovasi dapur? Jika dibuat perkiraannya, maka cara renovasi dapur biaya murah di bawah Rp 5 juta memiliki rincian sebagai berikut:</p> <p>&nbsp;</p> <ul> <li>Cat tembok dan kabinet: Rp 400 ribu</li> <li>Keramik dinding: Rp 200 ribu</li> <li>Rak dinding atau rak gantung: Rp 300 ribu</li> <li>Pembatas ruang nonpermanen: Rp 400 ribu</li> <li>Bingkai jendela dan biaya pasang: Rp 1,2 juta</li> </ul> <p>&nbsp;</p> <p><b>Total: Rp 2,5 juta</b></p> <p>&nbsp;</p> <p>Bagaimana kira-kira, masih masuk budget untuk melakukan renovasi dapur tahun ini?</p>',
            'url'  => "perkiraan-biaya-renovasi-dapur",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}