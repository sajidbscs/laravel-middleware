$this->middleware('verify');



Route:: get('verify{email}/{token}', 'Auth\RegisterController@verifyemail');


 @if (session ('message'))
            <h4 class="alert alert-info text-center">{{session('message')}}
                @endif 



                 $user = \App\User::findOrFail(Auth::id());
       if($user->status == 0)
        Auth::logout();
        return redirect('login')->with('message','You Need to Verify Your Account First,Check You Email');


        'verify' => \App\Http\Middleware\verifyUserByEmail::class,


          protected function verifyemail($email, $token){
        $user = User::where (['email'=>$email,'verifyToken' =>$token])->first();
        if($user){
            $user->status = 1;
            $user->verifyToken = '';
            $user->save();
            return redirect('login')->with('message','Your Account Successfully Verified, You Can Login');
        }else{
            return redirect('login')->with('messsage','Invalid Token or Email');
        }
    }
    