<?php
$data = Database::connect()->prepare("SELECT * FROM funcionarios WHERE id = ?");
$data->execute([$_GET['id']]);
$data = $data->fetch()
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
      </div>
      <div class="col-sm-6">
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Editar Funcionário</h3>
          </div>

          <form method="post">
            <div class="card-body">
              <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" placeholder="Nome" name="nome" value="<?php echo $data['nome'] ?>" required>
              </div>
              <div class="form-group">
                <label>Data de nascimento</label>
                <input type="date" class="form-control" name="dataDeNascimento" value="<?php echo $data['dataDeNascimento'] ?>" required>
              </div>
              <div class="form-group">
                <label>CPF</label>
                <input type="text" class="form-control" name="cpf" placeholder="CPF" value="<?php echo $data['cpf'] ?>" id="cpf" required>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $data['email'] ?>" required>
              </div>

              <div class="form-group">
                <label>Estado civil</label>
                <select class="custom-select" name="estadoCivil">

                  <?php foreach ($estadoCivil as $option) : ?>
                    <option value="<?php echo $option; ?>" <?php echo (!empty($_POST['estadoCivil']) && $_POST['estadoCivil'] == $option) ? 'selected' : ''; ?>>
                      <?php echo $option; ?>
                    </option>
                  <?php endforeach; ?>

                </select>
              </div>


            </div>
            <div class="card-footer">
              <input type="submit" name="update" value="Atualizar" class="btn btn-primary" required>
            </div>
          </form>

        </div>

      </div>
    </div>
</section>

<?php
if (isset($_POST['update'])) {
  $nome = $_POST['nome'];
  $dataDeNascimento = $_POST['dataDeNascimento'];
  $cpf = $_POST['cpf'];
  $email = $_POST['email'];
  $estadoCivil = $_POST['estadoCivil'];

  try {
    Funcionario::Update($nome, $dataDeNascimento, $cpf, $email, $estadoCivil, $_GET['id']);
    echo "<script>new Noty({text: 'Funcionario atualizado com sucesso',  type: 'success'}).show();</script>";
  } catch (\Throwable $e) {
    echo "<script>new Noty({text: '" . $e->getMessage() . "',  type: 'error'}).show();</script>";
  }
}
?>