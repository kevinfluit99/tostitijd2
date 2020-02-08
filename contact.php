<?php
require_once('include/include.php');
echo"
<div class='row no-gutters '>
  <div class='col-md-6 no-gutters'>
    <div class='leftside d-flex justify-content-center align-items-center'>
      <!-- column1, Vertical Dropdown Menu -->
      <div id='main-menu' class='list-group'>
        <a href='#sub-menu' class='list-group-item active font' data-toggle='collapse' data-target='#sub-menu1' data-parent='#main-menu'>Bestellen <span class='caret'></span></a>
        <div class='collapse list-group-level1' id='sub-menu1'>
          <a href='faq.php' class='list-group-item font' data-parent='#sub-menu'>nkjsnj</a>
          <a href='faq.php' class='list-group-item font' data-parent='#sub-menu'>Sub Item 2</a>
        </div>

        <a href='#sub-menu' class='list-group-item active font' data-toggle='collapse' data-target='#sub-menu2' data-parent='#main-menu'>Bezorgen <span class='caret'></span></a>
        <div class='collapse list-group-level1' id='sub-menu2'>
          <a href='faq.php' class='list-group-item font' data-parent='#sub-menu'>dsd</a>
          <a href='faq.php' class='list-group-item font' data-parent='#sub-menu'>Sub Item 2</a>
        </div>

        <a href='#sub-menu' class='list-group-item active font' data-toggle='collapse' data-target='#sub-menu3' data-parent='#main-menu'>Betalen<span class='caret'></span></a>
        <div class='collapse list-group-level1' id='sub-menu3'>
          <a href='faq.php' class='list-group-item font' data-parent='#sub-menu'>jj</a>
          <a href='faq.php' class='list-group-item font' data-parent='#sub-menu'>Sub Item 2</a>
        </div>

        <a href='#sub-menu' class='list-group-item active font' data-toggle='collapse' data-target='#sub-menu4' data-parent='#main-menu'>Mijn account<span class='caret'></span></a>
        <div class='collapse list-group-level1' id='sub-menu4'>
          <a href='faq.php' class='list-group-item font' data-parent='#sub-menu'>Sub Item 1</a>
          <a href='faq.php' class='list-group-item font' data-parent='#sub-menu'>Sub Item 2</a>
        </div>

        <a href='#sub-menu' class='list-group-item active font' data-toggle='collapse' data-target='#sub-menu5' data-parent='#main-menu'>Kwaliteiten<span class='caret'></span></a>
        <div class='collapse list-group-level1' id='sub-menu5'>
          <a href='faq.php' class='list-group-item font' data-parent='#sub-menu'>Sub Item 1</a>
          <a href='faq.php' class='list-group-item font' data-parent='#sub-menu'>Sub Item 2</a>
        </div>

        <a href='#sub-menu' class='list-group-item active font' data-toggle='collapse' data-target='#sub-menu6' data-parent='#main-menu'>Diensten en Voorwaarden<span class='caret'></span></a>
        <div class='collapse list-group-level1' id='sub-menu6'>
          <a href='faq.php' class='list-group-item font' data-parent='#sub-menu'>Sub Item 1</a>
          <a href='faq.php' class='list-group-item font' data-parent='#sub-menu'>Sub Item 2</a>
        </div>
      </div>
    </div>
  </div>

  <div class='col-md-6 no-gutters'>
    <div class='rightside text_con'>
      <h1 class='font'>Vragen?</h1>
      </br>
      <p class='font'>Stel hier uw vragen</p>
      <hr>
      <div class='thumbmail'>
        <div class='caption center'>
          <form action='action/ac_contact.php' method='POST'>
            <div class='form__group field'>
              <input type='input' class='form__field' placeholder='Naam' name='txt_naam' id='name' required />
              <label for='name' class='form__label'>Naam</label>
            </div>

            <div class='form__group field'>
              <input type='input' class='form__field' placeholder='Bedrijfsnaam' name='txt_bedrijf' id='name' required />
              <label for='name' class='form__label'>Bedrijfsnaam</label>
            </div>

            <div class='form__group field'>
              <input type='input' class='form__field' placeholder='Email' name='txt_email' id='name' required />
              <label for='name' class='form__label'>E-mail</label>
            </div>

            <div class='form__group field'>
              <input type='input' class='form__field' placeholder='Vraag' name='txt_vraag' id='name' required />
              <label for='name' class='form__label'>Vraag</label>
            </div>
            </br>
            <input class= ' font but_col' type='submit' value='Stel vraag' name='Insert'>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>";
