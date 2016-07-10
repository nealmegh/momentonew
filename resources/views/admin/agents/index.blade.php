@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Articles Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        @include('admin.agents._left-menu')
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                @include('flash::message')
                <h1 class="no-margin skin-color">Agents Manager!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                {{--<a href="{{ url('admin/articles/create') }}" class="button btn-small sky-blue1">Add New Article</a>--}}

                <hr />

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Total Transaction</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach($agents_p as $agent)
                    {{--<article>--}}
                        {{--<h3>--}}
                            {{--<a  href="{{url('articles', $agent->id)}}" >{{ $agent->title }}</a> (Category: {{ $agent->category_id }})--}}
                        {{--</h3>--}}
                        {{--<div class="body">--}}
                          {{--{{ $agent->body }}--}}
                        {{--</div>--}}
                    {{--</article>--}}

                    {{----}}
                        <tr>
                            <td>{{ $agent->id }}</td>
                            <td>{{ $agent->first_name.' '.$agent->last_name }}</td>
                            <td>{{ $agent->email }}</td>
                            <td>{{ $agent->phone_no }}</td>
                            <td>{{ $agent->total_amount }}</td>

                            <td class="text-right">
                                <a href="{{ url('admin/agents/commission/'.$agent->id)  }}" class="button btn-mini green">SET AGENT COMMISSION</a>
                                <a href="{{ url('admin/agents/hotels?for='.$agent->id)  }}" class="button btn-mini green">ASSIGN HOTELS</a>
                                {{--{!! Form::open(['method' => 'DELETE', 'url' => ['admin/articles/'.$agent->id], 'class'=>'inline-block']) !!}--}}
                                {{--<button--}}
                                        {{--class="btn-mini red"--}}
                                        {{--type="button"--}}
                                        {{--data-toggle="modal"--}}
                                        {{--data-target="#confirmDelete"--}}
                                        {{--data-title="Delete {{ $agent->title }} Hotel"--}}
                                        {{--data-message="Are you sure you want to delete this {{ $agent->name }} Hotel?"--}}
                                        {{-->--}}
                                    {{--<i class="glyphicon glyphicon-trash"></i> Delete--}}
                                {{--</button>--}}
                                {{--{!! Form::close() !!}--}}
                            </td>
                        </tr>

                @endforeach

                    </tbody>
                </table>
                <?php  echo $agents_p->render();?>

            </div>
        </div>
    </div>
@endsection