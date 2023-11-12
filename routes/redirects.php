<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Redirect old website routes to new site routes
|--------------------------------------------------------------------------
|
*/

Route::redirect('/about_us', '/about');
Route::redirect('/about_us/our_history', '/about/history');
Route::redirect('/about_us/our_wealth', '/about/wealth');
Route::redirect('/about_us/development', '/about/career');
Route::redirect('/career', '/about/career');
Route::redirect('/contacts', '/');

Route::redirect('/nosology/{category}', '/nosology/algologiya')->whereNumber('category');
Route::redirect('/atx/{category}', '/atx/aminokisloti')->whereNumber('category');

Route::redirect('/products/d3_spey', '/products/d3-spey');
Route::redirect('/products/anderim_suppozitorii', '/products/anderim-suppozitorii');
Route::redirect('/products/busemid_ampuli', '/products/busemid-ampuli');
Route::redirect('/products/busemid_tabletki', '/products/busemid-tabletki');
Route::redirect('/products/vitaspey_bebi', '/products/vitaspey-bebi');
Route::redirect('/products/vitaspey_dlya_muzhchin', '/products/vitaspey-dlya-muzhchin');
Route::redirect('/products/vitaspey_kapsuli', '/products/vitaspey-kapsuli');
Route::redirect('/products/vitaspey_memori', '/products/vitaspey-memori');
Route::redirect('/products/vitaspey_pregna', '/products/vitaspey-pregna');
Route::redirect('/products/vitaspey_sirop', '/products/vitaspey-sirop');

Route::redirect('/products/galeks_0,05%', '/products/galeks-005');
Route::redirect('/products/galeks_0,1%', '/products/galeks-01');
Route::redirect('/products/gervetin_rastvor', '/products/gervetin-rastvor');
Route::redirect('/products/zentaveks_mazy', '/products/zentaveks-mazy');
Route::redirect('/products/immunekt_kapli', '/products/immunekt-kapli');
Route::redirect('/products/infanem_kids', '/products/infanem-kids');
Route::redirect('/products/inforin_aktiv_gely', '/products/inforin-aktiv-gely');
Route::redirect('/products/inforin_krem', '/products/inforin-krem');
Route::redirect('/products/inforin_suspenziya', '/products/inforin-suspenziya');

Route::redirect('/products/karnilev_inaektsii', '/products/karnilev-inaektsii');
Route::redirect('/products/karnilev_rastvor_-_1_gr', '/products/karnilev-rastvor-1-gr');
Route::redirect('/products/karnilev_rastvor_-_2_gr', '/products/karnilev-rastvor-2-gr');
Route::redirect('/products/kedd_softzhel', '/products/kedd-softzhel');
Route::redirect('/products/laktospey_drops', '/products/laktospey-drops');
Route::redirect('/products/laktospey_kids', '/products/laktospey-kids');
Route::redirect('/products/levoking_rastvor', '/products/levoking-rastvor');
Route::redirect('/products/leson_suspenziya', '/products/leson-suspenziya');

Route::redirect('/products/lilayz_roza', '/products/lilayz-roza');
Route::redirect('/products/magnispey_b6', '/products/magnispey-b6');
Route::redirect('/products/meksazh_ampuli_100mg', '/products/meksazh-ampuli-100mg');
Route::redirect('/products/meksazh_ampuli_250mg', '/products/meksazh-ampuli-250mg');
Route::redirect('/products/meksazh_tabletki', '/products/meksazh-tabletki');
Route::redirect('/products/mitsibon_rastvor', '/products/mitsibon-rastvor');
Route::redirect('/products/moparol_kapsuli', '/products/moparol-kapsuli');
Route::redirect('/products/nefroleks_rastvor', '/products/nefroleks-rastvor');
Route::redirect('/products/nefroleks_tabletki', '/products/nefroleks-tabletki');

Route::redirect('/products/normappetit_sirop', '/products/normappetit-sirop');
Route::redirect('/products/omarens_-__t', '/products/omarens-t');
Route::redirect('/products/pantospey_flakon', '/products/pantospey-flakon');
Route::redirect('/products/polveren_suspenziya', '/products/polveren-suspenziya');
Route::redirect('/products/polikof_sirop', '/products/polikof-sirop');
Route::redirect('/products/proktaluron_kombi', '/products/proktaluron-kombi');
Route::redirect('/products/regimed_inaektsii', '/products/regimed-inaektsii');
Route::redirect('/products/regimed_plyus', '/products/regimed-plyus');
Route::redirect('/products/relason_kids', '/products/relason-kids');
Route::redirect('/products/rovalang_sirop', '/products/rovalang-sirop');

