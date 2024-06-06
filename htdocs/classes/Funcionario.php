<?php
class Funcionario
{

    private static function ValidarCPF($cpf)
    {
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        if (strlen($cpf) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }

    private static function ValidarEmail($email)
    {

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Email invalido");
            }

            return true;
    }

    public static function Register($nome, $dataDeNascimento, $cpf, $email, $estadoCivil)
    {

        if (!(Funcionario::ValidarCPF($cpf))) {
            throw new Exception("CPF invalido");
        }

        if (!(Funcionario::ValidarEmail($email))) {
            throw new Exception("Email invalido");
        }

        $db = Database::connect()->prepare("INSERT INTO funcionarios VALUES (null, ?, ?, ?, ?, ?)");
        $db->execute([$nome, $dataDeNascimento, $cpf, $email, $estadoCivil]);
    }

    public static function Delete($id)
    {
        $db = Database::connect()->prepare("DELETE FROM funcionarios WHERE id = ?");
        $db->execute([$id]);
    }

    public static function Update($nome, $dataDeNascimento, $cpf, $email, $estadoCivil, $id)
    {

        if (!(Funcionario::ValidarCPF($cpf))) {
            throw new Exception("CPF invalido");
        }

        if (!(Funcionario::ValidarEmail($email))) {
            throw new Exception("Email invalido");
        }

        $db = Database::connect()->prepare("UPDATE funcionarios set nome = ?, dataDeNascimento = ?, cpf = ?, email = ?, estadoCivil = ? WHERE id = ?");
        $db->execute([$nome, $dataDeNascimento, $cpf, $email, $estadoCivil, $id]);
    }
}
