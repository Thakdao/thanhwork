<?php
$page = 'homepage';
include realpath(__DIR__ . '/config/include.php');
?>
<?php if (file_exists(LOCATION_ROOT_DIR . '/mobile_thumbnail.jpg') && $modern) : ?>
    <?php
    // モバイルサムネールの画像サイズ
    $mobile_thumb_width = 100;
    $mobile_thumb_height = 130;
    ?>
    <PageMap>
        <DataObject type="thumbnail">
            <Attribute name="src" value="<?php echo LOCATION . 'mobile_thumbnail.jpg'; ?>" />
            <Attribute name="width" value="<?php echo $mobile_thumb_width; ?>" />
            <Attribute name="height" value="<?php echo $mobile_thumb_height; ?>" />
        </DataObject>
    </PageMap>
    <meta name="thumbnail" content="<?php echo LOCATION . 'mobile_thumbnail.jpg'; ?>" />
<?php endif; ?>
<!-- *** stylesheet *** -->
<?php include LOCATION_ROOT_DIR . "/templates/common_css.php"; ?>
<link href="<?php echo echo_version(LOCATION_FILE . 'css/homepage.css', LOCATION_FILE_DIR); ?>" rel="stylesheet" media="all">
<!-- *** javascript *** -->
<?php include LOCATION_ROOT_DIR . "/templates/common_js.php"; ?>
<script src="<?php echo echo_version(LOCATION_FILE . 'js/homepage.min.js', LOCATION_FILE_DIR); ?>"></script>
</head>

<body id="<?php echo $page; ?>">
    <?php include LOCATION_ROOT_DIR . "/templates/gtm.php"; ?>
    <div id="container">
        <?php include LOCATION_ROOT_DIR . "/templates/header.php"; ?>
        <div class="con_mv inview_fadeIn">
            <div class="box_mv">
                <p><img src="./files/images/home/img_mv.png" alt=""></p>
            </div>
        </div>
        <main id="contents">
            <div class="con_intro inview_fadeIn" id="lnk_intro">
                <section class="st_intro">
                    <h2 class="st_basic">About Me
                    </h2>
                </section>
                <section class="box_intro inview_fadeIn">
                    <div class="box_info">
                        <h3 class="st_medium">
                            <i class="fa-solid fa-user-tie"></i>　インフォメーション
                        </h3>
                        <p class="txt_basic">
                            初めて！ グエン　ハー　タンと申します。<br>
                            ベトナムのハノイから参りました。2016に留学生として日本に来ました。日本語学校を卒業してから
                            今岡山県に中国短期大学の情報ビジネス科を勉強しています。2020年3月に卒業予定です。学生時代
                            からWEBに興味を持ち、Web関係の仕事に就きたいと思っていました。
                       <br><br>
                ▼　簡単な自己紹介<br>
                ベトナムのハノイから参りました。2016に留学生として日本に来ました。日本語学校を卒業して岡山県の中国短期大学の情報ビジネス科を勉強しました。2020年3月に卒業しました。<br>学生時代からWEBに興味を持ち、新しいスキルを吸収するのが好きなので、これからも向上心を持って素敵なサイトを作っていきます！

              </p>
                        <br><br>

                    </div>
                    <div class="box_history">
                        <h3 class="st_medium">
                            <i class="fa-solid fa-graduation-cap"></i>　学歴・職歴
                        </h3>
                        <div class="box_table " >
                            <table>
