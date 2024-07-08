<?php
/*
    Name: Multi TV
    Version: 1.7
    Author: Mert S. Kaplan, mail@mertskaplan.com & Ramazan Sancar, me@ramazansancar.com.tr
    Licence: MIT Licence - https://github.com/ramazansancar/mertskaplan_multitv/blob/main/LICENSE
    Source: https://github.com/ramazansancar/mertskaplan_multitv
*/
    $type = isset($_GET['type']) ? $_GET['type'] : null;
    $footer = "";

    if (isset($_GET['cn']) && (isset($_GET['ci']) || isset($_GET['cu']))) {
        $channels = array();
        foreach ($_GET['cn'] as $key => $cn) {
            if((!empty($_GET['ci'][$key]) || !empty($_GET['cu'][$key])) && !empty($cn)){
                $channels[$cn] = ["channelId" => $_GET['ci'][$key], "username" => $_GET['cu'][$key]];
            }else{
                continue;
            }
        }
    } else {
        switch($type) {
            case 'siyasi':
            case 'siyasiler':
            case 'siyaset':
            case 'siyasal':
            case 'politik':
            case 'politikacı':
            case 'politikaci':
            case 'politikacilar':
            case 'politikacılar':
                $footer = 'Sadece aktif olan siyasetçiler listelenmiştir. Eklenmesini istediğiniz politikacılar için <a href="https://github.com/ramazansancar/mertskaplan_multitv/issues/new">buraya</a> tıklayarak bize ulaşabilirsiniz.';
                $channels = array(
                    "Recep Tayyip Erdoğan" => ["channelId" => "UCiHR69jCQX8uoH-B1tX6lzg", "username" => "rterdogan"],
                    "Ekrem İmamoğlu" => ["channelId" => "UCT0byua4qIz2wtrmnXoPK6w", "username" => "ekremimamoglu"],
                    "Mansur Yavaş" => ["channelId" => "UCP2jBXRfDT1O329VM5C3UIg", "username" => "mansuryavastv"],
                    "Meral Akşener" => ["channelId" => "UCULiRMkz6c41XujDO4j0SCw", "username" => "meralaksener"],
                    "Ahmet Davutoğlu" => ["channelId" => "UCkgZUB4RvfmxAogR9a5Y-RA", "username" => "AhmetDavutoglu"],
                    "Ali Babacan" => ["channelId" => "UC4J1GxksowPUpvhGAuR_N6A", "username" => "alibabacan"],
                    "Muharrem İnce" => ["channelId" => "UCgZgM-vNF7jzZz2b0o63hHQ", "username" => "MuharremInceCB"],
                    //"Devlet Bahçeli" => ["channelId" => "", "username" => ""], // Kanal yok!
                    "Kemal Kılıçdaroğlu" => ["channelId" => "UCi9nvUMXpyT-jws9axiFyKw", "username" => "kemalkilicdaroglu"],
                    //"Temel Karamollaoğlu" => ["channelId" => "", "username" => "temelkaramollaoglu"], // Kanal yok!
                    //"Selahattin Demirtaş" => ["channelId" => "", "username" => "selahattindemirtas"], // Kanal yok!
                );
                break;
            
            case 'parti':
            case 'partiler':
                $footer = 'Sadece aktif olan siyasi partiler listelenmiştir. Eklenmesini/aktif edilmesini istediğiniz partiler için <a href="https://github.com/ramazansancar/mertskaplan_multitv/issues/new">buraya</a> tıklayarak bize ulaşabilirsiniz.';
                # Kaynak: https://www.yargitaycb.gov.tr/documents/ek-1711443302.pdf | https://www.yargitaycb.gov.tr/item/1088/faaliyette-olan-siyasi-partiler
                $channels = array(
                    // # Aktif olmayanlar
                    "Demokrat Parti (DP)" => ["channelId" => "UCu-bqQCx6GJry6glbuanLIA", "username" => ""],
                    "Milliyetçi Hareket Partisi (MHP)" => ["channelId" => "UCoggvEhFysDZL6TI9GDmUBw", "username" => "milliyetcihareketpartisi"],
                    #"Millet Partisi (MİLLET)" => ["channelId" => "UCqLvbGY25ysHw2NPvw87VRA", "username" => "milletpartisi"],
                    "Demokratik Sol Parti (DSP)" => ["channelId" => "UCnYvAMSLFtH8dshD9lHlWow", "username" => ""],
                    #"Vatan Partisi (VATAN)" => ["channelId" => "UCE3W1rzzMDNikysE1ocwA2A", "username" => "vatanpartisi"],
                    "Cumhuriyet Halk Partisi (CHP)" => ["channelId" => "UC1CwT6tO2cvwkuviGSqDUog", "username" => "chpgenelmerkezi"],
                    #"Genç Parti (GENÇPARTİ)" => ["channelId" => "UC4JAiEopGNFGlNm1lXUbPlA", "username" => ""],
                    #"Türkiye Sosyalist İşçi Partisi (TSİP)" => ["channelId" => "UCn1VSOAsNUsiHQGGvZCQAsw", "username" => ""], // Kanal yok!
                    "Büyük Birlik Partisi (BÜYÜK BİRLİK)" => ["channelId" => "UC8yJfQB9b5yylAFDY2QJfGA", "username" => "bbpgenelmerkezi"],
                    "Türkiye Komünist Partisi (TKP)" => ["channelId" => "UC376ZDYhRghmbXPQvqFnhNQ", "username" => "TurkiyeKomunistPartisi"],
                    #"Sol Parti (SOL PARTİ)" => ["channelId" => "UCOrhAHBvzE07n9p7bENCzvg", "username" => ""],
                    #"Liberal Demokrat Parti (LDP)" => ["channelId" => "UC2_ct-6Mn77YlqqsYB4I4xg", "username" => "LiberalDemokratParti"],
                    #"Emek Partisi (EMEP)" => ["channelId" => "UC4YBQxKkQ-gDXp-WTPqbYLA", "username" => "emekpartisi"],
                    //"Devrimci Sosyalist İşçi Partisi (DSİP)" => ["channelId" => "", "username" => ""], // Kanal yok!
                    #"Teknoloji Kalkınma Partisi (TEK PARTİ)" => ["channelId" => "UCBIGJvIeYXKwhrRE49f_gmw", "username" => ""],
                    "Saadet Partisi (SAADET)" => ["channelId" => "UCTVlW56P24ITK0BwPKpeGow", "username" => "SaadetPartisiTV"],
                    "Adalet Ve Kalkınma Partisi (AK PARTİ)" => ["channelId" => "UCiHR69jCQX8uoH-B1tX6lzg", "username" => "akparti"],
                    "Bağımsız Türkiye Partisi (BTP)" => ["channelId" => "UCRBaQUa3JsbuqHOW80MLfKg", "username" => "BagmszTurkiyePartisi"],
                    #"Hak Ve Özgürlükler Partisi (HAK-PAR)" => ["channelId" => "UCvPVWClAjEJ6WA2pz0f6HbA", "username" => ""],
                    #"Yurt Partisi (YURT-P)" => ["channelId" => "UCFydYr01ATYWrpLvtH2-fRQ", "username" => ""],
                    #"Bağımsız Cumhuriyet Partisi (BCP)" => ["channelId" => "UCQt6BXKZF6tR1HSqOOv8V2g", "username" => "bagimsizcumhuriyetpartisi"],
                    //"Sağduyu Partisi (SAGDUYU)" => ["channelId" => "", "username" => ""], // Kanal yok!
                    //"Ayyıldız Partisi (AYP)" => ["channelId" => "", "username" => ""], // Kanal yok!
                    #"Emekçi Hareket Partisi (EHP)" => ["channelId" => "UCAf3OM3GwHZFwodDPjL6iCg", "username" => "EmekciHareketPartisiEHP"],
                    #"Halkin Kurtuluş Partisi (HKP)" => ["channelId" => "UCEfCoZUPm032rQD49X_EcsQ", "username" => "TvKurtulus1"],
                    //"Müdafaa-i Hukuk Hareketi Partisi (MHHP)" => ["channelId" => "", "username" => ""], // Kanal yok! Olabilir ChId: UCCqmf4a1UFATcerzwk9EWRg
                    #"İşçinin Kendi Partisi (İKEP)" => ["channelId" => "UCAcPFjLA1BPU6EZ5DoivVBA", "username" => ""],
                    #"Yüce Diriliş Partisi (YÜCE DİRİ-P)" => ["channelId" => "UCz_NEUHfcxE1sAQceM_N9tw", "username" => ""],
                    //"Doğru Yol Partisi (DYP)" => ["channelId" => "", "username" => ""], // Kanal yok!
                    //"Devrimci İşçi Partisi (DİP)" => ["channelId" => "", "username" => ""], // Kanal yok!
                    //"Ebedi Nizam Partisi (ENPA)" => ["channelId" => "", "username" => ""], // Kanal yok!
                    #"Demokratik Bölgeler Partisi (DBP)" => ["channelId" => "UCvmCHkrekohyRLDs0VQ6fiw", "username" => "DBPDemokratikBolgelerPartisi"],
                    #"Hak Ve Hakikat Partisi (HAK PARTİ)" => ["channelId" => "UCwwvIJjqWbzuXwmLm0lrpYw", "username" => ""],
                    //"Ezilenlerin Sosyalist Partisi (ESP)" => ["channelId" => "", "username" => ""], // Kanal yok!
                    //"Ulusal Parti (ULUSAL PARTİ)" => ["channelId" => "", "username" => ""], // Kanal yok!
                    #"Anavatan Partisi (ANAVATAN)" => ["channelId" => "UCSGdzOr8-NLedcQR9VxbHbw", "username" => "AnavatanPartisi1983"],
                    #"Özgürlük Ve Sosyalizm Partisi (ÖSP)" => ["channelId" => "UCYFcPUhR1KU-oxo2K9KQ8Dg", "username" => ""],
                    //"Hak Ve Adalet Partisi (HAP)" => ["channelId" => "", "username" => ""], // Kanal yok!
                    //"Halklarin Demokratik Partisi (HDP)" => ["channelId" => "UCcR5J5hmVJEgbEWxMcTep0w", "username" => "DEMGenelMerkezi"], // İsmi DEM ile değişti.
                    "Halklarin Eşitlik Ve Demokrasi Partisi (DEM Parti)" => ["channelId" => "UCcR5J5hmVJEgbEWxMcTep0w", "username" => "DEMGenelMerkezi"],
                    // --- Yayın yok! ---- //"Hür Dava Partisi (HÜDA PAR)" => ["channelId" => "UC40AyQESu_fuAmVwxxp5S0g", "username" => "HUDAPARHurDavaPartisi"],
                    #"Yeni Türkiye Partisi (YTP)" => ["channelId" => "UC0QCCcLLdQEpH321ZU7uKTQ", "username" => "YTPYoutube"],
                    #"Sosyalist Yeniden Kuruluş Paritsi (SYKP)" => ["channelId" => "UCWysMt4kOJ8HFV29MfnfuRQ", "username" => "SYKPGenelMerkez"],
                    #"Kadın Partisi (KP)" => ["channelId" => "UCMppSChyEdgrvohCeiAdO4g", "username" => "KadinPartisi"],
                    #"Turan Hareketi Partisi (TURAN)" => ["channelId" => "UCr5PRP0gofOIY-QITCLQ-3A", "username" => "TuranHareketiPartisiOfficial"],
                    #"Merkez Parti (MEP)" => ["channelId" => "UCpMog9DeHu1zBK73i9UrSjw", "username" => "MerkezPartiOfficial"],
                    //"Hak Ve Huzur Partisi (HHP)" => ["channelId" => "", "username" => ""], // Kanal yok!
                    //"Komünist Parti" => ["channelId" => "", "username" => ""], // Kanal yok!
                    //"Cihan Partisi (CİHAN PARTİSİ)" => ["channelId" => "", "username" => ""], // Kanal yok!
                    //"Çoğulcu Demokrasi Partisi (ÇDP)" => ["channelId" => "", "username" => ""], // Kanal yok!
                    /* ! TODO: Kontrol edilecek!
                    "Türkiye Ekonomi Ve Kalkınma Partisi (TEKP)" => ["channelId" => "", "username" => ""],
                    "Milli Mücadele Partisi (MMP)" => ["channelId" => "", "username" => ""],
                    "As Parti (ASP)" => ["channelId" => "", "username" => ""],
                    "İşçi Demokrasisi Partisi (İDP)" => ["channelId" => "", "username" => ""],
                    "Türkiye Komünist Hareketi (TKH)" => ["channelId" => "", "username" => ""],
                    "Birleşik Devrimci Parti (DEVRİMCİ PARTİ)" => ["channelId" => "", "username" => ""],
                    "Adalet Partisi (AP)" => ["channelId" => "", "username" => ""],
                    "Sosyalist Emekçiler Partisi (SEP)" => ["channelId" => "", "username" => ""],
                    "Demokrasi Zamani Partisi (DEZA - PAR)" => ["channelId" => "", "username" => ""],
                    "Osmanli Partisi" => ["channelId" => "", "username" => ""],
                    "Güven Adalet Ve Aydınlık Partisi (GAAP)" => ["channelId" => "", "username" => ""],*/
                    "İyi Parti (İYİ PARTİ)" => ["channelId" => "UCBY4GZ847-UqlJcSCxN7BtA", "username" => "iyiparti"],
                    "Türkiye İşçi Partisi (TİP)" => ["channelId" => "UCdz16x_67E4vTvYcbl0qgww", "username" => "TIPGenelMerkez"],
                    #"Ötüken Birliği Partisi (ÖTÜKEN)" => ["channelId" => "", "username" => ""],
                    #"Adalet Birlik Partisi (AB PARTİ)" => ["channelId" => "", "username" => ""],
                    "Yeniden Refah Partisi (YENİDEN REFAH)" => ["channelId" => "", "username" => ""],
                    #"Ülkem Partisi (ÜLKEM)" => ["channelId" => "", "username" => ""],
                    "Gelecek Partisi (GELECEK PARTİSİ)" => ["channelId" => "UCiiB5B9F9vmvyX8iKaFV5TA", "username" => "GelecekPartisiTR"],
                    #"Anadolu Birliği Partisi (ABP)" => ["channelId" => "", "username" => ""],
                    #"Aydınlık Geleceğin Partisi (AYGİP)" => ["channelId" => "", "username" => ""],
                    #"Merkez Ana Partisi (MAP)" => ["channelId" => "", "username" => ""],
                    #"Bariş Ve Eşitlik Partisi (BEP)" => ["channelId" => "", "username" => ""],
                    #"Güç Birliği Partisi (GBP)" => ["channelId" => "", "username" => ""],
                    "Demokrasi Ve Atilim Partisi (DEVA PARTİSİ)" => ["channelId" => "", "username" => ""],
                    #"Toplumsal Özgürlük Partisi (TÖP)" => ["channelId" => "", "username" => ""],
                    #"Yenilik Partisi (YP)" => ["channelId" => "", "username" => ""],
                    #"Cumhuriyet Ve istiklal Partisi (CİP)" => ["channelId" => "", "username" => ""],
                    #"Güzel Parti" => ["channelId" => "", "username" => ""],
                    #"Doğru Parti (DOğRU PARTİ)" => ["channelId" => "", "username" => ""],
                    #"Ocak Partisi (OCAK)" => ["channelId" => "", "username" => ""],
                    #"Milli Parti" => ["channelId" => "", "username" => ""],
                    #"Devlet Partisi" => ["channelId" => "", "username" => ""],
                    #"Milliyetçi Cumhuriyet Partisi" => ["channelId" => "", "username" => ""],
                    #"Devrim Hareketi" => ["channelId" => "", "username" => ""],
                    #"Vatan Ve Hürriyet Partisi" => ["channelId" => "", "username" => ""],
                    #"Türkiye ittifaki Partisi" => ["channelId" => "", "username" => ""],
                    #"Sevgi Ve Saygi Partisi" => ["channelId" => "", "username" => ""],
                    #"Doğuş Partisi" => ["channelId" => "", "username" => ""],
                    #"Cumhuriyet Ve Adalet Partisi" => ["channelId" => "", "username" => ""],
                    "Memleket Partisi (MEMLEKET)" => ["channelId" => "UCyxWsC79bExABfH4HYq74SA", "username" => "MemleketPartisi"],
                    #"Yeniden Diriliş Partisi" => ["channelId" => "", "username" => ""],
                    #"Tuğra Partisi (TP)" => ["channelId" => "", "username" => ""],
                    #"Aydınlık Demokrasi Partisi" => ["channelId" => "", "username" => ""],
                    "Zafer Partisi" => ["channelId" => "UCyj_RIJNEka5Ff5QTK6qmFw", "username" => "zaferpartisi"],
                    #"Bağımsızlık Partisi (BAP)" => ["channelId" => "", "username" => ""],
                    #"Liberal Parti (LP)" => ["channelId" => "", "username" => ""],
                    #"Milli Birlik Ve Gelişim Partisi" => ["channelId" => "", "username" => ""],
                    #"Adaletin Aydınlığı Partisi (ADAY)" => ["channelId" => "", "username" => ""],
                    #"Vatan Severler Partisi" => ["channelId" => "", "username" => ""],
                    #"Al Sancak Partisi (AL SANCAK)" => ["channelId" => "", "username" => ""],
                    #"Yükseliş Partisi (YÜKSELİŞ)" => ["channelId" => "", "username" => ""],
                    #"Türkiye Gençlik Partisi" => ["channelId" => "", "username" => ""],
                    #"Adalet Ve Özgürlük Partisi" => ["channelId" => "", "username" => ""],
                    #"Milli Yol Partisi (MİLLİ YOL)" => ["channelId" => "", "username" => ""],
                    #"Şahlanış Partisi" => ["channelId" => "", "username" => ""],
                    #"Türkiye'nin Sesi Altınçağ Partisi" => ["channelId" => "", "username" => ""],
                    #"Adalet Ve Demokrasi Partisi (ADEPE)" => ["channelId" => "", "username" => ""],
                    #"Milliyetçi Türkiye Partisi (MTP)" => ["channelId" => "", "username" => ""],
                    #"Kizilelma Partisi (KP)" => ["channelId" => "", "username" => ""],
                    #"Ulusun Partisi (UP)" => ["channelId" => "", "username" => ""],
                    #"Merkez Sağ Parti" => ["channelId" => "", "username" => ""],
                    #"Milliyetçi Sol Parti (MİLLİ SOL)" => ["channelId" => "", "username" => ""],
                    #"Milli Beraberlik Partisi" => ["channelId" => "", "username" => ""],
                    #"Ana Yol Partisi (ANA YOL)" => ["channelId" => "", "username" => ""],
                    #"Büyük iktidar Partisi (Bİ PARTİ)" => ["channelId" => "", "username" => ""],
                    #"Adalet Ve Hürriyet Partisi (AHP)" => ["channelId" => "", "username" => ""],
                    #"Ata Parti (ATA PARTİ)" => ["channelId" => "", "username" => ""],
                    #"İnsan Ve Özgürlük Partisi" => ["channelId" => "", "username" => ""],
                    #"Yerli Ve Milli Parti (YMP)" => ["channelId" => "", "username" => ""],
                    #"Sosyalist Cumhuriyet Partisi (SCP)" => ["channelId" => "", "username" => ""],
                    #"Adil Türkiye Partisi (ATP)" => ["channelId" => "", "username" => ""],
                    #"Umuda Yürüyüş Partisi (UYP)" => ["channelId" => "", "username" => ""],
                    #"Halkin Sesi Partisi" => ["channelId" => "", "username" => ""],
                    #"Türkiye Uyaniş Partisi (TUP)" => ["channelId" => "", "username" => ""],
                    #"Anadolu Medeniyet Partisi (ANA PARTİ)" => ["channelId" => "", "username" => ""],
                    #"Genç Türkiye Partisi (GTP)" => ["channelId" => "", "username" => ""],
                    #"Türkiye Güven Partisi (TGP)" => ["channelId" => "", "username" => ""],
                    #"Türkiye Emekliler Partisi (TEP)" => ["channelId" => "", "username" => ""],
                    #"Turan Partisi (TURAN PARTİSİ)" => ["channelId" => "", "username" => ""],
                    #"Büyük Parti (BP)" => ["channelId" => "", "username" => ""],
                    #"Yeşil Sol Parti (YSP)" => ["channelId" => "", "username" => ""],
                    #"Türkiye'm Partisi (TÜRKİYE'M)" => ["channelId" => "", "username" => ""],
                    #"Küresel Adalet Ve Liyakat Partisi (KALP)" => ["channelId" => "", "username" => ""],
                    #"Cumhuriyet Partisi" => ["channelId" => "", "username" => ""],
                    #"Türkiye Emekliler Ve Çalişanlar Partisi (TEÇP)" => ["channelId" => "", "username" => ""],
                    #"Toplumcu Kurtuluş Partisi (1920 TKP)" => ["channelId" => "", "username" => ""],
                    #"Yeni Yüzyıl Partisi (YENİ YÜZYIL)" => ["channelId" => "", "username" => ""],
                    #"Evrensel Medeniyet Partisi (EMP)" => ["channelId" => "", "username" => ""],
                    #"Güçlü Türkiye Partisi" => ["channelId" => "", "username" => ""],
                );
                break;

            case 'haber':
            case '':
            case null:
            default:
                $footer = 'Sadece aktif olan haber kanalları listelenmiştir. Eklenmesini istediğiniz kanallar için <a href="https://github.com/ramazansancar/mertskaplan_multitv/issues/new">buraya</a> tıklayarak bize ulaşabilirsiniz.';
                $channels = array(
                    "NTV" => ["channelId" => "UC9TDTjbOjFB9jADmPhSAPsw", "username" => "NTV"],
                    //"CNN Türk" => ["channelId" => "UCV6zcRug6Hqp1UX_FdyUeBg", "username" => "cnnturk"], // Diğer uygulamalarda oynatma, video sahibi tarafından devre dışı bırakıldı
                    //"Habertürk" => ["channelId" => "UCn6dNfiRE_Xunu7iMyvD7AA", "username" => "haberturktv"], // Diğer uygulamalarda oynatma, video sahibi tarafından devre dışı bırakıldı
                    "Haber Global" => ["channelId" => "UCtc-a9ZUIg0_5HpsPxEO7Qg", "username" => "haberglobal"],
                    "TRT Haber" => ["channelId" => "UCBgTP2LOFVPmq15W-RH-WXA", "username" => "trthaber"],
                    "A Haber" => ["channelId" => "UCKQhfw-lzz0uKnE1fY1PsAA", "username" => "ahaber"], // telif hakkı sebebiyle kaldırıldı
                    //"A Spor" => ["channelId" => "UCJElRTCNEmLemgirqvsW63Q", "username" => "ASpor"], // telif hakkı sebebiyle kaldırıldı
                    "TV 100" => ["channelId" => "UCndsdUW_oPLqpQJY9J8oIRg", "username" => "tv100"],
                    "Halk TV" => ["channelId" => "UCf_ResXZzE-o18zACUEmyvQ", "username" => "Halktvkanali"],
                    "24 TV" => ["channelId" => "UCN7VYCsI4Lx1-J4_BtjoWUA", "username" => "YirmidortTV"],
                    "TGRT Haber" => ["channelId" => "UCzgrZ-CndOoylh2_e72nSBQ", "username" => "tgrthaber"],
                    "KRT TV" => ["channelId" => "UCVKWwHoLwUMMa80cu_1uapA", "username" => "KRTCANLI"],
                    "TELE 1" => ["channelId" => "UCoHnRpOS5rL62jTmSDO5Npw", "username" => "Tele1comtr"],
                    //"Bloomberg HT" => ["channelId" => "UCApLxl6oYQafxvykuoC2uxQ", "username" => "bloomberght"], // Diğer uygulamalarda oynatma, video sahibi tarafından devre dışı bırakıldı
                    "Ulusal Kanal" => ["channelId" => "UC6T0L26KS1NHMPbTwI1L4Eg", "username" => "ulusalkanalTV"],
                    "TVNET" => ["channelId" => "UC8rh34IlJTN0lDZlTwzWzjg", "username" => "TVNET"],
                    //"Ülke TV" => ["channelId" => "UCi65FGbYYj-OzJm2luB_fNQ", "username" => "ulketv"], // Kanal taşınmış
                    //"Ülke TV Canlı Yayın" => ["channelId" => "UCT1GDGt-pNYZ4E0kanZHUKQ", "username" => "UlkeTVCanliYayin"], // Artık canlı yayınları dailymotion üzerinden yapıyor
                    "Bengü Türk" => ["channelId" => "UChNgvcVZ_ggDdZ0zCcuuzFw", "username" => "tvbenguturk"],
                    //"Kanal D" => ["channelId" => "UCFoe1tg8MuHjRzmqXtV816A", "username" => "kanald"], // Canlı yayın yok!
                    //"Show TV" => ["channelId" => "UC9JMe_We017gYrRc7kZHgmg", "username" => "showtv"], // Diğer uygulamalarda oynatma, video sahibi tarafından devre dışı bırakıldı
                    //"Fox TV" => ["channelId" => "UCJe13zu6MyE6Oueac41KAqg", "username" => "FOXTurkiye"], // Ülke kısıtlaması var (Türkiye için)
                    //"360 TV" => ["channelId" => "UCfqRQZ40fwEdaDWPuR7tvcw", "username" => "tv360"], // YouTube kanalı üzerinden canlı yayın yok!
                    "Ekotürk TV" => ["channelId" => "UCAGVKxpAKwXMWdmcHbrvcwQ", "username" => "EKOTURKTV"],
                    //"beIN Sports Haber" => ["channelId" => "UCPe9vNjHF1kEExT5kHwc7aw", "username" => "beinsportsturkiye"],
                    "SZC TV" => ["channelId" => "UCOulx_rep5O4i9y6AyDqVvw", "username" => "Sozcutelevizyonu"],
                    "medyascope" => ["channelId" => "UCNCVuaQDvPrZ4oTKG90iqOA", "username" => "medyascope_"],
                    "Fatih Altaylı" => ["channelId" => "UCdS7OE5qbJQc7AG4SwlTzKg", "username" => "fatihaltayli"],
                    "Cüneyt Özdemir" => ["channelId" => "UCkwHQ7DWv9aqEtvAOSO74dQ", "username" => "cuneytozdemir"],
                    "Nevşin Mengü" => ["channelId" => "UCrG27KDq7eW4YoEOYsalU9g", "username" => "nevshinmengu"],
                    "Özlem Gürses" => ["channelId" => "UCojOP7HHZvM2nZz4Rwnd6-Q", "username" => "OzlemGursesTV"],
                    "TV5" => ["channelId" => "UCP-0oW3M7DpjmPDutckOjiA", "username" => "TV5televizyon"],
                    "Bi Haber" => ["channelId" => "UCT1QJrOPtGWYyWkXry8uT4w", "username" => "bihabercanli"],
                    "Artı TV" => ["channelId" => "UCxVicskgBc8OD66iLKc7Uaw", "username" => "ArtTv_Resmi"],
                    "Flash Haber TV" => ["channelId" => "UCNcjCb2RnA3eMMhTZSxZu3A", "username" => "FlashHaberTV"],
                    "Cadde TV" => ["channelId" => "UCPTF3NxWzcBD8rNnJuGQOSA", "username" => "Caddetvtr"], // Uzun süredir canlı yayın yok!
                    "Medya Haber TV" => ["channelId" => "UC_KlNwS1QQ9QMPRg9dGNHNw", "username" => "MedyaHaberTV1"],
                );
                break;

            case 'belediye':
            case 'belediyeler':
                $footer = 'Sadece aktif olan belediyeler listelenmiştir. Eklenmesini istediğiniz belediyeler için <a href="https://github.com/ramazansancar/mertskaplan_multitv/issues/new">buraya</a> tıklayarak bize ulaşabilirsiniz.';
                $channels = array(
                    "Ankara Büyükşehir Belediyesi" => ["channelId" => "UCHPDorZxpe9c6WDnXKHCjYA", "username" => "ankarabbld"],
                    "İstanbul Büyükşehir Belediyesi" => ["channelId" => "UCyAn-CGmx_ecg2q0GrhLbcw", "username" => "ibbtvcanli"],
                    "İzmir Büyükşehir Belediyesi" => ["channelId" => "UC1FsIvLFw-ntqAHWm8nEi5A", "username" => "IZMIRBUYUKSEHIRBLD"],
                    "İzmirTube" => ["channelId" => "UC1qGGh33_o-Rdr92J5EBG7w", "username" => "izmirtube"],
                    "ANTALYABBTV" => ["channelId" => "UCIsgWk3dY69jG181YnADFWA", "username" => "ANTALYABBTV"],
                    "Antalya Büyükşehir Belediyesi" => ["channelId" => "UC-KeJeC0RgDrT8zUzd65hXg", "username" => "AntalyaBuyuksehir"],
                    "Bursa Büyükşehir Belediyesi" => ["channelId" => "UCwFMjH2wEekJd06bjISeWSA", "username" => "BursaBuyuksehirBelediyesi16"], // username türkçe karakter olduğu için sorunlu! username: BursaBüyükşehirBelediyesi16
                    "Kayseri Büyükşehir Belediyesi" => ["channelId" => "UC2Eo--ec1_aeEyx3Cd5mItQ", "username" => "kayseribuyuksehirbelediyes9898"],
                    "Muğla Büyükşehir Belediyesi" => ["channelId" => "UC1VVjI1HqtBDAi5rbsz7_Zg", "username" => "muglabsb"],
                    "Samsun Büyükşehir Belediyesi (SBB TV)" => ["channelId" => "UCJu6sZlD_IWjYysIQi2uJhg", "username" => "SBBTV55"],
                    "Manisa Büyükşehir Belediyesi" => ["channelId" => "UCuUyxpMsyXUgXqRsI9-F5eQ", "username" => "ManisaBuyuksehirBldBasnMerkezi"],
                    "Aydın Büyükşehir Belediyesi" => ["channelId" => "UCkIUgqH_Ljcm4G121q31dmw", "username" => "aydinbsb"],
                    "Adana Büyükşehir Belediyesi" => ["channelId" => "UC9jYvuaKeUtzqFlZflYABVA", "username" => "AdanaBB"],
                    "Balıkesir Büyükşehir Belediyesi" => ["channelId" => "UCDsfrMeGmzV59kFDAp5RWng", "username" => "BalkesirBuyuksehirBelediyesi"],
                    "Şanlıurfa Büyükşehir Belediyesi" => ["channelId" => "UC7iAjvULfSx1t2PfXieXYbQ", "username" => "sanliurfabld"],
                    "Sakarya Büyükşehir Belediyesi" => ["channelId" => "UCdiV5FZ2FYK8g3Sq333yO9Q", "username" => "sakaryabld"],
                    "Eskişehir Büyükşehir Belediyesi" => ["channelId" => "UCtpp2WH-fEc2HHseEKpfZDA", "username" => "eskisehirbb"],
                    //"Diyarbakır Büyükşehir Belediyesi" => ["channelId" => "UCqE_QftkN3FBIwstYLEHrFg", "username" => "diyarbakirbld"], // Kanalda yayın yok!
                    "Konya Büyükşehir Belediyesi" => ["channelId" => "UC_4nHId6II3WyrS2dVxOxbA", "username" => "konyabuyuksehirbel"],
                    "Muğla Büyükşehir Belediyesi Canlı Yayın" => ["channelId" => "UC1aQUMwF_DmBOr33n2KGbtA", "username" => "muglabuyuksehirbelediyesi-4150"],
                    "Van Büyükşehir Belediyesi" => ["channelId" => "UCCy_056Xb95il54msxK89_w", "username" => "vanbuyuksehirbelediyesi851"],
                );
                break;
        }
        
        $channels = array_filter($channels);
    }

    $channelSize = (isset($_GET['channelSize'])) ? (int)$_GET['channelSize'] : 9;

    if($channelSize <= 1) {
        $rowClass = 'w-100 h-100 justify-content-center align-items-center m-0';
    } elseif ($channelSize <= 4) {
        $rowClass = 'row row-cols-1 row-cols-sm-2 justify-content-center align-items-center m-0';
    } elseif ($channelSize <= 9) {
        $rowClass = 'row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-center align-items-center m-0';
    } elseif ($channelSize <= 16) {
        $rowClass = 'row row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center align-items-center m-0';
    } else {
        $rowClass = 'row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5 justify-content-center align-items-center m-0';
    }

    $channels = array_slice($channels, 0, $channelSize);
    $autoplay = (!isset($_GET['autoplay']) || $_GET['autoplay'] == 'on') ? 1 : 0;
    $mute = 1;

    function changeChannel($x) {
        global $channelSize;
        if (!empty($_SERVER["QUERY_STRING"])) {
            if(strpos($_SERVER["QUERY_STRING"], "channelSize=$channelSize") !== false) {
                return str_replace("channelSize=$channelSize", "channelSize=$x", $_SERVER["QUERY_STRING"]);
            } else {
                return "channelSize=$x&" . $_SERVER["QUERY_STRING"];
            }
        } else {
            return "channelSize=$x";
        }
    }

    function changeType($x) {
        global $type;
        if (!empty($_SERVER["QUERY_STRING"])) {
            if(strpos($_SERVER["QUERY_STRING"], "type=$type") !== false) {
                return str_replace("type=$type", "type=$x", $_SERVER["QUERY_STRING"]);
            } else {
                return "type=$x&" . $_SERVER["QUERY_STRING"];
            }
        } else {
            return "type=$x";
        }
    }
