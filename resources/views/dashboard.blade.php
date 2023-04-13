<!DOCTYPE html>
<html>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects Overview') }}
        </h2>
    </x-slot>

    <div class="container-fluid mt-5 text-center">
        <p class="mt-5 mb-3"><b>OPEN NEW PROJECT</b></p>
        <form action="{{ url('/addproject') }}" method="POST">
            <div class="form-group w-100">
                @csrf
                <input class="mx-1 mt-2 mb-2" type="text" name="naziv_projekta" id="naziv_projekta" placeholder="Name">
                <input class="mx-1 mt-2 mb-2" type="text" name="opis_projekta" id="opis_projekta" placeholder="Description">
                <input class="mx-1 mt-2 mb-2" type="number" name="cijena_projekta" id="cijena_projekta" placeholder="Price">
                <!--<input class="mx-1 mt-2 mb-2" type="text" name="clanovi" id="clanovi" placeholder="Members">!-->
                <select class="mx-1 mt-2 mb-2" type="text" name="clanovi" id="clanovi">
                    <option value="Karlo">Karlo</option>
                     <option value="Kristina">Kristina</option>
                    <option value="Magdalena">Magdalena</option>
                    <option value="Bruno">Bruno</option>
                    <option value="Bruno">Fran</option>
                </select>
                <input class="mx-1 mt-2 mb-2" type="text" name="obavljeni_poslovi" id="obavljeni_poslovi" placeholder="Done tasks">
                <input class="mx-1 mt-2 mb-2" type="date" name="datum_pocetka" id="datum_pocetka" placeholder="Entry date">
                <input class="mx-1 mt-2 mb-2" type="date" name="datum_zavrsetka" id="datum_zavrsetka" placeholder="Final date">
                <button type="submit" class="mx-2 mt-2 mb-2 btn btn-secondary bg-secondary">Add</button>
            </div>
        </form>

        <p class="mb-3 mt-5"><b>MY PROJECTS AS <u>FACILITATOR</u></b></p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Naziv</th>
                    <th scope="col">Opis</th>
                    <th scope="col">Cijena</th>
                    <th scope="col">Članovi</th>
                    <th scope="col">Obavljeni poslovi</th>
                    <th scope="col">Datum početka</th>
                    <th scope="col">Datum završetka</th>
                </tr>
            </thead>
            <tbody>
                @foreach($project as $data)
                <tr>
                    <td>{{ $data->naziv_projekta }}</td>
                    <td>{{ $data->opis_projekta }}</td>
                    <td>{{ $data->cijena_projekta }}</td>
                    <td>{{ $data->clanovi }}</td>
                    <td>{{ $data->obavljeni_poslovi }}</td>
                    <td>{{ $data->datum_pocetka }}</td>
                    <td>{{ $data->datum_zavrsetka }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p class="mt-5 mt-4"><b>MY PROJECTS AS <u>MEMBER</u></b></p>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Naziv</th>
                    <th scope="col">Opis</th>
                    <th scope="col">Cijena</th>
                    <th scope="col">Članovi</th>
                    <th scope="col">Obavljeni poslovi</th>
                    <th scope="col">Datum početka</th>
                    <th scope="col">Datum završetka</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $data)
                @if (str_contains($data->clanovi, Auth::user()->name))
                <tr>
                    <td>{{ $data->naziv_projekta }}</td>
                    <td>{{ $data->opis_projekta }}</td>
                    <td>{{ $data->cijena_projekta }}</td>
                    <td>{{ $data->clanovi }}</td>
                    <td>{{ $data->obavljeni_poslovi }}</td>
                    <td>{{ $data->datum_pocetka }}</td>
                    <td>{{ $data->datum_zavrsetka }}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
</x-app-layout>
</html>