<th>2016年</th>
                                    <td>来日<br>岡山外語学院　入学</td>
                                </tr>
                                <tr>
                                    <th>2018年4月</th>
                                    <td>岡山外語学院　卒業<br>中国短期大学 情報ビジネス学科 入学</td>
                                </tr>
                                <tr>
                                    <th>2019年9月</th>
                                    <td>株式会社ｱﾋﾞﾘﾌﾞ　内定を得る「<a target="_blank" href="https://www.ab-net.co.jp/">ｱﾋﾞﾘﾌﾞのホームページ</a>」</td>
                                </tr>
                                <tr>
                                    <th>2020年3月</th>
                                    <td>中国短期大学 情報ビジネス学科 卒業 <a href="./files/images/home/seiseki.jpg" class="retina-modal">成績を見る</a></td>
                                </tr>
                                <tr>
                                    <th>2020年4月</th>
                                    <td>株式会社ｱﾋﾞﾘﾌﾞ 入社(現在に至る)</td>
                                </tr>
                               
                            </table>
                        </div>

                    </div>
                </section>
            </div>
            <div class="con_skill inview_fadeIn" id="lnk_skill">
                <h2 class="st_basic">Skill
                </h2>
                <div class="box_skill inview_fadeIn">

                    <ul class="list_skill">
                        <li>
                            <p class="ic"><i class="fa-solid fa-language"></i></p>
                            <p>JLPT　2級（N2）</p>
                        </li>
                        <li>
                            <p class="ic"><i class="fa-brands fa-php"></i></p>
                            <p>PHP(Laravel 基本)</p>
                        </li>
                        <li>
                            <p class="ic"><i class="fa-brands fa-html5"></i></p>
                            <p>HTML5</p>
                        </li>
                        <li>
                            <p class="ic"><i class="fa-brands fa-css3-alt"></i></p>
                            <p>CSS3</p>
                        </li>
                        <li>
                            <p class="ic"><i class="fa-brands fa-js"></i></p>
                            <p>Javascript(Jquery)</p>
                        </li>
                        <li>
                            <p class="ic"><i class="fa-brands fa-sass"></i></p>
                            <p>Sass</p>
                        </li>

                        <li>
                            <p class="ic"><i class="fa-brands fa-node"></i></p>
                            <p>NodeJS(基本)</p>
                        </li>
                        <li>
                            <p class="ic"><i class="fa-brands fa-react"></i></p>
                            <p>React(自学中)</p>
                        </li>
                        <li>
                            <p class="ic"><i class="fa-brands fa-git-alt"></i></p>
                            <p>Git</p>
                        </li>


                        <li>
                            <p class="ic"><i class="fa-solid fa-file-image"></i></p>
                            <p>Photoshop</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="con_work inview_fadeIn" id="lnk_work">
                <h2 class="st_basic">Work
                </h2>

                <ul class="box_work ">
                    <li class="box_item inview_fadeIn">
                        <a class="over" href="https://nomon-nagasaki.jp/" target="_blank">
                            <p class="img_work"><img src="./files/images/home/img_work_01.png" alt=""></p>
                            <div class="box_txt">
                                <h4 class="st_small">Nomon長崎</h4>
                                <p class="catch">長崎県 長崎市</p>
                                <p class="tag"><span>Web</span></p>
                            </div>
                        </a>
                    </li>
                    <li class="box_item inview_fadeIn">
                        <a class="over" href="https://www.kafuu-okinawa.jp/" target="_blank">
                            <p class="img_work"><img src="./files/images/home/img_work_02.png" alt=""></p>
                            <div class="box_txt">
                                <h4 class="st_small">カフーリゾートフチャク コンド・ホテル</h4>
                                <p class="catch">沖縄県 国頭郡</p>
                                <p class="tag"><span>Web</span></p>
                            </div>
                        </a>
                    </li>
                    <li class="box_item inview_fadeIn">
                        <a class="over" href="https://www.hotespa.net/hotels/kaisyu/" target="_blank">
                            <p class="img_work"><img src="./files/images/home/img_work_03.png" alt=""></p>
                            <div class="box_txt">
                                <h4 class="st_small">浜千鳥の湯　海舟</h4>
                                <p class="catch">和歌山県 白浜温泉</p>
                                <p class="tag"><span>Web</span></p>
                            </div>
                        </a>
                    </li>
                    <li class="box_item inview_fadeIn">
                        <a class="over" href="https://royalview-churaumi.com/" target="_blank">
                            <p class="img_work"><img src="./files/images/home/img_work_04.png" alt=""></p>
                            <div class="box_txt">
                                <h4 class="st_small">センチュリオンホテル ・沖縄美ら海</h4>
                                <p class="catch">沖縄県 国頭郡</p>
                                <p class="tag"><span>Web</span></p>
                            </div>
                        </a>
                    </li>
                    <li class="box_item inview_fadeIn">
                        <a class="over" href="https://www.coral-hotel.co.jp/en/" target="_blank">
                            <p class="img_work"><img src="./files/images/home/img_work_05.png" alt=""></p>
                            <div class="box_txt">
                                <h4 class="st_small">宮島コーラルホテル</h4>
                                <p class="catch">広島県 廿日市市</p>
                                <p class="tag"><span>Web</span>　<span>EN</span></p>
                            </div>
                        </a>
                    </li>
                    <li class="box_item inview_fadeIn">
                        <a class="over" href="https://www.o-bje.net/" target="_blank">
                            <p class="img_work"><img src="./files/images/home/img_work_06.png" alt=""></p>
                            <div class="box_txt">
                                <h4 class="st_small">大分県「おおいた芸術文化の旅 OITA Art&Culture」</h4>
                                <p class="catch">大分県 大分市</p>
                                <p class="tag"><span>Web</span></p>
                            </div>
                        </a>
                    </li>
                    <li class="box_item inview_fadeIn">
                        <a class="over" href="https://www.seiryuu.jp/" target="_blank">
                            <p class="img_work"><img src="./files/images/home/img_work_07.png" alt=""></p>
                            <div class="box_txt">
                                <h4 class="st_small">嬉野温泉 湯宿 清流</h4>
                                <p class="catch">佐賀県 嬉野温泉</p>
                                <p class="tag"><span>Web</span></p>
                            </div>
                        </a>
                    </li>
                    <li class="box_item inview_fadeIn">
                        <a class="over" href="https://www.hotespa.net/hotels/umekoji_kadensho/" target="_blank">
                            <p class="img_work"><img src="./files/images/home/img_work_08.png" alt=""></p>
                            <div class="box_txt">
                                <h4 class="st_small">京都嵐山温泉 花伝抄</h4>
                                <p class="catch">京都府 嵐山温泉</p>
                                <p class="tag"><span>Web</span></p>
                            </div>
                        </a>
                    </li>
                    <li class="box_item inview_fadeIn">
                        <a class="over" href="https://www.nishiwaki-royalhotel.jp/" target="_blank">
                            <p class="img_work"><img src="./files/images/home/img_work_09.png" alt=""></p>
                            <div class="box_txt">
                                <h4 class="st_small">西脇ロイヤルホテル</h4>
                                <p class="catch">兵庫県 西脇市</p>
                                <p class="tag"><span>Web</span></p>
                            </div>
                        </a>
                    </li>
                    <li class="box_item inview_fadeIn">
                        <a class="over" href="https://www.hotel-sevencolors.com/northern_ishigaki/" target="_blank">
                            <p class="img_work"><img src="./files/images/home/img_work_10.png" alt=""></p>
                            <div class="box_txt">
                                <h4 class="st_small">SevenColors 石垣島</h4>
                                <p class="catch">沖縄県 石垣市</p>
                                <p class="tag"><span>Web</span></p>
                            </div>
                        </a>
                    </li>
                    <li class="box_item inview_fadeIn">
                        <a class="over" href="https://nakatsugawaonsen.com/hanasarasa/" target="_blank">
                            <p class="img_work"><img src="./files/images/home/img_work_11.png" alt=""></p>
                            <div class="box_txt">
                                <h4 class="st_small">ホテル花更紗</h4>
                                <p class="catch">岐阜県 中津川温泉</p>
                                <p class="tag"><span>Web</span></p>
                            </div>
                        </a>
                    </li>
                    <li class="box_item inview_fadeIn">
                        <a class="over" href="https://animal-center.hospital/" target="_blank">
                            <p class="img_work"><img src="./files/images/home/img_work_01.jpg" alt=""></p>
                            <div class="box_txt">
                                <h4 class="st_small">中部動物医療センター</h4>
                                <p class="catch">沖縄県 沖縄市</p>
                                <p class="tag"><span>Web</span></p>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="con_contact inview_fadeIn" id="lnk_ct">
                <h2 class="st_basic ">Contact
                </h2>
                <!-- <div class="box_contact">
                    <p class="txt_basic">
                        住所：大阪市<br>Tel：090-9738-6789<br>メール：thanhnh140393@gmail.com<br>Website :
                    </p>
                </div> -->
                <p class="txt_basic inview_fadeIn">TEl：<a href="tel:090-9738-6789">090-9738-6789 </a></p>
                <p class="btn_basic inview_fadeIn"><a href="m&#97;i&#108;t&#111;:&#116;h&#97;&#107;&#100;&#97;&#111;&#64;&#103;&#109;a&#105;l&#46;&#99;&#111;m"><span><i class="far fa-envelope"></i>メールでのお問い合わせ</span></a></p>

            </div>
            <div class="con_photo inview_fadeIn" id="lnk_photo">
                <h2 class="st_basic">Photo Gallery
                </h2>
                <p class="center txt_basic">趣味は写真撮影、色んなところに行って写真で残したいと思っています。</p>
                <div class="box_slide">
                    <p><img src="./files/images/home/img_slide.jpg" alt=""></p>
                    <p><img src="./files/images/home/img_slide_02.jpg" alt=""></p>
                    <p><img src="./files/images/home/img_slide_03.jpg" alt=""></p>
                    <p><img src="./files/images/home/img_slide_04.jpg" alt=""></p>
                    <p><img src="./files/images/home/img_slide_05.jpg" alt=""></p>
                    <p><img src="./files/images/home/img_slide_06.jpg" alt=""></p>
                    <p><img src="./files/images/home/img_slide_07.jpg" alt=""></p>
                    <p><img src="./files/images/home/img_slide_08.jpg" alt=""></p>
                    <p><img src="./files/images/home/img_slide_09.jpg" alt=""></p>
                    <p><img src="./files/images/home/img_slide_10.jpg" alt=""></p>
                    <p><img src="./files/images/home/img_slide_11.jpg" alt=""></p>
                    <p><img src="./files/images/home/img_slide_12.jpg" alt=""></p>
                </div>
            </div>

        </main><!-- /#contents -->
        <?php include LOCATION_ROOT_DIR . "/templates/footer.php"; ?>
    </div>
    <!-- #abi_page -->
</body>

</html>