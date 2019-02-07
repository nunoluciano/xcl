<?php

if (defined('FOR_XOOPS_LANG_CHECKER')) {
    $mydirname = 'protector' ;
}
$constpref = '_MI_' . strtoupper($mydirname) ;

if (defined('FOR_XOOPS_LANG_CHECKER') || ! defined($constpref.'_LOADED')) {



// Appended by Xoops Language Checker -GIJOE- in 2017-02-27 14:47:39
define($constpref.'_BANIP_IPV6PREFIX', 'IPv6 deny list registration prefix');
    define($constpref.'_BANIP_IPV6PREFIXDSC', 'Number of prefix bit at IPv6 address registration (128 bit to all bits)');
    define($constpref.'_HIJACK_TOPBITV6', 'Protected IP bits for the session(IPv6)');
    define($constpref.'_HIJACK_TOPBITV6DSC', 'Anti Session Hi-Jacking:<br />Default 128(bit). (All bits are protected)<br />When your IP is not stable, set the IP range by number of the bits.');

// Appended by Xoops Language Checker -GIJOE- in 2009-11-17 18:12:57
define($constpref.'_FILTERS', 'filters enabled in this site');
    define($constpref.'_FILTERSDSC', 'specify file names inside of filters_byconfig/ separated with LF');
    define($constpref.'_MANIPUCHECK', 'enable manipulation checking');
    define($constpref.'_MANIPUCHECKDSC', 'notify to admin if your root folder or index.php is modified.');
    define($constpref.'_MANIPUVALUE', 'value for manipulation checking');
    define($constpref.'_MANIPUVALUEDSC', 'do not edit this field');

    define($constpref.'_LOADED', 1) ;

// The name of this module
define($constpref."_NAME", "ÇáÍÇÑÓ áÒæÈÓ");

// A brief description of this module
define($constpref."_DESC", "åĞÇ ÇáÈÑäÇãÌ íæİÑ áãæŞÚß ÇáÍãÇíÉ ãä ÚãáíÇÊ ÇáÇÎÊÑÇŞ ÇáãÎÊáİÉ áãæŞÚß");

// Menu
define($constpref."_ADMININDEX", "ÇáÑÆíÓíÉ");
    define($constpref."_ADVISORY", "ÊİÍÕ ÇáÍãÇíÉ");
    define($constpref."_PREFIXMANAGER", "ÇÏÇÑÉ ÌÏæá ŞÇÚÏÉ ÇáÈíÇäÇÊ");
    define($constpref.'_ADMENU_MYBLOCKSADMIN', 'ÇáÊÕÇÑíÍ') ;

// Configs
define($constpref.'_GLOBAL_DISBL', 'ÊÚØíá ÇáãæÏíá');
    define($constpref.'_GLOBAL_DISBLDSC', 'ÊÚØíá ÈÑäÇãÌ ÇáÍÇÑÓ ');

    define($constpref.'_DEFAULT_LANG', 'ÇááÛÉ');
    define($constpref.'_DEFAULT_LANGDSC', 'common.php ÍÏÏ ÇááÛÉ ÇáÊí ÓÊÓÊÚãá ŞÈá ØáÈ ãáİ  ');

    define($constpref.'_RELIABLE_IPS', 'ÇáÇíÈíåÇÊ ÇáÕÏíŞÉ');
    define($constpref.'_RELIABLE_IPSDSC', ' |ÖÚ ÇáÇíÈíåÇÊ ÇáÊí ÊÚÊÈÑ ÕÏíŞÉ æíãßä ÇáÇÚÊãÇÏ ÚáíÉ ÇİÕá ÇáÇíÈíåÇÊ ÈåĞÉ ÇáÇÔÇÑÉ');

    define($constpref.'_LOG_LEVEL', 'ÍİÙ ÇáÓÌáÇÊ');
    define($constpref.'_LOG_LEVELDSC', '');

    define($constpref.'_BANIP_TIME0', 'ãÏÉ ÇáãäÚ ááÇíÈí ÇáãÍÖæÑ - ÈÇáËæÇäí)');

    define($constpref.'_LOGLEVEL0', 'ÈÏæä');
    define($constpref.'_LOGLEVEL15', 'ÚÇÏí');
    define($constpref.'_LOGLEVEL63', 'ÚÇÏí');
    define($constpref.'_LOGLEVEL255', 'Çáßá');

    define($constpref.'_HIJACK_TOPBIT', 'ÍãÇíÉ ÇáÇíÈí ÇËäÇÁ ÇáÌáÓå-Çí ÇáÊæÇÌÏ ÈÇáãæŞÚ');
    define($constpref.'_HIJACK_TOPBITDSC', 'ÇáÍãÇíÉ ááÇíÈí ãä ÓÑŞÉ ÇáßæßíÒ  . ÇĞ ßÇä áß ÇíÈí ËÇÈÊ ÇÎÊÇÑ 32 ÇĞ ßÇä ÛíÑ ËÇÈÊ ÇÎÊÇÑ 24 ßÇİÊÑÇÖí');
    define($constpref.'_HIJACK_DENYGP', 'ÇáãÌãæÚÇÊ ÇáÛíÑ ãÓãæÍ ÈäŞáåÇ Çáí äÙÇã ÍãÇíÉ ÇáÌáÓÉ');
    define($constpref.'_HIJACK_DENYGPDSC', 'ãÇäÚ ÍŞä æÓÑŞÉ ÇáßæßíÒ İí ÇáÌáÓÉ:<br />ÇÎÊÇÑ ÇáãÌãæÚÉ ÇáÛíÑ ãÓãæÍ áåÇ ÈÇáÇäÊŞÇá ÊÍÊ äÙÇã ÇáÍãÇíÉ ÇËäÇÁ ÇáÌáÓÉ . ãä ÇáãŞÊÑÍ ÇÎÊíÇÑ ãÌãæÚÉ ÇáÇÏÇÑÉ');
    define($constpref.'_SAN_NULLBYTE', 'null-bytes ÇáÊÚŞíã áÇæÇãÑ ãä äæÚ');
    define($constpref.'_SAN_NULLBYTEDSC', '"\\0" ãä ÇáãŞÊÑÍ ÊİÚíá åĞÇ ÇáÎíÇÑ áÇä åĞÇ ÇáßæÏ ÛÇáÈÇ ãÇ íÓÊÎÏã İí ÚãáíÇÊ ÇáÊÎÑíÈ');
    define($constpref.'_DIE_NULLBYTE', '"\\0" ÇáÎÑæÌ İí ÍÇáÉ æÌæÏ  ÚãáíÉ ãä äæÚ äíá ÈÇÊÓ');
    define($constpref.'_DIE_NULLBYTEDSC', '"\\0" ãä ÇáãŞÊÑÍ ÊİÚíá åĞÇ ÇáÎíÇÑ áÇä åĞÇ ÇáßæÏ ÛÇáÈÇ ãÇ íÓÊÎÏã İí ÚãáíÇÊ ÇáÊÎÑíÈ');
    define($constpref.'_DIE_BADEXT', 'ÇáÎÑæÌ İí ÍÇáÉ ÑİÚ ãáİ ÓíÁ');
    define($constpref.'_DIE_BADEXTDSC', 'ÇĞ ÍÇæá ÇÍÏ ÑİÚ ãáİ ÈÕíÛÉ Èí ÇÊÔ Èí  Çæ ÕíÛÉ ÇÎÑí ÛíÑ ãÓãæÍ ÈåÇ<br />ÇĞ ßäÊ İí ÇáÛÇáÈ ÊÑİÚ ãáİÇÊ ÈÕíÛÉ Èí ÇÊÔ Èí İŞã ÇĞ ÈÊÚØíá åĞÇ ÇáÎíÇÑ ');
    define($constpref.'_CONTAMI_ACTION', 'ãÍÇæáÉ ÊáæíË æÇáÚÈË ÈãÊÛíÑÇÊ ÇáãÌáÉ');
    define($constpref.'_CONTAMI_ACTIONDS', 'ÇÎÊÇÑ ÇáÚãá İí ÍÇáÉ ÇßÊÔÇİ ãÍÇæáÉ áÊáæíË  æÇáÚÈË ÈãÊÛíÑÇÊ ÇáãÌáÉ ÇáÚÇãÉ<br />ÇáãŞÊÑÍ åæ  ÇÎÊíÇÑ ÕİÍÉ ÈíÖÇÁ');
    define($constpref.'_ISOCOM_ACTION', 'ÇáÚãá ÍÇá ÇßÊÔÇİ ÊÚáíŞ ãáÛæã');
    define($constpref.'_ISOCOM_ACTIONDSC', 'ãÇäÚ ÇáÍŞ İí ÇáŞÇÚÏå:<br />"/*" ÇáÚãá ÍÇá ÇßÊÔÇİÉ åĞÇ ÇáÑãÒ İí ÊÚáíŞ ãÇ<br />ÇáÊÚŞíã íÚäí ÇÖÇİÉ ÑãÒ ÇáÓáÇÔ ááßæÏ áÊÚØíáÉ - ÇáÚãá ÇáãŞÊÑÍ  åæ ÇÎÊíÇÑ ÊÚŞíã ÇáÇãÑ');
    define($constpref.'_UNION_ACTION', 'ÇáÚãá ÍÇá ÇßÊÔÇİ Çí ãä ÇæÇãÑ ÇáÇÊÍÇÏ');
    define($constpref.'_UNION_ACTIONDSC', 'ãÇäÚ ÇáÍŞä ááŞÇÚÏÉ:<br />ÇÎÊÇÑ ÇáÚãá ÍÇá ÇßÊÔÇİ Çí ÚãáíÉ ÎÇÑÌíÉ ãä ÚãáíÇÊ ÇáÇÊÍÇÏ æÇáÚãá ÇáãŞÊÑÍ åæ ÊÚŞíã ÇáÇãÑ<br />""union" ÓíÊã ÊÛíÑ ÇáÑãÒ ÈæÖÚ ÏÇÔ  ÈãäÊÕİ ÇáßáãÉ');
    define($constpref.'_ID_INTVAL', 'ID ÇæÇãÑ ÇáØáÈ æÇáÌáÈ ãä ÇáŞÇÚÏÉ');
    define($constpref.'_ID_INTVALDSC', '"*id" ßá ÇáÇæÇãÑ ÇáÊí ÊäÊåí ÈåĞÇ ÇáÑãÒ<br />ÊİÚíá ÇáÎíÇÑ íÍãí ãä ÈÚÖ ÚãáíÇÊ ÇáÍŞ<br />åĞÇ ÇáÇÎÊíÇÑ íÓÈÈ ÇÍíÇäÇ ÈÊÚØá ÈÑÇãÌ ÇÎÑí áĞáß ßã ÈÊÚØíáÉ  ÇáÇ ÇĞ ßäÊ ÊÚÑİ ãÇ ÊİÚá');
    define($constpref.'_FILE_DOTDOT', 'Directory TraversalsÇáãäÚ ãä ÚãáíÇÊ ÇáÊäŞá ');
    define($constpref.'_FILE_DOTDOTDSC', 'ãäÚ ßá ÇáÚãáíÇÊ ÇáÊí ÊÈÏæ  Úáì ÇäåÇ ÊŞæã ÈÇÓÊÚÑÇÖ ÇáãæŞÚ æÇáãáİÇÊ æÇáÊí ÊÈÍË Úä ËÛÑÇÊ ÈÇáãæŞÚ');

    define($constpref.'_BF_COUNT', 'ãÇäÚ ãÍÇæáÉ ÊÓÌíá ÇáÏÎæá ÇáãÊßÑÑå');
    define($constpref.'_BF_COUNTDSC', 'ÍÏÏ ÚÏÏ ÇáãÑÇÊ ÇáãÓãæÍ ááÚÖæ ÈåÇ áÊÓÌíá ÏÎæáÉ ÈßáãÉ ÓÑ ÛíÑ ÕÍíÍÉ æÈÚÏ ÇáÚÏÏ ÇáãÍÏÏ ÓíÊã ØÑÏÉ');

    define($constpref.'_BWLIMIT_COUNT', 'ÊÍÏíÏ æÖÈØ ÍÌã ÊÈÇÏá ÇáãáİÇÊ - ÇáÈÇäÏæíÏË');
    define($constpref.'_BWLIMIT_COUNTDSC', 'mainfile.php ÖÚ ÕİÑ ááãæÇŞÚ ÇáÊí áÏíåÇ ŞÏÑå ÌíÏå Úáì ÇÓÊíÚÇÈ ÚÏÏ áÇÈÇÓ Èå ãä ÇáÒæÇÑ  æÇí ÑŞã ÇŞá ãä 10 ÓíÊã ÊÌÇåáÉ -ÍÏÏ ÚÏÏ ÇáãÑÇÊ ÇáÊí íÓÊØíÚ ÇáÒÇÆÑ İíåÇ ÒíÇÑÉ ãáİ');

    define($constpref.'_DOS_SKIPMODS', ' Crawler ÇáÈÑÇãÌ ÇáÛíÑ ÎÇÖÚÉ áäÙÇã ÇáãÑÇŞÈÉ');
    define($constpref.'_DOS_SKIPMODSDSC', '|Şã ÈßÊÇÈÉ ÇÓãÇÁ ÇáãæÏíáÇÊ ÇáÊí ÓíÊã ÇÓÊËäÇÁåÇ ãä ÇáãÑÇŞÈÉ  ÇİÕá Èíä ÇáÈÑÇãÌ ÈÇáÇÔÇÑå');

    define($constpref.'_DOS_EXPIRE', 'ãÑÇŞÈÉ ÇáÖÛØ Úáì ÇáãæŞÚ ÈÇáËæÇäí');
    define($constpref.'_DOS_EXPIREDSC', 'F5åĞÇ ÇáÇÎÊíÇÑ áãÑÇŞÈÉ ÇáÖÛØ ÇáãÍÏË Úáì ÇáãæŞÚ ãä ÎáÇá ÈÑÇãÌ ÇáÈÍË ãËáÇ Çæ ÍÇá ÇÓÊÎÏÇã äÙÇã ÊÍÏíË Çæ ÑíİÑíÔ ÇáãæŞÚ ÈÇÓÊÎÏÇã ÇáÇÏÇÉ ');

    define($constpref.'_DOS_F5COUNT', ' F5ÚÏÏ ÇáãÑÇÊ áÇÍÊÓÇÈåÇ åÌæã');
    define($constpref.'_DOS_F5COUNTDSC', 'ááÍãíÇÉ ãä  ÇáÏæÓ æÇÓÊäÒÇİ ÇáãæŞÚ ÈÇÚÇÏÉ ÊÍãíá ÕİÍÉ ÇáÈÏÇíÉ ÇßËÑ ãä ãÑå');
    define($constpref.'_DOS_F5ACTION', ' F5 ÇáÚãá ÍÇá ÇßÊÔÇİ åÌæã ãä äæÚ');

    define($constpref.'_DOS_CRCOUNT', 'ÚÏÏ ãÑÇÊ ÇáÇÓÊÚÑÇÖ ãä ŞÈá ãÍÑßÇÊ ÇáÈÍË ŞÈá ÇÚÊÈÇÑ ÇáÚãáíÉ åÌæã');
    define($constpref.'_DOS_CRCOUNTDSC', 'ááãäÚ ãä ßá ÇáÚãáíÇÊ ÇáÊí ÊŞæã ÈãÍÇæáå ÇÓÊÚÑÇÖ ßá ãáİÇÊ æÑÇæÈØ ãæŞÚß æÇÍÏÇË ÖÛØ ÚáíÉ');
    define($constpref.'_DOS_CRACTION', 'ÇáÚãá ÍÇá ÇßÊÔÇİ ÚãáíÇÊ ÇäÔÇÁ ÖÛØ ÚÇáí Úáì ÇáãæŞÚ');

    define($constpref.'_DOS_CRSAFE', 'ãÍÑßÇÊ ÇáÈÍË ÇáãÓãæÍ áåÇ ');
    define($constpref.'_DOS_CRSAFEDSC', 'ßá ãÍÑßÇÊ ÇáÈÍË ÇáãÖÇİÉ ÈÇáÍŞá áä ÊÚÊÈÑ ãÍÑßÇÊ ÈÍË ÓíÆÉ Çæ ÊÍÏË ÖÛØ Úáì ÇáãæŞÚ<br />ãËá<br />eg) /(msnbot|Googlebot|Yahoo! Slurp)/i');

    define($constpref.'_OPT_NONE', 'áÇÔíÁ İŞØ ÓÌá ÇáÚãáíÉ');
    define($constpref.'_OPT_SAN', 'ÊÚŞíã ÇáÇãÑ');
    define($constpref.'_OPT_EXIT', 'ÕİÍÉ ÈíÖÇÁ');
    define($constpref.'_OPT_BIP', 'ãäÚ ÇáÇíÈí ááÇÈÏ');
    define($constpref.'_OPT_BIPTIME0', 'ãäÚ ÇáÇíÈí ãÄŞÊ');

    define($constpref.'_DOSOPT_NONE', 'áÇÔíÁ İŞØ ÓÌá ÇáÚãáíÉ');
    define($constpref.'_DOSOPT_SLEEP', 'ÚÏã ÇÓÊÌÇÈÉ-äÇÆã');
    define($constpref.'_DOSOPT_EXIT', 'ÕİÍÉ ÈíÖÇÁ');
    define($constpref.'_DOSOPT_BIP', 'ãäÚ ÇáÇíÈí ááÇÈÏ');
    define($constpref.'_DOSOPT_BIPTIME0', 'ãäÚ ÇáÇíÈí ãÄŞÊ');
    define($constpref.'_DOSOPT_HTA', '.htaccess ÇáãäÚ Èãáİ');

    define($constpref.'_BIP_EXCEPT', 'ÇáãÌãæÚÉ  ÇáÊí áÇ íÊã ØÑÏåÇ ÇÈÏÇ');
    define($constpref.'_BIP_EXCEPTDSC', 'ÍÏÏ ÇíÈí ãÚíä   áÍãÇíÊå ãä ÇáØÑÏ ãä ÇáãæŞÚ<br />(ãä ÇáãŞÊÑÍ İŞØ ÇíÈí ÇáãÏíÑ');

    define($constpref.'_DISABLES', 'XOOPS ÊÚØíá  ÎÕÇÆÕ ÎØíÑÉ İí ãÌáÉ');

    define($constpref.'_DBLAYERTRAP', 'ÊİÚíá ÇáŞäÇÚ áÖÈØ ÚãáíÇÊ ÇáÍŞä');
    define($constpref.'_DBLAYERTRAPDSC', 'åĞÇ ÇáÇÎÊíÇÑ íãäÚ ÇáÚÏíÏ ãä ÚãáíÇÊ ÇáÍŞä . æáßä Úáíß ÇáÊÇßÏ ãä ÊİÍÕ ÇáÍãÇíÉ áãÚÑİÉ ãÇ Çä ßÇä áÏíß ÇáãÇÓß Çæ ÇáŞäÇÚ');
    define($constpref.'_DBTRAPWOSRV', 'áÇÊŞã ÇÈÏ ÈÊİÍÕ ÇáÓíÑİÑ ãä ãÇäÚ ÇáÍŞä');
    define($constpref.'_DBTRAPWOSRVDSC', ' åäÇß ÓíÑİÑÇÊ áÏíåÇ äÙÇã ãÇäÚ ááÍŞä İí ŞÇÚÏÉ ÇáÈíÇäÇÊ - áæ æÇÌåÊ ãÔßáÉ ÈãæŞÚß Şã ÈÊİÚíá åĞÇ ÇáÇÎÊíÇÑ');

    define($constpref.'_BIGUMBRELLA', 'anti-XSS (BigUmbrella)ÇáÍãÇíÉ ãä ÇáåÌæã ãä äæÚ');
    define($constpref.'_BIGUMBRELLADSC', 'åĞÇ ÇáäæÚ íŞæã ÇáãåÇÌã ÈÇÑÓÇá ãÍÊæì ãä ÎáÇáÉ íÍÇæá ÓÑŞÉ ÇÑŞÇã ÍÓÇÈÇÊ æÇíãíáÇÊ æÇí ÈíÇäÇÊ ÍÓÇÓÉ ãä ãæŞÚ ÇáÖÍíÉ. ÇáÍÇÑÓ áÇíæİÑ ÍãÇíÉ ßÇãáÉ áåĞÇ ÇáäæÚ  áÇÎÊáÇİ ÇäæÇÚ ÇáåÌæã ');

    define($constpref.'_SPAMURI4U', 'ãÇäÚ ÇáÓÈÇã ááÇÚÖÇÁ');
    define($constpref.'_SPAMURI4UDSC', 'Çí ãæÖæÚ Çæ ÊÚáíŞ ãä ŞÈá ÇáÇÚÖÇÁ íÍÊæí åĞÇ ÇáÚÏÏ ãä ÇáÑæÇÈØ ÓíÚÊÈÑ ÓÈÇã æÖÚß ÕİÑ íÚäí ÊÚØíá ÇáÇÎÊíÇÑ');
    define($constpref.'_SPAMURI4G', 'ãÇäÚ ÇáÓÈÇã ááÒæÇÑ');
    define($constpref.'_SPAMURI4GDSC', 'Çí ãæÖæÚ Çæ ÊÚáíŞ íÍÊæí åĞÇ ÇáÚÏÏ ãä ÇáÑæÇÈØ ÓíÚÊÈÑ ÓÈÇã æÖÚ ÕİÑ íÚäí ÊÚØíáß ááÇÎÊíÇÑ');
}
