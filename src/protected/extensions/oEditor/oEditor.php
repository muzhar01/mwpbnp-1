<?php

require_once(dirname(__FILE__) . '/TinyMceCompressorAction.php');

/**
 * @property
 */
class oEditor extends CInputWidget
{

    public $width = '600';
    public $height = '450';
    public $custom_tags = '';
    public $oEditor = 'oEdit1';
    public $id ='data';

    /** @var bool|string Route to compressor action */
    public $compressorRoute = false;
    //public $content_css= '["/contentbuilder/assets/minimalist/content.css","/themes/beatrix/fonts/font-awesome/css/font-awesome.min.css"]';

    /**
     * @deprecated use spellcheckerUrl instead
     * @var bool|string Route to spellchecker action
     */
    public $spellcheckerRoute = false;

    /**
     * For example here could be url to yandex spellchecker service.
     * http://speller.yandex.net/services/tinyspell
     * More info about it here: http://api.yandex.ru/speller/doc/dg/tasks/how-to-spellcheck-tinymce.xml
     *
     * @var bool|string|array URL or an action route that can be used to create a URL or false if no url
     */
    public $spellcheckerUrl = false;


    private $assetsDir;
    /** @var bool|string Must be set to force widget language */
    public $language = false; // editor language, if false app language is used
    /**
     * @var bool|array FileManager configuration.
     * For example:
     * 'fileManager' => array(
     *      'class' => 'TinyMceElFinder',
     *      'connectorRoute'=>'admin/elfinder/connector',
     * )
     */
    public $fileManager = false;
    /** @var array Supported languages */
    private static $languages = array(
        'ar', 'ar_SA', 'bg_BG', 'bn_BD', 'bs', 'ca', 'cs', 'cy', 'da', 'de', 'de_AT', 'el', 'es', 'et', 'eu', 'fa', 'fi', 'fo',
        'fr_FR', 'gl', 'he_IL', 'hr', 'hu_HU', 'hy', 'id', 'it', 'ja', 'ka_GE', 'ko_KR', 'lb', 'lt', 'lv', 'ml', 'mn_MN', 'nb_NO', 'nl',
        'pl', 'pt_BR', 'pt_PT', 'ro', 'ru', 'si_LK', 'sk', 'sl_SI', 'sr', 'sv_SE', 'ta', 'ta_IN', 'th_TH', 'tr_TR', 'tt', 'ug', 'uk',
        'uk_UA', 'vi', 'vi_VN', 'zh_CN', 'zh_TW', 'en_GB', 'km_KH', 'tg', 'az', 'en_CA', 'is_IS',
        'be', 'dv', 'kk', 'ml_IN', 'gd',
    ); // widget supported languages


    private static $defaultSettings = array(

        'language' => 'en_CA',
        'fontsize_formats' => "8px 10px 12px 14px 18px 24px 36px 42px 48px",
        'plugins' => array(
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "template paste textcolor" 
        ),
        'toolbar' => "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor | fontsizeselect | fontselect ",
        'valid_elements'=>'script[language|type|src]',
        'toolbar_items_size' => 'small',
        'theme_advanced_fonts' => "Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats",
        'verify_html' => false,
        'extended_valid_elements' => "iframe[src|frameborder|style|scrolling|class|width|height|name|align]",
        'cleanup' => false,
        'paste_data_images' => true,
        'image_advtab' => true,
        'relative_urls' => false,
        'valid_children' => "+body[link]",
        'spellchecker_languages' => "+Русский=ru",
        'content_css' => '/themes/rapidadmin/css/Adminsheet.css',
    );
    /** @var array Widget settings will override defaultSettings */
    public $settings = array();

    public function init()
    {
        $dir = dirname(__FILE__) . '/vendors/tinymce';
        $this->assetsDir = Yii::app()->assetManager->publish($dir);

        $this->settings = array_merge(self::$defaultSettings, $this->settings);

        if ($this->language === false)
            $this->settings['language'] = Yii::app()->language;
        else
            $this->settings['language'] = $this->language;
        if (!in_array($this->settings['language'], self::$languages)) {
            $lang = false;
            foreach (self::$languages as $i) {
                if (strpos($this->settings['language'], $i))
                    $lang = $i;
            }
            if ($lang !== false)
                $this->settings['language'] = $lang;
            else
                $this->settings['language'] = 'en';
        }
        $this->settings['language'] = strtr($this->settings['language'], '_', '-');

        $this->settings['height'] = $this->height.'px';

       // $this->settings['external_plugins']['moxiemanager'] = '/css/moxiemanager/plugin.js';



        if ($this->spellcheckerUrl !== false) {
            $this->settings['plugins'][] = 'spellchecker';
            $this->settings['spellchecker_rpc_url'] = CHtml::normalizeUrl($this->spellcheckerUrl);
        }

    }

    public function run()
    {
        list($name, $id) = $this->resolveNameID();
       if (isset($this->htmlOptions['id']))
            $id = $this->htmlOptions['id'];
        else
            $this->htmlOptions['id'] = $id;

        if (isset($this->htmlOptions['name']))
            $name = $this->htmlOptions['name'];

        if (isset($this->model)) {
            echo CHtml::textArea($name, CHtml::resolveValue($this->model, $this->attribute), $this->htmlOptions);
        } else {
            echo CHtml::textArea($name, $this->value, $this->htmlOptions);
        }
        $this->registerScripts($id);
    }

    private function registerScripts($id)
    {

        $cs = Yii::app()->getClientScript();
        $cs->registerCoreScript('jquery');
        $cs->registerCssFile('/css/tinypop.css'); 
        if ($this->compressorRoute === false) {
            $cs->registerScriptFile($this->assetsDir . '/js/tinymce/tinymce.min.js');
            $cs->registerScriptFile($this->assetsDir . '/js/tinymce/jquery.tinymce.min.js');
        } else {
            $opts = array(
                'files' => 'jquery.tinymce',
                'source' => defined('YII_DEBUG') && YII_DEBUG,
            );
            $opts["plugins"] = strtr(implode(',', $this->settings['plugins']), array(' ' => ','));
            if (isset($this->settings['theme'])) $opts["themes"] = $this->settings['theme'];
            $opts["languages"] = $this->settings['language'];
            $cs->registerScriptFile(TinyMceCompressorAction::scripUrl($this->compressorRoute, $opts));
        }


        if ($this->fileManager !== false) {
            /** @var $fm TinyMceFileManager */
            $fm = Yii::createComponent($this->fileManager);
            $fm->init();
            $this->settings['file_browser_callback'] = $fm->getFileBrowserCallback();
        }

        $settings = CJavaScript::encode($this->settings);

        $cs->registerScript("{$id}_tinyMce_init", "$('#{$id}').tinymce({$settings});");
    }
}
