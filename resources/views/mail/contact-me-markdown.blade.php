@component('mail::message')

# This is Heading about {{$data}}

Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero, blanditiis mollitia odit doloremque nisi voluptates
non autem, repellendus, consectetur eum quibusdam ut distinctio fuga delectus tenetur sint quae laboriosam possimus!

- The list
- Goes
- Here

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Visit Website
@endcomponent


@endcomponent