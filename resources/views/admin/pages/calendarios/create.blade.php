
<div class="container-fluid">
    <form action="{{ route('calendarios.store') }}" class="form" method="POST">
        @csrf
        @include('admin.pages.calendarios._partials.form')
    </form>
</div>


