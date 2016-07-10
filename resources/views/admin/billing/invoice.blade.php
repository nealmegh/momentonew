
<table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Name</th>
            <th>Service</th>
            <th>Location</th>
            <th>Commission</th>
            <th>Total</th>
            <th>Deatils</th>
        </tr>
        </thead>

        <tbody>

@foreach($agents as $agent)
    <?php $total_price = 0; ?>
    @foreach($agent->agentBooking as $booking)
        <?php $total_price += $booking->total_price; ?>
    @endforeach
{{--@if(array_key_exists($agent->user_id, $prices))--}}

          <tr>
            <th scope="row"><a style="display:block;" href="#">1</a></th>
            <td></td>
            <td>{{$agent->first_name}}</td>
            <td>@mdo</td>
            <td></td>

            @if( isset($agent->agentMarkup->commission))
            <td>{{ $total_price + ($total_price*$agent->agentMarkup->commission)/100 }}</td>
            @else
            <td> 0 </td>
            @endif
              <td>{{ $total_price }}</td>

              <td><a href="/admin/billing/{{$agent->id}}"> <button type="button" class="btn btn-primary btn-small">Show Deatail</button></a></td>

        </tr>

{{--@endif--}}
        @endforeach

        {{--<tr>--}}
            {{--<th scope="row">2</th>--}}
            {{--<td>Jacob</td>--}}
            {{--<td>Thornton</td>--}}
            {{--<td>@fat</td>--}}
            {{--<td>abd</td>--}}
            {{--<td>abd</td>--}}
            {{--<td>abd</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<th scope="row">3</th>--}}
            {{--<td>Larry</td>--}}
            {{--<td>the Bird</td>--}}
            {{--<td>@twitter</td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
        {{--</tr>--}}
        </tbody>
    </table>

