<th wire:click="setOrderFiled('{{ $name }}')" class='filter'>
    {{ $slot }}
    @if($actived)
        @if($direction === 'ASC')
        <i class="fa-solid fa-arrow-up"></i>
        @else
        <i class="fa-solid fa-arrow-down"></i>
        @endif
    @endif
</th>