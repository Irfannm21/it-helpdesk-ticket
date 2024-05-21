<?php

namespace App\Models;

use App\Models\Model;
use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Ticket extends Model
{
    protected $table = 'trans_ticket';

    protected $fillable = [
        'code',
        'client_id',
        'datetime',
        'description',
        'status',
    ];

    protected $casts = [
        'datetime' => 'datetime',
    ];

    public function client() {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function handleStoreOrUpdate($request)
    {
        $this->beginTransaction();
        try {
            $this->fill($request->all());
            $ticket = Ticket::count();
            $this->code = $ticket + 1;
            $this->datetime = now();
            $this->client_id = Auth::user()->id;
            if($request->action == "submit") {
                $this->status = "Waiting";
            } else {
                $this->status = "Draft";
            }
            // dd($this->action);
            $this->save();

            // return $this->commitSaved();
            $this->commitSaved();
            if(request()->route()->getName() == 'ticket.store') {
                return redirect()->route('ticket.index')->with('message', 'Ticket added successfully!');
            } else {
                return redirect()->route('ticket.index')->with('message', 'Ticket Upddated successfully!');
            }
        } catch (\Exception $e) {
            return $this->rollbackSaved($e);
        }
    }

    public function handleDestroy()
    {
        $this->beginTransaction();
        try {
            $this->delete();
            $this->commitDeleted();
            return redirect()->route('ticket.index')->with('message', 'Delete Client successfully!');
        } catch (\Exception $e) {
            return $this->rollbackDeleted($e);
        }
    }

}
