<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Course;

class GeminiController extends Controller
{
    public function chat(Request $request)
    {
        $message = $request->message;

        $apiKey = trim(env('GROQ_API_KEY'));

        if(!$apiKey){
            return response()->json([
                'reply' => 'Chưa cấu hình GROQ_API_KEY trong file .env'
            ], 500);
        }

        $courses = Course::all(['name', 'total_time', 'price', 'description']);
        $courseContext = "Bạn là trợ lý ảo hỗ trợ tư vấn khóa học cho trung tâm SKYLAB CODING. Dưới đây là thông tin các khóa học đang có:\n";
        foreach($courses as $course) {
            $cleanDesc = strip_tags($course->description);
            $courseContext .= "- Tên khóa học: {$course->name}\n  + Giá: \${$course->price}\n  + Thời lượng: {$course->total_time}\n  + Mô tả: {$cleanDesc}\n\n";
        }
        $courseContext .= "Hãy dựa vào danh sách trên để tư vấn cho học viên nếu họ hỏi về khóa học.";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->post("https://api.groq.com/openai/v1/chat/completions", [
            "model" => "llama-3.1-8b-instant", // Sử dụng mô hình Llama 3.1 8B mới nhất
            "messages" => [
                [
                    "role" => "system",
                    "content" => $courseContext
                ],
                [
                    "role" => "user",
                    "content" => $message
                ]
            ]
        ]);

        if($response->failed()){
            return response()->json([
                'reply' => 'API lỗi: '.$response->body()
            ], 500);
        }

        $reply = $response->json()['choices'][0]['message']['content'] ?? "Không có phản hồi";

        return response()->json([
            'reply' => $reply
        ]);
    }
}