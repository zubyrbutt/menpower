@extends('layouts.app')


@section('content')


    <div class="container">

        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        Feature
                    </div>
                    <div class="card-body">


                        <div class="search-card" id="ajax">
                            <a href="{{url('/dashboard')}}" class="card-link link-text">Home</a><span
                                class="badge badge-light">  10</span>
                            <hr>
                            <a href="{{url('/dashboard/add-new-location')}}" class="card-link link-text">Add New
                                Location</a><span class="badge badge-light">  10</span>
                            <hr>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="mb-3">
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            Add New Location
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('addnewlocationstore')}}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" value="pakistan" id="country" name="country" readonly
                                           placeholder="Pakistan">
                                </div>
                                <div class="form-group">

                                    <select class="form-control" id="state"  name="state">
                                        {{--                                        <option value="unknown">Select State</option>--}}
                                        {{--                                        <option value="Azad Kashmir">Azad Kashmir</option>--}}
                                        {{--                                        <option value="Balochistan">Balochistan</option>--}}
                                        <option value="Islamabad Capital Territory" selected>Islamabad Capital
                                            Territory
                                        </option>
                                        {{--                                        <option value="Khyber Pakhtunkhwa">Khyber Pakhtunkhwa</option>--}}
                                        {{--                                        <option value="Northern Areas">Northern Areas</option>--}}
                                        {{--                                        <option value="Punjab">Punjab</option>--}}
                                        {{--                                        <option value="Sindh">Sindh</option>--}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="city" id="city ">
{{--                                        <option value="unknown">Select City</option>--}}
                                        <option value="Islamabad" selected>Islamabad
                                        </option>

                                    </select>
                                </div>
                                <div class="form-group">

                                    <select id="locally" name="locally" class="form-control"
                                            data-aut-id="dd-locality">
                                        <option value="7th Avenue">7th Avenue</option>
                                        <option value="9th Avenue">9th Avenue</option>
                                        <option value="AGHOSH">AGHOSH</option>
                                        <option value="Abdullah Garden">Abdullah Garden</option>
                                        <option value="Agha Shahi Avenue">Agha Shahi Avenue</option>
                                        <option value="Agro Farming Scheme">Agro Farming Scheme</option>
                                        <option value="Ahmed Town">Ahmed Town</option>
                                        <option value="Air Force Housing Society">Air Force Housing Society</option>
                                        <option value="Airline Avenue">Airline Avenue</option>
                                        <option value="Airport Enclave">Airport Enclave</option>
                                        <option value="Airport Green Garden">Airport Green Garden</option>
                                        <option value="Aiza Garden">Aiza Garden</option>
                                        <option value="Al Huda Town">Al Huda Town</option>
                                        <option value="Al Madina City">Al Madina City</option>
                                        <option value="Alhamra Avenue">Alhamra Avenue</option>
                                        <option value="Ali Pur">Ali Pur</option>
                                        <option value="Alipur Farash">Alipur Farash</option>
                                        <option value="Angoori Road">Angoori Road</option>
                                        <option value="Arsalan Town">Arsalan Town</option>
                                        <option value="Ataturk Avenue">Ataturk Avenue</option>
                                        <option value="Athal">Athal</option>
                                        <option value="Atomic Energy Employee Society">Atomic Energy Employee Society
                                        </option>
                                        <option value="Azmat Town">Azmat Town</option>
                                        <option value="B-17">B-17</option>
                                        <option value="Bahria Enclave">Bahria Enclave</option>
                                        <option value="Bahria Town">Bahria Town</option>
                                        <option value="Bani Gala">Bani Gala</option>
                                        <option value="Bhara kahu">Bhara kahu</option>
                                        <option value="Blue Area">Blue Area</option>
                                        <option value="Bokra Road">Bokra Road</option>
                                        <option value="Burma Town">Burma Town</option>
                                        <option value="C-14">C-14</option>
                                        <option value="C-15">C-15</option>
                                        <option value="C-16">C-16</option>
                                        <option value="C-17">C-17</option>
                                        <option value="C-18">C-18</option>
                                        <option value="CBR Town">CBR Town</option>
                                        <option value="Capital Enclave">Capital Enclave</option>
                                        <option value="Capital Smart City">Capital Smart City</option>
                                        <option value="Central Avenue">Central Avenue</option>
                                        <option value="Chak Shahzad">Chak Shahzad</option>
                                        <option value="Chatha Bakhtawar">Chatha Bakhtawar</option>
                                        <option value="Chattar">Chattar</option>
                                        <option value="Chirah">Chirah</option>
                                        <option value="City Garden">City Garden</option>
                                        <option value="Club Road">Club Road</option>
                                        <option value="Commoners Flower Valley">Commoners Flower Valley</option>
                                        <option value="Commoners Sky Gardens">Commoners Sky Gardens</option>
                                        <option value="Constitution Avenue">Constitution Avenue</option>
                                        <option value="D-12">D-12</option>
                                        <option value="D-13">D-13</option>
                                        <option value="D-14">D-14</option>
                                        <option value="D-16">D-16</option>
                                        <option value="D-17">D-17</option>
                                        <option value="D-18">D-18</option>
                                        <option value="DHA Defence">DHA Defence</option>
                                        <option value="Dhok Chaudhrian">Dhok Chaudhrian</option>
                                        <option value="Diplomatic Enclave">Diplomatic Enclave</option>
                                        <option value="E-10">E-10</option>
                                        <option value="E-11">E-11</option>
                                        <option value="E-12">E-12</option>
                                        <option value="E-13">E-13</option>
                                        <option value="E-14">E-14</option>
                                        <option value="E-15">E-15</option>
                                        <option value="E-16">E-16</option>
                                        <option value="E-17">E-17</option>
                                        <option value="E-18">E-18</option>
                                        <option value="E-19">E-19</option>
                                        <option value="E-6">E-6</option>
                                        <option value="E-7">E-7</option>
                                        <option value="E-8">E-8</option>
                                        <option value="Eden Life Islamabad">Eden Life Islamabad</option>
                                        <option value="Emaar Canyon Views">Emaar Canyon Views</option>
                                        <option value="Embassy Road">Embassy Road</option>
                                        <option value="Engineering Co-operative Housing (ECHS)">Engineering Co-operative
                                            Housing (ECHS)
                                        </option>
                                        <option value="5000984">F-10</option>
                                        <option value="5000985">F-11</option>
                                        <option value="5000986">F-12</option>
                                        <option value="5000987">F-13</option>
                                        <option value="5000988">F-14</option>
                                        <option value="5000989">F-15</option>
                                        <option value="5000990">F-16</option>
                                        <option value="5000991">F-17</option>
                                        <option value="5000979">F-5</option>
                                        <option value="5000980">F-6</option>
                                        <option value="5000981">F-7</option>
                                        <option value="5000982">F-8</option>
                                        <option value="5000983">F-9</option>
                                        <option value="5000995">FECHS</option>
                                        <option value="5000997">FOECHS - Foreign Office Employees Society</option>
                                        <option value="5000992">Faisal Town - F-18</option>
                                        <option value="5000993">Fateh Jang Road</option>
                                        <option value="5000994">Fatima Town</option>
                                        <option value="5000996">Federal Government Employees Housing Foundation</option>
                                        <option value="5000998">Frash Town</option>
                                        <option value="5001004">G-10</option>
                                        <option value="5001005">G-11</option>
                                        <option value="5001006">G-12</option>
                                        <option value="5001007">G-13</option>
                                        <option value="5001008">G-14</option>
                                        <option value="5001009">G-15</option>
                                        <option value="5001010">G-16</option>
                                        <option value="5001011">G-17</option>
                                        <option value="5000999">G-5</option>
                                        <option value="5001000">G-6</option>
                                        <option value="5001001">G-7</option>
                                        <option value="5001002">G-8</option>
                                        <option value="5001003">G-9</option>
                                        <option value="5001012">Gandhara City</option>
                                        <option value="5001013">Garden Town</option>
                                        <option value="5001014">Ghauri Town</option>
                                        <option value="5001015">Golra Road</option>
                                        <option value="5001016">Graceland Housing</option>
                                        <option value="5001018">Green Avenue</option>
                                        <option value="5001019">Green City</option>
                                        <option value="5001023">Gulberg</option>
                                        <option value="5000486">Gulf Residencia</option>
                                        <option value="5001024">Gulshan-e-Khudadad</option>
                                        <option value="5001028">H-10</option>
                                        <option value="5001029">H-11</option>
                                        <option value="5001030">H-12</option>
                                        <option value="5001031">H-13</option>
                                        <option value="5001032">H-15</option>
                                        <option value="5001033">H-19</option>
                                        <option value="5001026">H-8</option>
                                        <option value="5001027">H-9</option>
                                        <option value="5001034">Hundamal</option>
                                        <option value="5001037">I-10</option>
                                        <option value="5001038">I-11</option>
                                        <option value="5001039">I-12</option>
                                        <option value="5001040">I-13</option>
                                        <option value="5001041">I-14</option>
                                        <option value="5001042">I-15</option>
                                        <option value="5001043">I-16</option>
                                        <option value="5001044">I-17</option>
                                        <option value="5001035">I-8</option>
                                        <option value="5001036">I-9</option>
                                        <option value="5001047">IJP Road</option>
                                        <option value="5001045">Ibn-e-Sina Road</option>
                                        <option value="5001046">Icon Garden</option>
                                        <option value="5001048">Iqbal Town</option>
                                        <option value="5001049">Islamabad Co-operative Housing</option>
                                        <option value="5001050">Islamabad Enclave</option>
                                        <option value="5001051">Islamabad Expressway</option>
                                        <option value="5001052">Islamabad Highway</option>
                                        <option value="5001053">Islamabad View Valley</option>
                                        <option value="5001054">Ittefaq Town</option>
                                        <option value="5001055">J and K Zone 5</option>
                                        <option value="5001056">Japan Road</option>
                                        <option value="5001057">Jeddah Town</option>
                                        <option value="5001059">Jhang Syedan</option>
                                        <option value="5001058">Jhangi Syedan</option>
                                        <option value="5001060">Jinnah Avenue</option>
                                        <option value="5001061">Judicial Town</option>
                                        <option value="5001062">Kahuta Road</option>
                                        <option value="5001063">Kahuta Triangle Industrial Area</option>
                                        <option value="5001064">Karakoram Diplomatic Enclave</option>
                                        <option value="5001065">Karakoram Enclave 1</option>
                                        <option value="5001066">Karakoram Enclave 2</option>
                                        <option value="5001067">Kashmir Highway</option>
                                        <option value="5001068">Kashmir Town</option>
                                        <option value="5001069">Khayaban-e-Iqbal</option>
                                        <option value="5001070">Khayaban-e-Suhrwardy</option>
                                        <option value="5001071">Koral Chowk</option>
                                        <option value="5001072">Koral Town</option>
                                        <option value="5001073">Korang Road</option>
                                        <option value="5001074">Korang Town</option>
                                        <option value="5001075">Kuri Model Town</option>
                                        <option value="5001076">Kuri Road</option>
                                        <option value="5001077">Lawyers Society</option>
                                        <option value="5001078">Lehtarar Road</option>
                                        <option value="5001079">Luqman Hakeem Road</option>
                                        <option value="5001080">Madina Town</option>
                                        <option value="5001081">Malot</option>
                                        <option value="5001082">Malpur</option>
                                        <option value="5001083">Margalla Town</option>
                                        <option value="5001084">Margalla Valley - C-12</option>
                                        <option value="5001086">Meherban Colony</option>
                                        <option value="5001087">Ministry of Commerce Society</option>
                                        <option value="5001088">Mira Abadi</option>
                                        <option value="5001361">Model Town Humak</option>
                                        <option value="5001089">Motorway Chowk</option>
                                        <option value="5001090">Motorway City</option>
                                        <option value="5001092">Multi Residencia &amp; Orchards</option>
                                        <option value="5001093">Mumtaz City</option>
                                        <option value="5001094">Murree Expressway</option>
                                        <option value="5001095">Muslim Town</option>
                                        <option value="5001096">NARC Colony</option>
                                        <option value="5001106">NHA Housing Society</option>
                                        <option value="5001107">NIH Colony</option>
                                        <option value="5001098">National Police Foundation</option>
                                        <option value="5001100">Naval Anchorage</option>
                                        <option value="5001101">Naval Farms Housing Scheme</option>
                                        <option value="5001102">Naval Housing Scheme</option>
                                        <option value="5001103">Nazim-ud-din Road</option>
                                        <option value="5001104">New Airport Town</option>
                                        <option value="5001105">New Shakrial</option>
                                        <option value="5001108">O-9</option>
                                        <option value="5001109">OPF Valley</option>
                                        <option value="5001110">Orchard Scheme</option>
                                        <option value="5001111">Others</option>
                                        <option value="5001112">PAEC Employees Cooperative Housing Society</option>
                                        <option value="5001113">PAF Tarnol</option>
                                        <option value="5001119">PECHS</option>
                                        <option value="5001122">PTV Colony</option>
                                        <option value="5001123">PWD Housing Scheme</option>
                                        <option value="5001124">PWD Road</option>
                                        <option value="5001114">Pakistan Town</option>
                                        <option value="5001115">Park Enclave CDA</option>
                                        <option value="5001117">Park View City</option>
                                        <option value="5001118">Partal Town</option>
                                        <option value="5001120">Phulgran</option>
                                        <option value="5001121">Pir Sohawa</option>
                                        <option value="5001125">Qutbal Town</option>
                                        <option value="5001126">Raja Akhtar Road</option>
                                        <option value="5001127">Rawal Dam Colony</option>
                                        <option value="5001128">Rawal Enclave</option>
                                        <option value="5001129">Rawal Town</option>
                                        <option value="5001130">Razia Abad</option>
                                        <option value="5001131">River Garden</option>
                                        <option value="5001132">Riverwalk</option>
                                        <option value="5001133">Royal City</option>
                                        <option value="5001134">Sangjani</option>
                                        <option value="5001135">Sarai Kharbuza</option>
                                        <option value="5001136">Senate Secretariat Employees Cooperative Housing Society
                                        </option>
                                        <option value="5001137">Shah Allah Ditta</option>
                                        <option value="5001138">Shah Dara</option>
                                        <option value="5001139">Shahpur</option>
                                        <option value="5001140">Shalimar Town</option>
                                        <option value="5001141">Shehzad Town</option>
                                        <option value="5001142">Sihala</option>
                                        <option value="5001143">Sihala Valley</option>
                                        <option value="5001144">Simly Dam Road</option>
                                        <option value="5001145">Soan Garden</option>
                                        <option value="5001146">Sohan Valley</option>
                                        <option value="5001147">Spring Valley</option>
                                        <option value="5001148">State Life Insurance Employees Cooperative Housing
                                            Society
                                        </option>
                                        <option value="5001149">Swan Garden</option>
                                        <option value="5001150">Taj Residencia Housing Society</option>
                                        <option value="5001151">Taramrri</option>
                                        <option value="5001152">Tarlai</option>
                                        <option value="5001153">Tarnol</option>
                                        <option value="5001154">Thalian</option>
                                        <option value="5001155">Thanda Pani</option>
                                        <option value="5001156">The Springs</option>
                                        <option value="5001157">Top City 1</option>
                                        <option value="5001158">Tumair</option>
                                        <option value="5001159">University Town</option>
                                        <option value="5001160">Victoria Heights</option>
                                        <option value="5001442">Wah Link Road</option>
                                        <option value="5001161">Wapda Town</option>
                                        <option value="5001162">Zaraj Housing Scheme</option>
                                        <option value="5001163">Zero Point</option>
                                        <option value="5001164">Zone 5</option>
                                    </select>

                                </div>
                                <button class="btn btn-primary" type="submit">Save</button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>


@endsection

