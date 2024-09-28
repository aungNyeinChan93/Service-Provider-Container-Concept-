<div class="counter">

    <h1 style="text-align: center">Care about people's approval and you will be their prisoner.</h1>

    <h2>
        <button wire:click="increment">+</button>
        {{ $count }}
        <button wire:click="decrement">-</button>
    </h2>

    <button style="background: rebeccapurple ; padding:10px; border-radius:10px;color:white" wire:click="change">{{ $text }}</button>

</div>
