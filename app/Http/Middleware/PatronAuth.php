<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

class PatronAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(\Auth::guest()){

            cas()->authenticate();

            $user = User::firstOrNew(['netid' => cas()->getCurrentUser()]);

            //if ($user->exists === false) {

                $username = "byui:$user->netid";

                $provider = new \League\OAuth2\Client\Provider\GenericProvider([
                    'clientId' => env('BYUI_OAUTH_CLIENTID'),    // The client ID assigned to you by the provider
                    'clientSecret' => env('BYUI_OAUTH_CLIENTSECRET'),   // The client password assigned to you by the provider
                    'redirectUri' => 'https://www.getpostman.com/oauth2/callback',
                    'urlAuthorize' => env('BYUI_API_BASE_URL') . '/authorize',
                    'urlAccessToken' => env('BYUI_API_BASE_URL') . '/token',
                    'urlResourceOwnerDetails' => 'https://ids.byui.edu/oauth2/userinfo?schema=openid'
                ]);

                //try {

                    // Try to get an access token using the client credentials grant.
                    $accessToken = $provider->getAccessToken('client_credentials');
                   /* dd($existingAccessToken);
                    $accessToken = $provider->getAccessToken('refresh_token', [
                        'refresh_token' => $existingAccessToken->getRefreshToken()
                    ]);*/
                    //\Log::info('Access Token: ' . $accessToken);
                    // Create a client with a base URI
                    $client = new \GuzzleHttp\Client();
                    // Send a request to https://apitemp.byui.edu/librarybridge/v1/cclaUser
                    try {

                        $response = $client->request('GET', env('BYUI_API_BASE_URL') . "/librarybridge/v1/cclaUser/".trim($username),
                            [
                                'connect_timeout' => 20,
                                'allow_redirects' => true,
                                'timeout' => 2000,
                                'headers' => [
                                    'Authorization' => "Bearer $accessToken"
                                ]
                            ]);

                        // Here the code for successful request

                        // TODO: Actually do something with this rather than dump it to the screen
                        $byuiUser = json_decode($response->getBody());

                        $user->first_name = $byuiUser->prefferedName;
                        $user->last_name = $byuiUser->surname;
                        if(strlen($byuiUser->personalContact->email) > 5){
                            $user->email = $byuiUser->personalContact->email;
                        }else{
                            $user->email = $byuiUser->workContact->email;
                        }

                        $user->save();

                    } catch (RequestException $e) {

                        // Catch all 4XX errors

                        // To catch exactly error 400 use
                        if ($e->getResponse()->getStatusCode() == '400') {
                            \Log::info('Response: ' . Psr7\str($e->getResponse()));
                        }
                        // exit(Psr7\str($e->getResponse()));
                        return redirect()->route('play');
                        // You can check for whatever error status code you need

                    } catch (\Exception $e) {

                        // There was another exception.
                        // exit(Psr7\str($e->getResponse()));
                        return redirect()->route('play');
                    }


                //} catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {

                    // Failed to get the access token
                    //exit($e->getMessage());

                //}

            //}

            auth()->login($user);

        }

        return $next($request);
    }
}
