@include('dashboard::widgets.visitor24', array('data' => $data))
@include('dashboard::widgets.allUsers', array('data' => $data))
@include('dashboard::widgets.sessDur', array('data' => $data))
@include('dashboard::widgets.pageViews', array('data' => $data))
@include('dashboard::widgets.typeTraffic', array('data' => $data))
@include('dashboard::widgets.topReferral', array('data' => $data))

<script type="text/javascript">
// это будет выполняться сразу по загрузке )

{{-- */ $dateStart = explode('-', $data['dates'][0]); $all = 0; foreach($data['typeTraffic'] as $traff){ $all = $all+$traff; } /* --}}

$(document).ready(function(){
        data = {
            visitsDay: {
                hours: [62, 57, 85, 65, 142, 150, 166, 132, 103, 66, 48, 42, 57, 85, 49, 152, 170, 116, 112, 103, 66, 48, 182, 62, 81],
                start: {
                    hour: 14,
                    day: 7
                }
            },
            visitsMonth: {
                day:
                [
                @foreach($data['UsersByDate'] as $visitorsDateBlock)
                {{ $visitorsDateBlock[1] }},
                @endforeach
                    ],
                start: {
                    day: {{ $dateStart[2] }},
                    month: {{ $dateStart[1] }}
                }
            },
            sessionDurationByDate: {
                day:
                [
                @foreach($data['SessDurationByDate'] as $sessDurationDateBlock)
                {{ round($sessDurationDateBlock[1]/60, 1) }},
                @endforeach
                    ],
                start: {
                    day: {{ $dateStart[2] }},
                    month: {{ $dateStart[1] }}
                }
            },
            typesTraffic: [{
                y: ({{ round($data['typeTraffic']['social'] / $all * 100, 1) }}),
                name: 'Соц. Сети',
                selected: true
            }, {
                y: ({{ round($data['typeTraffic']['search'] / $all * 100, 1) }}),
                name: 'Поисковики'
            }, {
                y: ({{ round($data['typeTraffic']['referral'] / $all * 100, 1) }}),
                name: 'Рефералы'
            }, {
                y: ({{ round($data['typeTraffic']['direct'] / $all * 100, 1) }}),
                name: 'Прямые заходы'
            }],
            typesSourceTraffic: [
            {{-- */ $index = 0; $refAll = $data['typeTraffic']['social'] + $data['typeTraffic']['search'] + $data['typeTraffic']['referral']; /* --}}
            @foreach($data['topReferral'] as $refName => $reffer)

            {
                y: {{ round($reffer / $refAll * 100, 1) }},
                name: '{{ $refName }}',
                @if($index == 0) selected: true @endif
            },
            {{-- */ $index++; /* --}}
            @endforeach
            ]
        };

        setCharts(data);
});



</script>