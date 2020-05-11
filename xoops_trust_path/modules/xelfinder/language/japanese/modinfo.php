<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) ) $mydirname = 'xelfinder' ;
$constpref = '_MI_' . strtoupper( $mydirname ) ;

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( $constpref.'_LOADED' ) ) {

// a flag for this language file has already been read or not.
define( $constpref.'_LOADED' , 1 ) ;

define( $constpref.'_DESC' , 'Web�١����Υե�����ޥ͡����� elFinder �򥤥᡼���ޥ͡�����Ȥ������Ѥ���⥸�塼��');

// admin menu
define($constpref.'_ADMENU_GOTO_MODULE' ,   '�⥸�塼�����' ) ;
define($constpref.'_ADMENU_GOTO_MANAGER' ,  '�ե�����ޥ͡�����' ) ;
define($constpref.'_ADMENU_DROPBOX' ,       'Dropbox App Token ����' ) ;
define($constpref.'_ADMENU_GOOGLEDRIVE' ,   'GoogleDrive Token ����' ) ;
define($constpref.'_ADMENU_VENDORUPDATE' ,  'vendor ���åץǡ���' ) ;
define($constpref.'_ADMENU_MYLANGADMIN' ,   '�����������' ) ;
define($constpref.'_ADMENU_MYTPLSADMIN' ,   '�ƥ�ץ졼�ȴ���' ) ;
define($constpref.'_ADMENU_MYBLOCKSADMIN' , '�֥��å�����/������������' ) ;
define($constpref.'_ADMENU_MYPREFERENCES' , '��������' ) ;

// configurations
define( $constpref.'_MANAGER_TITLE' ,           '�ޥ͡�����Υڡ��������ȥ�' );
define( $constpref.'_MANAGER_TITLE_DESC' ,      '' );
define( $constpref.'_VOLUME_SETTING' ,          '�ܥ�塼��ɥ饤��' );
define( $constpref.'_VOLUME_SETTING_DESC' ,     '[�⥸�塼��ǥ��쥯�ȥ�̾]:[�ץ饰����̾]:[�ե������<br>�ȥ�]:[ɽ��̾]:[���ץ����<br>>��ñ�̤ǵ��ҡ���Ƭ�� #<br>��̵�뤵�<br>br />���ץ����� ��|�<br>ڤ�ޤ���<br />���̥��ץ����:<br />gid=[ͭ���ˤ��륰�롼��ID�򥫥�޶��ڤ�ǻ���]<b<br>faults=[read, write, hidden, lock �γ<br>�����ǥե���ȤȤ���ͭ���ˤ����Τ򤽤줾���Ƭʸ�<br>h l �ǻ������: defau<br>��]<br />uploadMaxSize=[���åץ����ɥե��<br>��ξ����(��:2M)]<br />id=[Ǥ�դΰ�դ�ID�ʸ����󥯤�URL�ϥå�������Ѥ���ޤ�)]<br />encoding=[ʸ�����󥳡��ǥ���(iconv��ͭ������)]<br />locale=[��������(����: encoding ���б�����Ŭ�ڤʥ�������)]<br />chmod=1(chmod ����ǽ�ʾ�硢�ե�����°�����ѹ������)' );
define( $constpref.'_SHARE_HOLDER' ,            '��ͭ�ե����' );
define( $constpref.'_DISABLED_CMDS_BY_GID' ,    '���롼����̵�����ޥ��' );
define( $constpref.'_DISABLED_CMDS_BY_GID_DESC','���롼����(�����Ԥ����)��̵���ˤ��륳�ޥ�ɤ� [���롼��ID]=<br>�ޥ��(����޶��ڤ�)] �Ȥ��� ":" �Ƕ��ڤäƻ��ꤹ�롣<br />���ޥ��̾: archive, chmod, cut, duplicate, edit, empty, extract, mkdir, mkfile, paste, perm, put, rename, resize, rm, upload �ʤ�' );
define( $constpref.'_DISABLE_WRITES_GUEST' ,    '�����Ƚ񤭹���̵��' );
define( $constpref.'_DISABLE_WRITES_GUEST_DESC','�����ȸ����˥��롼����̵�����ޥ�ɤ˻��ꤷ��̵�����ޥ�ɤ˹�碌���񤭹��߷ϥ��ޥ�ɤ򤹤٤��ɲä��ޤ���' );
define( $constpref.'_DISABLE_WRITES_USER' ,     '��Ͽ�桼�����񤭹���̵��' );
define( $constpref.'_DISABLE_WRITES_USER_DESC', '��Ͽ�桼���������˥��롼����̵�����ޥ�ɤ˻��ꤷ��̵�����ޥ�ɤ˹�碌���񤭹��߷ϥ��ޥ�ɤ򤹤٤��ɲä��ޤ���' );
define( $constpref.'_MAIL_NOTIFY_GUEST' ,       '�᡼������(������)' );
define( $constpref.'_MAIL_NOTIFY_GUEST_DESC',   '�����Ȥˤ��ե������ɲä�������롼�ץ��С��˥᡼�����Τ��ޤ���' );
define( $constpref.'_ENABLE_IMAGICK_PS' ,      'ImageMagick��PostScript����ͭ��' );
define( $constpref.'_ENABLE_IMAGICK_PS_DESC',  '<a href="https://www.kb.cert.org/vuls/id/332928" target="_blank">Ghostscript���ȼ���</a>����������Ƥ�����ϡ��֤Ϥ��פ����򤹤뤳�Ȥ�ImageMagick��PostScript��Ϣ�ν�����ͭ���ˤǤ��ޤ���' );
define( $constpref.'_USE_SHARECAD_PREVIEW' ,      'ShareCAD �ץ�ӥ塼ͭ��' );
define( $constpref.'_USE_SHARECAD_PREVIEW_DESC',  'ShareCAD.org �����Ѥ��ץ�ӥ塼��ǽ�ʥե����륿���פ���礷�ޤ���ShareCAD �ץ�ӥ塼���ѻ��� ShareCAD.org �إ���ƥ�� URL �����Τ��ޤ���' );
define( $constpref.'_USE_GOOGLE_PREVIEW' ,      'Google Docs �ץ�ӥ塼ͭ��' );
define( $constpref.'_USE_GOOGLE_PREVIEW_DESC',  'Google Docs �����Ѥ��ץ�ӥ塼��ǽ�ʥե����륿���פ���礷�ޤ���Google Docs �ץ�ӥ塼���ѻ��� Google Docs �إ���ƥ�� URL �����Τ��ޤ���' );
define( $constpref.'_USE_OFFICE_PREVIEW' ,      'Office Online �ץ�ӥ塼ͭ��' );
define( $constpref.'_USE_OFFICE_PREVIEW_DESC',  'Office Online  �����Ѥ��ץ�ӥ塼��ǽ�ʥե����륿���פ���礷�ޤ���Office Online �ץ�ӥ塼���ѻ��� products.office.com �إ���ƥ�� URL �����Τ��ޤ���' );
define( $constpref.'_MAIL_NOTIFY_GROUP' ,       '�᡼������(���롼��)' );
define( $constpref.'_MAIL_NOTIFY_GROUP_DESC',   '���򤷤����롼�פ�°����桼�����ˤ��ե������ɲä�������롼�ץ��С��˥᡼�����Τ��ޤ���' );
define( $constpref.'_FTP_NAME' ,                'FTP �ͥåȥܥ�塼��ɽ��̾' );
define( $constpref.'_FTP_NAME_DESC' ,           '�������Ѥ� FTP ��³�ͥåȥܥ�塼���ɽ��̾' );
define( $constpref.'_FTP_HOST' ,                'FTP �ۥ���̾' );
define( $constpref.'_FTP_HOST_DESC' ,           '' );
define( $constpref.'_FTP_PORT' ,                'FTP �ݡ����ֹ�' );
define( $constpref.'_FTP_PORT_DESC' ,           'FTP ���̾� 21 �֥ݡ��ȤǤ�' );
define( $constpref.'_FTP_PATH' ,                '�롼�ȥǥ��쥯�ȥ�' );
define( $constpref.'_FTP_PATH_DESC' ,           'FTP����ϥܥ�塼��ɥ饤�Ф� "ftp" �ץ饰��<br>Ѥ���ޤ���<br />"ftp" �ץ饰�����ѤΤߤ����ꤹ����ϥ롼�ȥǥ��쥯�ȥ�����ˤ��Ƥ���������' );
define( $constpref.'_FTP_USER' ,                'FTP �桼����̾' );
define( $constpref.'_FTP_USER_DESC' ,           '' );
define( $constpref.'_FTP_PASS' ,                'FTP �ѥ����' );
define( $constpref.'_FTP_PASS_DESC' ,           '' );
define( $constpref.'_FTP_SEARCH' ,              'FTP �ܥ�塼��򸡺��оݤˤ���' );
define( $constpref.'_FTP_SEARCH_DESC' ,         'FTP �ͥåȥܥ�塼��򸡺��оݤˤ���ȡ������˻��֤���<br>�ॢ���Ȥ��뤳�Ȥ�����ޤ���<br />ͭ���ˤ�����������ʤ������Ǥ��뤫�γ�ǧ��˺��ʤ���' );
define( $constpref.'_BOXAPI_ID' ,               'Box API OAuth2 client_id' );
define( $constpref.'_BOXAPI_ID_DESC' ,          'Box API Console [ https://app.box.com/developers/services ]' );
define( $constpref.'_BOXAPI_SECRET' ,           'Box API OAuth2 client_secret' );
define( $constpref.'_BOXAPI_SECRET_DESC' ,      'Box��ͥåȥ���ܥ�塼��Ȥ������Ѥ�����ϥХå�����ɤȤ���³�� https �����ꤷ Box API ���ץꥱ������������ - redirect_uri �� "'.str_replace('http://','https://',XOOPS_URL).'/modules/'.$mydirname.'/connector.php" ���ɲä��Ƥ���������(�ɥᥤ��ʹߤΥѥ��Ͼ�ά��)' );
define( $constpref.'_GOOGLEAPI_ID' ,            'Google API ���饤����� ID' );
define( $constpref.'_GOOGLEAPI_ID_DESC' ,       'Google API Console [ https://console.developers.google.com ]' );
define( $constpref.'_GOOGLEAPI_SECRET' ,        'Google API ���饤����� ��������å�' );
define( $constpref.'_GOOGLEAPI_SECRET_DESC' ,   'Google�ɥ饤�֤�ͥåȥ���ܥ�塼��Ȥ������Ѥ�����(PHP 5.4 �ʾ夬ɬ��)�� Google API ���󥽡����ǧ�ھ��� - ��ǧ�ѤߤΥ�����쥯�� URL �� "'.XOOPS_URL.'/modules/'.$mydirname.'/connector.php?cmd=netmount&protocol=googledrive&host=1" ���ɲä��Ƥ���������' );
define( $constpref.'_ONEDRIVEAPI_ID' ,          'OneDrive API ���ץꥱ������� ID' );
define( $constpref.'_ONEDRIVEAPI_ID_DESC' ,     'OneDrive API Console [ https://apps.dev.microsoft.com/#/appList ]' );
define( $constpref.'_ONEDRIVEAPI_SECRET' ,      'OneDrive API �ѥ����' );
define( $constpref.'_ONEDRIVEAPI_SECRET_DESC' , 'OneDrive��ͥåȥ���ܥ�塼��Ȥ������Ѥ������ OneDrive API ���ץꥱ������������ - ������쥯�� URL �� "'.XOOPS_URL.'/modules/'.$mydirname.'/connector.php/netmount/googledrive/1" ���ɲä��Ƥ���������' );
define( $constpref.'_DROPBOX_TOKEN' ,           'Dropbox.com ���ץꥱ������� Key' );
define( $constpref.'_DROPBOX_TOKEN_DESC' ,      'Developers - Dropbox [ https://www.dropbox.com/developers ]' );
define( $constpref.'_DROPBOX_SECKEY' ,          'Dropbox.com ���ץꥱ������� Secret key' );
define( $constpref.'_DROPBOX_SECKEY_DESC' ,     '' );
define( $constpref.'_DROPBOX_ACC_TOKEN' ,       '��ͭDropbox�Υ��������ȡ�����' );
define( $constpref.'_DROPBOX_ACC_TOKEN_DESC' ,  '��ͭ��Dropbox�ܥ�塼��ǻ��Ѥ��뤿��Υ��������ȡ������ https://www.dropbox.com/developers/apps �ˤƼ����Ǥ��ޤ���' );
define( $constpref.'_DROPBOX_ACC_SECKEY' ,      '��ͭDropbox�Υ��������ȡ����󡦥�������åȥ���' );
define( $constpref.'_DROPBOX_ACC_SECKEY_DESC' , '�Ť� OAuth1 �Τ��������Ǥ��������� OAuth2 �Υ��������ȡ���������ꤹ������ͤ���ˤ���ɬ�פ�����ޤ���OAuth1 �����Ѥ��Ƥ���������� OAuth2 �˰ܹԤ��Ƥ���������' );
define( $constpref.'_DROPBOX_NAME' ,            '��ͭ��Dropbox�ܥ�塼��ɽ��̾' );
define( $constpref.'_DROPBOX_NAME_DESC' ,       '��ͭ��Dropbox�ܥ�塼��ϡ��ͥåȥ���ܥ�塼��Υޥ���ȤȰ㤤�����٤ƤΥ桼������ɽ������ޤ���' );
define( $constpref.'_DROPBOX_PATH' ,            '��ͭDropbox�Υ롼�ȥѥ�' );
define( $constpref.'_DROPBOX_PATH_DESC' ,       '��ͭ��Dropbox�ܥ�塼��ǰ��̤˳������Ƥ�褤���ؤΥ<br>ꤷ�ޤ���(������: "/Public")<br />Dropbox ���<br>�ɥ饤�Ф� "dropbox" �ץ饰����ˤ���Ѥ���ޤ���<br />"dropbox" �ץ饰�����ѤΤߤ����ꤹ����ϥ롼�ȥѥ������ˤ��Ƥ���������' );
define( $constpref.'_DROPBOX_HIDDEN_EXT' ,      '��ͭ��Dropbox��ɽ���ե�����' );
define( $constpref.'_DROPBOX_HIDDEN_EXT_DESC' , '�����ԤˤΤ�ɽ������ե�����ʥե�����<br>���סˤ򥫥�޶��ڤ�ǻ��ꤷ�ޤ���<br />�������/�פȤ������ϥե�������оݤȤ��ޤ���' );
define( $constpref.'_DROPBOX_WRITABLE_GROUPS' , '��ͭDropbox�񤭹��ߵ��ĥ��롼��' );
define( $constpref.'_DROPBOX_WRITABLE_GROUPS_DESC' , '���������ꤷ�����롼�פˤϡ��ե����롦�ե�����ν񤭹��ߤ����Ĥ���ޤ���������������������ܡֶ�ͭ��Dropbox���åץ����ɲ�ǽ�� MIME �����סס��ֶ�ͭ��Dropbox�񤭹��ߤ���ĥե�����פȡֶ�ͭ��Dropbox����å��ե�����פǡ�������Ĥ��뤫�򥳥�ȥ�����Ǥ��ޤ�������¾�Υ��롼�פ��ɤ߼��Τ߲�ǽ�Ǥ���' );
define( $constpref.'_DROPBOX_UPLOAD_MIME' ,     '��ͭ��Dropbox���åץ����ɲ�ǽ�� MIME ������') ;
define( $constpref.'_DROPBOX_UPLOAD_MIME_DESC' ,'�񤭹��ߤ���Ĥ��륰�롼�פ����åץ����ɲ�ǽ�� MIME �����פ򥫥�޶��ڤ�����ꤷ�ޤ��������ԤϤ������¤�����ޤ���') ;
define( $constpref.'_DROPBOX_WRITE_EXT' ,       '��ͭ��Dropbox�񤭹��ߵ��ĥե�����') ;
define( $constpref.'_DROPBOX_WRITE_EXT_DESC' ,  '�񤭹��ߤ���Ĥ��륰�롼�פ˽񤭹��ߤ���Ĥ���ե�����(�ե�<br>θ�������)�򥫥�޶��ڤ�ǻ<br>��<br />�������/�פȤ������ϥե�������оݤȤ��ޤ���<br />�����ԤϤ������¤�����ޤ���') ;
define( $constpref.'_DROPBOX_UNLOCK_EXT' ,      '��ͭ��Dropbox����å��ե�����') ;
define( $constpref.'_DROPBOX_UNLOCK_EXT_DESC' , '�ե��������å����ʤ�(����å�)�ȡ�<br>�ư����͡��ब��ǽ�ˤʤ�ޤ���<br />�<br>ʤ��ե�����(�ե�����̾<br>���)�򥫥�޶��ڤ�ǻ��ꤷ�ޤ���<br />�������/�פȤ������ϥե�������оݤȤ��ޤ���<br />�����Ԥˤ����ƤΥե����뤬���å�����ޤ���') ;
define( $constpref.'_JQUERY' ,                  'jQuery �� URL' );
define( $constpref.'_JQUERY_DESC' ,             'Google �� CDN �����Ѥ��ʤ����ˡ�jQuery �� js ��  URL ����ꤷ�ޤ���' );
define( $constpref.'_JQUERY_UI' ,               'jQuery UI �� URL' );
define( $constpref.'_JQUERY_UI_DESC' ,          'Google �� CDN �����Ѥ��ʤ����ˡ�jQueryUI �� js ��  URL ����ꤷ�ޤ���' );
define( $constpref.'_JQUERY_UI_CSS' ,           'jQuery UI �� CSS URL' );
define( $constpref.'_JQUERY_UI_CSS_DESC' ,      'Google �� CDN �����Ѥ��ʤ����ˡ�jQueryUI �� css ��  URL ����ꤷ�ޤ���' );
define( $constpref.'_JQUERY_UI_THEME' ,         'jQuery UI �Υơ���' );
define( $constpref.'_JQUERY_UI_THEME_DESC' ,    'Google �� CDN �����Ѥ������ jQuery UI �Υơ��ޤ�ơ���̾������ CSS �� URL �ǻ��ꤷ�ޤ��� (�ǥե����: smoothness)' );
define( $constpref.'_GMAPS_APIKEY' ,            'Google Maps API ����' );
define( $constpref.'_GMAPS_APIKEY_DESC' ,       'KML �ץ�ӥ塼�ǻ��Ѥ��� Google Maps �� API ����' );
define( $constpref.'_ZOHO_APIKEY' ,             'Zoho office editor API ����' );
define( $constpref.'_ZOHO_APIKEY_DESC' ,        'Office �����ƥ��Խ����� Zoho office editor ����Ѥ������ API ��������ꤷ�ޤ���<br/>API ������ <a href=""https://www.zoho.com/docs/help/office-apis.html#get-started" target="_blank">www.zoho.com/docs/help/office-apis.html</a> �Ǽ����Ǥ��ޤ���' );
define( $constpref.'_CREATIVE_CLOUD_APIKEY' ,   'Creative SDK API����' );
define( $constpref.'_CREATIVE_CLOUD_APIKEY_DESC','Creative Cloud �� Creative SDK �Υ��᡼�����ǥ����������Ѥ��<br>reative Cloud API��������ꤷ�ޤ���<br />API���� �� https://console.adobe.io/ �Ǽ����Ǥ��ޤ���' );
define( $constpref.'_ONLINE_CONVERT_APIKEY' ,   'ONLINE-CONVERT.COM API����' );
define( $constpref.'_ONLINE_CONVERT_APIKEY_DESC','ONLINE-CONVERT.COM �Υ���ƥ�ĥ���С����� API �����Ѥ������<br>E-CONVERT.COM API��������ꤷ�ޤ���<br />API���� �� https://apiv2.online-convert.com/docs/getting_started/api_key.html �Ǽ����Ǥ��ޤ���' );
define( $constpref.'_EDITORS_JS',               'editors.js �� URL' );
define( $constpref.'_EDITORS_JS_DESC',          'common/elfinder/js/extras/editors.default.js �򥫥����ޥ����������� JavaScript �� URL ����ꤷ�ޤ���' );
define( $constpref.'_UI_OPTIONS_JS',            'xelfinderUiOptions.js �� URL' );
define( $constpref.'_UI_OPTIONS_JS_DESC',       'modules/'.$mydirname.'/include/js/xelfinderUiOptions.default.js �򥫥����ޥ����������� JavaScript �� URL ����ꤷ�ޤ���' );
define( $constpref.'_THUMBNAIL_SIZE' ,          '[xelfinder_db] �����������Υ���ͥ��륵����' );
define( $constpref.'_THUMBNAIL_SIZE_DESC' ,     'BB�����ɤǤβ����������Υ���ͥ��륵�����ε�����(px)' );
define( $constpref.'_DEFAULT_ITEM_PERM' ,       '[xelfinder_db] ��������륢���ƥ�Υѡ��ߥå����' );
define( $constpref.'_DEFAULT_ITEM_PERM_DESC' ,  '�ѡ��ߥå�����3���[�ե����<br>][���롼��][������]<br />�Ʒ� 2�ʿ�4b<br>��ɽ��(h)][�ɤ߹���(r)][�񤭹���(w)][���å����(u)]<br />744: �����ʡ� 7 = -rwu, ���롼�� 4 = -r--, ������ 4 = -r--' );
define( $constpref.'_USE_USERS_DIR' ,           '[xelfinder_db] �桼�����̥ե�����λ���' );
define( $constpref.'_USE_USERS_DIR_DESC' ,      '' );
define( $constpref.'_USERS_DIR_PERM' ,          '[xelfinder_db] �桼�����̥ե�����Υѡ��ߥå����' );
define( $constpref.'_USERS_DIR_PERM_DESC' ,     '�����Ǥ�����Ϻ������Τ߻��Ȥ���ޤ��<br>�� elFinder ��ľ���ѹ����Ƥ���������<br />��: 7cc: �����ʡ� 7 = -rwu, ���롼�� c = hr--, ������ c = hr--' );
define( $constpref.'_USERS_DIR_ITEM_PERM' ,     '[xelfinder_db] �桼�����̥ե�����˺�������륢���ƥ�Υѡ��ߥå����' );
define( $constpref.'_USERS_DIR_ITEM_PERM_DESC' ,'�����Ǥ�����Ϻ������Τ߻��Ȥ���ޤ��<br>�� elFinder ��ľ���ѹ����Ƥ���������<br />��: 7cc: �����ʡ� 7 = -rwu, ���롼�� c = hr--, ������ c = hr--' );
define( $constpref.'_USE_GUEST_DIR' ,           '[xelfinder_db] �������ѥե�����λ���' );
define( $constpref.'_USE_GUEST_DIR_DESC' ,      '' );
define( $constpref.'_GUEST_DIR_PERM' ,          '[xelfinder_db] �������ѥե�����Υѡ��ߥå����' );
define( $constpref.'_GUEST_DIR_PERM_DESC' ,     '�����Ǥ�����Ϻ������Τ߻��Ȥ���ޤ��<br>�� elFinder ��ľ���ѹ����Ƥ���������<br />��: 766: �����ʡ� 7 = -rwu, ���롼�� 6 = -rw-, ������ 6 = -rw-' );
define( $constpref.'_GUEST_DIR_ITEM_PERM' ,     '[xelfinder_db] �������ѥե�����˺�������륢���ƥ�Υѡ��ߥå����' );
define( $constpref.'_GUEST_DIR_ITEM_PERM_DESC' ,'�����Ǥ�����Ϻ������Τ߻��Ȥ���ޤ��<br>�� elFinder ��ľ���ѹ����Ƥ���������<br />��: 744: �����ʡ� 7 = -rwu, ���롼�� 4 = -r--, ������ 4 = -r--' );
define( $constpref.'_USE_GROUP_DIR' ,           '[xelfinder_db] ���롼���̥ե�����λ���' );
define( $constpref.'_USE_GROUP_DIR_DESC' ,      '' );
define( $constpref.'_GROUP_DIR_PARENT' ,        '[xelfinder_db] ���롼���̥ե�����οƥե����̾' );
define( $constpref.'_GROUP_DIR_PARENT_DESC' ,   '' );
define( $constpref.'_GROUP_DIR_PARENT_NAME' ,   '���롼�������');
define( $constpref.'_GROUP_DIR_PERM' ,          '[xelfinder_db] ���롼���̥ե�����Υѡ��ߥå����' );
define( $constpref.'_GROUP_DIR_PERM_DESC' ,     '�����Ǥ�����Ϻ������Τ߻��Ȥ���ޤ��<br>�� elFinder ��ľ���ѹ����Ƥ���������<br />��: 768: �����ʡ� 7 = -rwu, ���롼�� 6 = -rw-, ������ 8 = h---' );
define( $constpref.'_GROUP_DIR_ITEM_PERM' ,     '[xelfinder_db] ���롼���̥ե�����˺�������륢���ƥ�Υѡ��ߥå����' );
define( $constpref.'_GROUP_DIR_ITEM_PERM_DESC' ,'�����Ǥ�����Ϻ������Τ߻��Ȥ���ޤ��<br>�� elFinder ��ľ���ѹ����Ƥ���������<br />��: 748: �����ʡ� 7 = -rwu, ���롼�� 4 = -r--, ������ 8 = h---' );

define( $constpref.'_UPLOAD_ALLOW_ADMIN' ,      '[xelfinder_db] �����Ԥ˥��åץ����ɤ���Ĥ��� MIME ������' );
define( $constpref.'_UPLOAD_ALLOW_ADMIN_DESC' , 'MIME �����פ�Ⱦ�ѥ��ڡ<br>ڤ�ǵ��ҡ�<br />all<br>���, none: ������Ĥ��ʤ�<br />��: image text/plain' );
define( $constpref.'_AUTO_RESIZE_ADMIN' ,       '[xelfinder_db] �������Ѽ�ư�ꥵ���� (px)' );
define( $constpref.'_AUTO_RESIZE_ADMIN_DESC' ,  '�����򥢥åץ����ɻ������ꤷ�������<br>��ޤ�褦�˼�ư�ꥵ����������(px)��<br />�������Ϥ��ʤ��ȼ�ư�ꥵ�����ϹԤ��ޤ���' );
define( $constpref.'_UPLOAD_MAX_ADMIN' ,        '[xelfinder_db] �������Ѻ���ե����륵����' );
define( $constpref.'_UPLOAD_MAX_ADMIN_DESC',    '�����Ԥ����åץ����ɲ�ǽ�ʺ���ե����륵��������ꤷ�ޤ���̵����ޤ��� 0 ��̵���¤Ȥʤ�ޤ���(�� 10M)' );

define( $constpref.'_SPECIAL_GROUPS' ,          '[xelfinder_db] ���ꥰ�롼��' );
define( $constpref.'_SPECIAL_GROUPS_DESC' ,     '���ꥰ�롼�פȤ��륰�롼�פ����� (ʣ�������)' );
define( $constpref.'_UPLOAD_ALLOW_SPGROUPS' ,   '[xelfinder_db] ���ꥰ�롼�פ˥��åץ����ɤ���Ĥ��� MIME ������' );
define( $constpref.'_UPLOAD_ALLOW_SPGROUPS_DESC','' );
define( $constpref.'_AUTO_RESIZE_SPGROUPS' ,    '[xelfinder_db] ���ꥰ�롼���Ѽ�ư�ꥵ���� (px)' );
define( $constpref.'_AUTO_RESIZE_SPGROUPS_DESC','' );
define( $constpref.'_UPLOAD_MAX_SPGROUPS' ,     '[xelfinder_db] ���ꥰ�롼���Ѻ���ե����륵����' );
define( $constpref.'_UPLOAD_MAX_SPGROUPS_DESC', '' );

define( $constpref.'_UPLOAD_ALLOW_USER' ,       '[xelfinder_db] ��Ͽ�桼�����˥��åץ����ɤ���Ĥ��� MIME ������' );
define( $constpref.'_UPLOAD_ALLOW_USER_DESC' ,  '' );
define( $constpref.'_AUTO_RESIZE_USER' ,        '[xelfinder_db] ��Ͽ�桼�����Ѽ�ư�ꥵ���� (px)' );
define( $constpref.'_AUTO_RESIZE_USER_DESC',    '' );
define( $constpref.'_UPLOAD_MAX_USER' ,         '[xelfinder_db] ��Ͽ�桼�����Ѻ���ե����륵����' );
define( $constpref.'_UPLOAD_MAX_USER_DESC',     '' );

define( $constpref.'_UPLOAD_ALLOW_GUEST' ,      '[xelfinder_db] �����Ȥ˥��åץ����ɤ���Ĥ��� MIME ������' );
define( $constpref.'_UPLOAD_ALLOW_GUEST_DESC' , '' );
define( $constpref.'_AUTO_RESIZE_GUEST' ,       '[xelfinder_db] �������Ѽ�ư�ꥵ���� (px)' );
define( $constpref.'_AUTO_RESIZE_GUEST_DESC',   '' );
define( $constpref.'_UPLOAD_MAX_GUEST' ,        '[xelfinder_db] �������Ѻ���ե����륵����' );
define( $constpref.'_UPLOAD_MAX_GUEST_DESC',    '' );

define( $constpref.'_DISABLE_PATHINFO' ,        '[xelfinder_db] �ե����뻲��URL�� PathInfo ����Ѥ��ʤ�' );
define( $constpref.'_DISABLE_PATHINFO_DESC' ,   '�Ķ��ѿ� "PATH_INFO" �����ѤǤ��ʤ������С��ϡ֤Ϥ��פ����򤷤Ƥ���������' );

define( $constpref.'_EDIT_DISABLE_LINKED' ,     '[xelfinder_db] ��󥯺Ѥߥե�����ν񤭹��߶ػ�' );
define( $constpref.'_EDIT_DISABLE_LINKED_DESC' ,'����ڤ�����Ѱդʾ�񤭤��ɻߤ��뤿��˥�󥯡����Ȥ��줿�ե������ưŪ�˽񤭹��߶ػߤ����ꤷ�ޤ���' );

define( $constpref.'_CONNECTOR_URL' ,           '�����ޤ��ϥ����奢��³�Υ��ͥ���URL��Ǥ�ա�' );
define( $constpref.'_CONNECTOR_URL_DESC' ,      '���������ȤΥ��ͥ�������³�������Хå�����ɤȤ��̿��Τߥ����奢�ʴĶ������Ѥ������ connector.php �� URL ����ꤷ�Ƥ���������' );

define( $constpref.'_CONN_URL_IS_EXT',          '�����Υ��ͥ���URL' );
define( $constpref.'_CONN_URL_IS_EXT_DESC',     'Ǥ�ջ��ꤷ�����ͥ���URL�����������Ȥξ��ˡ֤Ϥ��ס����ͥ���URL���Х<br>��̿��Τ�SSL��³����URL�ξ��ϡ֤������פ����򤷤Ƥ���������<br />���������ȤΥ��ͥ�������³�����������襵���Ȥˤơ��������ȤΥ��ꥸ��ɥᥤ�󤬵��Ĥ���Ƥ���ɬ�פ�����ޤ���' );

define( $constpref.'_ALLOW_ORIGINS',            '���Ĥ���ɥᥤ�󥪥ꥸ��' );
define( $constpref.'_ALLOW_ORIGINS_DESC',       '�������ȤΥ��ͥ�������³����Ĥ��볰�������ȤΥɥᥤ�󥪥ꥸ�����:"<br>/example.com" �Ǹ�Υ���å�������סˤ�Զ��ڤ�����ꤷ�ޤ���<br />���ͥ���URL���Хå�������̿��Τ�SSL��³����URL�ξ��ϡ� <strong>'.preg_replace('#^(https?://[^/]+).*$#', '$1', XOOPS_URL).'</strong> �פ���ꤹ��ɬ�פ�����ޤ���' );

define( $constpref.'_UNZIP_LANG_VALUE' ,        'unzip �¹Ի��Υ�������' );
define( $constpref.'_UNZIP_LANG_VALUE_DESC' ,   '���������ֲ���Υ��ޥ�� un<br>�ѻ��θ�������������ꡣ<br />�̾�ϻ���ʤ�������ʤ��Ȼפ��뤬�������Υե�����̾��ʸ������������ˤ� ja_JP.Shift_JIS �ʤɤȤ���Ȳ�ä�����礬���롣' );

define( $constpref.'_AUTOSYNC_SEC_ADMIN',       '��ư�����ֳ�(������):��' );
define( $constpref.'_AUTOSYNC_SEC_ADMIN_DESC',  '��ư�ǹ��������å��򤹤�ֳ֤��ÿ��ǻ��ꤷ�ޤ���' );

define( $constpref.'_AUTOSYNC_SEC_SPGROUPS',    '��ư�����ֳ�(���ꥰ�롼��):��' );
define( $constpref.'_AUTOSYNC_SEC_SPGROUPS_DESC', '' );

define( $constpref.'_AUTOSYNC_SEC_USER',        '��ư�����ֳ�(��Ͽ�桼����):��' );
define( $constpref.'_AUTOSYNC_SEC_USER_DESC',   '' );

define( $constpref.'_AUTOSYNC_SEC_GUEST',       '��ư�����ֳ�(������):��' );
define( $constpref.'_AUTOSYNC_SEC_GUEST_DESC',  '' );

define( $constpref.'_AUTOSYNC_START',           '�����˼�ư�����򳫻Ϥ���' );
define( $constpref.'_AUTOSYNC_START_DESC',      '����ƥ����ȥ�˥塼�Ρ֥�����ɡפǼ�ư�����γ��ϡ���ߤ��Ǥ��ޤ���' );

define( $constpref.'_FFMPEG_PATH',              'ffmpeg ���ޥ�ɤΥѥ�' );
define( $constpref.'_FFMPEG_PATH_DESC',         'ffmpeg ���ޥ�ɤΥѥ���ɬ�פʾ��˻��ꤷ�Ƥ���������' );

define( $constpref.'_DEBUG' ,                   '�ǥХå��⡼�ɤ�ͭ���ˤ���' );
define( $constpref.'_DEBUG_DESC' ,              '�ǥХå��⡼�ɤˤ���� elFinder �� "elfinder.min.css", "elfinder.min.js" �ǤϤʤ����<br>����ɤ߹��ߤޤ���<br />�ޤ���<br>ript �Υ쥹�ݥ󥹤˥ǥХ������ޤ�ޤ���<br />�ѥե����ޥ󥹸���Τ���ˡ��̾�ϥǥХå��⡼�ɤ�̵���ˤ��Ʊ��Ѥ��뤳�Ȥ򤪴��ᤷ�ޤ���' );

// admin/dropbox.php
define( $constpref.'_DROPBOX_STEP1' ,        'Step 1: App �κ���');
define( $constpref.'_DROPBOX_GOTO_APP' ,     '���Υ���� (Dropbox.com) �� App ��������� App key �� App secre �����������������Ρ�%s�פȡ�%s�פ����ꤷ�Ƥ���������');
define( $constpref.'_DROPBOX_GET_TOKEN' ,    'Dropbox App Token �μ���');
define( $constpref.'_DROPBOX_STEP2' ,        'Step 2: Dropbox �عԤ������ץ��ǧ��');
define( $constpref.'_DROPBOX_GOTO_CONFIRM' , '���Υ���� (Dropbox.com) �ؿʤߡ����ץ��ǧ�Ĥ��Ƥ���������');
define( $constpref.'_DROPBOX_CONFIRM_LINK' , 'Dropbox.com �عԤ������ץ��ǧ�Ĥ���');
define( $constpref.'_DROPBOX_STEP3' ,        'Step 3: ������λ���������������');
define( $constpref.'_DROPBOX_SET_PREF' ,     '�����ͤ��������γƹ��ܤ����ꤷ�Ƥ���������');

// admin/googledrive.php
define( $constpref.'_GOOGLEDRIVE_GET_TOKEN', 'Google Drive Token �μ���');

// admin/composer_update.php
define( $constpref.'_COMPOSER_UPDATE' ,       'plugins/vendor ���åץǡ���(composer update)');
define( $constpref.'_COMPOSER_DO_UPDATE' ,    '���åץǡ��Ȥ�¹Ԥ���(�������ٻ��֤��ݤ���ޤ�)');
define( $constpref.'_COMPOSER_UPDATE_STARTED','���åץǡ��Ȥ򳫻Ϥ��ޤ������֥��åץǡ��Ȥ���λ���ޤ������פ�ɽ�������ޤǤ��Ԥ�������...');
define( $constpref.'_COMPOSER_DONE_UPDATE' ,  '���åץǡ��Ȥ���λ���ޤ�����');

}
