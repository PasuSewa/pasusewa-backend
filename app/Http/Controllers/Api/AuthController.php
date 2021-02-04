<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;

use App\Models\User;

use Illuminate\Support\Facades\Crypt;

use PragmaRX\Google2FA\Google2FA;

use App\Notifications\EmailTwoFactorAuth;

class AuthController extends Controller
{
    public function sendCodeByEmail(Request $request)
    {
        $data = $request->only('email', 'isSecondary');

        $validation = Validator::make($data, [
            'email' => 'required|email|exists:users,email',
            'isSecondary' => 'required|boolean',
        ], [
            'rquired' => 'El campo es obligatorio',
            'email' => 'El campo ingresado no es un email válido',
            'exists' => 'El email ingresado no existe',
            'boolean' => 'El tipo de valor recibido no es correcto'
        ]);

        if($validation->fails())
        {
            return response()->json([
                'message' => 'There was an Error in the validation.',
                'errors' => $validation->errors()
            ], 400);
        }

        $user = User::where('email', $data['email'])->first();

        $code = rand(100000, 999999);

        $user->two_factor_code_email = Crypt::encryptString($code);

        $user->save();

        $antiFishingSecret = Crypt::decryptString($user->anti_fishing_secret);

        $user->notify(new EmailTwoFactorAuth($code, $antiFishingSecret, $user->preferred_lang));

        return response()->json([
            'message' => 'Email enviado con éxito.'
        ], 200);
    }
}