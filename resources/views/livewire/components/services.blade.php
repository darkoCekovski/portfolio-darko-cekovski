<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($services as $i => $service)
        <x-service-card :service="$service" :index="$i"/>
    @endforeach
</div>