?>
<!doctype html>
<html lang="tr" prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Aynı anda birden fazla haber kanalını, televizyonu ya da YouTube kanalını izleyebileceğiniz bir çoklu ekran uygulaması.">
    <meta name="keywords" content="Multi TV, multi screen, çoklu ekran, çoklu haber kanalı, haber kanalları, YouTube, aynı anda">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#212529">
    <meta property="og:title" content="Multi TV - Haber kanallarını aynı anda izle" />
    <meta property="og:description" content="Aynı anda birden fazla haber kanalını, televizyonu ya da YouTube kanalını izleyebileceğiniz bir çoklu ekran uygulaması." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://portal.ramazansancar.com.tr/multitv/" />
    <meta property="og:image" content="assets/img/screenshots/screenshot-1280.jpg" />
    <meta property="og:locale" content="tr_TR" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:creator" content="">
    <meta name="twitter:title" content="Multi TV - Haber kanallarını aynı anda izle">
    <meta name="twitter:description" content="Aynı anda birden fazla haber kanalını, televizyonu ya da YouTube kanalını izleyebileceğiniz bir çoklu ekran uygulaması.">
    <meta name="twitter:image" content="assets/img/screenshots/screenshot-1280.jpg">
    <title>Multi TV - Haber kanallarını aynı anda izle</title>
    <link rel="canonical" href="https://portal.ramazansancar.com.tr/multitv/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="manifest" href="manifest.webmanifest">
    <link rel="apple-touch-icon" href="assets/img/logo/multitv-192.png">
    <style>
        .msk-container {
            aspect-ratio: 16/9;
            max-height: 100vh;
            max-width: 100vw;
            margin: 0 auto;
        }
        .row div, iframe {
            aspect-ratio: 16/9;
        }
        .msk-optionsButton:hover span {
            display: inline !important;
        }
        .form-control:focus, .btn-close:focus {
            outline: none;
            box-shadow: none;
        }
        .btn-fullsc {
            box-sizing: content-box;
            width: 1em;
            height: 1em;
            padding: .25em .25em;
            color: #000;
            background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707zm0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707zm-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707z'/%3e%3c/svg%3e") center/1em auto no-repeat;
            border: 0;
            border-radius: .375rem;
            opacity: .5;
        }
        .btn-fullsc:hover {
            color: #000;
            text-decoration: none;
            opacity: .75;
        }
        iframe {
            background: transparent;
        }
        .disabled {
            pointer-events: none;
        }
    </style>
