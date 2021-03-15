<div wire:model='exames'>
    @foreach ($exames as $exame)
    {{ $exame->id }}
    @endforeach
</div>
