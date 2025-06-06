<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HuggingFaceController extends Controller
{
    public function start()
    {
        return view('llm.start'); // Return a view for the LLM interface
    }
    public function index(Request $request)
    {
        $promptu=$request->input('prompt'); 
        $prompt="vous etes un expert en IT, vous devez repondre a la question suivante,".$promptu."  :  REPONDRE TOUJOURS AVEC LA MEME LANGUE DE LA QUESTION. repondre  a la question sans introduction ni conclusion"; // Add a question mark at the end
        
      
        $hfToken = env('HF_TOKEN'); 

        if (!$hfToken) {
            return response()->json(['error' => 'Hugging Face token (HF_TOKEN) not set in .env'], 500);
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $hfToken,
                'Content-Type' => 'application/json',
            ])->post('https://router.huggingface.co/nebius/v1/chat/completions', [
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $prompt,
                    ],
                ],
                'model' => 'mistralai/Mistral-Nemo-Instruct-2407',
                'stream' => false,
            ]);

            // Check if the request was successful
            if ($response->successful()) {
                $data = $response->json();
                $data2 = $data['choices'][0]['message']['content'] ?? 'No content returned';
               // return $data2; // Return the content directly
                return view('llm.index', ['response' => $data2]); // Return a view with the response
               // return response()->json($data);
            } else {
                // Handle unsuccessful response
                return response()->json([
                    'error' => 'Hugging Face API request failed',
                    'status' => $response->status(),
                    'body' => $response->body()
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }
}

?>