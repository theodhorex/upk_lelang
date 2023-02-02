<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <div>
        <input wire:model="search" id="search" type="text" placeholder="Search users..." />

        <ul>
            @foreach($users as $user)
            <li>{{ $user->username }}</li>
            @endforeach
        </ul>
    </div>
</div>