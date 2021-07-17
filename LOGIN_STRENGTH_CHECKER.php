<h1>Create new account</h1>
<form action="/newaccount" method=post
    oninput='cpassword.setCustomValidity(password.value != cpassword.value ? "Passwords do not match." : "")'>
    <p>
        <label for="username">E-mail address:</label>
        <input id="username" type=email required name=un>
    <p>
        <label for="password1">Password:</label>
        <input id="password1" type=password required name="password">
    <p>
        <label for="password2">Confirm password:</label>
        <input id="password2" type=password name="cpassword">
    <p>
        <input type=submit value="Create account">
</form>


<!-- PASSWORD STRENGHT  -->
<input class="password-strength__input form-control" type="password" id="password-input" aria-describedby="passwordHelp"
    placeholder="Enter password" />
<div class="input-group-append">
    <button class="password-strength__visibility btn btn-outline-secondary" type="button"><span
            class="password-strength__visibility-icon" data-visible="hidden"><i
                class="fas fa-eye-slash"></i></span><span class="password-strength__visibility-icon js-hidden"
            data-visible="visible"><i class="fas fa-eye"></i></span></button>
</div>
</div><small class="password-strength__error text-danger js-hidden">This symbol is not allowed!</small><small
    class="form-text text-muted mt-2" id="passwordHelp">Add 9 charachters or more, lowercase letters, uppercase letters,
    numbers and symbols to make the password really strong!</small>
</div>
<div class="password-strength__bar-block progress mb-4">
    <div class="password-strength__bar progress-bar bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0"
        aria-valuemax="100"></div>
</div>
<button class="password-strength__submit btn btn-success d-flex m-auto" type="button"
    disabled="disabled">Submit</button>