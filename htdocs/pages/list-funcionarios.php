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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Funcionários</h3>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nome</th>
                      <th>Data de nascimento</th>
                      <th>CPF</th>
                      <th>Email</th>
                      <th>Estado civil</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $db = Database::connect()->prepare("SELECT * FROM funcionarios ORDER by id");
                    $db->execute();
                    $db = $db->fetchALl();

                    foreach ($db as $value) {

                      $data = new DateTime($value['dataDeNascimento']);
                      $data = $data->format('d/m/Y');

                      echo "<tr>";
                      echo "<td>$value[id]</td>";
                      echo "<td>$value[nome]</td>";
                      echo "<td>$data</td>";
                      echo "<td>$value[cpf]</td>";
                      echo "<td>$value[email]</td>";
                      echo "<td>$value[estadoCivil]</td>";
                      echo "<td><a href='?edit-funcionario&id=$value[id]' type='button' class='btn btn-block btn-primary'>Editar</a></td>";
                      echo "<td><a href='?delete-funcionario&id=$value[id]' type='button' class='btn btn-block btn-danger'>Remover</a></td>";
                      echo "</tr>";
                    }
                    ?>

                    </body>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>