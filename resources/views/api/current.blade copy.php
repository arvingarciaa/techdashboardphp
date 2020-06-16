<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
</head>
<body>
    {
        "posts": [
            @foreach($technologies as $tech)
            {
                "@timestamp": "{{$tech->created_at}}",
                "title": "{{$tech->name}}",
                "region": "{{$tech->region}}",
                "year": "{{$tech->year_developed}}",
                "commodities": [
                    @foreach($tech->commodities as $commodity)
                        "{{ $commodity->name }}"
                        @if (!$loop->last)
                            , 
                        @endif
                    @endforeach
                ],
                "sectors": [
                    @foreach($tech->commodities as $commodity)
                        "{{ $commodity->sector->name }}"
                        @if (!$loop->last)
                            , 
                        @endif
                    @endforeach
                ],
                "industries": [
                    @foreach($tech->commodities as $commodity)
                        "{{ $commodity->sector->industry->name }}"
                        @if (!$loop->last)
                            , 
                        @endif
                    @endforeach
                ],
                "categories": [
                    @foreach($tech->technology_categories as $techCategory)
                        "{{ $techCategory->name }}"
                        @if (!$loop->last)
                            , 
                        @endif
                    @endforeach
                ],
                "description":
                    @if($tech->description)
                        "{{$tech->description}}"
                    @else
                        null,
                    @endif

            }
            @if (!$loop->last)
                ,<br>
            @endif
            @endforeach
        ]
    }
</body>
    
</html>