Route::redirect('/products/slideron_flakon', '/products/slideron-flakon');
Route::redirect('/products/speybakt_0,75g', '/products/speybakt-075g');
Route::redirect('/products/speybakt_1,5g', '/products/speybakt-15g');
Route::redirect('/products/stopkolik_kapli', '/products/stopkolik-kapli');
Route::redirect('/products/togorels_rastvor', '/products/togorels-rastvor');
Route::redirect('/products/togorels_tabletki', '/products/togorels-tabletki');
Route::redirect('/products/tomiklar_suspenziya', '/products/tomiklar-suspenziya');
Route::redirect('/products/tomiklar_uno', '/products/tomiklar-uno');

Route::redirect('/products/fantsid_rastvor', '/products/fantsid-rastvor');
Route::redirect('/products/ferzapin_10mg', '/products/ferzapin-10mg');
Route::redirect('/products/ferzapin_5mg', '/products/ferzapin-5mg');
Route::redirect('/products/tsvetoks_kapli', '/products/tsvetoks-kapli');
Route::redirect('/products/tsvetoks_rastvor', '/products/tsvetoks-rastvor');
Route::redirect('/products/tsimiklin_tabletki', '/products/tsimiklin-tabletki');


Route::redirect('/instruction/Avtoriya_Tb_25mg_Rus.pdf', '/pdf/instructions/avtoriya.pdf');
Route::redirect('/instruction/Algorit_ChwTB_400mg_Ins_Rus.pdf', '/pdf/instructions/algorit.pdf');
Route::redirect('/instruction/Anderim_Tb_100mg_Rus.pdf', '/pdf/instructions/anderim.pdf');
Route::redirect('/instruction/Anderim_Supp_Rus.pdf', '/pdf/instructions/anderim-suppozitorii.pdf');
Route::redirect('/instruction/Arginda_Infusion_Rus.pdf', '/pdf/instructions/arginda.pdf');
Route::redirect('/instruction/Acikav_Tab_400-800mg_Ins_Rus.pdf', '/pdf/instructions/atsikav.pdf');
Route::redirect('/instruction/Belirest_tb_Rus.pdf', '/pdf/instructions/belirest.pdf');
Route::redirect('/instruction/Biltris_tb_#8_Rus.pdf', '/pdf/instructions/biltris.pdf');
Route::redirect('/instruction/Vitaspey_for_men_Rus.pdf', '/pdf/instructions/vitaspey-dlya-muzhchin.pdf');
Route::redirect('/instruction/Vitaspey_caps_Rus.pdf', '/pdf/instructions/vitaspey-kapsuli.pdf');
Route::redirect('/instruction/Vitaspey_memory_Rus.pdf', '/pdf/instructions/vitaspey-memori.pdf');
Route::redirect('/instruction/Vitaspey_Pregna_Tab_Rus.pdf', '/pdf/instructions/vitaspey-pregna.pdf');
Route::redirect('/instruction/Vitaspey_Syrup_150ml_Rus.pdf', '/pdf/instructions/vitaspey-sirop.pdf');
Route::redirect('/instruction/Galeks_Spray_nas_0,05_1,0 _Instr_Rus.pdf', '/pdf/instructions/galeks-005.pdf');
Route::redirect('/instruction/Gervetin_Sprey_30ml_Rus.pdf', '/pdf/instructions/gervetin.pdf');
Route::redirect('/instruction/Gervetin_OralSolution_120ml_Rus.pdf', '/pdf/instructions/gervetin-rastvor.pdf');
Route::redirect('/instruction/Ginobels_Supp_Rus.pdf', '/pdf/instructions/ginobels.pdf');
Route::redirect('/instruction/GynoLactospey_Gcaps_Rus.pdf', '/pdf/instructions/ginolaktospey.pdf');
Route::redirect('/instruction/Divlaxin_FCTab_10mg_Rus.pdf', '/pdf/instructions/divlaksin.pdf');
Route::redirect('/instruction/SP_Diosperidin_FCTab_450+50mg_PIL_RusEng_Help.pdf', '/pdf/instructions/diosperidin.pdf');
Route::redirect('/instruction/Dipp_Caps_Rus.pdf', '/pdf/instructions/dipp.pdf');
Route::redirect('/instruction/Espey_Caps_200mg_400mg_Rus.pdf', '/pdf/instructions/espey.pdf');
Route::redirect('/instruction/Zentavex_PIL_Rus.pdf', '/pdf/instructions/zentaveks-mazy.pdf');
Route::redirect('/instruction/Zerovir_Tab_500mg_Ins_Rus.pdf', '/pdf/instructions/zerovir.pdf');
Route::redirect('/instruction/Immunect_Drops_Rus.pdf', '/pdf/instructions/immunekt-kapli.pdf');
Route::redirect('/instruction/Intergino_tb_Rus.pdf', '/pdf/instructions/intergino.pdf');
Route::redirect('/instruction/Infanem_Kids_Rus.pdf', '/pdf/instructions/infanem-kids.pdf');
Route::redirect('/instruction/Inforin_FCTab_Rus.pdf', '/pdf/instructions/inforin.pdf');
Route::redirect('/instruction/InforinActive_Gel_Rus.pdf', '/pdf/instructions/inforin-aktiv-gely.pdf');
Route::redirect('/instruction/INFORIN_Cream_10%_Rus.pdf', '/pdf/instructions/inforin-krem.pdf');
Route::redirect('/instruction/Inforin_Susp_Rus.pdf', '/pdf/instructions/inforin-suspenziya.pdf');
Route::redirect('/instruction/IODOSPEY_TB_Rus.pdf', '/pdf/instructions/yodospey.pdf');
Route::redirect('/instruction/Cazepsin_200mg_Ins_Rus.pdf', '/pdf/instructions/kazepsin.pdf');
Route::redirect('/instruction/Karnilev_inj_PIL_Rus.pdf', '/pdf/instructions/karnilev-inaektsii.pdf');
Route::redirect('/instruction/Karnilev_oral_sol_Rus.pdf', '/pdf/instructions/karnilev-rastvor-1-gr.pdf');
Route::redirect('/instruction/Kedd_VagCaps_Rus.pdf', '/pdf/instructions/kedd-softzhel.pdf');
Route::redirect('/instruction/Kidfex_tb_Rus.pdf', '/pdf/instructions/kidfeks.pdf');
Route::redirect('/instruction/Colchivate_Tab_0,5g_Rus.pdf', '/pdf/instructions/kolchiveyt.pdf');
Route::redirect('/instruction/Qudax_Caps_100mg_Rus.pdf', '/pdf/instructions/kyudaks.pdf');
Route::redirect('/instruction/Lactospey_Caps_Rus.pdf', '/pdf/instructions/laktospey.pdf');
Route::redirect('/instruction/LaktospeyKids_Sachet_Rus.pdf', '/pdf/instructions/laktospey-kids.pdf');
Route::redirect('/instruction/Levoking_tab_500mg_Rus.pdf', '/pdf/instructions/levoking.pdf');
Route::redirect('/instruction/Levoking_Inf_500mg_Rus.pdf', '/pdf/instructions/levoking-rastvor.pdf');
Route::redirect('/instruction/Leson_FCTB_Rus.pdf', '/pdf/instructions/leson.pdf');
Route::redirect('/instruction/LilaizRoza_Vagsupp_PIL_Rus.pdf', '/pdf/instructions/lilayz-roza.pdf');
Route::redirect('/instruction/Magnispey_FCTB_Rus.pdf', '/pdf/instructions/magnispey-b6.pdf');
Route::redirect('/instruction/Marjestin_SCaps_100mg_Rus.pdf', '/pdf/instructions/marzhestin.pdf');
Route::redirect('/instruction/Mexaj_Amp_100mg_250mg_2ml_5ml.pdf', '/pdf/instructions/meksazh-ampuli-250mg.pdf');
Route::redirect('/instruction/Mitsibon_Tb_150mg_Rus.pdf', '/pdf/instructions/mitsibon.pdf');
Route::redirect('/instruction/Moparol_Caps_50mg_Rus.pdf', '/pdf/instructions/moparol-kapsuli.pdf');
Route::redirect('/instruction/Nephrolex_drops_ins_Rus.pdf', '/pdf/instructions/nefroleks-rastvor.pdf');
Route::redirect('/instruction/Nephrolex_tabs_ins_Rus.pdf', '/pdf/instructions/nefroleks-tabletki.pdf');
Route::redirect('/instruction/Noopirex_Tb_Rus.pdf', '/pdf/instructions/noopireks.pdf');
Route::redirect('/instruction/NormAppetit_Syrup_Rus.pdf', '/pdf/instructions/normappetit-sirop.pdf');
Route::redirect('/instruction/Omarens_Caps_Rus.pdf', '/pdf/instructions/omarens.pdf');
Route::redirect('/instruction/OmarensT_PRTab_Rus.pdf', '/pdf/instructions/omarens-t.pdf');
Route::redirect('/instruction/Parsolet_FCTab_20mg_PIL_Rus.pdf', '/pdf/instructions/parsolet.pdf');
Route::redirect('/instruction/Polveren_tb_Rus.pdf', '/pdf/instructions/polveren.pdf');
Route::redirect('/instruction/Polveren_PowSusp_Rus.pdf', '/pdf/instructions/polveren-suspenziya.pdf');
Route::redirect('/instruction/Polycof_Syrup_100ml_Rus.pdf', '/pdf/instructions/polikof-sirop.pdf');
Route::redirect('/instruction/Leson_susp_60ml_Rus.pdf', '/pdf/instructions/leson-suspenziya.pdf');
Route::redirect('/instruction/Proctaluro_ rect_supp_Rus.pdf', '/pdf/instructions/proktaluron.pdf');
Route::redirect('/instruction/Revard_Sol_50mg-1ml_Rus.pdf', '/pdf/instructions/revard.pdf');
Route::redirect('/instruction/SP_Regimed_FCTab_Rus_PIL_Replek_TJ.pdf', '/pdf/instructions/regimed.pdf');
Route::redirect('/instruction/Regimed_inj_PIL_Rus.pdf', '/pdf/instructions/regimed-inaektsii.pdf');
Route::redirect('/instruction/Relason_Caps_Rus.pdf', '/pdf/instructions/relason.pdf');
Route::redirect('/instruction/Respongyl_FCTab_2-4mg_Rus.pdf', '/pdf/instructions/respongil.pdf');
Route::redirect('/instruction/Rovalang_Inj_500mg-1000mg_ 4ml_Ins_Rus.pdf', '/pdf/instructions/rovalang.pdf');
Route::redirect('/instruction/Rovalang_Syrup_Ins_Rus.pdf', '/pdf/instructions/rovalang-sirop.pdf');
Route::redirect('/instruction/SEltozidim_inj_ins_Rus.pdf', '/pdf/instructions/seltozidim.pdf');
Route::redirect('/instruction/Slideron_Tab_4mg_16mg_PIL_Rus.pdf', '/pdf/instructions/slideron.pdf');
Route::redirect('/instruction/Speybakt 0.75_1.5_vial_Rus.pdf', '/pdf/instructions/speybakt-075g.pdf');
Route::redirect('/instruction/Speykacin_Inj_100mg_500mg_Rus.pdf', '/pdf/instructions/speykatsin.pdf');
Route::redirect('/instruction/SPEYFERON_Inj_Rus.pdf', '/pdf/instructions/speyferon.pdf');
Route::redirect('/instruction/Stopcolic_Drops_15ml_Rus.pdf', '/pdf/instructions/stopkolik-kapli.pdf');
Route::redirect('/instruction/Tenovix_LFPOW_20mg_Ins_Rus.pdf', '/pdf/instructions/tenoviks.pdf');
Route::redirect('/instruction/Togorels_amp_500mg_Rus.pdf', '/pdf/instructions/togorels-rastvor.pdf');
Route::redirect('/instruction/Tomyclar_FcTb_250_500mg_Rus.pdf', '/pdf/instructions/tomiklar.pdf');
Route::redirect('/instruction/Tomiklar_susp_ins_Rus.pdf', '/pdf/instructions/tomiklar-suspenziya.pdf');
Route::redirect('/instruction/Tomiklar Uno_FCTB_Rus.pdf', '/pdf/instructions/tomiklar-uno.pdf');
Route::redirect('/instruction/Funcid_Tb_150mg_Rus.pdf', '/pdf/instructions/fantsid.pdf');
Route::redirect('/instruction/Funcid_Inf_200mg_Rus.pdf', '/pdf/instructions/fantsid-rastvor.pdf');
Route::redirect('/instruction/Ferzapin_Tb_5mg_10mg_Rus.pdf', '/pdf/instructions/ferzapin-5mg.pdf');
Route::redirect('/instruction/Ferrospey_Tab_5mg_Rus.pdf', '/pdf/instructions/ferrospey.pdf');
Route::redirect('/instruction/Folispey_Tab_Rus.pdf', '/pdf/instructions/folispey.pdf');
Route::redirect('/instruction/Hondrospey_Tab_Rus.pdf', '/pdf/instructions/hondrospey.pdf');
Route::redirect('/instruction/Cvetox_FCTab_10mg_Rus.pdf', '/pdf/instructions/tsvetoks.pdf');
Route::redirect('/instruction/Cvetox_OralSol_5mg_Rus.pdf', '/pdf/instructions/tsvetoks-rastvor.pdf');
Route::redirect('/instruction/Cefribact_Inj_Rus.pdf', '/pdf/instructions/tseftribakt.pdf');
Route::redirect('/instruction/Boneost_FCTab_150mg_Rus.pdf', '/pdf/instructions/boneost.pdf');
Route::redirect('/instruction/Vitaspey_baby_drops_ins_Rus.pdf', '/pdf/instructions/vitaspey-bebi.pdf');
Route::redirect('/instruction/Mitsibon_Inj_100mg_Rus.pdf', '/pdf/instructions/mitsibon-rastvor.pdf');
Route::redirect('/instruction/Pantospey_PDinj_40mg_Rus.pdf', '/pdf/instructions/pantospey-flakon.pdf');
Route::redirect('/instruction/Relason Kids_Rus.pdf', '/pdf/instructions/relason-kids.pdf');
Route::redirect('/instruction/Slideron_Inj_Rus.pdf', '/pdf/instructions/slideron-flakon.pdf');
Route::redirect('/instruction/Togorels_tb_500mg_Rus.pdf', '/pdf/instructions/togorels-tabletki.pdf');
Route::redirect('/instruction/CIMIKLIN_tab_Rus.pdf', '/pdf/instructions/tsimiklin-tabletki.pdf');
Route::redirect('/instruction/Busemid_Tb_10mg_Rus.pdf', '/pdf/instructions/busemid-tabletki.pdf');
Route::redirect('/instruction/Busemid_Inj_#5_20mg_Rus.pdf', '/pdf/instructions/busemid-ampuli.pdf');
Route::redirect('/instruction/Mexaj_tb_125mg_Ins_Rus.pdf', '/pdf/instructions/meksazh-tabletki.pdf');
Route::redirect('/instruction/Karnilev_solu_2g_PIL_Rus.pdf', '/pdf/instructions/karnilev-rastvor-2-gr.pdf');
Route::redirect('/instruction/Dipyrens_tb_25mg_Rus.pdf', '/pdf/instructions/dipirens.pdf');
Route::redirect('/instruction/Regimed Plus_Inj_Rus.pdf', '/pdf/instructions/regimed-plyus.pdf');
Route::redirect('/instruction/1Ferzapin_Tb_5mg_10mg_Rus.pdf', '/pdf/instructions/ferzapin-10mg.pdf');
Route::redirect('/instruction/Mexaj_Amp_100mg_250mg_2ml_5ml_Rus.pdf', '/pdf/instructions/meksazh-ampuli-100mg.pdf');
Route::redirect('/instruction/1Speybakt 0.75_1.5_vial_Rus.pdf', '/pdf/instructions/speybakt-15g.pdf');
Route::redirect('/instruction/1Galeks_Spray_nas_0,05_1,0 _Instr_Rus.pdf', '/pdf/instructions/galeks-01.pdf');
Route::redirect('/instruction/Cvetox_Drops_Rus.pdf', '/pdf/instructions/tsvetoks-kapli.pdf');
Route::redirect('/instruction/D3 Spey_tab_ins_Rus.pdf', '/pdf/instructions/d3-spey.pdf');
Route::redirect('/instruction/Hepatospey_amp_For_oral_use_Ins_Rus.pdf', '/pdf/instructions/gepatospey.pdf');
Route::redirect('/instruction/LactospeyDrops_Drops_Rus.pdf', '/pdf/instructions/laktospey-drops.pdf');
Route::redirect('/instruction/Pantospey_GRTab_20mg_Rus.pdf', '/pdf/instructions/pantospey.pdf');
Route::redirect('/instruction/ProctaluronCombi_Supp_№10_Rus.pdf', '/pdf/instructions/proktaluron-kombi.pdf');
Route::redirect('/instruction/Prostanect_Supp_100mg_#10_Rus.pdf', '/pdf/instructions/prostanekt.pdf');
Route::redirect('/instruction/Ritazum_Tab_10mg_Rus.pdf', '/pdf/instructions/ritazum.pdf');
