<?php

namespace App\Models;

use App\Models\Model;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Workplan extends Model
{
    protected $table = "trans_workplan";
    
    protected $fillable = [
        'technician_id',
        'ticket_id',
        'started',
        'finished',
        'description',
        'status',
    ];

    protected $casts = [
        'started' => 'datetime',
        'finished' => 'datetime'
    ];

    public function ticket() {
        return $this->belongsTo(Ticket::class,'ticket_id');
    }

    public function user() {
        return $this->belongsTo(User::class,'technician_id');
    }

    public function handleStoreOrUpdate($request)
    {
        $this->beginTransaction();
        try {
            $this->fill($request->all());
            if($request->action == "submit") {
                $this->started = $request->date ." ". $request->started . ":00";
                $this->finished = $request->date ." ". $request->finished . ":00";
                $this->status = "Completed";    
                $this->save();
            } else {
                $this->status = "Draft";    
                $this->started = $request->date ." ". $request->started . ":00";
                $this->finished = $request->date ." ". $request->finished . ":00";
                $this->save();
            }
            // dd($this->action);
            // return $this->commitSaved();
            $this->commitSaved();
            if(request()->route()->getName() == 'workplan.store') {
                return redirect()->route('workplan.index')->with('message', 'Workplan added successfully!');
            } else {
                return redirect()->route('workplan.index')->with('message', 'Workplan Upddated successfully!');
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
