<form wire:submit.prevent="update" class="formLogin row">

    @csrf
    @method('PUT')

    <input type="hidden" wire:model="user_id">

    <div class="col-md-6 mb-3">
        <label for="form-label">First Name</label>
        <input id="first_name"
            type="text"
            wire:model="first_name"
            class="form-control @error('first_name') validation @enderror"
            >

        @error('first_name')
            <div class="form-text validation pb-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="form-label">Last Name</label>
        <input id="last_name"
            type="text"
            wire:model="last_name"
            class="form-control @error('last_name') validation @enderror"
            >
        @error('last_name')
            <div class="form-text validation pb-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="form-label">Email</label>
        <input type="text"
            wire:model="email"
            class="form-control @error('email') validation @enderror"
            >
        @error('email')
            <div class="form-text validation pb-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="form-label">Timezone</label>
        <select wire:model="timezone" class="form-select @error('timezone') validation @enderror">
            <option selected disabled>Open this select menu</option>
            @foreach ($timezones as $item)
                <option value="{{ $item }}">{{ $item }}</option>
            @endforeach
        </select>
        @error('timezone')
            <div class="form-text validation pb-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="form-label">Date Format</label>
        <select wire:model="date_format" class="form-select @error('date_format') validation @enderror">
            <option selected disabled>Open this select menu</option>
            @foreach ($dates as $item)
                <option value="{{ $item['id'] }}">{{ $item['text'] }}</option>
            @endforeach
        </select>
        @error('date_format')
            <div class="form-text validation pb-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-12 d-flex flex-row-reverse">
        <button type="submit" class="btn-next mt-3">Submit</button>
    </div>

</form>
