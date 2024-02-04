<h1>Izdavac Registration Form</h1>
<form id="registrationForm" method="POST" action="{{ route('TestIzdavacStore') }}">
    @csrf
    <label for="Ime">First Name:</label>
    <input type="text" id="Ime" name="Ime"><br>

    <label for="Prezime">Last Name:</label>
    <input type="text" id="Prezime" name="Prezime"><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br>

    <label for="Telefon">Phone:</label>
    <input type="tel" id="Telefon" name="Telefon"><br>

    <label for="Adresa1">Address:</label>
    <input type="text" id="Adresa1" name="Adresa1"><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br>

    <label for="Naziv">Publisher Name:</label>
    <input type="text" id="Naziv" name="Naziv"><br>

    <input type="submit" value="Submit">
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
