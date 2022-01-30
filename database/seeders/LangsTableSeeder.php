<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $langs =  [
            [
                'code' => 'en',
                'name' => 'English',
                'directionality' => 'ltr',
                'local' => 'English',
                'wiki' => 'en:English language',
                'full' => 'British English',
                'short' => 'English - UK',
                'abbrev' => 'en-uk'
            ],
            [
                'code' => 'en',
                'name' => 'English',
                'directionality' => 'ltr',
                'local' => 'English',
                'wiki' => 'en:English language',
                'full' => 'American English',
                'short' => 'English - US',
                'abbrev' => 'en-us'
            ],
            [
                'code' => 'ar',
                'name' => 'Arabic',
                'directionality' => 'rtl',
                'local' => 'العربية',
                'wiki' => 'en:Arabic language',
                'full' => 'Arabic',
                'short' => 'Arabic',
                'abbrev' => 'ar'
            ],
            [
                'code' => 'pt',
                'name' => 'Portuguese',
                'directionality' => 'ltr',
                'local' => 'Português',
                'wiki' => 'pt:Língua portuguesa',
                'full' => 'Brazilian Portuguese',
                'short' => 'Portuguese - BR',
                'abbrev' => 'pt-br'
            ],
            [
                'code' => 'zh',
                'name' => 'Chinese',
                'directionality' => 'ltr',
                'local' => '中文',
                'wiki' => '	zh:汉语',
                'full' => 'Chinese',
                'short' => 'Chinese',
                'abbrev' => 'zh'
            ],
            [
                'code' => 'hr',
                'name' => 'Croatian',
                'directionality' => 'ltr',
                'local' => 'Hrvatski',
                'wiki' => 'en:Croatian language',
                'full' => 'Croatian',
                'short' => 'Croatian',
                'abbrev' => 'hr'
            ],
            [
                'code' => 'cs',
                'name' => 'Czech',
                'directionality' => 'ltr',
                'local' => 'Česky',
                'wiki' => 'cs:Čeština',
                'full' => 'Czech',
                'short' => 'Czech',
                'abbrev' => 'cs'
            ],
            [
                'code' => 'da',
                'name' => 'Danish',
                'directionality' => 'ltr',
                'local' => 'Dansk',
                'wiki' => 'da:Dansk (sprog)',
                'full' => 'Danish',
                'short' => 'Danish',
                'abbrev' => 'da'
            ],
            [
                'code' => 'nl',
                'name' => 'Dutch',
                'directionality' => 'ltr',
                'local' => 'Nederlands',
                'wiki' => 'nl:Nederlands',
                'full' => 'Dutch',
                'short' => 'Dutch',
                'abbrev' => 'nl'
            ],
            [
                'code' => 'es',
                'name' => 'Spanish',
                'directionality' => 'ltr',
                'local' => 'Español',
                'wiki' => 'es:Idioma español',
                'full' => 'European Spanish',
                'short' => 'Spanish - ES',
                'abbrev' => 'es-es'
            ],
            [
                'code' => 'fi',
                'name' => 'Finnish',
                'directionality' => 'ltr',
                'local' => 'Suomi',
                'wiki' => 'fi:Suomen kieli',
                'full' => 'Finnish',
                'short' => 'Finnish',
                'abbrev' => 'fi'
            ],
            [
                'code' => 'fr',
                'name' => 'French',
                'directionality' => 'ltr',
                'local' => 'Français',
                'wiki' => 'fr:Français',
                'full' => 'French',
                'short' => 'French',
                'abbrev' => 'fr'
            ],
            [
                'code' => 'de',
                'name' => 'German',
                'directionality' => 'ltr',
                'local' => 'Deutsch',
                'wiki' => 'de:Deutsche Sprache',
                'full' => 'German',
                'short' => 'German',
                'abbrev' => 'de'
            ],
            [
                'code' => 'el',
                'name' => 'Greek',
                'directionality' => 'ltr',
                'local' => 'Ελληνικά',
                'wiki' => 'el:Ελληνική γλώσσα',
                'full' => 'Greek',
                'short' => 'Greek',
                'abbrev' => 'el'
            ],
            [
                'code' => 'it',
                'name' => 'Italian',
                'directionality' => 'ltr',
                'local' => 'Italiano',
                'wiki' => 'it:Lingua italiana',
                'full' => 'Italian',
                'short' => 'Italian',
                'abbrev' => 'it'
            ],
            [
                'code' => 'ja',
                'name' => 'Japanese',
                'directionality' => 'ltr',
                'local' => '日本語',
                'wiki' => 'ja:日本語',
                'full' => 'Japanese',
                'short' => 'Japanese',
                'abbrev' => 'ja'
            ],
            [
                'code' => 'ko',
                'name' => 'Korean',
                'directionality' => 'ltr',
                'local' => '한국어',
                'wiki' => 'en:Korean language',
                'full' => 'Korean',
                'short' => 'Korean',
                'abbrev' => 'ko'
            ],
            [
                'code' => 'no',
                'name' => 'Norwegian',
                'directionality' => 'ltr',
                'local' => 'Norsk (bokmål / riksmål)',
                'wiki' => 'no:Norsk',
                'full' => 'Norwegian',
                'short' => 'Norwegian',
                'abbrev' => 'no'
            ],
            [
                'code' => 'pl',
                'name' => 'Polish',
                'directionality' => 'ltr',
                'local' => 'Polski',
                'wiki' => 'pl:Język polski',
                'full' => 'Polish',
                'short' => 'Polish',
                'abbrev' => 'pl'
            ],
            [
                'code' => 'pt',
                'name' => 'Portuguese',
                'directionality' => 'ltr',
                'local' => 'Português',
                'wiki' => 'pt:Língua portuguesa',
                'full' => 'European Portuguese',
                'short' => 'Portuguese - PT',
                'abbrev' => 'pt-pt'
            ],
            [
                'code' => 'ro',
                'name' => 'Romanian',
                'directionality' => 'ltr',
                'local' => 'Română',
                'wiki' => 'ro:Limba română',
                'full' => 'Romanian',
                'short' => 'Romanian',
                'abbrev' => 'ro'
            ],
            [
                'code' => 'ru',
                'name' => 'Russian',
                'directionality' => 'ltr',
                'local' => 'Русский',
                'wiki' => 'ru:Русский язык',
                'full' => 'Russian',
                'short' => 'Russian',
                'abbrev' => 'ru'
            ],
            [
                'code' => 'es',
                'name' => 'Spanish',
                'directionality' => 'ltr',
                'local' => 'Español',
                'wiki' => 'es:Idioma español',
                'full' => 'Latin American Spanish',
                'short' => 'Spanish - LA',
                'abbrev' => 'es-la'
            ],
            [
                'code' => 'sv',
                'name' => 'Swedish',
                'directionality' => 'ltr',
                'local' => 'Svenska',
                'wiki' => 'sv:Svenska',
                'full' => 'Swedish',
                'short' => 'Swedish',
                'abbrev' => 'sv'
            ],
            [
                'code' => 'th',
                'name' => 'Thai',
                'directionality' => 'ltr',
                'local' => 'ไทย / Phasa Thai',
                'wiki' => 'en:Thai language',
                'full' => 'Thai',
                'short' => 'Thai',
                'abbrev' => 'th'
            ],
            [
                'code' => 'tr',
                'name' => 'Turkish',
                'directionality' => 'ltr',
                'local' => 'Türkçe',
                'wiki' => 'en:Turkish language',
                'full' => 'Turkish',
                'short' => 'Turkish',
                'abbrev' => 'tr'
            ],
            [
                'code' => 'uk',
                'name' => 'Ukrainian',
                'directionality' => 'ltr',
                'local' => 'Українська',
                'wiki' => 'en:Ukrainian language',
                'full' => 'Ukrainian',
                'short' => 'Ukrainian',
                'abbrev' => 'uk'
            ],
            [
                'code' => 'vi',
                'name' => 'Vietnamese',
                'directionality' => 'ltr',
                'local' => 'Việtnam',
                'wiki' => 'en:Vietnamese language',
                'full' => 'Vietnamese',
                'short' => 'Vietnamese',
                'abbrev' => 'vi'
            ],
        ];

        foreach ($langs as $lang) {
            DB::table('langs')->insert($lang);
        }
    }
}
