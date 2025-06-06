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
        $promptu=$request->input('prompt'); // Get the prompt from the request
        $prompt="vous etes un expert en IT, vous devez repondre a la question suivante,".$promptu."  :  REPONDRE TOUJOURS AVEC LA MEME LANGUE DE LA QUESTION. repondre  a la question sans introduction ni conclusion"; // Add a question mark at the end
        
       // $prompt = $prompt . ' : ' . $promptu; // Concatenate the prompt with the user input
       var_dump($prompt);
        $hfToken = env('HF_TOKEN'); // Get your Hugging Face token from your .env file

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
                return $data2; // Return the content directly
                // You can log or process $data2 as needed
                // Process the response data here
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