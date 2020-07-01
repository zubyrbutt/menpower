@extends('layouts.app')
@section('style')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #002f34;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        /*body {*/
        /*    font-family: sans-serif;*/
        /*    background-color: #eeeeee;*/
        /*}*/

        .file-upload {
            background-color: #ffffff;
            width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .file-upload-btn {
            width: 100%;
            margin: 0;
            color: #fff;
            background: #002f34;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #002f34;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }

        /*.file-upload-btn:hover {*/
        /*    background: #002f34;*/
        /*    color: #ffffff;*/
        /*    transition: all .2s ease;*/
        /*    cursor: pointer;*/
        /*}*/

        .file-upload-btn:active {
            border: 0;
            transition: all .2s ease;
        }

        .file-upload-content {
            display: none;
            text-align: center;
        }

        .file-upload-input {
            position: absolute;
            margin: 0;
            padding: 0;
            width: 90%;
            height: 90%;
            outline: none;
            opacity: 0;
            cursor: pointer;
        }

        .image-upload-wrap {
            margin-top: 20px;
            border: 4px dashed #002f34;
            position: relative;
        }

        /*.image-dropping,*/
        /*.image-upload-wrap:hover {*/
        /*    background-color: #002f34;*/
        /*    border: 4px dashed #ffffff;*/
        /*}*/

        .image-title-wrap {
            padding: 0 15px 15px 15px;
            color: #222;
        }

        .drag-text {
            text-align: center;
        }

        .drag-text h3 {
            font-weight: 100;
            text-transform: uppercase;
            color: #002f34;
            padding: 60px 0;
        }

        .file-upload-image {
            max-height: 200px;
            max-width: 200px;
            margin: auto;
            padding: 20px;
        }

        .remove-image {
            width: 200px;
            margin: 0;
            color: #fff;
            background: #cd4535;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #b02818;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }

        .remove-image:hover {
            background: #c13b2a;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .remove-image:active {
            border: 0;
            transition: all .2s ease;
        }
    </style>

@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('profileUpdate') }}">
                            @csrf

                            <label class="switch">
                                <input type="checkbox" value="1">
                                <span class="slider"></span>
                            </label>

                            <div class="align-items-center mb-2">
                                <img class="img-thumbnail" width="150" height="150" src="{{asset('/images/profile/profile.png')}}" alt="image">

                            </div>
                            <div class="form-group row">
                                <span></span>

                                <div class="col-md-6">
                                    Phone
                                    <input id="phone" type="text"
                                           class="form-control @error('phone') is-invalid @enderror" name="phone"
                                           value="{{Auth::user()->phone}}" readonly autocomplete="name">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-6">
                                    Email
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{Auth::user()->email != null ? Auth::user()->email : ''}}"
                                           autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-6">
                                    State
                                    <select id="state" data-dependent="city" name="state" class="form-control dynamic" onchange="getCity()">
                                        <option>Select satate</option>
                                        @foreach($locations as $location)
                                            <option value="2003000">{{$location->state}}</option>

                                        @endforeach
                                        {{--                                        <option value="2003000">Azad Kashmir</option>--}}
                                        {{--                                        <option value="2003001">Balochistan</option>--}}
                                        {{--                                        <option value="2003003">Islamabad Capital Territory</option>--}}
                                        {{--                                        <option value="2003005">Khyber Pakhtunkhwa</option>--}}
                                        {{--                                        <option value="2003004">Northern Areas</option>--}}
                                        {{--                                        <option value="2003006">Punjab</option>--}}
                                        {{--                                        <option value="2003007">Sindh</option>--}}
                                    </select>

                                    @error('state')
                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="col-md-6">
                                    City
                                    <select id="city" name="city" data-dependent="local" class="form-control">
                                        {{--                                        <option value="unknown"></option>--}}
                                        {{--                                        <option value="4060649">Ahmadpur East</option>--}}
                                        {{--                                        <option value="4060650">Arifwala</option>--}}
                                        {{--                                        <option value="4060651">Attock</option>--}}
                                        {{--                                        <option value="4060652">Bahawalnagar</option>--}}
                                        {{--                                        <option value="4060653">Bahawalpur</option>--}}
                                        {{--                                        <option value="4065535">Bhakkar</option>--}}
                                        {{--                                        <option value="4060654">Burewala</option>--}}
                                        {{--                                        <option value="4065543">Chakwal</option>--}}
                                        {{--                                        <option value="4065540">Chichawatni</option>--}}
                                        {{--                                        <option value="4060655">Chiniot</option>--}}
                                        {{--                                        <option value="4060656">Chishtian Mandi</option>--}}
                                        {{--                                        <option value="4060657">Daska</option>--}}
                                        {{--                                        <option value="4065563">Depalpur</option>--}}
                                        {{--                                        <option value="4060658">Dera Ghazi Khan</option>--}}
                                        {{--                                        <option value="4060660">Faisalabad</option>--}}
                                        {{--                                        <option value="4060661">Gojra</option>--}}
                                        {{--                                        <option value="4065554">Gujar Khan</option>--}}
                                        {{--                                        <option value="4060662">Gujranwala</option>--}}
                                        {{--                                        <option value="4060663">Gujrat</option>--}}
                                        {{--                                        <option value="4060664">Hafizabad</option>--}}
                                        {{--                                        <option value="1000000000002084">Haroonabad</option>--}}
                                        {{--                                        <option value="4065556">Hasan Abdal</option>--}}
                                        {{--                                        <option value="4060666">Hasilpur</option>--}}
                                        {{--                                        <option value="4060691">Haveli lakha</option>--}}
                                        {{--                                        <option value="4065564">Hazro</option>--}}
                                        {{--                                        <option value="4060665">Jaranwala</option>--}}
                                        {{--                                        <option value="4060667">Jhang Sadar</option>--}}
                                        {{--                                        <option value="4060668">Jhelum</option>--}}
                                        {{--                                        <option value="4060669">Kamoke</option>--}}
                                        {{--                                        <option value="4060687">Kasur</option>--}}
                                        {{--                                        <option value="4060671">Khanewal</option>--}}
                                        {{--                                        <option value="4060672">Khanpur</option>--}}
                                        {{--                                        <option value="4060690">Khushab</option>--}}
                                        {{--                                        <option value="4065541">Kot Addu</option>--}}
                                        {{--                                        <option value="4065544">Kotli</option>--}}
                                        {{--                                        <option value="4060673">Lahore</option>--}}
                                        {{--                                        <option value="4065537">Layyah</option>--}}
                                        {{--                                        <option value="4065565">Lodhran</option>--}}
                                        {{--                                        <option value="4065545">Mailsi</option>--}}
                                        {{--                                        <option value="4065538">Mandi Bahauddin</option>--}}
                                        {{--                                        <option value="4065546">Mian Chunnu</option>--}}
                                        {{--                                        <option value="4060674">Mianwali</option>--}}
                                        {{--                                        <option value="4060675">Multan</option>--}}
                                        {{--                                        <option value="4060676">Muridike</option>--}}
                                        {{--                                        <option value="4065542">Murree</option>--}}
                                        {{--                                        <option value="4060677">Muzaffargarh</option>--}}
                                        {{--                                        <option value="4065566">Nankana Sahib</option>--}}
                                        {{--                                        <option value="4065557">Narowal</option>--}}
                                        {{--                                        <option value="4060678">Okara</option>--}}
                                        {{--                                        <option value="4060679">Pakpattan</option>--}}
                                        {{--                                        <option value="4065555">Pindi Bhattian</option>--}}
                                        {{--                                        <option value="4060688">Pirmahal</option>--}}
                                        {{--                                        <option value="4060680">Rahimyar Khan</option>--}}
                                        {{--                                        <option value="4065569">Raiwind</option>--}}
                                        {{--                                        <option value="4065558">Rajanpur</option>--}}
                                        {{--                                        <option value="4060681">Rawalpindi</option>--}}
                                        {{--                                        <option value="4060682">Sadiqabad</option>--}}
                                        {{--                                        <option value="4060659">Safdar Abad</option>--}}
                                        {{--                                        <option value="4060683">Sahiwal</option>--}}
                                        {{--                                        <option value="4065570">Samundri</option>--}}
                                        {{--                                        <option value="4060684">Sargodha</option>--}}
                                        {{--                                        <option value="4065547">Shakargarh</option>--}}
                                        {{--                                        <option value="4060685">Sheikhüpura</option>--}}
                                        {{--                                        <option value="4060686">Sialkot</option>--}}
                                        {{--                                        <option value="4065548">Sohawa</option>--}}
                                        {{--                                        <option value="4065549">Talagang</option>--}}
                                        {{--                                        <option value="4065567">Taxila</option>--}}
                                        {{--                                        <option value="4060689">Toba Tek singh</option>--}}
                                        {{--                                        <option value="4065539">Vehari</option>--}}
                                        {{--                                        <option value="4060692">Wah</option>--}}
                                        {{--                                        <option value="4065536">Wazirabad</option>--}}
                                    </select>

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="col-md-6">
                                    Local Area
                                    <select id="local" name="local" class="form-control">
                                        {{--                                        <option value="5001183">ARL Colony</option>--}}
                                        {{--                                        <option value="5001205">AWT Housing Scheme</option>--}}
                                        {{--                                        <option value="5001165">Abid Majeed Road</option>--}}
                                        {{--                                        <option value="5001166">Adiala Road</option>--}}
                                        {{--                                        <option value="5001167">Affandi Colony</option>--}}
                                        {{--                                        <option value="5001168">Afshan Colony</option>--}}
                                        {{--                                        <option value="5001169">Ahmad Abad</option>--}}
                                        {{--                                        <option value="5001171">Airport Housing Society</option>--}}
                                        {{--                                        <option value="5001172">Airport Road</option>--}}
                                        {{--                                        <option value="5001173">Akalgarh</option>--}}
                                        {{--                                        <option value="5001178">Al Jannat Garden</option>--}}
                                        {{--                                        <option value="5001174">Al-Haram City</option>--}}
                                        {{--                                        <option value="5001175">Al-Noor Colony</option>--}}
                                        {{--                                        <option value="5001176">Ali Abad</option>--}}
                                        {{--                                        <option value="5001177">Ali Town</option>--}}
                                        {{--                                        <option value="5001179">Allahabad Road</option>--}}
                                        {{--                                        <option value="5001180">Allama Iqbal Colony</option>--}}
                                        {{--                                        <option value="5001181">Ameen Town</option>--}}
                                        {{--                                        <option value="5001182">Amer Pura</option>--}}
                                        {{--                                        <option value="5001184">Army Officers Colony</option>--}}
                                        {{--                                        <option value="5001185">Asghar Mall Road</option>--}}
                                        {{--                                        <option value="5001186">Ashraf Colony</option>--}}
                                        {{--                                        <option value="5001187">Asia Housing Scheme</option>--}}
                                        {{--                                        <option value="5001188">Askari 1</option>--}}
                                        {{--                                        <option value="5001196">Askari 10</option>--}}
                                        {{--                                        <option value="5001197">Askari 11</option>--}}
                                        {{--                                        <option value="5001198">Askari 12</option>--}}
                                        {{--                                        <option value="5001199">Askari 13</option>--}}
                                        {{--                                        <option value="5001200">Askari 14</option>--}}
                                        {{--                                        <option value="5001201">Askari 15</option>--}}
                                        {{--                                        <option value="5001189">Askari 2</option>--}}
                                        {{--                                        <option value="5001190">Askari 3</option>--}}
                                        {{--                                        <option value="5001191">Askari 4</option>--}}
                                        {{--                                        <option value="5001192">Askari 5</option>--}}
                                        {{--                                        <option value="5001193">Askari 7</option>--}}
                                        {{--                                        <option value="5001194">Askari 8</option>--}}
                                        {{--                                        <option value="5001195">Askari 9</option>--}}
                                        {{--                                        <option value="5001202">Askari Villas</option>--}}
                                        {{--                                        <option value="5001204">Awan Town</option>--}}
                                        {{--                                        <option value="5001206">Ayub Colony</option>--}}
                                        {{--                                        <option value="5001207">Ayub National Park</option>--}}
                                        {{--                                        <option value="5001208">Azeem Town</option>--}}
                                        {{--                                        <option value="5001209">Azizabad</option>--}}
                                        {{--                                        <option value="5001210">Babar Colony</option>--}}
                                        {{--                                        <option value="5001211">Badar Colony</option>--}}
                                        {{--                                        <option value="5001212">Bahar Colony</option>--}}
                                        {{--                                        <option value="5001213">Bahria Town Rawalpindi</option>--}}
                                        {{--                                        <option value="5001214">Bakra Mandi</option>--}}
                                        {{--                                        <option value="5001215">Bangash Colony</option>--}}
                                        {{--                                        <option value="5001217">Bank Road</option>--}}
                                        {{--                                        <option value="5001216">Bankers Colony</option>--}}
                                        {{--                                        <option value="5001218">Banni Chowk</option>--}}
                                        {{--                                        <option value="5001219">Bassali</option>--}}
                                        {{--                                        <option value="5001220">Behari Colony</option>--}}
                                        {{--                                        <option value="5001221">Bethsaida Colony</option>--}}
                                        {{--                                        <option value="5001222">Bostan Road</option>--}}
                                        {{--                                        <option value="5001223">Caltex Road</option>--}}
                                        {{--                                        <option value="5001224">Cantt</option>--}}
                                        {{--                                        <option value="5001225">Chah Sultan</option>--}}
                                        {{--                                        <option value="5001226">Chak Beli Khan</option>--}}
                                        {{--                                        <option value="5001227">Chakbeli Road</option>--}}
                                        {{--                                        <option value="5001228">Chaklala</option>--}}
                                        {{--                                        <option value="5001229">Chaklala Scheme</option>--}}
                                        {{--                                        <option value="5001230">Chakra</option>--}}
                                        {{--                                        <option value="5001231">Chakra Road</option>--}}
                                        {{--                                        <option value="5001232">Chakri</option>--}}
                                        {{--                                        <option value="5001233">Chakri Road</option>--}}
                                        {{--                                        <option value="5001234">Chandni Chowk</option>--}}
                                        {{--                                        <option value="5001235">Chanman Abad</option>--}}
                                        {{--                                        <option value="5001237">Christian Colony</option>--}}
                                        {{--                                        <option value="5001238">Chungi No. 22 Road</option>--}}
                                        {{--                                        <option value="5001239">City Town</option>--}}
                                        {{--                                        <option value="5001240">City Villas</option>--}}
                                        {{--                                        <option value="5001241">Civil Lines</option>--}}
                                        {{--                                        <option value="5001242">Clifton Township</option>--}}
                                        {{--                                        <option value="5001243">Cobb Line</option>--}}
                                        {{--                                        <option value="5001244">College Road</option>--}}
                                        {{--                                        <option value="5001245">Commercial Market</option>--}}
                                        {{--                                        <option value="5001246">Committee Chowk</option>--}}
                                        {{--                                        <option value="5001247">Cricket Stadium Road</option>--}}
                                        {{--                                        <option value="5001248">DAV College Road</option>--}}
                                        {{--                                        <option value="5001249">Defence Colony</option>--}}
                                        {{--                                        <option value="5001251">Dhamyal Road</option>--}}
                                        {{--                                        <option value="5001252">Dheri Hassanabad</option>--}}
                                        {{--                                        <option value="5001253">Dhok Babu Irfan</option>--}}
                                        {{--                                        <option value="5001254">Dhok Chiragh Din</option>--}}
                                        {{--                                        <option value="5001261">Dhok Elahi Baksh</option>--}}
                                        {{--                                        <option value="5001265">Dhok Gujran</option>--}}
                                        {{--                                        <option value="5001266">Dhok Kala Khan</option>--}}
                                        {{--                                        <option value="5001267">Dhok Kashmirian</option>--}}
                                        {{--                                        <option value="5001268">Dhok Mangtal</option>--}}
                                        {{--                                        <option value="5001269">Dhok Naju</option>--}}
                                        {{--                                        <option value="5001270">Dhok Paracha</option>--}}
                                        {{--                                        <option value="5001271">Dhok Piran Faqiran</option>--}}
                                        {{--                                        <option value="5001272">Dhok Sayedan Road</option>--}}
                                        {{--                                        <option value="5001255">Dhoke Banaras Road</option>--}}
                                        {{--                                        <option value="5001256">Dhoke Dalal Road</option>--}}
                                        {{--                                        <option value="5001257">Dhoke Gangal</option>--}}
                                        {{--                                        <option value="5001258">Dhoke Hameeda</option>--}}
                                        {{--                                        <option value="5001259">Dhoke Hassu</option>--}}
                                        {{--                                        <option value="5001260">Dhoke Khabba</option>--}}
                                        {{--                                        <option value="5001262">Dhoke Munshi Khan</option>--}}
                                        {{--                                        <option value="5001263">Dhoke Ratta</option>--}}
                                        {{--                                        <option value="5001264">Dhoke Syedan</option>--}}
                                        {{--                                        <option value="5001273">Doctors Housing Society</option>--}}
                                        {{--                                        <option value="5001274">Eastridge Housing Scheme</option>--}}
                                        {{--                                        <option value="5001275">Faisal Colony</option>--}}
                                        {{--                                        <option value="5001276">Faizabad</option>--}}
                                        {{--                                        <option value="5001277">Farooq-e-Azam Road</option>--}}
                                        {{--                                        <option value="5001278">Fazaia Colony</option>--}}
                                        {{--                                        <option value="5001279">Fazal Town</option>--}}
                                        {{--                                        <option value="5001280">Friends Colony</option>--}}
                                        {{--                                        <option value="5001281">G.H.Q</option>--}}
                                        {{--                                        <option value="5001282">Gangaal</option>--}}
                                        {{--                                        <option value="5001283">Ganj Mandi Road</option>--}}
                                        {{--                                        <option value="5001284">Garja</option>--}}
                                        {{--                                        <option value="5001285">Gawal Mandi</option>--}}
                                        {{--                                        <option value="5001286">Ghauri Town</option>--}}
                                        {{--                                        <option value="5001287">Ghaziabad</option>--}}
                                        {{--                                        <option value="5001288">Ghous-e-Azam Road</option>--}}
                                        {{--                                        <option value="5001289">Ghousia Colony</option>--}}
                                        {{--                                        <option value="5001290">Girja Road</option>--}}
                                        {{--                                        <option value="5001291">Gorakhpur</option>--}}
                                        {{--                                        <option value="5001293">Gulbahar Scheme</option>--}}
                                        {{--                                        <option value="5001295">Gulistan Colony</option>--}}
                                        {{--                                        <option value="5001296">Gulistan Fatima Colony</option>--}}
                                        {{--                                        <option value="5001294">Gulistan-e-Jinnah Colony</option>--}}
                                        {{--                                        <option value="5001297">Gulraiz Housing Scheme</option>--}}
                                        {{--                                        <option value="5001303">Gulshan Abad</option>--}}
                                        {{--                                        <option value="5001304">Gulshan Dadan</option>--}}
                                        {{--                                        <option value="5001298">Gulshan-e-Iqbal</option>--}}
                                        {{--                                        <option value="5001299">Gulshan-e-Kashmir</option>--}}
                                        {{--                                        <option value="5001300">Gulshan-e-Saeed</option>--}}
                                        {{--                                        <option value="5001301">Gulshan-e-Shamal</option>--}}
                                        {{--                                        <option value="5001302">Gulshan-e-Zaheer Colony</option>--}}
                                        {{--                                        <option value="5001305">Gulzar-e-Quaid Housing Society</option>--}}
                                        {{--                                        <option value="5001307">Harley Street</option>--}}
                                        {{--                                        <option value="5001308">Hazara Colony</option>--}}
                                        {{--                                        <option value="5001309">High Court Road</option>--}}
                                        {{--                                        <option value="5001310">Holy Family Road</option>--}}
                                        {{--                                        <option value="5001311">Humak</option>--}}
                                        {{--                                        <option value="5001312">Ibrahim Nagar</option>--}}
                                        {{--                                        <option value="5001313">Imran Khan Avenue</option>--}}
                                        {{--                                        <option value="5001314">Islamabad Airport</option>--}}
                                        {{--                                        <option value="5001315">Islamabad Farm Houses</option>--}}
                                        {{--                                        <option value="5001316">Islamabad Highway</option>--}}
                                        {{--                                        <option value="5001317">Ittehad Colony</option>--}}
                                        {{--                                        <option value="5001318">Jahangir Road</option>--}}
                                        {{--                                        <option value="5001319">Jamia Masjid Road</option>--}}
                                        {{--                                        <option value="5001320">Janjua Town</option>--}}
                                        {{--                                        <option value="5001321">Jhanda Chichi</option>--}}
                                        {{--                                        <option value="5001322">Jinnah Colony</option>--}}
                                        {{--                                        <option value="5001323">Judicial Colony</option>--}}
                                        {{--                                        <option value="5001341">KRL Road</option>--}}
                                        {{--                                        <option value="5001324">Kacheri Chowk</option>--}}
                                        {{--                                        <option value="5001325">Kahuta</option>--}}
                                        {{--                                        <option value="5001326">Kallar Syedan</option>--}}
                                        {{--                                        <option value="5001327">Kalma Chowk</option>--}}
                                        {{--                                        <option value="5001328">Kalyal Road</option>--}}
                                        {{--                                        <option value="5001329">Kalyamabad</option>--}}
                                        {{--                                        <option value="5001330">Kamala Abad</option>--}}
                                        {{--                                        <option value="5001331">Kartar Pura</option>--}}
                                        {{--                                        <option value="5001332">Kashmir Model Town</option>--}}
                                        {{--                                        <option value="5001333">Khanna Pul</option>--}}
                                        {{--                                        <option value="5001334">Khanna Road</option>--}}
                                        {{--                                        <option value="5001335">Khayaban-e-Faisal</option>--}}
                                        {{--                                        <option value="5001336">Khayaban-e-Sir Syed</option>--}}
                                        {{--                                        <option value="5001337">Khayaban-e-Tanveer</option>--}}
                                        {{--                                        <option value="5001338">Khurram Colony</option>--}}
                                        {{--                                        <option value="5001339">Kohati Bazar</option>--}}
                                        {{--                                        <option value="5001340">Kohsar Town</option>--}}
                                        {{--                                        <option value="5001342">Kurri Road</option>--}}
                                        {{--                                        <option value="5001343">Lahore Islamabad Motorway</option>--}}
                                        {{--                                        <option value="5001344">Lakhu</option>--}}
                                        {{--                                        <option value="5001345">Lakhu Road</option>--}}
                                        {{--                                        <option value="5001346">Lalarukh Colony</option>--}}
                                        {{--                                        <option value="5001347">Lalazar</option>--}}
                                        {{--                                        <option value="5001348">Lalkurti</option>--}}
                                        {{--                                        <option value="5001349">Liaquat Bagh</option>--}}
                                        {{--                                        <option value="5001350">Liaquat Colony</option>--}}
                                        {{--                                        <option value="5001351">Magistrate Colony</option>--}}
                                        {{--                                        <option value="5001352">Malik Colony</option>--}}
                                        {{--                                        <option value="5001353">Mall Road</option>--}}
                                        {{--                                        <option value="5001354">Mandra</option>--}}
                                        {{--                                        <option value="5001355">Mangral Town</option>--}}
                                        {{--                                        <option value="5001356">Marir</option>--}}
                                        {{--                                        <option value="5001357">Marir Hassan</option>--}}
                                        {{--                                        <option value="5001358">Media Town</option>--}}
                                        {{--                                        <option value="5001359">Millat Colony</option>--}}
                                        {{--                                        <option value="5001360">Misryal Road</option>--}}
                                        {{--                                        <option value="5001362">Mohalla Banni</option>--}}
                                        {{--                                        <option value="5001363">Mohammadi Colony</option>--}}
                                        {{--                                        <option value="5001364">Mohan Pura</option>--}}
                                        {{--                                        <option value="5001365">Momin Pura</option>--}}
                                        {{--                                        <option value="5001366">Morgah</option>--}}
                                        {{--                                        <option value="5001368">Munawar Colony</option>--}}
                                        {{--                                        <option value="5001369">Murree Road</option>--}}
                                        {{--                                        <option value="5001370">Muslim Town</option>--}}
                                        {{--                                        <option value="5001371">Nanak Pura</option>--}}
                                        {{--                                        <option value="5001372">National Garden Housing Scheme</option>--}}
                                        {{--                                        <option value="5001099">National Town</option>--}}
                                        {{--                                        <option value="5001373">Nawaz Colony</option>--}}
                                        {{--                                        <option value="5001374">New Afzal Town</option>--}}
                                        {{--                                        <option value="5001375">New Airport Town</option>--}}
                                        {{--                                        <option value="5001376">New Katarian</option>--}}
                                        {{--                                        <option value="5001377">New Lalazar</option>--}}
                                        {{--                                        <option value="5001378">Nussah Town</option>--}}
                                        {{--                                        <option value="5001379">Ojhary Camp</option>--}}
                                        {{--                                        <option value="5001380">Old Punjab House</option>--}}
                                        {{--                                        <option value="5001381">Others</option>--}}
                                        {{--                                        <option value="5001382">PAF Residential Area</option>--}}
                                        {{--                                        <option value="5001387">PIA Colony</option>--}}
                                        {{--                                        <option value="5001388">PIA Cooperative Officers Housing Society</option>--}}
                                        {{--                                        <option value="5001394">PWD Colony</option>--}}
                                        {{--                                        <option value="5001383">Palm City</option>--}}
                                        {{--                                        <option value="5001384">Peer Meher Ali Shah Town</option>--}}
                                        {{--                                        <option value="5001385">People Colony</option>--}}
                                        {{--                                        <option value="5001386">Peshawar Road</option>--}}
                                        {{--                                        <option value="5001389">Pindora</option>--}}
                                        {{--                                        <option value="5001390">Pir Wadhai</option>--}}
                                        {{--                                        <option value="5001391">Police Foundation Housing Scheme</option>--}}
                                        {{--                                        <option value="5001392">Professors Colony</option>--}}
                                        {{--                                        <option value="5001393">Punjab Government Servant Housing Foundation (PGSHF)--}}
                                        {{--                                        </option>--}}
                                        {{--                                        <option value="5001395">Qasimabad</option>--}}
                                        {{--                                        <option value="5001396">Quaid-e-Azam Colony</option>--}}
                                        {{--                                        <option value="5001397">Qurtaba City</option>--}}
                                        {{--                                        <option value="5001410">RCCI</option>--}}
                                        {{--                                        <option value="5001398">Race Course</option>--}}
                                        {{--                                        <option value="5001399">Raheemabad</option>--}}
                                        {{--                                        <option value="5001400">Rail View Housing Society</option>--}}
                                        {{--                                        <option value="5001401">Railway Workshop Road</option>--}}
                                        {{--                                        <option value="5001402">Raja Bazar</option>--}}
                                        {{--                                        <option value="5001403">Range Road</option>--}}
                                        {{--                                        <option value="5001404">Ranial</option>--}}
                                        {{--                                        <option value="5001405">Rashid Minhas Road</option>--}}
                                        {{--                                        <option value="5001406">Rawal Road</option>--}}
                                        {{--                                        <option value="5001407">Rawat</option>--}}
                                        {{--                                        <option value="5001408">Rawat Enclave</option>--}}
                                        {{--                                        <option value="5001409">Rawat Industrial Estate</option>--}}
                                        {{--                                        <option value="5001411">Rehmanabad</option>--}}
                                        {{--                                        <option value="5001412">Riaz Qureshi Road</option>--}}
                                        {{--                                        <option value="5001413">Sabzazar</option>--}}
                                        {{--                                        <option value="5001414">Saddar</option>--}}
                                        {{--                                        <option value="5001416">Sadiqabad</option>--}}
                                        {{--                                        <option value="5001417">Safari View Residencia</option>--}}
                                        {{--                                        <option value="5001418">Saidpur Road</option>--}}
                                        {{--                                        <option value="5001419">Samarzar Housing Society</option>--}}
                                        {{--                                        <option value="5001420">Sangar Town</option>--}}
                                        {{--                                        <option value="5001421">Sarafa Bazar</option>--}}
                                        {{--                                        <option value="5001422">Satellite Town</option>--}}
                                        {{--                                        <option value="5001424">Shah Khalid Colony</option>--}}
                                        {{--                                        <option value="5001423">Shaheen Town</option>--}}
                                        {{--                                        <option value="5001425">Shakrial</option>--}}
                                        {{--                                        <option value="5001426">Shalley Valley</option>--}}
                                        {{--                                        <option value="5001427">Shams Abad</option>--}}
                                        {{--                                        <option value="5001428">Sher Zaman Colony</option>--}}
                                        {{--                                        <option value="5001429">Stadium Road</option>--}}
                                        {{--                                        <option value="5001430">Supreme Court Employees Housing Society</option>--}}
                                        {{--                                        <option value="5001431">T &amp; T Colony</option>--}}
                                        {{--                                        <option value="5001432">Takht Pari</option>--}}
                                        {{--                                        <option value="5001433">Tali Mori</option>--}}
                                        {{--                                        <option value="5001434">Tench Bhata</option>--}}
                                        {{--                                        <option value="5001435">Tench Road</option>--}}
                                        {{--                                        <option value="5001436">Thalian Interchange</option>--}}
                                        {{--                                        <option value="5001437">Tipu Road</option>--}}
                                        {{--                                        <option value="5001438">Transformer Chowk</option>--}}
                                        {{--                                        <option value="5001439">Tufail Road</option>--}}
                                        {{--                                        <option value="5001440">Tulsa</option>--}}
                                        {{--                                        <option value="5001441">Tulsa Road</option>--}}
                                        {{--                                        <option value="5001443">Walayat Colony</option>--}}
                                        {{--                                        <option value="5001444">Waris Khan</option>--}}
                                        {{--                                        <option value="5001445">Wazir Town</option>--}}
                                        {{--                                        <option value="5001446">Westridge</option>--}}
                                        {{--                                        <option value="5001447">Wireless Residential Colony</option>--}}
                                        {{--                                        <option value="5001448">Yousaf Colony</option>--}}
                                        {{--                                        <option value="5001449">Zafar ul Haq Road</option>--}}
                                        {{--                                        <option value="5001450">Zeeshan Colony</option>--}}
                                        {{--                                        <option value="5001451">Zulfiqar Colony</option>--}}
                                    </select>

                                    @error('locality')
                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-6">
                                    Pssword
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    Confirm Password
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation"      autocomplete="new-password">
                                </div>
                            </div>

                            <div class="file-upload">

                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" type='file' onchange="readURL(this);"
                                           accept="image/*"/>
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add Image</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image"/>
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span
                                                class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="file-upload-btn" type="submit">{{ __('Save') }}</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col">
                <div class="card">
                    <textarea type="text"></textarea>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.image-upload-wrap').hide();

                    $('.file-upload-image').attr('src', e.target.result);
                    $('.file-upload-content').show();

                    $('.image-title').html(input.files[0].name);
                };

                reader.readAsDataURL(input.files[0]);

            } else {
                removeUpload();
            }
        }

        function removeUpload() {
            $('.file-upload-input').replaceWith($('.file-upload-input').clone());
            $('.file-upload-content').hide();
            $('.image-upload-wrap').show();
        }

        $('.image-upload-wrap').bind('dragover', function () {
            $('.image-upload-wrap').addClass('image-dropping');
        });
        $('.image-upload-wrap').bind('dragleave', function () {
            $('.image-upload-wrap').removeClass('image-dropping');
        });


    </script>
    <script>
       function getCity() {
           var state = $('#state').val();
           if(state!==''){

               //console.log('value found');

           }else{
               console.log('value not found');
           }

       }
    </script>
@endsection

