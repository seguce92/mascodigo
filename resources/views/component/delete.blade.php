@if ( isset( $type ) && $type == 'text'  )
<form action="{{ $route }}" class="inline" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="form-button-red">
        <i class="fa fa-trash-alt mr-2"></i>
        <span>Eliminar</span>
    </button>
</form>
@else
<form action="{{ $route }}" class="inline" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete hover:text-red-600">
        <i class="fa fa-trash-alt"></i>
    </button>
</form>
@endif