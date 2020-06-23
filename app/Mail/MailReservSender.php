<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Record;

class MailReservSender extends Mailable
{
    use Queueable, SerializesModels;


    protected $record;
    protected $roomName;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Record $record, $roomName)
    {
        $this->record = $record;
        $this->roomName = $roomName;
        // место где нужно собрать сообщение
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('reservation.email')
        ->to('madilyan2016@mail.ru')
        ->subject("Заявка на бронь")
        ->with([
          'record' => $this->record,
          'room_name' => $this->roomName,
          'route_confirm' => "http://127.0.0.1:8000/reservation/confirm/client/{$this->record->uuid}"
        ]);
    }
}
