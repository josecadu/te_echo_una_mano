<?php

namespace App\Livewire;

use App\Models\User;
use Geocoder\Laravel\Facades\Geocoder as Geocoder;
use Livewire\Component;


use Illuminate\Support\Facades\Auth;

class RegistrarUser extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $direccion;

    protected $rules = [
        'name' => 'required|string|max:100',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:6|max:20',
        'direccion' => 'required|string|max:255',
    ];

    public function save(){
        $this->validate();
           // dd($this->direccion);

        //codificar la direccion a coordenadas con el geocoder
        $resultado = app('geocoder')->geocode($this->direccion)->get();
        //$result = Geocoder::geocode($this->direccion)->get();
        dd($resultado->toArray());
        $lat = null;
        $lng = null;
        if($result->isNotEmpty()){
            $ubicacion = $result->first();
            $lat = $ubicacion->getCoordinates()->getLatitude();
            $lng = $ubicacion->getCoordinates()->getLongitude();
        }
        dd($lat , $lng);
        $user = User::create( [
            'name'=> $this->name,
            'email'=> $this->email,
            'password'=>bcrypt($this->password),
            'direccion'=>$this->direccion,
            'lat'=> $lat,
            'lng'=> $lng,

        ]);

        
        Auth::login($user);
        return redirect()->route('dashboard');
    }
    
        
    
    public function render()
    {
        return view('livewire.registrar-user');
    }
}
