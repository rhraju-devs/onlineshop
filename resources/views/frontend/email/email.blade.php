<p>
    Hi, <br>
    You have a new contact email from your website. <br><br>
    <strong>Details : </strong><br>
    <strong>Name : </strong> {{$data['name']}}<br>
    <strong>Email : </strong> {{$data['email']}}<br>
    <strong>Message : </strong> <em>{{$data['message']}}</em>
</p>


@component('mail::message')
# You have a new contact email from your website. <br><br>
###  ***Name :*** {{$data['name']}}<br>
###  ***Email :*** {{$data['email']}}<br>
###  ***Subject :*** {{$data['subject']}}<br>
###  ***Issue :*** {{$data['issue']}}<br>

Dear, <br>

###  ***{{$data['message']}}***<br>
<br>
@component('mail::button', ['url' => 'http://onlineshop.raju/'])
Visit Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
