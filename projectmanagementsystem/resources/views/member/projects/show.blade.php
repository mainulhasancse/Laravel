@extends('layouts.member-app')

@section('page-title')
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="{{ $pageIcon }}"></i> {{ $pageTitle }} #{{ $project->id }} - <span class="font-bold">{{ ucwords($project->project_name) }}</span></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('member.dashboard') }}">@lang('app.menu.home')</a></li>
                <li><a href="{{ route('member.projects.index') }}">{{ $pageTitle }}</a></li>
                <li class="active">@lang('modules.projects.overview')</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection

@push('head-script')
<link rel="stylesheet" href="{{ asset('plugins/bower_components/icheck/skins/all.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bower_components/custom-select/custom-select.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bower_components/multiselect/css/multi-select.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
@endpush

@section('content')

    <div class="row">
        <div class="col-md-12">

            <section>
                <div class="sttabs tabs-style-line">
                    <div class="white-box">
                        <nav>
                            <ul>
                                <li class="tab-current"><a href="{{ route('member.projects.show', $project->id) }}"><span>@lang('modules.projects.overview')</span></a>
                                </li>
                                <li><a href="{{ route('member.project-members.show', $project->id) }}"><span>@lang('modules.projects.members')</span></a></li>
                                <li><a href="{{ route('member.tasks.show', $project->id) }}"><span>@lang('app.menu.tasks')</span></a></li>
                                <li><a href="{{ route('member.files.show', $project->id) }}"><span>@lang('modules.projects.files')</span></a></li>
                                <li><a href="{{ route('member.time-log.show-log', $project->id) }}"><span>@lang('app.menu.timeLogs')</span></a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="content-wrap">
                        <section id="section-line-1" class="show">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="white-box">
                                        <h3 class="b-b">Project #{{ $project->id }} - <span
                                                    class="font-bold">{{ ucwords($project->project_name) }}</span></h3>

                                        <div>{!!  $project->project_summary !!}</div>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-sm-12">
                                    <div class="white-box">
                                        <div class="row row-in">
                                            <div class="col-lg-3 col-sm-6 row-in-br">
                                                <div class="col-in row">
                                                    <div class="col-md-6 col-sm-6 col-xs-6"><i class="ti-layout-list-thumb"></i>
                                                        <h5 class="text-muted vb">@lang('modules.projects.openTasks')</h5>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <h3 class="counter text-right m-t-15 text-danger">{{ count($openTasks) }}</h3>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-danger"
                                                                 role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                                 aria-valuemax="100" style="width: {{ $openTasksPercent }}%"><span
                                                                        class="sr-only">{{ $openTasksPercent }}% Complete (success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                                                <div class="col-in row">
                                                    <div class="col-md-6 col-sm-6 col-xs-6"><i
                                                                class="ti-calendar"></i>
                                                        <h5 class="text-muted vb">@lang('modules.projects.daysLeft')</h5>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <h3 class="counter text-right m-t-15 text-info">{{ $daysLeft }}</h3>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-info"
                                                                 role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                                 aria-valuemax="100" style="width: {{ $daysLeftPercent }}%"><span
                                                                        class="sr-only">{{ $daysLeftPercent }}% Complete (success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 row-in-br">
                                                <div class="col-in row">
                                                    <div class="col-md-6 col-sm-6 col-xs-6"><i class="ti-alarm-clock"></i>
                                                        <h5 class="text-muted vb">@lang('modules.projects.hoursLogged')</h5>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <h3 class="counter text-right m-t-15 text-success">{{ $hoursLogged }}</h3>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success"
                                                                 role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                                 aria-valuemax="100" style="width: 100%"><span
                                                                        class="sr-only">100% Complete (success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6  b-0">
                                                <div class="col-in row">
                                                    <div class="col-md-6 col-sm-6 col-xs-6"><i class="ti-alert"></i>
                                                        <h5 class="text-muted vb">@lang('modules.projects.issuesPending')</h5>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <h3 class="counter text-right m-t-15 text-warning">{{ count($pendingIssues) }}</h3>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-warning"
                                                                 role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                                 aria-valuemax="100" style="width: {{ $pendingIssuesPercent }}%"><span
                                                                        class="sr-only">{{ $pendingIssuesPercent }}% Complete (success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">

                                        {{-- client details --}}
                                        <div class="col-md-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">@lang('modules.client.clientDetails')</div>
                                                <div class="panel-wrapper collapse in">
                                                    <div class="panel-body">
                                                        <dl>
                                                            <dt>@lang('modules.client.companyName')</dt>
                                                            <dd class="m-b-10">{{ $project->client->client[0]->company_name }}</dd>

                                                        </dl>
                                                        <dl>
                                                            <dt>@lang('modules.client.clientName')</dt>
                                                            <dd class="m-b-10">{{ ucwords($project->client->name) }}</dd>

                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- project members --}}
                                        <div class="col-md-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">@lang('modules.project.members')</div>
                                                <div class="panel-wrapper collapse in">
                                                    <div class="panel-body">
                                                        <div class="message-center">
                                                            @forelse($project->members as $member)
                                                            <a href="#">
                                                                <div class="user-img">
                                                                    {!!  ($member->user->image) ? '<img src="'.asset('storage/avatar/'.$member->user->image).'"
                                                            alt="user" class="img-circle" width="40">' : '<img src="'.asset('default-profile-2.png').'"
                                                            alt="user" class="img-circle" width="40">' !!}
                                                                </div>
                                                                <div class="mail-contnet">
                                                                    <h5>{{ ucwords($member->user->name) }}</h5>
                                                                    <span class="mail-desc">{{ $member->user->email }}</span>
                                                                </div>
                                                            </a>
                                                            @empty
                                                                @lang('messages.noMemberAddedToProject')
                                                            @endforelse
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        {{-- project members --}}
                                        <div class="col-md-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">@lang('modules.projects.openTasks')</div>
                                                <div class="panel-wrapper collapse in">
                                                    <div class="panel-body">
                                                        <ul class="list-task list-group" data-role="tasklist">
                                                            @forelse($openTasks as $key=>$task)
                                                            <li class="list-group-item" data-role="task">
                                                                {{ ($key+1).'. '.ucfirst($task->heading) }} <label
                                                                        class="label label-success pull-right">{{ $task->due_date->format('d M') }}</label>
                                                            </li>
                                                            @empty
                                                                <li class="list-group-item" data-role="task">
                                                                    @lang('modules.projects.noOpenTasks')
                                                                </li>
                                                            @endforelse
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- project members --}}
                                        <div class="col-md-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">@lang('modules.projects.issuesPending')</div>
                                                <div class="panel-wrapper collapse in">
                                                    <div class="panel-body">
                                                        <ul class="list-task list-group" data-role="tasklist">
                                                            @forelse($pendingIssues as $key=>$issue)
                                                                <li class="list-group-item" data-role="task">
                                                                    {{ ($key+1).'. '.ucfirst($issue->description) }}
                                                                </li>
                                                            @empty
                                                                <li class="list-group-item" data-role="task">
                                                                    @lang('messages.noOpenIssues')
                                                                </li>
                                                            @endforelse
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--Project Activity --}}
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">@lang('modules.projects.activityTimeline')</div>
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                                <div class="steamline">
                                                    @foreach($activities as $activ)
                                                    <div class="sl-item">
                                                        <div class="sl-left"><i class="fa fa-circle text-info"></i>
                                                        </div>
                                                        <div class="sl-right">
                                                            <div>{{ $activ->activity }} <span class="sl-date">{{ $activ->created_at->diffForHumans() }}</span></div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div><!-- /content -->
                </div><!-- /tabs -->
            </section>
        </div>


    </div>
    <!-- .row -->

@endsection

@push('footer-script')
<script src="{{ asset('js/cbpFWTabs.js') }}"></script>
<script src="{{ asset('plugins/bower_components/custom-select/custom-select.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/multiselect/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
//    (function () {
//
//        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function (el) {
//            new CBPFWTabs(el);
//        });
//
//    })();

    $('#timer-list').on('click', '.stop-timer', function () {
       var id = $(this).data('time-id');
        var url = '{{route('admin.time-logs.stopTimer', ':id')}}';
        url = url.replace(':id', id);
        var token = '{{ csrf_token() }}'
        $.easyAjax({
            url: url,
            type: "POST",
            data: {timeId: id, _token: token},
            success: function (data) {
                $('#timer-list').html(data.html);
            }
        })

    });

</script>
@endpush