<?php require APPROOT . '/views/includes/head.php'; ?>

<form action="<?= URLROOT; ?>/counmederwerkerpuntentries/update" method="post">
  <table>
    <tbody>
      <tr>
        <td>
          <input type="text" name="Aantalpunten" id="Aantalpunten" value="<?= $data["row"]->Aantalpunten; ?>">
        </td>
      </tr>
      <tr>

      </tr>
      <tr>
    </tbody>
  </table>

</form>

<a href="<?= URLROOT;?>/homepages/index">home</a>
<?php require APPROOT . '/views/includes/footer.php'; ?>