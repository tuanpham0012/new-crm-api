<?php

namespace App\Http\Controllers\OpenAi;

use Gemini\Data\Blob;
use Gemini\Enums\Role;
use GuzzleHttp\Client;
use Gemini\Data\Content;
use Gemini\Enums\MimeType;
use Illuminate\Http\Request;
use Gemini\Laravel\Facades\Gemini;
use App\Http\Controllers\Controller;
use App\Models\ChatAi;

class GptChatController extends Controller
{
    protected $model;
    public function __construct(ChatAi $model)
    {
        $this->model = $model;
    }

    public function chatBot(){
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
}
