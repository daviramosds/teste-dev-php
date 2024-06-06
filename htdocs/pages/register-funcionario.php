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
                <h3 class="card-title">Registrar Funcionário</h3>
              </div>
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" placeholder="Nome" name="nome" required>
                  </div>
                  <div class="form-group">
                    <label>Data de nascimento</label>
                    <input type="date" class="form-control" name="dataDeNascimento" required>
                  </div>
                  <div class="form-group">
                    <label>CPF</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                  </div>

                  <div class="form-group">
                    <label>Estado civil</label>
                    <select class="custom-select" name="estadoCivil">
                      <?php foreach ($estadoCivil as $option) : ?>
                        <option value="<?php echo $option; ?>">
                          <?php echo $option; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>


                </div>
                <div class="card-footer">
                  <input type="submit" name="register" value="Cadastrar" class="btn btn-primary" required>
                </div>
              </form>
            </div>

          </div>
        </div>
    </section>

    <?php
    if (isset($_POST['register'])) {
      $nome = $_POST['nome'];
      $dataDeNascimento = $_POST['dataDeNascimento'];
      $cpf = $_POST['cpf'];
      $email = $_POST['email'];
      $estadoCivil = $_POST['estadoCivil'];
      try {
        Funcionario::Register($nome, $dataDeNascimento, $cpf, $email, $estadoCivil);
        echo "<script>new Noty({text: 'Usuario criado com sucesso',  type: 'success'}).show();</script>";
      } catch (\Throwable $e) {
        echo "<script>new Noty({text: '" . $e->getMessage() . "',  type: 'error'}).show();</script>";
      }
    }
    ?>