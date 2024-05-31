<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <header>
        <table style="border:none; width: 100%;">
            <tr>
                <td style="border:none;  text-align: center; font-size: 14pt;" width="auto">
                    <b>{{ __('WORKPLAN IT HELPDESK') }}</b>
                </td>
                <td style="border:none; text-align: right; font-size: 12px;" width="100px">
                    <b></b>
                </td>
            </tr>
        </table>
        <hr>
    </header>
    <main>
        <table style="border:none; width:100%;">
            <tr>
                <td style="vertical-align: top; border:none; width:40%;">
                    <table style="border:none; width:100%;">
                        <tr>
                            <td style="vertical-align: top; border: none; width: 130px;">{{ __('Client ID') }}</td>
                            <td style="vertical-align: top; border: none; width: 10px; text-align: left;">:</td>
                            <td style="vertical-align: top; border: none; text-align: left;">
                                {{ $realization->workplan->ticket->client->code }}
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; border: none; width: 130px;">{{ __('Name') }}</td>
                            <td style="vertical-align: top; border: none; width: 10px; text-align: left;">:</td>
                            <td style="vertical-align: top; border: none; text-align: left;">
                                {{ $realization->workplan->ticket->client->name }}
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; border: none; width: 130px;">{{ __('Position') }}</td>
                            <td style="vertical-align: top; border: none; width: 10px; text-align: left;">:</td>
                            <td style="vertical-align: top; border: none; text-align: left;">
                                {{ $realization->workplan->ticket->client->position->name }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <hr>
        <h2 style="border:none; text-align: center;" width="100px">
            <b>Issue</b>
        </h2>
        <table style="border:none; width:100%;">
            <tr>
                <td style="vertical-align: top; border:none; width:40%;">
                    <table style="border:none; width:100%;">
                        <tr>
                            <td style="vertical-align: top; border: none; width: 130px;">{{ __('Ticket ID') }}</td>
                            <td style="vertical-align: top; border: none; width: 10px; text-align: left;">:</td>
                            <td style="vertical-align: top; border: none; text-align: left;">
                                {{ $realization->workplan->ticket->code }}
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; border: none; width: 130px;">{{ __('Datetime') }}</td>
                            <td style="vertical-align: top; border: none; width: 10px; text-align: left;">:</td>
                            <td style="vertical-align: top; border: none; text-align: left;">
                                {{ $realization->workplan->ticket->datetime->format('d-m-Y H:i') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; border: none; width: 130px;">{{ __('Description') }}</td>
                            <td style="vertical-align: top; border: none; width: 10px; text-align: left;">:</td>
                            <td style="vertical-align: top; border: none; text-align: left;">
                                {{ $realization->workplan->ticket->description }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <h2 style="border:none; text-align: center;" width="100px">
            <b>Workplan Date</b>
        </h2>
        <table style="border:none; width:100%;">
            <tr>
                <td style="vertical-align: top; border:none; width:40%;">
                    <table style="border:none; width:100%;">
                        <tr>
                            <td style="vertical-align: top; border: none; width: 130px;">{{ __('Technician Name') }}
                            </td>
                            <td style="vertical-align: top; border: none; width: 10px; text-align: left;">:</td>
                            <td style="vertical-align: top; border: none; text-align: left;">
                                {{ $realization->workplan->user->name . ' (' . $realization->workplan->user->position->name . ')' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; border: none; width: 130px;">{{ __('Execution Time') }}
                            </td>
                            <td style="vertical-align: top; border: none; width: 10px; text-align: left;">:</td>
                            <td style="vertical-align: top; border: none; text-align: left;">
                                {{ $realization->workplan->started->format('d-m-Y') }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table style="width:100%; border: 1px solid black">
            <thead style="border: 1px solid black">
                    <th style="border: 1px solid black;width: 20px;">No</th>
                    <th style="border: 1px solid black;width: 20px;">Hardware ID</th>
                    <th style="border: 1px solid black;width: 20px;">Repair Date</th>
                    <th style="border: 1px solid black;width: 250px;">Description</th>
                </thead>
                <tbody style="border: 1px solid black">
                    @foreach ($realization->details as $item)
                    <tr>
                        <td style="text-align: center; border: 1px solid black">
                            {{$loop->iteration}}
                        </td>
                        <td style="text-align: center; border: 1px solid black">
                            {{ $item->product->code }}
                        </td>
                        <td style="text-align: center; border: 1px solid black">{{$item->started->format('d-m-Y')}} <br> {{$item->started->format('H:i') . " - " . $item->finished->format('H:i')}}</td>
                        <td style="text-align: center; border: 1px solid black">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius porro nulla vel vitae tempora neque veritatis blanditiis minus sequi dolores. Corrupti deserunt fuga nam nisi possimus quo minima optio est.</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>

    </main>
</body>

</html>
