<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function gitPull(Request $request)
    {
        $payload = json_decode($request->getContent(), true);

        if (isset($payload['ref'])) {
            $branch = $payload['ref'];
        } else {
            return response()->json(['error' => 'Invalid payload'], 401);
        }

        $branch = str_replace('refs/heads/', '', $branch);

        if ($branch == 'main') {
            chdir('../laravel');
            $outputPull = shell_exec('git pull');
            $outputBuild = shell_exec('npm run build');
            $outputRsync = shell_exec('rsync -av --progress --exclude "index.php" public/ ../public_html/');

            return response()->json(['output' => [$outputPull, $outputBuild, $outputRsync]]);
        }

        return response()->json(['error' => 'Invalid branch'], 401);
    }
}
