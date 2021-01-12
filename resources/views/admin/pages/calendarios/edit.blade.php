<form action="{{ route('calendarios.update', $calendario->id) }}" class="form" method="POST">
    @method('PUT')
    @csrf
    @include('admin.pages.calendarios._partials.form')
</form>

