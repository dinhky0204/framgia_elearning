@extends('admin.layout')

@section('users')

    <!-- Main contents -->

    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <h3 class="fa fa-book">{{ trans('admin_users.user-list') }}</h3>
                        </header>

                        <br>
                        <br>

                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                <th><i class="icon_profile"></i> {{ trans('admin_users.full-name') }}</th>
                                <th><i class="icon_mail_alt"></i> {{ trans('admin_users.email') }}</th>
                                <th><i class="icon_images"></i> {{ trans('admin_users.avatar') }}</th>
                                <th><i class="icon_cogs"></i> {{ trans('admin_users.delete') }}</th>
                            </tr>

                            @foreach($data as $element)

                                <tr>
                                    <td>{{ $element->name }}</td>
                                    <td>{{ $element->email }}</td>
                                    <td>
                                        <img src="/public/img/avatar1.jpg" alt="" border="3" height="100" width="100"/>
                                    </td>
                                    <td>
                                        <form action="/admin/users/{{ $element->id }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button>{{ trans('admin_users.delete-user') }}</button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </section>
    </section>
@endsection