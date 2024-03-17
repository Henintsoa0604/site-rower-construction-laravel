@extends('layouts.app')

@section('content')
<div class="container">  
       
            
                    <form class="form-login" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}                     
                                                
                                <div class="profile-pic" style="margin-left:100px;" >
                                <p><img src="{{ asset('backend/img/login.png') }}" class="img-circle"></p>                               
                                </div>                         
                        <div class="login-wrap">   
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                             <label for="email" >E-Mail</label>                       
            
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                           <label for="password">Mot de passe</label>

                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                          
                        </div>
                            <hr>

                        <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> CONNEXION</button>
                      
                        <div class="registration">
                             <br/>
                             
                            <a class="" href="{{ url('/register') }}">
                            visite notre site
                            </a>
                        </div>

                       
                    </form>
               
            
    
</div>
@endsection
