<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clients</title>
    <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
</head>
<body>
<div class="full-container">
    <div class="container">
    @foreach($clients->chunk(18) as $chunk)
        @if ($loop->first)
            @php
                $lastItems = $chunk->splice(2);
            @endphp
                <div class="row">
                    @foreach($chunk as $client)
                        <div class="{{$loop->first ? 'col-right' : 'col-left'}}">
                            <img id="client_{{$client->id}}" src="{{$client->photo}}" alt="{{$client->name}}" class="register_image {{$client->registered ? '' : 'sr-only'}}">
                        </div>
                    @endforeach
                </div>

                @if (count($lastItems))
                    @foreach($lastItems->chunk(8) as $smallChunk)
                        <div class="row">
                            @foreach($smallChunk as $i=>$client)
                                <div class="{{($loop->index == 0 or $loop->index== 1) ? 'col-left' : 'col-right'}}">
                                    <img id="client_{{$client->id}}" src="{{$client->photo}}" alt="{{$client->name}}" class="register_image {{$client->registered ? '' : 'sr-only'}}">
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                @endif

        @else
            <div class="row">
                @foreach($chunk as $client)
                    <div class="col-left">
                        <img id="client_{{$client->id}}" src="{{$client->photo}}" alt="{{$client->name}}" class="register_image {{$client->registered ? '' : 'sr-only'}}">
                    </div>
                @endforeach
            </div>
        @endif
    @endforeach

</div>
</div>
</body>


<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script>
    var pusher = new Pusher('0e6579b84c894c7090e7', {
        cluster: 'eu',
        forceTLS: true
    });

    var channel = pusher.subscribe('clientChannel');
    channel.bind('App\\Events\\SearchEvent', function(data) {
        let element = document.getElementById('client_'+data.id);
        element.classList.remove('sr-only');
    });

    var removeRegister = pusher.subscribe('removeRegisters');
    removeRegister.bind('App\\Events\\RemoveRegistersEvent', function(data) {
        let elements = document.getElementsByTagName('img');
        for (let i = 0; i < elements.length; i++) {
            elements[i].classList.add('sr-only');
        }
    });
</script>
</html>
