<?php

    namespace App\Mail;

    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Queue\SerializesModels;

    class ContactUsMail extends Mailable{
        use Queueable, SerializesModels;

        public $data;

        public function __construct($data){
            $this->data = $data;
        }

        public function build(){
            return $this->from($this->data['email_from_address'])->view('admin.mails.contactus');
        }
    }
