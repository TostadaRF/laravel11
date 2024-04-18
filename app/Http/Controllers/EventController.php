<?php

namespace App\Http\Controllers;

use Error;
use App\Models\Event;
use App\Mail\NewEventEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{

    public function index(Request $request)
    {
        Log::channel('debugger')->info('Se ha accedido a la lista de usuarios.');

        $search = $request->input('search');
        $events = Event::where('active', 1)->get();


        if($search){
            $events = Event::where('active', 1)->where('name', 'like', '%'.$search.'%')
            ->orWhere('assistants_limit', 'like', '%'.$search.'%')
            ->get();
        }

        return view('events.index', compact('events'));
    }


    public function create(Request $request)
    {
        Log::channel('debugger')->info('Se ha accedido a la creación de un evento.');
        if (isset($request->error)){
            $error = $request->error;
            return view('events.create', compact('error'));
        }
        return view('events.create');
    }


    public function store(Request $request)
    {
        DB::beginTransaction();

        // Obtener la ID del usuario autenticado
        $user = Auth::user();

        $role = $request->input('role');
        if ($role == 'admin') {
            $event = Event::create([
                'id_user' => $user->id, // ID del usuario creador
                'name' => $request->name, // Nombre del evento
                'description' => $request->description, // Descripción del evento
                'assistants' => 0, // Inicialmente no hay asistentes
                'assistants_limit' => $request->assistants_limit, // Límite de asistentes permitidos
                'lat' => $request->lat, // Latitud del lugar del evento
                'lng' => $request->lng, // Longitud del lugar del evento
                'date' => $request->date, // Fecha y hora del evento
                'sponsored' => false, // Inicialmente no está patrocinado
                'active' => true, // Inicialmente el evento está activo
            ]);
        }else{
            $event = Event::create([
                'id_user' => $user->id,
                'name' => $request->name,
                'description' => $request->description,
                'assistants' => 0,
                'assistants_limit' => $request->assistants_limit,
                'lat' => $request->lat,
                'lng' => $request->lng,
                'date' => $request->date,
                'sponsored' => false,
            ]);
        }

        Mail::to(Auth::user()->email)->send(new NewEventEmail($user, $event));

        DB::commit();
            Log::channel('debugger')->info('Usuario creado correctamente.');

            if($role == 'admin'){
                session()->flash('success', 'Usuario creado correctamente.');
                return redirect()->route('users.index');
            }else{
                session()->flash('success', 'Usuario creado correctamente. Por favor, compruebe su email para verificar su cuenta.');
                return redirect()->route('home');
            }

    }


    public function show(string $id)
    {
        $event = Event::find($id);
        return view('events.show', compact('event'));
    }


    public function edit(string $id)
    {
        $event = Event::find($id);
        return view('events.edit', compact('event'));
    }


    public function update(Request $request, string $id)
    {
        $event = Event::find($id);
        $event->name = $request->name;
        $event->description = $request->description;
        $event->assistants_limit = $request->assistants_limit;
        $event->lat = $request->lat;
        $event->lng = $request->lng;
        $event->date = $request->date;
        $event->sponsored = $request->has('sponsored'); // Asignar true si el campo está presente

        $event->save();

        session()->flash('info', 'Evento actualizado correctamente.');
        return redirect()->route('events.index');
    }

    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->active = 0;
        $event->save();

        session()->flash('success', 'Evento eliminado correctamente.');
        return redirect()->route('events.index');
    }
}