@component('mail::message')
    # Hostings renewal reminder
    Here is the list of the domains that need to be renewed soon or are outdated:
@component('mail::table')
    | Domain                  | Renewal infos                     |
    | ----------------------- | ---------------------------------:|
@foreach ($affectedHostings as $hosting)
| {{ $hosting['domain']}}  | {{ $hosting['daysBeforeRenewal'] > 0 ? "Renewal in {$hosting['daysBeforeRenewal']} days" : 'Renewal outdated by ' . -$hosting['daysBeforeRenewal']. ' days'  }} |
@endforeach
@endcomponent


# Access the application

@component('mail::button', ['url' => config('app.url')])
    {{ config('app.name') }}
@endcomponent
@endcomponent
