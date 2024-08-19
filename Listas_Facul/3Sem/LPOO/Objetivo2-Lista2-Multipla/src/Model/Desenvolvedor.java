package Model;

public class Desenvolvedor extends Funcionario {
    public Desenvolvedor(String nome, double salario) {
        super(nome, salario);
    }

    public Desenvolvedor() {
    }

    @Override
    public double getBonus() {
        return this.salario * 0.05;
    }


}