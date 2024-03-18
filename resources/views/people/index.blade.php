<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('People List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <a href="{{url('/people/create') }}" type="button" class="btn btn-primary fullWidth">Add New Person</a>
                        </div>
                    </div>
                    <!-- Basic table -->
                    <div class="row">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        {{--                                        <th>id</th>--}}
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>RSA ID#</th>
                                        <th>Mobile#</th>
                                        <th>Email Addr</th>
                                        <th>Date of B.</th>
                                        <th>Language</th>
                                        <th>Interest</th>
                                        <th>Created @</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($people) > 0)
                                        @foreach($people as $person)
                                            <tr>
                                                <td>{{$person->name}}</td>
                                                <td>{{$person->surname}}</td>
                                                <td>{{$person->sa_id_number}}</td>
                                                <td>{{$person->mobile_number}}</td>
                                                <td><a href="mailto:{{$person->email_address}}}">{{$person->email_address}}</a></td>
                                                <td>{{$person->birth_date}}</td>
                                                <td>{{$person->language}}</td>
                                                <td>
                                                    @if(count(json_decode($person->interest)) > 0)
                                                        @foreach(json_decode($person->interest) as $interest)
                                                            <span class="badge badge-dark">{{$interest}}</span>
                                                        @endforeach
                                                    @endif

                                                </td>
                                                <td>{{$person->created_at}}</td>
                                                <td>
                                                    <form action="/people/{{$person->id}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /basic table -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
