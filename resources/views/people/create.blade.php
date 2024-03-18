<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row">
                        <!-- form -->
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <h5 class="mb-0">Add menu form</h5>
                            </div>

                            <div class="row">
                                <div class="card-body">
                                    <form method="post" action="{{route('people.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input name="name" type="text" class="form-control" placeholder="type here">
                                            @if($errors->has('name'))
                                                <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Surname</label>
                                            <input name="surname" type="text" class="form-control" placeholder="type here">
                                            @if($errors->has('surname'))
                                                <p class="alert alert-danger">{{ $errors->first('surname') }}</p>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">RSA ID Nmber</label>
                                            <input name="sa_id_number" type="text" class="form-control" placeholder="type here">
                                            @if($errors->has('sa_id_number'))
                                                <p class="alert alert-danger">{{ $errors->first('sa_id_number') }}</p>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Mobile Number	</label>
                                            <input name="mobile_number" type="text" class="form-control" placeholder="type here">
                                            @if($errors->has('mobile_number'))
                                                <p class="alert alert-danger">{{ $errors->first('mobile_number') }}</p>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email Address	</label>
                                            <input name="email_address" type="email" class="form-control" placeholder="type here">
                                            @if($errors->has('email_address'))
                                                <p class="alert alert-danger">{{ $errors->first('email_address') }}</p>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Birth Date</label>
                                            <input name="birth_date" id="birth_date" class="date form-control" type="text" placeholder="dd/mm/YY">
                                            @if($errors->has('birth_date'))
                                                <p class="alert alert-danger">{{ $errors->first('birth_date') }}</p>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Language</label>
                                            <select name="language" class="form-select">
                                                <option value="" selected disabled></option>
                                                <option value="Afrikaans">Afrikaans</option>
                                                <option value="English">English</option>
                                                <option value="Ndebele">Ndebele</option>
                                                <option value="Pedi">Pedi</option>
                                                <option value="seSotho">seSotho</option>
                                                <option value="South African Sign Language">South African Sign Language</option>
                                                <option value="Swati">Swati</option>
                                                <option value="Swati">Swati</option>
                                                <option value="Tsonga">Tsonga</option>
                                                <option value="Tswana">Tswana</option>
                                                <option value="Venda">Venda</option>
                                                <option value="Xhosa">Xhosa</option>
                                                <option value="Zulu">Zulu</option>
                                            </select>
                                            @if($errors->has('language'))
                                                <p class="alert alert-danger">{{ $errors->first('language') }}</p>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Interest</label>
                                            <select name="interest[]" class="form-select" id="interest-list" data-placeholder="Choose anything" multiple>
                                                <option>Sports.</option>
                                                <option>Dance.</option>
                                                <option>Swimming</option>
                                                <option>Board games</option>
                                                <option>Vlogging</option>
                                                <option>Acting</option>
                                                <option>Gym</option>
                                                <option>Language learning</option>
                                                <option>Social media</option>
                                            </select>
                                            @if($errors->has('interest'))
                                                <p class="alert alert-danger">{{ $errors->first('interest') }}</p>
                                            @endif
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary fullWidth">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /vertical form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script type="text/javascript">
    $('#birth_date').datepicker();

    $( '#interest-list' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
        closeOnSelect: false,
    } );
</script>
