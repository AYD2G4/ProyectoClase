@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <?php $temp = Auth::user()->informacion->puesto;
                    if($temp == 0){
                      echo "<H1>BIENVENIDO AUTORIDAD</H1>";
                    }elseif($temp ==1){
                      echo "<H1>BIENVENIDO ADMINISTRADOR</H1>";
                    }else{
                      echo "<H1>BIENVENIDO OPERADOR</H1>";
                    }



                    ?>

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