</head>
<body class="text-bg-dark">
    <div class="msk-container">
        <div class="<? echo $rowClass; ?>">
        <?php foreach ($channels as $chanel => $slug) {
            $channelId = isset($slug['channelId']) ? $slug['channelId'] : null;
            $username = isset($slug['username']) ? $slug['username'] : null;
            $channelName = isset($chanel) ? $chanel : null;

            if(isset($channelId) && !empty($channelId) && !is_null($channelId) && isset($username) && !empty($username) && !is_null($username)){
                echo '
                    <div class="col text-center p-0">
                        <iframe class="d-grid" width="100%" height="100%" src="embed?channelId='. $channelId .'&username='.$username.'&channelName='.$channelName.'&autoplay='. $autoplay .'&mute='.$mute.'" title="'. $channelName .'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                ';
            }else if(isset($channelId) && !empty($channelId) && !is_null($channelId)){
                echo '
                    <div class="col text-center p-0">
                        <iframe class="d-grid" width="100%" height="100%" src="embed?channelId='. $channelId .'&channelName='.$channelName.'&autoplay='. $autoplay .'&mute='.$mute.'" title="'. $channelName .'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                ';
            }else if(isset($username) && !empty($username) && !is_null($username)){
                echo '
                    <div class="col text-center p-0">
                        <iframe class="d-grid" width="100%" height="100%" src="embed?username='.$username.'&channelName='.$channelName.'&autoplay='. $autoplay .'&mute='.$mute.'" title="'. $channelName .'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                ';
            }else{
                //var_dump($chanel);
                //var_dump($slug);

                //echo 'test';
                continue;
            }
        } ?>
        </div>
    </div>
    <?php if($footer){ ?>
        <div class="footer text-center position-fixed bottom-0 start-50 translate-middle-x">
            <kbd class="text-center text-white font-weight-bold" style="font-size:10px;">*<?=($footer) ? $footer : "";?></kbd>
        </div>
    <?php } ?>
    <button class="msk-optionsButton btn btn-dark position-fixed rounded-0 position-absolute top-50 end-0 translate-middle-y" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" aria-label="Ayarlar">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
        </svg>
        <span class="d-none">Ayarlar</span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" data-bs-scroll="true" >
        <div class="offcanvas-header">
            <h4 class="offcanvas-title" id="offcanvasRightLabel">
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="22" height="36" viewBox="0 0 512 512" preserveAspectRatio="xMidYMid meet" style="vertical-align: top;">
                    <g transform="translate(0,512) scale(0.100000,-0.100000)" fill="#fff"><path d="M1954 5101 c-69 -31 -111 -106 -101 -180 3 -23 78 -167 201 -385 108 -192 196 -352 196 -357 0 -4 -282 -10 -627 -11 -618 -3 -629 -3 -693 -25 -210 -72 -376 -248 -437 -463 -17 -62 -18 -141 -18 -1590 0 -1701 -5 -1573 70 -1725 85 -173 260 -310 450 -350 104 -22 3025 -22 3129 0 241 51 437 240 503 485 17 61 18 166 18 1590 0 1449 -1 1528 -18 1590 -66 231 -248 413 -473 470 -73 19 -111 20 -681 20 -343 0 -603 4 -603 9 0 5 88 166 197 357 219 389 224 402 181 484 -55 107 -185 132 -269 52 -25 -25 -101 -150 -224 -369 -103 -183 -191 -333 -195 -333 -4 0 -92 150 -195 333 -103 182 -201 347 -218 365 -51 52 -122 65 -193 33z m2139 -1301 c75 -28 130 -79 167 -153 l30 -62 -2 -1510 c-3 -1458 -4 -1511 -22 -1545 -38 -71 -77 -109 -144 -142 l-67 -33 -1495 0 -1495 0 -67 33 c-67 33 -106 71 -144 142 -18 34 -19 87 -22 1545 l-2 1510 30 62 c36 73 92 125 164 152 50 19 88 20 1533 20 1460 1 1483 1 1536 -19z"/>
                    <path d="M2500 2505 c-152 -56 -990 -432 -1013 -454 -41 -38 -57 -73 -57 -128 0 -62 33 -121 85 -151 72 -42 113 -31 430 107 154 68 315 138 358 157 l77 33 0 -122 c0 -141 10 -185 50 -231 40 -45 79 -60 143 -54 46 5 426 164 982 412 98 44 135 92 135 176 0 113 -105 198 -208 170 -22 -5 -194 -77 -383 -160 -189 -82 -346 -150 -350 -150 -4 0 -9 62 -11 138 -3 122 -6 141 -26 177 -48 80 -130 111 -212 80z"/></g>
                </svg>
                <span>Multi TV | Ayarlar</span></h4>
            <div>
                <button type="button" class="btn-fullsc btn-close-white" data-bs-dismiss="offcanvas" onclick="toggle_fullscreen();" aria-label="Tam ekran"></button>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Kapat"></button>
            </div>
        </div>
        <div class="offcanvas-body">
            <h5>Yayın Tipi</h5>
            <div class="btn-group w-100" role="group" aria-label="Ayarlar">
                <a type="button" class="btn btn-outline-info rounded-0<? echo ($type == 'haber' || $type == '' || $type == null)  ? ' active' : ''; ?>" href="?<? echo changeType('haber'); ?>">Haber</a>
                <a type="button" class="btn btn-outline-info rounded-0<? echo ($type == 'siyasi' || $type == 'siyasiler' || $type == 'siyaset' || $type == 'siyasal' || $type == 'politik' || $type == 'politikacı' || $type == 'politikaci' || $type == 'politikacilar' || $type == 'politikacılar')  ? ' active' : ''; ?>" href="?<? echo changeType('politikaci'); ?>">Politikacı</a>
                <a type="button" class="btn btn-outline-info rounded-0<? echo ($type == 'parti' || $type == 'partiler')  ? ' active' : ''; ?>" href="?<? echo changeType('partiler'); ?>">Partiler</a>
                <a type="button" class="btn btn-outline-info rounded-0<? echo ($type == 'belediye' || $type == 'belediyeler')  ? ' active' : ''; ?>" href="?<? echo changeType('belediye'); ?>">Belediye</a>
            </div>

            <h5>Kanal sayısı</h5>
            <div class="btn-group w-100" role="group" aria-label="Ayarlar">
                <a type="button" class="btn btn-outline-light rounded-0<? echo ($channelSize == 4)  ? ' active' : ''; ?>" href="?<? echo changeChannel(4); ?>">4</a>
                <a type="button" class="btn btn-outline-light rounded-0<? echo ($channelSize == 9)  ? ' active' : ''; ?>" href="?<? echo changeChannel(9); ?>">9</a>
                <a type="button" class="btn btn-outline-light rounded-0<? echo ($channelSize == 16) ? ' active' : ''; ?>" href="?<? echo changeChannel(16); ?>">16</a>
                <a type="button" class="btn btn-outline-light rounded-0<? echo ($channelSize == 25) ? ' active' : ''; ?>" href="?<? echo changeChannel(25); ?>">25</a>
                <a type="button" class="btn btn-outline-light rounded-0<? echo ($channelSize == 30) ? ' active' : ''; ?>" href="?<? echo changeChannel(30); ?>">30</a>
                <a type="button" class="btn btn-outline-light rounded-0<? echo ($channelSize == 40) ? ' active' : ''; ?>" href="?<? echo changeChannel(40); ?>">40</a>
                <a type="button" class="btn btn-outline-light rounded-0<? echo ($channelSize == 500) ? ' active' : ''; ?>" href="?<? echo changeChannel(500); ?>">Tümü</a>
            </div>

            <form methot="get" action="">
                <h5 class="mt-4">Başlangıç ayarı</h5>
                <div class="form-check form-switch">
                    <? echo ($autoplay == 1) ? '<input type="hidden" value="off" name="autoplay">' : ''; ?>
                    <input class="form-check-input" type="checkbox" role="switch" id="autoplay" name="autoplay"<? echo ($autoplay == 1) ? ' checked="checked"' : ''; ?>>
                    <label class="form-check-label" for="autoplay">Otomatik oynatma</label>
                </div>
                <input type="hidden" aria-label="Kanal" placeholder="Kanal" name="channelSize" value="<? echo $channelSize; ?>" class="form-control rounded-0">

                <h5 class="mt-4">Kanalları değiştir</h5>
                <span class="form-text">Kanal adresi bölümüne YouTube Kanal IDsi veya kullanıcı adı girmelisiniz.</span>

                <div id="sortable">
                    <div class="input-group mt-1">
                        <input disabled type="text" aria-label="Kanal adı" placeholder="Kanal adı" value="Kanal İsmi" class="form-control rounded-0">
                        <span class="input-group-text disabled">
                            ||||
                        </span>
                        <input disabled type="text" aria-label="Kanal Username" placeholder="Kanal Username" value="Kanal Kullanıcı adı" class="form-control rounded-0">
                        <input disabled type="text" aria-label="Kanal ID" placeholder="Kanal ID" value="Kanal ID" class="form-control rounded-0">
                    </div>
                    <?php
                        foreach ($channels as $key => $value) {
                            $channelName = $key;
                            $username = $value["username"];
                            $channelId = $value["channelId"];
                    ?>
                    <div class="input-group mt-1">
                        <input type="text" aria-label="Kanal adı" placeholder="Kanal adı" name="cn[]" value="<? echo $channelName; ?>" class="form-control rounded-0">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </span>
                        <input type="text" aria-label="Kanal Username" placeholder="Kanal Username" name="cu[]" value="<? echo $username; ?>" class="form-control rounded-0">
                        <input type="text" aria-label="Kanal ID" placeholder="Kanal ID" name="ci[]" value="<? echo $channelId; ?>" class="form-control rounded-0">
                    </div>
                <?php } ?>
                </div>
                <span id="add" class="btn btn-outline-light w-100 rounded-0 mt-2 mb-3">Yeni kanal ekle</span>
                <button type="submit" class="btn btn-outline-light w-100 rounded-0 mt-2 mb-5">Ayarları değiştir</button>
            </form>
            <div class="mt-2 py-2 text-center position-absolute bottom-0 start-50 translate-middle-x text-bg-dark" style="font-size:.78em; width: 368px;">
                <a href="https://github.com/ramazansancar/mertskaplan_multitv/blob/main/LICENSE" rel="license external nofollow noopener" target="_blank" class="link-light text-decoration-none">MIT Lisansı<a> ile geliştirilmiştir. | 
                <a href="https://github.com/ramazansancar/mertskaplan_multitv" rel="external noopener" target="_blank" class="link-light text-decoration-none">GitHub</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#sortable" ).sortable();
        } );

        function toggle_fullscreen() {
            if (!document.fullscreenElement && // alternative standard method
                !document.mozFullScreenElement && !document.webkitFullscreenElement) {  // current working methods
                if (document.documentElement.requestFullscreen) {
                    document.documentElement.requestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullscreen) {
                    document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                }
                document.body.setAttribute("fullscreen","") 
            } else {
                if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                }
                document.body.removeAttribute("fullscreen") 
            }
        }
        function check_fullscreen() { // Because users can exit & enter fullscreen differently
            if (document.fullscreenElement || document.webkitIsFullScreen || document.mozFullScreen) { 
                document.body.setAttribute("fullscreen","") 
            } else { 
                document.body.removeAttribute("fullscreen") 
            }
        }
        setInterval(function(){ check_fullscreen();}, 1000);

        if ('serviceWorker' in navigator) {navigator.serviceWorker.register('assets/js/sw.js').then(function() {}, function() {});}

        $("#add").click(function (e) {
            $("#sortable").append('<div class="input-group mt-1"><input type="text" aria-label="Kanal adı" placeholder="Kanal adı" name="cn[]" value="" class="form-control rounded-0"><span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/></svg></span><input type="text" aria-label="Kanal Username" placeholder="Kanal Username" name="cu[]" value="" class="form-control rounded-0"><input type="text" aria-label="Kanal ID" placeholder="Kanal ID" name="ci[]" value="" class="form-control rounded-0"></div>');
        });
    </script>
    <script>
        var channelList = <?php echo json_encode($channels); ?>;
    </script>
</body>
</html>
