<?php

namespace App\Http\Controllers\OpenAi;

use Gemini\Data\Blob;
use App\Models\ChatAi;
use Gemini\Enums\Role;
use GuzzleHttp\Client;
use Gemini\Data\Content;
use Gemini\Enums\MimeType;
use Illuminate\Http\Request;
use Gemini\Laravel\Facades\Gemini;
use App\Http\Controllers\Controller;
use Stichoza\GoogleTranslate\GoogleTranslate;

class GptChatController extends Controller
{
    protected $model;
    public function __construct(ChatAi $model)
    {
        $this->model = $model;
    }

    public function chatBot()
    {
        return view('pages.chat');
    }

    public function gpt(Request $request)
    {
        try {
            $data = $request->histories ?? [];
            $histories = array();

            foreach ($data as $item) {
                $histories[] = Content::parse($item['message'], $item['role'] == ChatAi::ROLE_USER ? Role::USER : Role::MODEL);
            }
            // dd($histories);
            // array_push($histories, [
            //     Content::parse(part: $request->content),
            // ]);
            // $histories = [
            //         Content::parse(part: 'Xin chào!'),
            //         Content::parse(part: 'Chào bạn! Thật vui khi được trò chuyện với bạn. Bạn muốn trò chuyện về điều gì hôm nay?', role: Role::MODEL),
            //         Content::parse(part: 'bạn là ai?'),
            //         Content::parse(part: 'Tôi là Gemini, một mô hình ngôn ngữ AI được Google đào tạo. Tôi được thiết kế để giúp đỡ mọi người với các nhiệm vụ khác nhau, chẳng hạn như trả lời câu hỏi, tạo văn bản và dịch ngôn ngữ.', role: Role::MODEL),
            //       ];
            // dd($histories);

            $this->model->create([
                'uuid' => $request->uuid,
                'content' => $request->content,
                'role' => ChatAi::ROLE_USER
            ]);
            $chat = Gemini::chat()
                ->startChat($histories);
            $response = $chat->sendMessage($request->content);
            $this->model->create([
                'uuid' => $request->uuid,
                'content' => $response->text(),
                'role' => ChatAi::ROLE_MODEL
            ]);
            return response()->json([
                'code' => 200,
                'data' => [
                    'message' => $response->text(),
                    'role' => 'model'
                ]

            ], 200);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function translateText(Request $request)
    {
        $this->langSuport();
        dd(GoogleTranslate::trans('Hello again', 'vi', 'en'));
    }

    public function langSuport()
    {
        $a = 'Afrikaans af Albanian sq Amharic am Arabic ar Armenian hy Assamese as Aymara ay Azerbaijani az
Bambara	bm
Basque	eu
Belarusian	be
Bengali	bn
Bhojpuri	bho
Bosnian	bs
Bulgarian	bg
Catalan	ca
Cebuano	ceb
Chinese(Simplified)	zh
Chinese(Traditional)	zh-TW
Corsican	co
Croatian	hr
Czech	cs
Danish	da
Dhivehi	dv
Dogri	doi
Dutch	nl
English	en
Esperanto	eo
Estonian	et
Ewe	ee
Filipino(Tagalog)	fil
Finnish	fi
French	fr
Frisian	fy
Galician	gl
Georgian	ka
German	de
Greek	el
Guarani	gn
Gujarati	gu
Haitian-Creole	ht
Hausa	ha
Hawaiian	haw
Hebrew	he
Hindi	hi
Hmong	hmn
Hungarian	hu
Icelandic	is
Igbo	ig
Ilocano	ilo
Indonesian	id
Irish	ga
Italian	it
Japanese	ja
Javanese	jv
Kannada	kn
Kazakh	kk
Khmer	km
Kinyarwanda	rw
Konkani	gom
Korean	ko
Krio	kri
Kurdish	ku
Kurdish(Sorani)	ckb
Kyrgyz	ky
Lao	lo
Latin	la
Latvian	lv
Lingala	ln
Lithuanian	lt
Luganda	lg
Luxembourgish	lb
Macedonian	mk
Maithili	mai
Malagasy	mg
Malay	ms
Malayalam	ml
Maltese	mt
Maori	mi
Marathi	mr
Meiteilon(Manipuri)	mni-Mtei
Mizo	lus
Mongolian	mn
Myanmar(Burmese)	my
Nepali	ne
Norwegian	no
Nyanja(Chichewa)	ny
Odia(Oriya)	or
Oromo	om
Pashto	ps
Persian	fa
Polish	pl
Portuguese(Portugal,Brazil)	pt
Punjabi	pa
Quechua	qu
Romanian	ro
Russian	ru
Samoan	sm
Sanskrit	sa
Scots-Gaelic	gd
Sepedi	nso
Serbian	sr
Sesotho	st
Shona	sn
Sindhi	sd
Sinhala(Sinhalese)	si
Slovak	sk
Slovenian	sl
Somali	so
Spanish	es
Sundanese	su
Swahili	sw
Swedish	sv
Tagalog(Filipino)	tl
Tajik	tg
Tamil	ta
Tatar	tt
Telugu	te
Thai	th
Tigrinya	ti
Tsonga	ts
Turkish	tr
Turkmen	tk
Twi(Akan)	ak
Ukrainian	uk
Urdu	ur
Uyghur	ug
Uzbek	uz
Vietnamese	vi
Welsh	cy
Xhosa	xh
Yiddish	yi
Yoruba	yo
Zulu	zu';

        $b = str_replace("\n", ' ', str_replace("\t", ' ', $a));
        $arr = explode(' ', $b);
        $result = [];
        for( $i = 0 ; $i < count($arr) - 1; $i+=2){
            $result[] = [
                'name' => $arr[$i],
                'code' => $arr[$i+1]
            ];
        }
        $a = '[';
        foreach ($result as $item) {
            $a .= '[' . " 'name' => '" . $item['name'] . "', 'code' => '" . $item['code'] . "'],";
        }
        echo($a . ']');

    }

}
