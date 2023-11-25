<?php
namespace App\Services;
use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements INewsletter 
{

    public function __construct(protected ApiClient $client){
        //
    }
    public function subscribe(string $email , string $list = null){
        //null safe assignment => (??=) if the variable is null ($list) then assign the right of the operator, else we will stick with what you pass
        $list ??= config('services.mailchimp.lists.subscribers');

        return $this->client->lists->addListMember($list,[
            'email_address' => $email ,
            'status' => 'subscribed'
        ]);
    }

}
