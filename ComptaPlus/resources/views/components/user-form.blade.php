<div class="form">
    <div class="tools-links">
        <a href="{{URL::previous()}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5" />
            </svg>
            Retour users
        </a>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger alert-static">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if($users)
    <div class="header">
        Modifier User : &nbsp; <strong> {{$users->name}}</strong>
    </div>
    @else
    <div class="header">
        Création users
    </div>
    @endif

    <form action="{{ $users ? route('admin.users.update', $users->id) : route('admin.users.store') }}" method="post">
        @csrf
        @if($users)
        @method('patch')
        @endif
        <input type="hidden" name="previous_url" value="{{ url()->previous() }}">
        <div class="mb-3">
            <label for="name" class="form-label">Title</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ old('name', $users->name ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Price</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email', $users->email ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" value="">
            <label for="passwordConfirm" class="form-label">password Confirm</label>
            <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" placeholder="Enter password" value="">
        </div>
        @can('updateAdmin',$users)
        <div class="mb-3">
            <label for="role" class="form-label">role</label>
            
            <select class="form-select" id="role" name="role">
                <option disabled selected value="">Choisissez Role</option>
                @foreach ($roles as $key => $role)
                    @if( $users->role === $role)
                    <option value="{{$role}}" selected>{{ucfirst($role)}}</option>
                    @else
                    <option value="{{$role }}">{{ucfirst($role)}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        @endcan
        <button type="submit" class="button-custom">{{ $users ? 'Update' : 'Create' }}</button>
    </form>
</div>